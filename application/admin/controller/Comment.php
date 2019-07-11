<?php


namespace app\admin\controller;


use app\base\controller\AdminModelBaseController;
use app\base\service\ModelBaseService;
use app\blog\service\CommentService;

class Comment extends AdminModelBaseController
{
    function index()
    {
        $this->injectCommonItems();

        $pagi = $this->buildService()->buildModel()
            ->alias('a')->join('article b', 'a.article_id=b.id')
            ->field('a.*,b.title as article_title')->order('a.id', 'desc')
            ->paginate();

        $this->assign('pages', $pagi->render());
        $this->assign('items', $pagi->items());

        return $this->fetch();
    }

    /**
     * @return ModelBaseService
     */
    function buildService()
    {
        // TODO: Implement buildService() method.
        return new CommentService();
    }
}