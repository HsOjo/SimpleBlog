<?php


namespace app\base\service;


use think\exception\PDOException;
use think\Model;

abstract class ModelBaseService
{
    /**
     * 获取数据库对象，根据特定条件筛选
     * @param null $where
     * @return false|\PDOStatement|string|\think\Collection
     */
    function getItems($where = null)
    {
        $model = $this->buildModel();
        if (!empty($where))
            $model->where($where);

        return $model->select();
    }

    /**
     * 获取数据库对象数据，并转换为数组
     * @param bool $by_col
     * @param null $where
     * @param string $col
     * @return array
     */
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
     * 抽象方法，用于继承之后创建不同的模型
     * @return Model
     */
    abstract function buildModel();

    /**
     * 添加对象方法
     * @param $data
     * @return bool|string
     */
    function itemAdd($data)
    {
        $model = $this->buildModel();

        try {
            $model->data($data)->isUpdate(false)->allowField(true)->save();
        } catch (PDOException $e) {
            return false;
        }

        $item_id = $model->getLastInsID();
        return $item_id;
    }

    /**
     * 根据主键修改对象
     * @param $data
     * @param string $pk
     * @return bool|false|int
     */
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

    /**
     * 根据某一列的值查找对象
     * @param $key
     * @param string $col
     * @return array|false|\PDOStatement|string|Model
     */
    function getItemByCol($key, $col = 'id')
    {
        $model = $this->buildModel();
        $user = $model->where([$col => $key])->find();
        return $user;
    }

    /**
     * 删除对象
     * @param $key
     * @param string $pk
     * @return bool|int
     */
    function itemDelete($key, $pk = 'id')
    {
        $item = $this->getItemByCol($key, $pk);
        if (!empty($item))
            return $item->delete();
        else
            return false;
    }
}