
/****************************************登录/注册*************************************/
/*展开/收起*/
function startUp(b,d,f){
	var x=$(b);
	var y=$(d);
	var z=$(f);
	
	function ce(x ,y){	
		x.find(".btn-folding").css("display")=="none" ? y.hide() : y.show();

		x.find(".btn-spread").click(function(){
			$(this).hide();
			x.find(".btn-folding").show();
			y.stop(true, true).slideDown();
			
		});
		x.find(".btn-folding").click(function(){
			$(this).hide();
			x.find(".btn-spread").show();
			y.stop(true, true).slideUp();
			
		});
	}
	
	
	if(z.length>0){
		z.each(function(){
			var n=$(this).find(x);
			var m=$(this).find(y);
			ce(n ,m);
		})
	} else {
		ce(x ,y);
	}
	
}

/*背景全屏*/
function bgimg(){
	var bg = $("#bgimg");
	var bgi = $("#bgimg img");
	landCenter("#bgimg img");
	 
	var winW = document.documentElement.clientWidth;
	var winH = document.documentElement.clientHeight;
	var scale = 0.5625;

}

/*inpt框内提示*/
function promptInpt(){
	$('.promptTxt').click(function(){
		$(this).hide();
		$(this).parent().siblings(".inptText").focus();
	});
	$('.inptText').focus(function(){
         $(this).siblings().children(".promptTxt").hide();
    }).blur(function(){
		if($(this).val()==""){
        	$(this).siblings().children(".promptTxt").show();
		}
   });

}
/*inpt框内提示 end*/



/*div居中*/
function landCenter(a){
	var land= $(a);
	land.css({
		"left": ($(window).width() - land.outerWidth())/2,
		"top": ($(window).height() - land.outerHeight())/2
	});
		
};

/*登录/注册*/
function switching(a,b){
	$(a).fadeOut();
	$(b).fadeIn();
}


/****************************************登录/注册-end*************************************/


/*上传美化*/
function upload(){
	var textButton="<input type='button' name='' value='选择文件' class='btn btn-primary type_file_button' />"
	$(".type_file").each(function(a){
			var fileDiv = $(this);
			var file = fileDiv.find(".fileField");
			var fileTxt = fileDiv.find(".textfield");
			
			$(textButton).insertBefore(file);
			file.change(function(){
				fileTxt.val(file.val());
			});					   
	})
}
/*上传美化-end*/

/*高度开关绑定*/
function seitchH(a, b, f) {
	var k = $(a);
	var o = $(b);
	var p = $(f);
	function se(k, o) {
		k.is(':checked') ? o.slideDown() : o.hide()
		k.change(function() {
			k.is(':checked') ? o.slideDown() : o.slideUp()
		})
	}

	if (p.length > 0) {
		p.each(function() {
			var n = $(this).find(a);
			var m = $(this).find(b);
			se(n, m);
		});

	} else {
		se(k, o);
	}

}
/* 高度开关绑定-end */

/*开关切换*/
//function selectChange(s,a,f){
//	var d= $(a);
//	var k= $(s);
//	var p= $(f);
//
//	function se(d ,k){
//		d.each(function(c){
//				if(k.find("option:selected").val()==(c+1)){ 
//					d.hide();
//					$(this).show(); 
//				}
//			});
//	}
//	if(p.length>0){
//		p.each(function(){
//			var n=$(this).find(d);
//			var m=$(this).find(k);
//			
//			se(n,m);
//			m.change(function(){se(n,m);});
//		})
//		
//	} else {
//		se(d,k);
//		k.change(function(){se(d,k);});
//	}
//	
//}
function selectChange(selectClass, optionClass, parentClass) {
	
	var parent = $(parentClass);

	if (parent.length > 0) {
		parent.each(function() {
			var options = $(this).find(optionClass);
			var select = $(this).find(selectClass);
			execSelect(options, select);
			
			select.change(function() {
				execSelect(options, select);
			});
		})
	} else {
		var options = $(optionClass);
		var select = $(selectClass);
		execSelect(options, select);
		
		select.change(function() {
			execSelect(options, select);
		});
	}

	function execSelect(options, select) {
		options.each(function(idx) {
			if (select.find("option:selected").val() == (idx + 1)) {
				options.hide();
				$(this).show();
			}
		});
	}
}
/*开关切换-end*/

/*动态切换开关，支持clone的对象*/
function selectChangeActive(selectClass, optionClass, parentClass){
	var parent = $(parentClass);

	if (parent.length > 0) {
		parent.each(function() {
			var options = $(this).find(optionClass);
			var select = $(this).find(selectClass);
			execSelect(options, select);
			
			select.change(function() {
				var parentBlock = $(this).parents('.parent-block');
				var options = parentBlock.find(optionClass);
				var select = parentBlock.find(selectClass);
				execSelect(options, select);
			});
		})

	} else {
		var options = $(optionClass);
		var select = $(selectClass);
		execSelect(options, select);
		
		select.change(function() {
			var parentBlock = $(this).parents('.parent-block');
			var options = parentBlock.find(optionClass);
			var select = parentBlock.find(selectClass);
			execSelect(options, select);
		});
	}

	function execSelect(options, select) {
		options.each(function(idx) {
			if (select.find("option:selected").val() == (idx + 1)) {
				options.hide();
				$(this).show();
			}
		});
	}
}

$(document).ready(function(){
	// 判断IE版本
	checkIEVersion();
	
	// 表单验证
	easy();
	
	/*上传美化*/
	upload();
	
	
	/*认证开关*/
	seitchH("#auth-switch input",'#auth-block');
	seitchH("#inform-switch input",'#inform-block');
	
	/*高度开关绑-列表用*/
	seitchH(".checkbox-seitchK input",'.checkbox-seitchOn',"seitchN");
	/*开关切换-列表用*/
	selectChange(".selectI",".selectF-ul li",".selectF");
	
	
	/*高度开关绑定--设备管理-认证设置-基础模板（2）-高级设置*/
	seitchH("#developA01 input",'#develop01');
	startUp("#developA02",'#develop02');
	
	startUp(".no-auth-setting-switch",'.no-auth-setting','.no-auth-setting-parent');
	startUp(".global-setting-switch",'.global-setting','.global-setting-parent');
	
	/*高度开关绑定--设备管理-认证设置-基础模板（2）-认证方式*/
	seitchH(".turn-on-wechat-setting input", '.wechat-setting', '.wechat-setting-parent');
	
	seitchH(".turn-on-wechat-conadv input", '.wechat-conadv', '.wechat-conadv-parent');
	seitchH("#checkbox-seitchK01a input",'#checkbox-seitchO01a');
	seitchH("#checkbox-seitchK01b input",'#checkbox-seitchO01b');
	//seitchH("#checkbox-seitchK02 input",'#checkbox-seitchO02');
	seitchH(".turn-on-fixed-passwd-setting input", '.fixed-passwd-setting', '.fixed-passwd-setting-parent');
	seitchH("#checkbox-seitchK03 input",'#checkbox-seitchO03');
	seitchH("#checkbox-seitchK04 input",'#checkbox-seitchO04');
	
	/*高度开关绑定--设备管理-认证设置-自定义页面*/
	seitchH(".use-partial-ip input",'.partial-ip', '.partial-ip-parent');

	/*高度开关绑定--设备管理-认证设置-微信认证高级切换*/
	seitchH('.turn-on-general-wechat-setting input', '.general-wechat-setting', '.wechat-setting');
	seitchH('.turn-on-advance-wechat-setting input', '.advance-wechat-setting', '.wechat-setting');
	seitchH('.turn-on-connect-wechat-setting input', '.connect-wechat-setting', '.wechat-setting');
	
	seitchH("#checkbox-seitchK06a input",'#checkbox-seitchO06a');
	seitchH("#checkbox-seitchK07a input",'#checkbox-seitchO07a');
	
	/*开关切换*/
	selectChange("#select01","#select01-ul>li");
	//selectChange("#select02","#select02-ul>li");
	selectChange(".second_auth_option",".second_auth_method li", '.second_auth_parent');
	
	selectChange("#select00","#select00-ul>li");
	
	/*微信连一连高级*/
	startUp(".eee",".ttt");
	
	/*页面切换*/
	jump("#jump01"); 
	
	/*绑定码显示修正*/
	fixBindCode();
	
	/*鼠标放在错误提示框上的时候自动隐藏*/
	$('.popover').live('hover', function() {
		var that = this;
		setTimeout(function(){
			$(that).prev().popover('hide');
		}, 500);
	});
	
});	

$(window).resize(function(){
		
	/********登录/注册*******/	
	/*背景全屏*/
	bgimg();
		
	/*div居中*/
	landCenter(".login");
	landCenter(".register");
	/********登录/注册-end*******/
});	

/**************************以下为全局变量、全局函数*****************************/
var globalNetErrorMsg = '网络不给力，请稍后刷新重试！';

//单位转换
function changeSize(value) {
	var a = ['B', 'KB', 'MB', 'GB', 'TB', 'PB'];
	for (var i = 0; value >= 1024 && i < a.length; i++) {
		value = value / 1024;
	}
	return value.toFixed(2) + a[i];
}

/*页面切换*/
function jump(a){
	var d= $(a);
	d.change(function(){
		window.location = d.find("option:selected").val();
	})
}
/*页面切换-end*/

/**
 * 解析URL参数
 */
function parseUrl (url){
	var url_seg = {}, url_component = {}, params = {};
	//首先，根据?的位置，将url分成两端
	url_seg = url.split('?');
	
	//如果存在第二段，开始解析参数
	if (url_seg[1] != undefined) {
		var query_seg = url_seg[1].split('&');
		for (var i = 0; i < query_seg.length; i++) {
			var param_seg = query_seg[i].split('=');
			if (param_seg[0]) {
				params[param_seg[0]] = param_seg[1];
			}
		}
	}
	url_component.base_url = url_seg[0];
	url_component.params = params;
	return url_component;
}

/**
 * 构建URL
 * @param base_url string
 * @param params object
 * @return string 构建后的URL
 */
function builtUrl (base_url, params){
	return base_url + '?' + $.param(params);
}

/**
 * 绑定码截取
 */
function fixBindCode() {
	var p = $('.ID-num');
//	if (p.html()) {
//		var span = p.find('span');
//		span.html(span.attr('value').substring(0, 7) + '...');
//		p.hover(
//			function(){
//				span.html(span.attr('value'));
//			},
//			function(){
//				if (span.attr('rightClick') != 'true') {
//					span.html(span.attr('value').substring(0, 7) + '...');
//				}
//			}
//		);
//		span.mousedown(function(event){
//			if (event.which == 3) {
//				span.attr('rightClick', 'true');
//			}
//		});
//		$('body').mousedown(function(event){
//			if (event.which == 1) {
//				if (span.attr('rightClick') == 'true') {
//					span.removeAttr('rightClick');
//					span.mouseleave();
//				}
//				
//			}
//		});
//	}
	if (p.html()) {
		var span = p.find('span');
		span.html(span.attr('value').substring(0, 7) + '...');
		p.hover(
			function(){
				if (span.html().indexOf('...') != -1) {
					span.html(span.attr('value'));
				}
			},
			function(){
				if (span.attr('click') != 'true') {
					span.html(span.attr('value').substring(0, 7) + '...');
				}
			}
		);
		p.mousedown(function(event){
			span.attr('click', 'true');
			event.stopPropagation();
		});
		$('body').mousedown(function(event){
			if (event.which == 1) {
				if (span.attr('click') == 'true') {
					span.removeAttr('click');
					span.mouseleave();
				}
				
			}
		});
	}
}

/**
 * ajax错误返回处理
 * @param json
 * @param doNotShowError 不显示错误
 * @returns {Boolean} 有错时弹出错误并返回false，无错时返回true
 */
function checkAjaxError(json, doNotShowError){
	if (json.status != 1) {
		if (json.url) {
			window.location.href = json.url;
		} else if (!doNotShowError) {
			showAlert(json.info);
		}
		return false;
	} else {
		return true;
	}
}

/**
 * 弹窗提示
 * @param msg
 */
function showAlert(msg){
	$('.close').click();
	$('#alert-modal').find('.confirm-msg').html(msg);
	var al = $('#_alert_btn');
	if (al.length > 0) {
		$('#_alert_btn').click();;
	} else {
		var _html = '<a href="#alert-modal" role="button" data-toggle="modal" id="_alert_btn"></a>';
		$('body').append(_html);
		$('#_alert_btn').click();
	}
}

/**
 * 显示加载完后的内容
 */
function ready(){
	$('.main-content').slideDown();
	$('.main-content-loading').slideUp();
}

/**
 * 校验指定节点下指定的表单项
 * @param fields
 * @param block
 * @returns {Boolean}
 */
function processCheck(fields, block) {
	var flag = true;
	$.each(fields, function(idx, val) {
		if (!validate(block.find('[name="' + val + '"]'))) {
			flag = false;
		}
	});

	return flag;
}

/**
 * 滑动到第一个显示的错误提示框
 * @param block
 */
function scrollFirstPopover(block){
	var is_modal = 0;
	//确定要滑动的窗口
	if (block == undefined) {
		block = $('html,body');
	} else {
		is_modal = 1;
	}
	
	//获取第一个显示的错误提示框
	var position, tmp = 0;
	block.find('.popover:visible').each(function(idx, val){
		tmp = $(val).offset().top;
		if (typeof(position) == 'undefined') {
			position = tmp;
		} else if (tmp < position) {
			position = tmp;
		}
	});
	
	//距离窗口顶端保留一定的距离
	if (position > 10) {
		position -= 10;
	}
	
	//确定要滑动的窗口
	//把指定窗口内的第一个元素作为参照物重新计算滑动距离
	if (is_modal) {
		position -= block.children().eq(0).offset().top;
	}
	
	block.animate({
		scrollTop: position
	},
	500);
}

/**
 * @desc 判断IE版本
 */
function checkIEVersion() {
	var appver = navigator.appVersion;
	if (appver.indexOf('MSIE') != -1) {
		var matches = appver.match(/MSIE (\d+)/i);
		var version = matches[1];
		if (version < 8) {
			$('.IEtip').show();
		} else {
			$('.IEtip').hide();
		}
	}
}