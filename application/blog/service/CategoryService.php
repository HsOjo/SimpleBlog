<?php


namespace app\blog\service;


use app\base\service\ModelBaseService;
use app\blog\model\Category;
use think\Model;

class CategoryService extends ModelBaseService
{
    /**
     * @return Model
     */
    function buildModel()
    {
        // TODO: Implement buildModel() method.
        return new Category();
    }
}