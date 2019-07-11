<?php


namespace app\base\controller;


use app\blog\service\CategoryService;
use app\blog\service\FriendLinkService;
use app\user\service\UserService;
use think\Controller;

class HomeBaseController extends Controller
{
    protected $logon_user;
    protected $site_setting;
    protected $info_setting;

    protected function _initialize()
    {
        parent::_initialize(); // TODO: Change the autogenerated stub

        $this->site_setting = load_setting('site_setting');
        $this->info_setting = load_setting('info_setting');
        $this->logon_user = UserService::getLogonUser();

        $this->assign('site_setting', $this->site_setting);
        $this->assign('info_setting', $this->info_setting);
        $this->assign('logon_user', $this->logon_user);
    }

    protected function injectCommonItems()
    {
        $friend_links = (new FriendLinkService())->getItemsArray();
        $categories = (new CategoryService())->getItemsArray(true);
        $users = (new UserService())->getItemsArray(true);

        $this->assign('friend_links', $friend_links);
        $this->assign('categories', $categories);
        $this->assign('users', $users);
    }
}