<?php


namespace app\user\controller;


use app\base\controller\HomeBaseController;
use app\user\service\UserService;

class Register extends HomeBaseController
{
    /**
     * 注册页面界面显示
     * @return mixed
     */
    function index()
    {
        return $this->fetch();
    }

    /**
     * 注册功能逻辑
     */
    function indexPost()
    {
        $username = $this->request->post('username');
        $password = $this->request->post('password');

        if (empty($username) or empty($password)) {
            $this->error('用户名或密码不能为空');
        }

        $user_id = UserService::userAdd([
            'username' => $username,
            'password' => $password,
        ]);

        if (!empty($user_id))
            $this->success('注册成功');
        else
            $this->error('注册失败');
    }
}