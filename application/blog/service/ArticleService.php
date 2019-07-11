<?php


namespace app\blog\service;


use app\base\service\ModelBaseService;
use app\blog\model\Article;
use think\Model;

class ArticleService extends ModelBaseService
{
    /**
     * @return Model
     */
    function buildModel()
    {
        // TODO: Implement buildModel() method.
        return new Article();
    }
}