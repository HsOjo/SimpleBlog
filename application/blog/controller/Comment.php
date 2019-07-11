<?php


namespace app\blog\controller;


use app\base\controller\UserBaseController;
use app\blog\service\ArticleService;
use app\blog\service\CommentService;

class Comment extends UserBaseController
{
    function commit()
    {
        $item_id = $this->request->param('id');
        $item = (new ArticleService())->getItemByCol($item_id);

        if (!empty($item)) {
            $content = $this->request->post('content');
            $result = (new CommentService())->itemAdd([
                'article_id' => $item_id,
                'user_id' => $this->logon_user['id'],
                'content' => $content,
            ]);

            if ($result) {
                $this->success('留言成功');
            } else {
                $this->error('留言失败');
            }
        } else {
            $this->error('文章不存在');
        }
    }
}