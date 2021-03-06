<?php

class SiteController extends CController
{
	/**
	 * Declares the 'phonebook' Web service action.
	 */
	public function actions()
	{
		return array();
	}

	/**
	 * This is the default action that displays the phonebook Flex client.
	 */
	public function actionIndex()
	{
		$this->render('index');
	}
	
	public function actionUserZone(){
		$user_info=HckpSessionComponent::getInstance()->getVal('user_info');
		$params = array();
		$params['user_info'] = $user_info;
		$this->render('userzone',$params);
	}
	/*** The following methods are Web service APIs ***/
	public function actionNopri(){
		echo 'no pri,please login!';
	}
	/**
	 * 站点登陆 
	 */
	public function actionLogin(){
		$username=Yii::app()->request->getParam('email');
		$passowrd=Yii::app()->request->getParam('psw');
		$PlatUserComponent=SystemComponent::loadComponent('PlatUserComponent','plat');
		die();	
		if($username == $username+0 ){
			$UserInfo=$PlatUserComponent->getPlatUserByUsername($username);
		}else{
			$UserInfo=$PlatUserComponent->getPlatUserByPhone($username);
		}
		$code=0;
		$msg='';
		
		if( $UserInfo == false){
			$msg='当前用户或者手机号不存在!';
			URL::retJson($code, $msg);
		}
		$check_psw=Utils::getUserPassword($passowrd);
		if($check_psw !== $UserInfo->ts_u_password){
			$msg='密码不对!';//
			URL::retJson($code, $msg);
		}
		$code=1;
		$msg='登陆成功!';
		//生成session
		HckpSessionComponent::getInstance()->initSession(array(
		'user_id'=>$UserInfo->ts_u_id,
		'user_username'=>$UserInfo->ts_u_username,
		'user_phone'=>$UserInfo->ts_u_phone,
		'user_realname'=>$UserInfo->ts_real_name,
		'user_type'=>$UserInfo->ts_u_type,
		'user_headpic'=>$UserInfo->ts_u_headpic
		));
		URL::retJson($code, $msg);
		
		/*
		$this->layout=false;
		//login的登陆处理方法
		//如果有跳转的目标地址跳转到目标地址	
		$user_info=array();
		$user_info['user_id']='1';
		$user_info['user_username']='dayunlong';
		$user_info['user_phone']='15026912738';
		$user_info['user_realname']='大云龙';
		$user_info['user_type']='1';
		$user_info['user_headpic']='/data/1.pic';
		//session登陆
		//HckpSessionComponent::getInstance()->initSession($user_info);
		//跳转到目标地址
		//test
		//$r=HckpSessionComponent::getInstance()->getVal('user_info');
		//var_dump($r);
		
		$user=new UserModel();
 		$loginUser = $user->find(
 			array(
 				'condition'=>"ts_u_phone = :ts_u_phone and ts_u_password = :ts_u_password",
 				'params'=>array(":ts_u_phone"=>$_POST['email'],":ts_u_password"=>Utils::getUserPassword($_POST['pwd']))
 			)
 		);

 		if(!isset($loginUser->ts_u_id) || $loginUser->ts_u_id==null){
 			$info = array(
	 			'status'=>2,
	 			'info'=>'用户名或密码错误'
	 		);
 		}else{
 			HckpSessionComponent::getInstance()->initSession(array(
 				'user_id'=>$loginUser->ts_u_id,
 				'user_username'=>$loginUser->ts_u_username,
 				'user_phone'=>$loginUser->ts_u_phone,
 				'user_realname'=>$loginUser->ts_real_name,
 				'user_type'=>$loginUser->ts_u_type,
 				'user_headpic'=>$loginUser->ts_u_headpic
 			));
 			$info = array(
	 			'status'=>1,
	 			'info'=>'登录成功'
	 		);
 		}
 		echo json_encode($info);
 		die();
 		*/
	}
	
	/**
	 * 注册后台处理方法
	 */
	public function actionRegister(){
		$user=new UserModel();
 		$user->ts_u_phone = $_POST['phone'];
 		$user->ts_u_password = Utils::getUserPassword($_POST['pwd']);
 		$user->ts_u_username = $_POST['username'] ? $_POST['username'] : $_POST['phone'];
 		$user->ts_u_type = 3;
 		
 		$info = array();
 		if(!$user->validate()){	
 			var_dump($user->getErrors());exit;
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
	/**
	 * 代码不应该写在这里
	 * @param unknown $message
	 * @return mixed
	 * @date: 2015-3-31 下午8:05:05
	 * @author: dayunlong<gengjun@qiyi.com>
	 */
	public function getErrorMessage($message){
 		return current(current($message));
 	}
	
}