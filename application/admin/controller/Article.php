<?php


namespace app\admin\controller;


use app\base\controller\AdminModelBaseController;
use app\base\service\ModelBaseService;
use app\blog\service\ArticleService;
use app\blog\service\CategoryService;

class Article extends AdminModelBaseController
{

    /**
     * @return ModelBaseService
     */
    function buildService()
    {
        // TODO: Implement buildService() method.
        return new ArticleService();
    }

    public function index()
    {
        $this->assign('categories', (new CategoryService())->getItemsArray(true));
        return parent::index(); // TODO: Change the autogenerated stub
    }

    public function add()
    {
        $this->assign('categories', (new CategoryService())->getItems());
        return parent::add(); // TODO: Change the autogenerated stub
    }

    public function edit()
    {
        $this->assign('categories', (new CategoryService())->getItems());
        return parent::edit(); // TODO: Change the autogenerated stub
    }
}