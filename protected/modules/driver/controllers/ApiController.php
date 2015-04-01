<?php

/**
 * @desc:司机 app接口
 */
class ApiController extends Controller
{


    public function actionIndex()
    {
        $functionId = URL::GET("functionId", "register");
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
        $body['result'] = array();

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
        //验证
        if (!URL::validateParam()) {
            URL::error403();
        }
        $body = URL::getBody();
        //检查必传参数
        $result = URL::checkParam($body, array('w', 'e', 'driverId'));
        if (!empty($result)) {
            URL::errorParams($result);
        }

        $driverGpsModel = self::loadModel('DriverGpsModel', 'driver', NULL, FALSE);
        $r = array();
        $r['tp_d_id'] = $body['driverId'];
        $r['tp_dg_city'] = $body['city'];
        $r['tp_dg_gps'] = $body['w'] . ',' . $body['e'];
        $r['tp_dg_time'] = time();
        $driverGpsModel->attributes = $r;
        if ($driverGpsModel->save()) {
            URL::retJson(0, 'SUCCESS', array());
        } else {
            URL::errorServer('添加坐标失败');
        }
        //$locationList = $driverGpsModel->getLocationList();
        //URL::retJson(0, 'SUCCESS', $locationList);
    }

}

