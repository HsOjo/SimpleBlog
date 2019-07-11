<?php


namespace app\admin\controller;


use app\base\controller\AdminBaseController;

class Index extends AdminBaseController
{
    /**
     * 后台首页
     */
    function index()
    {
        return $this->fetch();
    }
}