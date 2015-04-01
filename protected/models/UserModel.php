<?php
/*
 * Created on 2015-3-29
 * @author wangfeiran
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 class UserModel extends CActiveRecord{
 	/**
 	 * 获取连接model对象
 	 * @param system $className
 	 * @return Ambigous <unknown, multitype:>
 	 * @date: 2015-3-18 下午6:45:16
 	 * @author: dayunlong<yl-831025@163.com>
 	 */
 	public static function model($className=__CLASS__){
 		return parent::model($className);
 	}
 	
 	/**
 	 * @return string the associated database table name
 	 */
 	public function tableName(){
 		return 'trst_system_user';
 	}
 	/**
 	 * @return array validation rules for model attributes.
 	 */
	public function rules(){
		return array(
			array('ts_u_phone,ts_u_password,ts_u_username', 'required' , 'message'=>'请填写完整'), 
			array('ts_u_username,ts_u_phone,ts_u_password,ts_u_id,ts_u_type,ts_real_name', 'safe'),
			array('ts_u_username','unique',"on"=>"name",'message'=>'该用户名已被注册'),
			array('ts_u_phone','unique','message'=>'该手机已被注册'),	
		) ;
	}
 }
?>
