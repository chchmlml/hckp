<?php

/**
 * @desc:司机 app接口
 */
class ApiController extends Controller
{


    public function actionIndex()
    {
        //URL::checkParems();
        $body = URL::getBody();

        $functionId = URL::GET("functionId", "actionRegister");
        $this->$functionId();
    }


    /**
     * 注册、填写基本信息
     * @return mixed
     * @author haven<chchmlml@163.com>
     */
    public function register()
    {
        $body['code'] = 100;
        $body['result'] = [];

        Utils::retJson(1, 2, 3);
        //exit('注册');
    }

    /**
     * 基本信息维护
     * @return mixed
     * @author haven<chchmlml@163.com>
     */
    public function userManager()
    {
        exit('基本信息维护');
    }

    /**
     * 车辆管理
     * @return mixed
     * @author haven<chchmlml@163.com>
     */
    public function carManager()
    {
        exit('车辆管理');
    }

    /**
     * 申请车队
     * @return mixed
     * @author haven<chchmlml@163.com>
     */
    public function teamRegister()
    {
        exit('申请车队');
    }

    /**
     * 询价单报价
     * @return mixed
     * @author haven<chchmlml@163.com>
     */
    public function offerPrice()
    {
        exit('询价单报价');
    }

    /**
     * 调度单确认（毁约）
     * @return mixed
     * @author haven<chchmlml@163.com>
     */
    public function offerManager()
    {
        exit('调度单确认（毁约）');
    }


    /**
     * 调度独胆执行
     * @return mixed
     * @author haven<chchmlml@163.com>
     */
    public function offerOK()
    {
        exit('调度独胆执行');
    }

    /**
     * 手机定位
     * @return mixed
     * @author haven<chchmlml@163.com>
     */
    public function setCarLocation()
    {
        if(!URL::validateParam()){
            URL::error403();
        }
        //获取经纬度
        $body = URL::getBody();
        //检查必传参数
        $result = URL::checkParam($body, array('w','e'));
        if(!is_null($result)){
            URL::errorParams($result);
        }
        URL::retJson(1, $result, $body);
//
//        $driverGpsModel = self::loadModel('DriverGpsModel', 'driver', NULL, FALSE);
////        $r=array();
////        $r['ts_u_name']='dayunlong';
////        $r['ts_u_phone']='15026912738';
////        $PlatUserModel->attributes=$r;
//        //$PlatUserModel->save();
//        $locationList = $driverGpsModel->getLocationList();
//
//        URL::retJson(1, 2, $locationList);
    }

}

