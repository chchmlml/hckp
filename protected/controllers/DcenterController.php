<?php
/**
 * @desc:框架入口
 * ==============================================
 * 版权所有  2015-2016
 * ----------------------------------------------
 * 这不是一个自由软件，未经授权不许任何使用和传播。
 * ----------------------------------------------
 * 权限（全局限制访问）
 * ==============================================
 * @date: 2015-3-18 下午2:55:13
 * @author:dayunlong <yl-831025@163.com>
 * @version: 1.0.0.0
 */
 class DcenterController extends CController{
 	/**
 	 * (non-PHPdoc)
 	 * @see CController::actions()
 	 */
 	public function actions(){
 		return array();
 	}
 	/**
 	 * 所有功能模块的总入口
 	 * @date: 2015-3-18 下午2:57:20
 	 * @author: dayunlong<yl-831025@163.com>
 	 */
 	public function actionIndex(){
 		$this->layout = false;
 		$this->dispatchModule();
 	}
 	/**
 	 * 加载对应模块里controller方法
 	 * @param unknown $params
 	 * @date: 2015-3-18 下午2:58:32
 	 * @author: dayunlong<yl-831025@163.com>
 	 */
 	public function dispatchModule(){
 		$apikey=Yii::app()->request->getParam('apikey');
 		if(empty($apikey)){
 			//跳转到应该去的地方
 			//$this->redirect(APP_HOST."/site/nopri");//没有权限
 			$_module = '/plat/user/index';
 			$this->redirect($_module);
 		}else{
 			
 			$_module=ApiComponent::getApiModule($apikey);
 			
 			if (is_numeric($_module)){
 				echo $_module;exit();
 			} else{
 				Yii::app()->runController($_module);
 			}
 		}
 	}
 }
 /* End of file : DcenterController.php */ 