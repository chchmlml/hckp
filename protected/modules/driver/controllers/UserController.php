<?php
/**
 * @desc:system模块user功能
 * ==============================================
 * 版权所有  2015-2016
 * ----------------------------------------------
 * 这不是一个自由软件，未经授权不许任何使用和传播。
 * ----------------------------------------------
 * 权限（全局限制访问）
 * ==============================================
 * @date: 2015-3-18 下午2:44:46
 * @author:dayunlong <yl-831025@163.com>
 * @version: 1.0.0.0
 */
 class UserController extends Controller{
 	public function actionIndex(){
 		$this->layout=false;
 		//var_dump($_SERVER);
 		$PlatUserModel=self::loadModel('PlatUserModel','plat',NULL,FALSE);
 		$r=array();
 		$r['ts_u_name']='dayunlong';
 		$r['ts_u_phone']='15026912738';
 		$PlatUserModel->attributes=$r;
 		$PlatUserModel->save();
 		$user_list=$PlatUserModel->getUserList();
 		$r['test_list']=$user_list;
 		$this->render('main',$r);
 	}
 	
 }
/* End of file : UserController.php */ 