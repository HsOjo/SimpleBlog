<?php


namespace app\admin\controller;


use app\base\controller\AdminModelBaseController;
use app\base\service\ModelBaseService;
use app\blog\service\FriendLinkService;

class FriendLink extends AdminModelBaseController
{

    /**
     * @return ModelBaseService
     */
    function buildService()
    {
        // TODO: Implement buildService() method.
        return new FriendLinkService();
    }
}