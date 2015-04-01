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
 	
 
 	public function getPlatUserByPhone($phone){
 		$PlatUserModel=self::loadModel('PlatUserModel','plat',NULL,FALSE);
 		
 		
 	}
 	
 	public function  getPlatUserByUsername($username){
 		
 		
 	}
 	
 	
 	
 }
 
 
 
 
 

/* End of file : PlatUserComponent.php */ 