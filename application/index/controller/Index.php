<?php

namespace app\index\controller;

use app\base\controller\HomeBaseController;
use app\blog\service\ArticleService;

class Index extends HomeBaseController
{
    public function index()
    {
        $this->injectCommonItems();

        $pagi = (new ArticleService())->buildModel()
            ->order('id', 'desc')->paginate(3);

        $this->assign('pages', $pagi->render());
        $this->assign('items', $pagi->items());

        return $this->fetch();
    }
}
