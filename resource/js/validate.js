/**
 * 表单验证
 */
function easy(){
	// input tips
	$('[reg]').keyup( function() {
		if($(this).attr('reg') != undefined){
			validate($(this));
			$(this).focus();
		}
	}).blur( function() {
			if($(this).attr('reg') != undefined){
				validate($(this));
			}
		}
	)
}

// 表单验证
function validate(obj) {
	var flag;
	var reg;
	var error_tips;
	var reg_type = obj.attr('reg');
	var objValue = obj.attr('value');
	var popover_placement = obj.attr('popover_placement') ? obj.attr('popover_placement') : 'right';
	
	//获取认证选项。示例：regopt="not_empty|allow_empty"
	var reg_opt = {};
	var reg_opt_str = obj.attr('regopt') == undefined ? '' : obj.attr('regopt');
	if (reg_opt_str) {
		try {
			reg_opt = $.parseJSON(reg_opt_str);
		} catch (err) {
			var reg_opt_arr = reg_opt_str.split('|');
			for (i in reg_opt_arr) {
				reg_opt[reg_opt_arr[i]] = reg_opt_arr[i];
			}
		}
	}
	
	//全局正则定义
	var _reg_num = /^\d+$/;

	switch (reg_type) {
		// 只能输入数字
		case 'num':
			reg  = /^\d+$/;
			flag = reg.test(objValue);
			error_tips = '只能输入数字';
			break;
			
		//店铺名称
		case 'shop_name':
			if (objValue) {
				if (objValue.length >= 1 && objValue.length <= 32) {
					flag = true;
				}
			}
			error_tips = '1-32个字符';
			break;
		
		//联系电话
		case 'tel_or_phone':
			error_tips = '联系电话格式错误';
			if (objValue.length > 0) {
//				reg = /(^(\d{3,4}-)?\d{7,8}$)|(^1[0-9]{10}$)/;
//				flag = reg.test(objValue);
				if (objValue.length > 40) {
					error_tips = '长度不能超过40个字符';
				} else {
					flag = true;
				}
			} else {
				error_tips = '联系电话不能为空';
			}
			break;
		
		//店铺简介
		case 'shop_desc':
			if (objValue.length >= 1 && objValue.length <= 100) {
				flag = true;
			}
			error_tips = '1-100个字';
			break;
		
		//店铺LOGO
		case 'shop_logo':
			flag = true;
			obj = $('#' + obj.attr('name') + '_url');
			objValue = obj.val();
			if ($('[name="shop_logo_file_id"]').length == 0) {
				if (objValue.length == 0) {
					flag = false;
					error_tips = '店铺LOGO不能为空';
				}
			}
			break;
			
		//图片上传校验
		case 'upload_img':
			flag = true;
			var name = obj.attr('name');
			//确定校验对象
			obj = $('#' + name + '_url');
			objValue = obj.val();
			
			//确定是否存在已上传的图片
			if ($('[name="'+ name +'_file_id"]').length == 0) {
//				if (objValue.length == 0) {
//					flag = false;
//					error_tips = '图片不能为空';
//				}
				flag = false;
				error_tips = '图片不能为空';
			}
			break;
			
		//第一个焦点图
		case 'focus_img':
			flag = true;
			obj = $('#' + obj.attr('name') + '_url');
			objValue = obj.val();
			if (reg_opt_str.indexOf('allow_empty') != -1) {
				if ($('[name="focus_img0_file_id"]').length == 0) {
					if (objValue.length == 0) {
						flag = false;
						error_tips = '轮换图不能为空';
						break;
					}
				}
			}
			
			break;
		
		//倒计时图片
		case 'countdown_img':
			flag = true;
			obj = $('#' + obj.attr('name') + '_url');
			objValue = obj.val();
			if ($('[name="countdown_img_file_id"]').length == 0) {
				if (objValue.length == 0) {
					flag = false;
					error_tips = '倒计时图片不能为空';
				}
			}
			break;
			
		//ip列表，每行一条，支持ip端(以“-”分隔)
		case 'ip_list':
			error_tips = '输入格式不正确！';
			
			if (objValue.length > 0) {
				flag = true;
				var arr = objValue.split("\n");
				if (arr.length > 250) {
					flag = false;
					error_tips = 'IP个数不能大于250';
					break;
				} else {
					for(var i = 0; i < arr.length; i++){
						//兼容IE8，去掉结尾的\r
						if (arr[i].charAt(arr[i].length - 1) == "\r") {
							arr[i] = arr[i].substr(0, arr[i].length - 1);
						}
						
						//考虑到ip段的情况，同一转化为数组处理
						var _ips = [];
						var _sub_ips = [];
						if (arr[i].indexOf('-') != '-1') {
							_ips = arr[i].split('-');
							
							//检测ip段数
							if (_ips.length > 2) {
								flag = false;
								break;
							}
							
							//检测范围是否从小到大
							_sub_ips[0] = _ip2long(_ips[0]);
							_sub_ips[1] = _ip2long(_ips[1]);
							if (_sub_ips[0] > _sub_ips[1]) {
								flag = false;
								error_tips = '起始IP必须小于或等于结束IP';
								break;
							}
						} else {
							_ips = [arr[i]];
						}
						
						//开始处理
						var reg = /^(\d{1,2}|1\d\d|2[0-4]\d|25[0-5])\.(\d{1,2}|1\d\d|2[0-4]\d|25[0-5])\.(\d{1,2}|1\d\d|2[0-4]\d|25[0-5])\.(\d{1,2}|1\d\d|2[0-4]\d|25[0-5])(\r|)$/;
						$.each(_ips, function(idx, val){
							var _flag = reg.test(val);
							
							if (_flag) {
								//验证不能输入的IP地址
								var _arr = val.split('.');
								_flag = _checkIpPass(_arr);
								if (_flag) {
									_flag = _checkIpIsNum(_arr);
								}
							}
							if (!_flag) {
								flag = false;
							}
						});
						
						//若当前行已经发生错误则不再继续检测
						if (!flag) {
							break;
						}
					}
				}
			} else {
				flag = false;
				break;
			}
			
			//去重
			if (flag) {
				var i, j, k, repeat_flag;
				for (var i = 0; i < arr.length - 1; i++) {
					for (var j = i + 1; j < arr.length; j++) {
						if (arr[i] == arr[j]) {
							//数组中IP去重
							repeat_flag = true;
							arr.splice(j, 1);
							j--;
						}
					}
				}
				
				//替换值
				if (repeat_flag) {
					obj.val(arr.join("\n"));
				}
			}
			
			break;
		
		//mac列表，每行一条，支持“-”转”:“
		case 'mac_list':
			flag = true;
			if (objValue.length > 0) {
				var arr = objValue.split("\n");
				if (arr.length > 1000) {
					flag = false;
					error_tips = 'MAC个数不能大于1000';
					break;
				} else {
					for (var i = 0; i < arr.length; i++) {
						// 2014-11-28 kimpa modified : 删除最后的$符号，允许每行最后输入备注信息
						//reg = /^[A-F\d][02468ace][:\-][A-F\d]{2}[:\-][A-F\d]{2}[:\-][A-F\d]{2}[:\-][A-F\d]{2}[:\-][A-F\d]{2}(\r|)/i;
						reg = /^[A-F\d]{2}[:\-][A-F\d]{2}[:\-][A-F\d]{2}[:\-][A-F\d]{2}[:\-][A-F\d]{2}[:\-][A-F\d]{2}(\r|)/i;
						flag = reg.test(arr[i]);
						if (!flag) {
							flag = false;
							break;
						}
					}
					if (flag) {
						if (objValue.indexOf('-') != -1) {
							obj.attr("value", objValue.replace(/\-/g, ":"));
						}
					}
				}
			}
			error_tips = '输入格式不正确！';
			break;
			
		//域名列表，每行一条，例：baidu.com
		case 'domain_list':
			flag = true;
			if (objValue.length == 0 && reg_opt_str.indexOf('not_empty') != -1) {
				flag = false;
				error_tips = '不能为空';
				break;
			}
			if (objValue.length > 0) {
				var arr = objValue.split("\n");
				if (arr.length > 200) {
					flag = false;
					error_tips = '域名个数不能大于200';
					break;
				} else {
					for (var i = 0; i < arr.length; i++) {
						if (arr[i].indexOf('/') != -1) {
							flag = false;
							error_tips = '输入格式不正确！';
							break;
						} else {
							reg = /^(\*\.)?[\-\w]+(\.[\-\w]+)+(\/.*)?\r?$/;
							if (!reg.test(arr[i])) {
								flag = false;
								error_tips = '输入格式不正确！';
								break;
							} else if (arr[i].length > 500) {
								flag = false;
								error_tips = '单条长度不能超过500个字符';
								break;
							}
						}
					}
				}
			}
			
			if (objValue.indexOf('http://') != -1) {
				error_tips = '不能含有http://';
			}
			break;
			
		//js插入页面域名列表，每行一条，例：baidu.com
		case 'js_domain_list':
			flag = true;
			if (objValue.length == 0 && reg_opt_str.indexOf('not_empty') != -1) {
				flag = false;
				error_tips = '不能为空';
				break;
			}
			if (objValue.length > 0) {
				var arr = objValue.split("\n");
				if (arr.length > 200) {
					flag = false;
					error_tips = '域名个数不能大于200';
					break;
				} else {
					for (var i = 0; i < arr.length; i++) {
						reg = /^(\*\.)?[\-\w]+(\.[\-\w]+)+(\/.*)?\r?$/;
						if (!reg.test(arr[i])) {
							flag = false;
							error_tips = '输入格式不正确！';
							break;
						} else if (arr[i].length > 500) {
							flag = false;
							error_tips = '单条长度不能超过500个字符';
							break;
						}
						
					}
				}
			}
			
			if (!flag && objValue.indexOf('http://') == 0) {
				error_tips = '不能以“http://”开头';
			}
			break;	
		//不能为空
		case 'not_empty':
			if (objValue) {
				flag = true;
			}
			error_tips = '不能为空';
			break;
			
		//不能包含空格
		case 'no_blank':
			flag = true;
			reg = /[ |　]/;
			if (reg.test(objValue)) {
				flag = false;
				error_tips = '不能包含空格';
			}
			break;
			
		//AP备注
		case 'ap_remark':
			reg = /[\`\'\"\;\\\/\s\&\*\<\>\$\|]+/;
			flag = reg.test(objValue);
			if (!flag) {
				if (objValue.length > 250) {
					flag = false;
				} else {
					flag = true;
				}
			} else {
				flag = false;
			}
			error_tips = '0-250字符,不支持特殊字符！';
			break;
			
		//SSID
		case 'ssid1'://排除特殊字符
			var orig_obj = obj;
			reg = /[\`\'\"\;\\\/\s\&\*\<\>\|\$]+/;
			var reg2 = /[^\x00-\xff]/;
			flag = reg.test(objValue);
			if (!flag) {
				if (reg2.test(objValue)) {
					if (objValue.length > 10 || objValue.length < 1) {
						flag = false;
						error_tips = '包含中文时字符长度不超过10个';
					} else {
						flag = true;
					}
				} else {
					if (objValue.length > 30 || objValue.length < 1) {
						flag = false;
						error_tips = '字符区间[1-30]';
					} else {
						flag = true;
					}
				}
			} else {
				flag = false;
				error_tips = '输入格式不正确！';
			}

			var modal = obj.parents('.modal');
			var ssid2 = modal.find('.ssid2').val();
			if (flag && ssid2) {
				obj = modal.find('.ssid2');
				if (objValue == ssid2) {
					flag = false;
					error_tips = 'SSID2不能与SSID1相同';
				} else {
					var controls = obj.parents('.controls:eq(0)');
					obj.attr('data-toggle', 'popover').attr('data-trigger', 'manual').attr('data-placement', 'right');
					controls.removeClass('has-error');
					obj.attr('data-content', '');
					obj.popover('hide');
					controls.find('.popover').remove();
					obj.popover('destroy');

					flag = true;
					obj = orig_obj;
				}
			}
			break;
		case 'ssid2'://排除特殊字符
			reg = /[\`\'\"\;\\\/\s\&\*\<\>\|\$]+/;
			var reg2 = /[^\x00-\xff]/;
			flag = reg.test(objValue);
			if (!flag) {
				if (reg2.test(objValue)) {
					if (objValue.length > 10) {
						flag = false;
						error_tips = '包含中文时字符长度不超过10个';
					} else {
						flag = true;
					}
				} else {
					if (objValue.length > 30) {
						flag = false;
						error_tips = '字符区间[1-30]';
					} else {
						flag = true;
					}
				}
			} else {
				flag = false;
				error_tips = '输入格式不正确！';
			}

			var modal = obj.parents('.modal');
			var ssid1 = modal.find('.ssid1').val();
			if (flag && objValue) {
				if (objValue == ssid1) {
					flag = false;
					error_tips = 'SSID2不能与SSID1相同';
				} else {
					flag = true;
				}
			}
			break;
		
		//AP连入密码设置
		case 'ap_pwd':
			var modal = obj.parents('#APedit');
			var orig_verify_type = modal.find('.orig_verify_type').val();
			var verify_type = modal.find('.verify_type option:selected').val();
			var len = objValue.length;
			var flag = true;
			var reg1 = /[\`\\;\'\"\/\s]+/; // `\;'"/空格
			var reg2 = /(\&\&+|\|\|+)/;    // || &&
			var reg3 = /[^\x00-\xff]/;     // 中文
			
			if (reg1.test(objValue)) {
				flag = false;
				error_tips = '密码不能包含特殊字符';
			} else if (reg2.test(objValue)) {
				flag = false;
				error_tips = '密码不能包含特殊字符';
			} else if (reg3.test(objValue)) {
				flag = false;
				error_tips = '密码不能包含中文';
			} else {
				if (verify_type != orig_verify_type) {
					if (verify_type != 'off') {
						if (len < 8 || len > 63) {
							flag = false;
							error_tips = '密码长度[8-63]';
						} else flag = true;
					} else flag = true;
				} else {
					if (verify_type != 'off' && len > 0) {
						if (len < 8 || len > 63) {
							flag = false;
							error_tips = '密码长度[8-63]';
						} else flag = true;
					} else flag = true;
				}
			}
			
			break;
		case 'ap_pwd2':
			var modal = obj.parents('#APedit');
			var orig_verify_type2 = modal.find('.orig_verify_type2').val();
			var verify_type2 = modal.find('.verify_type2 option:selected').val();
			var len = objValue.length;
			var flag = true;
			var reg1 = /[\`\\;\'\"\/\s]+/; // `\;'"/空格
			var reg2 = /(\&\&+|\|\|+)/;    // || &&
			var reg3 = /[^\x00-\xff]/;     // 中文
			
			if (reg1.test(objValue)) {
				flag = false;
				error_tips = '密码不能包含特殊字符';
			} else if (reg2.test(objValue)) {
				flag = false;
				error_tips = '密码不能包含特殊字符';
			} else if (reg3.test(objValue)) {
				flag = false;
				error_tips = '密码不能包含中文';
			} else {
				if (verify_type2 != orig_verify_type2) {
					if (verify_type2 != 'off') {
						if (len < 8 || len > 63) {
							flag = false;
							error_tips = '密码长度[8-63]';
						} else flag = true;
					} else flag = true;
				} else {
					if (verify_type2 != 'off' && len > 0) {
						if (len < 8 || len > 63) {
							flag = false;
							error_tips = '密码长度[8-63]';
						} else flag = true;
					} else flag = true;
				}
			}
			
			break;
			
		case 'ap_multi_pwd':
			var modal = obj.parents('#APMultiedit');
			var verify_type = modal.find('.verify_type option:selected').val();
			var len = objValue.length;
			var flag = true;
			var reg1 = /[\`\\;\'\"\/\s]+/; // `\;'"/空格
			var reg2 = /(\&\&+|\|\|+)/;    // || &&
			var reg3 = /[^\x00-\xff]/;     // 中文
			
			if (verify_type != 'off') {
				if (reg1.test(objValue)) {
					flag = false;
					error_tips = '密码不能包含特殊字符';
				} else if (reg2.test(objValue)) {
					flag = false;
					error_tips = '密码不能包含特殊字符';
				} else if (reg3.test(objValue)) {
					flag = false;
					error_tips = '密码不能包含中文';
				} else {
					if (len < 8 || len > 63) {
						flag = false;
						error_tips = '密码长度[8-63]';
					} else flag = true;
				}
			} else flag = true;
			
			break;
		case 'ap_multi_pwd2':
			var modal = obj.parents('#APMultiedit');
			var verify_type2 = modal.find('.verify_type2 option:selected').val();
			var len = objValue.length;
			var reg1 = /[\`\\;\'\"\/\s]+/; // `\;'"/空格
			var reg2 = /(\&\&+|\|\|+)/;    // || &&
			var reg3 = /[^\x00-\xff]/;     // 中文
			
			if (verify_type2 != 'off') {
				if (reg1.test(objValue)) {
					flag = false;
					error_tips = '密码不能包含特殊字符';
				} else if (reg2.test(objValue)) {
					flag = false;
					error_tips = '密码不能包含特殊字符';
				} else if (reg3.test(objValue)) {
					flag = false;
					error_tips = '密码不能包含中文';
				} else {
					if (len < 8 || len > 63) {
						flag = false;
						error_tips = '密码长度[8-63]';
					} else flag = true;
				}
			} else flag = true;

			break;
		
		case 'time':
			flag = true;
			//隐藏时不检测
			if (!obj.is(':visible')) {
				break;
			}
			
			var reg = /^([01]\d|[2][0-3]):[0-5]\d$/;
			if (objValue.length == 0 && reg_opt_str.indexOf('not_empty') != -1) {
				flag = false;
				error_tips = '不能为空';
				break;
			}
			if (objValue.length > 0 && !reg.test(objValue)) {
				flag = false;
				error_tips = '格式不正确';
				break;
			}
			
			//验证开始结束时间是否匹配
			var start_time = obj.parents('.control-group.time').find('[name^="time_start"]');
			var end_time = obj.parents('.control-group.time').find('[name^="time_end"]');
			var start_val = start_time.val();
			var end_val = end_time.val();
			if (start_val && end_val) {
				var start_arr = start_val.split(':');
				var end_arr = end_val.split(':');
//				if (parseInt(start_arr[0]) > parseInt(end_arr[0]) || (parseInt(start_arr[0]) == parseInt(end_arr[0]) && parseInt(start_arr[1]) >= parseInt(end_arr[1]))) {
//					flag = false;
//					error_tips = '开始时间必须早于结束时间';
//				} else {
//					if (start_time.attr('data-content') == '开始时间必须早于结束时间') {
//						start_time.popover('hide');
//						start_time.parent('.controls').removeClass('has-error');
//					}
//					if (end_time.attr('data-content') == '开始时间必须早于结束时间') {
//						end_time.popover('hide');
//						end_time.parent('.controls').removeClass('has-error');
//					}
//				}
				if (parseInt(start_arr[0]) == parseInt(end_arr[0]) && parseInt(start_arr[1]) == parseInt(end_arr[1])) {
					flag = false;
					error_tips = '开始时间与结束时间不能相同';
				} else {
					if (start_time.attr('data-content') == '开始时间与结束时间不能相同') {
						start_time.popover('hide');
						start_time.parent('.controls').removeClass('has-error');
					}
					if (end_time.attr('data-content') == '开始时间与结束时间不能相同') {
						end_time.popover('hide');
						end_time.parent('.controls').removeClass('has-error');
					}
				}
			}
			break;
		
		case 'content':
			flag = true;
			if (objValue.length == 0) {
				flag = false;
				error_tips = '不能为空';
			} else if (objValue.length > 4096){
				flag = false;
				error_tips = '不能超过4096个字符';
			}
			break;
			
		case 'coordinate':
			flag = false;
			error_tips = '请在地图上标注店铺位置';
			popover_placement = 'left';
			if (parseFloat($('[name="shop[shop_longitude]"]').val()) && parseFloat($('[name="shop[shop_latitude]"]').val())) {
				flag = true;
			}
			break;
		
		//密码验证，表单项格式：reg="password" regopt='{"length":{"min":1,"max":64},"not_allowed_character":" "}'
		case 'password':
			flag = true;
			//检测长度
			if (reg_opt.length) {
				var length = reg_opt.length;
				if (length.min != undefined) {
					if (objValue.length < length.min) {
						flag = false;
						error_tips = '长度不能小于' + length.min;
						break;
					}
				}
				if (length.max != undefined) {
					if (objValue.length > length.max) {
						flag = false;
						error_tips = '长度不能大于' + length.max;
						break;
					}
				}
			}
			//检测字符
			/*
			if (reg_opt.not_allowed_character != undefined) {
				var not_allowed_character = reg_opt.not_allowed_character;
				for (var i = 0; i < reg_opt.not_allowed_character.length; i++) {
					if (objValue.indexOf(not_allowed_character[i]) != -1) {
						flag = false;
						error_tips = '字符中不能包含“'+ not_allowed_character.replace(' ', '空格') +'”';
						break;
					}
				}
			}
			*/
			
			var reg1 = /[\`\\;\'\"\/\s]+/; // `\;'"/空格
			var reg2 = /(\&\&+|\|\|+)/;    // || &&
			var reg3 = /[^\x00-\xff]/;     // 中文
			
			if (reg1.test(objValue)) {
				flag = false;
				error_tips = '密码不能包含特殊字符';
			} else if (reg2.test(objValue)) {
				flag = false;
				error_tips = '密码不能包含特殊字符';
			} else if (reg3.test(objValue)) {
				flag = false;
				error_tips = '密码不能包含中文';
			}
			break;
		
		case 'url':
			flag = true;
			if (reg_opt_str.indexOf('allow_empty') != -1) {
				if (objValue == '') {
					break;
				}
			} else {
				if (objValue == '') {
					flag = false;
					error_tips = '不能为空';
					break;
				}
			}
			
			//长度限制
			if (objValue.length > 500) {
				flag = false;
				error_tips = '不能超过500个字符';
			}
			
			reg = /^(https?\:\/\/)?[\-\w]+(\.[\-\w]+)+(\:\d+)?(\/.*)?$/;
			if (!reg.test(objValue)) {
				flag = false;
				error_tips = '格式不正确';
				break;
			}
			
			//添加http
			if (flag) {
				if (objValue.indexOf('http://') == -1 && objValue.indexOf('https://') == -1) {
					obj.val('http://' + objValue);
				}
			}
			break;
			
		//通用类型处理
		default:
			//匹配数字范围
			var _regNumType = /num(\d+)to(\d+)/;
			if (_regNumType.test(reg_type)) {
				var paramType = reg_type.match(_regNumType);
				var from = paramType[1];
				var to = paramType[2];
				
				error_tips = '请输入' + from + '-' + to + '之间的数字';
				if (_reg_num.test(objValue) && (objValue.length == 1 || objValue[0] != '0')) {
					if (/^\d+$/.test(objValue)) {
						var realNum = parseInt(objValue);
						if (realNum >= from && realNum <= to) {
							flag = true;
						}
					} else {
						flag = false;
					}
				}
				break;
			}
			
			//匹配字符长度。例：strlen12to15
			var _regStrType = /strlen(\d+)to(\d+)/;
			if (_regStrType.test(reg_type)) {
				var paramType = reg_type.match(_regStrType);
				var from = paramType[1];
				var to = paramType[2];
				
				flag = true;
				//是否为空
				if (reg_opt_str.indexOf('allow_empty') != -1) {
					if (objValue.length == 0) {
						break;
					}
				}
				
				if (objValue.length < from) {
					flag = false;
					error_tips = '不能少于' + from + '个字符';
					if (objValue.length == 0) {
						error_tips = '不能为空';
					}
					break;
				}
				
				if (objValue.length > to) {
					flag = false;
					error_tips = '不能超过' + to + '个字符';
					break;
				}
				break;
			}
	}

	var controls = obj.parents('.controls:eq(0)');
	obj.attr('data-toggle', 'popover').attr('data-trigger', 'manual').attr('data-placement', 'right');
	if (!obj.hasClass('form-control')) {
		obj.addClass('form-control');
	}
	if (!flag) {
		controls.addClass('has-error');
		var old_error_tips = obj.attr('data-content');
		if (old_error_tips != error_tips) {
			if (old_error_tips != undefined) {
				obj.popover('destroy');
			}
			obj.attr('data-content', error_tips);
			obj.attr('data-placement', popover_placement);
			obj.popover({content: error_tips, placement: popover_placement});
		}
		obj.popover('show');
		return false;
	} else {
		controls.removeClass('has-error');
		obj.attr('data-content', '');
		obj.popover('hide');
		controls.find('.popover').remove();
		obj.popover('destroy');
		return true;
	}

	//判断ip每段是否为数字
	function _checkIpIsNum (ip_arr) {
		var flag = 1;
		if(ip_arr.length > 0) {
			$.each(ip_arr, function(idx, data){
				if(isNaN(data) || data > 255 || data == '') flag = 0;
				var _cnt = data.length;
				if(_cnt > 1) {
					if(data[0] == '0') flag = 0;
				}
			});
		} else flag = 0;
		return flag;
	}

	// 判断禁止输入的IP
	// 0.x.x.x
	// 127.x.x.x
	// 169.254.x.x
	// 224.0.0.0 ---255.255.255.255
	function _checkIpPass (ip_arr) {
		var flag = 1;
		var cnt = ip_arr.length;

		if(cnt < 4) {
			flag = 0;
		} else {
			if(ip_arr[0] == 0 || ip_arr[0] >= 224) flag = 0;

			if(cnt > 4) {
				flag = 0;
			} else if(cnt >= 2) {
				if(ip_arr[0] == 169 && ip_arr[1] == 254) flag = 0;

				if(cnt == 4) {
					if(ip_arr[0] == 127) flag = 0;
				}
			}
		}
		return flag;
	}
	
	function _ip2long(ip_str) {
		var ips = ip_str.split('.');
		var num =  16777216 * parseInt(ips[0]) + 65536 * parseInt(ips[1]) + 256 * parseInt(ips[2]) + parseInt(ips[3]);
		return num;
	}
}