<?php


namespace app\admin\service;


use app\admin\model\Setting;
use app\base\service\ModelBaseService;
use think\Model;

class SettingService extends ModelBaseService
{

    /**
     * @return Model
     */
    function buildModel()
    {
        // TODO: Implement buildModel() method.
        return new Setting();
    }
}