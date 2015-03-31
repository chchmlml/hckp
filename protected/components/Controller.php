<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController{
	/**
	 * (non-PHPdoc)
	 * @see CController::init()
	 */
	public function init(){
		parent::init();
	}
	/**
	 * 动作前(non-PHPdoc)
	 * @see CController::beforeAction()
	 */
	protected function beforeAction($action){
		//判断没有登陆请登陆	
		return true;
		/*
		if(!empty(Yii::app()->request->getParam('apikey'))){
			return true;
		}
		*/
		$user_info=HckpSessionComponent::getInstance()->getVal('user_info');
		if(empty($user_info)){
			$this->redirect(APP_HOST."/site/nopri");//没有权限 	
		}else{
			$this->_user_info=$user_info;
			return true;
		}
	}
	
	private $_user_info=array();
	/**
	 * 获取用户信息
	 * @param unknown_type $key
	 */
	protected function getUserInfo($key=NULL){
		if(is_null($key)){
			if(isset($this->_user_info[$key])){
				return $this->_user_info[$key];
			}else{
				return false;
			}
		}else{
			return $this->_user_info;
		}
	}
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
	
	/**
	 * 加载model
	 * @param unknown $model_name
	 * @param string $module
	 * @param string $new_class
	 * @return Ambigous <boolean, multitype:, multitype:>
	 * @date: 2014-11-19 上午11:00:20
	 * @author: dayunlong<gengjun@qiyi.com>
	 */
	public static final function loadModel($model_name,$module=NULL,$type=NULL,$new_class=true){
		return SystemComponent::loadModel($model_name,$module,$type,$new_class) ;
	}
	/**
	 * 加载操作类
	 * @param unknown $component_name
	 * @param string $module
	 * @return Ambigous <boolean, multitype:, multitype:>
	 * @date: 2014-11-19 上午11:00:29
	 * @author: dayunlong<gengjun@qiyi.com>
	 */
	public static final function loadComponent($component_name,$module=NULL,$type=NULL){
		return SystemComponent::loadComponent($component_name,$module,$type);
	}
	

}