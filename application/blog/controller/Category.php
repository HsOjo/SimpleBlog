<?php


namespace app\blog\controller;


use app\base\controller\HomeBaseController;
use app\blog\service\ArticleService;
use app\blog\service\CategoryService;

class Category extends HomeBaseController
{
    function view()
    {
        $this->injectCommonItems();

        $item_id = $this->request->param('id');
        $item = (new CategoryService())->getItemByCol($item_id);
        $this->assign('item', $item);

        $pagi = (new ArticleService())->buildModel()
            ->where(['category_id' => $item_id])
            ->order('id', 'desc')->paginate(3);

        $this->assign('pages', $pagi->render());
        $this->assign('items', $pagi->items());

        return $this->fetch();
    }
}