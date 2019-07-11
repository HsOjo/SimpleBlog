<?php


namespace app\user\controller;


use app\base\controller\HomeBaseController;
use app\user\service\UserService;

class Login extends HomeBaseController
{
    /**
     * 登录显示用的一个页面
     * @return mixed
     */
    function index()
    {
        // fetch方法用于加载视图(当前模块目录/view/当前控制器名称/当前方法名称.html)
        return $this->fetch();
    }

    /**
     * 登陆具体的一个逻辑功能页面
     */
    function indexPost()
    {
        $username = $this->request->post('username');
        $password = $this->request->post('password');

        if (UserService::userLogin($username, $password))
            $this->success('登录成功');
        else
            $this->error('登录失败，用户名或密码错误');
    }
}