<?php


namespace app\base\service;


use think\exception\PDOException;
use think\Model;

abstract class ModelBaseService
{
    function getItems($where = null)
    {
        $model = $this->buildModel();
        if (!empty($where))
            $model->where($where);

        return $model->select();
    }

    function getItemsArray($by_col = false, $where = null, $col = 'id')
    {
        $items = $this->getItems($where);
        $array = [];
        foreach ($items as $key => $value) {
            $data = $value->getData();
            if ($by_col)
                $key = $data[$col];
            $array[$key] = $data;
        }

        return $array;
    }

    /**
     * @return Model
     */
    abstract function buildModel();

    function itemAdd($data)
    {
        $model = $this->buildModel();

        try {
            // 往用户表内插入了一行新的内容
            $model->data($data)->isUpdate(false)->allowField(true)->save();
        } catch (PDOException $e) {
            return false;
        }

        // 获取最后添加（注册）的用户id
        $item_id = $model->getLastInsID();
        return $item_id;
    }

    function itemEdit($data, $pk = 'id')
    {
        $item = $this->getItemByCol($data[$pk], $pk);
        try {
            $result = $item->data($data)->isUpdate(true)->allowField(true)->save();
        } catch (PDOException $e) {
            return false;
        }
        return $result;
    }

    function getItemByCol($key, $col = 'id')
    {
        $model = $this->buildModel();
        $user = $model->where([$col => $key])->find();
        return $user;
    }

    function itemDelete($key, $pk = 'id')
    {
        $item = $this->getItemByCol($key, $pk);
        if (!empty($item))
            return $item->delete();
        else
            return false;
    }
}