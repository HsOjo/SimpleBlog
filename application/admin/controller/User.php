<?php


namespace app\admin\controller;


use app\base\controller\AdminModelBaseController;
use app\base\service\ModelBaseService;
use app\user\service\UserService;

class User extends AdminModelBaseController
{
    /**
     * @return ModelBaseService
     */
    function buildService()
    {
        // TODO: Implement buildService() method.
        return new UserService();
    }
}