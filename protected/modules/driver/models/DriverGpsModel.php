<?php

/**
 * @desc  :
 * @author:haven
 */
class DriverGpsModel extends CActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'trst_profession_driver_gps';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {

        return array();
    }

    public function getLocationList()
    {
        return $this->findAll();
    }


}






/* End of file : PlatUserModel.php */ 