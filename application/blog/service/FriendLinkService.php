<?php


namespace app\blog\service;


use app\base\service\ModelBaseService;
use app\blog\model\FriendLink;
use think\Model;

class FriendLinkService extends ModelBaseService
{
    /**
     * @return Model
     */
    function buildModel()
    {
        // TODO: Implement buildModel() method.
        return new FriendLink();
    }
}