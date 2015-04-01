<?php
/*
 * Created on 2015-3-29
 * @author wangfeiran
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 class PageController extends Controller{
 	public function actionIndex(){
 		$params = array();
 		$params['css'] = HTTP_RESOURCES . "/css/";
 		$params['js'] = HTTP_RESOURCES . "/js/";
 		return $this->render('index',$params);
 	}
 }
?>
