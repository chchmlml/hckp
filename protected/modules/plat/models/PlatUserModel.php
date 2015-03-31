<?php
/**
 * @desc:
 * ==============================================
 * 版权所有  2015-2016
 * ----------------------------------------------
 * 这不是一个自由软件，未经授权不许任何使用和传播。
 * ----------------------------------------------
 * 权限（全局限制访问）
 * ==============================================
 * @date: 2015-3-18 下午6:29:00
 * @author:dayunlong <yl-831025@163.com>
 * @version: 1.0.0.0
 */
 
 class PlatUserModel extends CActiveRecord{
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
 		// NOTE: you should only define rules for those attributes that
 		// will receive user inputs.
 		return array(
 				array('tt_u_name,tt_u_phone', 'required'),
 				// The following rule is used by search().
 				// Please remove those attributes that should not be searched.
 				array('tt_u_id,', 'length', 'max'=>256),
 				array('tt_u_name,tt_u_phone', 'safe', 'on'=>'search'),
 		);
 	}
 	/**
 	 * 测试方法
 	 * @return Ambigous <NULL, unknown, multitype:unknown Ambigous <unknown, NULL> , mixed, multitype:, multitype:unknown >
 	 * @date: 2015-3-18 下午6:46:10
 	 * @author: dayunlong<yl-831025@163.com>
 	 */
 	public function getUserList(){
 		return $this->findAll();
 	}
 }
 
 
 
 
 

/* End of file : PlatUserModel.php */ 