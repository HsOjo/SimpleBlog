<?php


namespace app\user\controller;


use app\base\controller\UserBaseController;
use app\user\service\UserService;

class Basic extends UserBaseController
{
    function logout()
    {
        UserService::setLogonUser(null);
        $this->success('注销成功', 'index/index/index');
    }

    function view()
    {
        $item_id = $this->request->param('id');
        $item = (new UserService())->getItemByCol($item_id);
        $this->assign('item', $item);

        return $this->fetch();
    }
}