<?php
/**
 * @desc:
 * ==============================================
 * 版权所有HCKP  2015-2016 
 * ----------------------------------------------
 * 这不是一个自由软件，未经授权不许任何使用和传播。
 * ----------------------------------------------
 * 权限（全局限制访问）
 * ==============================================
 * @date: 2015-3-31 下午9:36:48
 * @author:dayunlong <gengjun@qiyi.com>
 * @version: 1.0.0.0
 */
 class ApiComponent extends CComponent{
 	/**
 	 * 获取api的modules路径
 	 * @param unknown $apikey
 	 * @return unknown|boolean
 	 * @date: 2015-3-31 下午9:39:09
 	 * @author: dayunlong<gengjun@qiyi.com>
 	 */
 	public static function getApiModule($apikey){
 		$api_config=Yii::app()->params['api_config'];
 		if(isset($api_config[$apikey])){
 			return $api_config[$apikey];
 		}else{
 			return false;
 		}
 	}
 	
 	
 	
 	
 }

/* End of file : ApiComponent.php */ 