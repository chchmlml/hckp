<?php
/**
 * @desc:
 * ==============================================
 * 版权所有HCKP 2015-2016 
 * ----------------------------------------------
 * 这不是一个自由软件，未经授权不许任何使用和传播。
 * ----------------------------------------------
 * 权限（全局限制访问）
 * ==============================================
 * @date: 2015-4-1 下午9:03:59
 * @author:dayunlong <gengjun@qiyi.com>
 * @version: 1.0.0.0
 */
 class MotorcadeModule extends CWebModule{
 	
 /**
 	 * (non-PHPdoc)
 	 * @see CModule::init()
 	 */
	public function init(){
		$this->setImport(array(
				'motorcade.models.*',
				'motorcade.components*',
				'motorcade.controllers.*',
				'motorcade.views.*',
		));
	}
 	/**
 	 * (non-PHPdoc)
 	 * @see CWebModule::beforeControllerAction()
 	 */
	public function beforeControllerAction($controller, $action){
		if(parent::beforeControllerAction($controller, $action)){
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}
 	
 	
 	
 	
 }
/* End of file : MotorcadeModule.php */ 