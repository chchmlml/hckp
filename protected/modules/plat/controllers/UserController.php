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
 		var_dump($_SERVER);exit;
 		$PlatUserModel=self::loadModel('PlatUserModel','plat',NULL,FALSE);
 		$r=array();
 		$r['tt_u_name']='dayunlong';
 		$r['tt_u_phone']='15026912738';
 		$PlatUserModel->attributes=$r;
 		$PlatUserModel->save();
 		$user_list=$PlatUserModel->getUserList();
 		$r['test_list']=$user_list;
 		$this->render('main',$r);
 	}
 	
 	//用户登录验证
 	public function actionLogin(){
 		
 		$user=self::loadModel('UserModel','plat',NULL,FALSE);
 		$loginUser = $user->find(
 			array(
 				'condition'=>"ts_u_phone = :ts_u_phone and ts_u_password = :ts_u_password",
 				'params'=>array(":ts_u_phone"=>$_POST['email'],":ts_u_password"=>$_POST['pwd'])
 			)
 		);

 		if($loginUser->ts_u_id==null){
 			$info = array(
	 			'status'=>2,
	 			'info'=>'用户名或密码错误'
	 		);
 		}else{
 			$info = array(
	 			'status'=>1,
	 			'info'=>'登录成功'
	 		);
 		}
 		echo json_encode($info);
 		die();
 	}
 	
 	public function actionRegist(){
 		$user=self::loadModel('UserModel','plat',NULL,FALSE);
 		$user->ts_u_phone = $_POST['phone'];
 		$user->ts_u_password = $_POST['pwd'];
 		$user->ts_real_name = $_POST['realname'];
 		$user->ts_u_type = 0;
 		$info = array();
 		if(!$user->validate()){	
 			$info = array(
	 			'status'=>2,
	 			'info'=>$this->getErrorMessage($user->getErrors())
	 		);
 		}else{
 			$user->save();
 			//$message['id'] = $user->attributes['ts_u_id'];
 			$info = array(
	 			'status'=>1,
	 			'info'=>"注册成功"
	 		);
 		}
 		echo json_encode($info);
 		die();
 	}
 	
 	public function getErrorMessage($message){
 		return current(current($message));
 	}
 }
/* End of file : UserController.php */ 