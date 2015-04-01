<?php
/**
 * @desc:平台用户公用操作类
 * ==============================================
 * 版权所有HCKP 2015-2016 
 * ----------------------------------------------
 * 这不是一个自由软件，未经授权不许任何使用和传播。
 * ----------------------------------------------
 * 权限（全局限制访问）
 * ==============================================
 * @date: 2015-4-1 下午9:47:19
 * @author:dayunlong <gengjun@qiyi.com>
 * @version: 1.0.0.0
 */
 
 class PlatUserComponent extends SystemComponent{
 	
 	/**
 	 * 通过用户phone获取用户
 	 * @param unknown $phone
 	 * @return boolean
 	 * @date: 2015-4-1 下午10:20:13
 	 * @author: dayunlong<gengjun@qiyi.com>
 	 */
 	public function getPlatUserByPhone($phone){
 		if(empty($phone)){
 			return false;
 		}
 		$PlatUserModel=self::loadModel('PlatUserModel','plat',NULL,FALSE);
 		return $PlatUserModel->getPlatUserByPhone($phone);
 	}
 	/**
 	 * 通过username获取用户 
 	 * @param unknown $username
 	 * @return boolean
 	 * @date: 2015-4-1 下午10:20:29
 	 * @author: dayunlong<gengjun@qiyi.com>
 	 */
 	public function  getPlatUserByUsername($username){
 		if(empty($username)){
 			return false;
 		}
 		$PlatUserModel=self::loadModel('PlatUserModel','plat',NULL,FALSE);
 		return $PlatUserModel->getPlatUserByUsername($username);
 	}
 	
 	
 	
 }
 
 
 
 
 

/* End of file : PlatUserComponent.php */ 