<?php


namespace app\blog\controller;


use app\base\controller\HomeBaseController;
use app\blog\service\ArticleService;
use app\blog\service\CommentService;

class Article extends HomeBaseController
{
    function view()
    {
        $this->injectCommonItems();

        $item_id = $this->request->param('id');
        $item = (new ArticleService())->getItemByCol($item_id);
        $this->assign('item', $item);

        $pagi = (new CommentService())->buildModel()
            ->where(['article_id' => $item_id])
            ->order('id', 'desc')->paginate();

        $this->assign('comment_pages', $pagi->render());
        $this->assign('comments', $pagi->items());

        return $this->fetch();
    }
}