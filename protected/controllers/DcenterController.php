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
 class DcenterController extends Controller{
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
 }
 /* End of file : DcenterController.php */ 