<?php


namespace app\blog\service;


use app\base\service\ModelBaseService;
use app\blog\model\Comment;
use think\Model;

class CommentService extends ModelBaseService
{
    /**
     * @return Model
     */
    function buildModel()
    {
        // TODO: Implement buildModel() method.
        return new Comment();
    }
}