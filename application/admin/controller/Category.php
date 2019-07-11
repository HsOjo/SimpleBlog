<?php


namespace app\admin\controller;


use app\base\controller\AdminModelBaseController;
use app\base\service\ModelBaseService;
use app\blog\service\CategoryService;

class Category extends AdminModelBaseController
{
    /**
     * @return ModelBaseService
     */
    function buildService()
    {
        // TODO: Implement buildService() method.
        return new CategoryService();
    }
}