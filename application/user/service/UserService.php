<?php


namespace app\user\service;


use app\base\service\ModelBaseService;
use app\user\model\User;
use think\Session;

define('LOGON_USER', 's_logon_user');

class UserService extends ModelBaseService
{
    /**
     * 用户登录功能，根据用户名以及密码，使用模型在数据库中查找相应的行。
     * 若能找到相应用户，则存储到Session中。
     * @param $username
     * @param $password
     * @return bool
     */
    static function userLogin($username, $password)
    {
        $model = new User();
        // find可以获取到符合条件的第一条数据
        $user = $model->where([
            'username' => $username,
            'password' => $password,
        ])->find();

        if (!empty($user)) {
            // 设置已登录的用户数据
            UserService::setLogonUser($user->getData());
            return true;
        } else {
            return false;
        }
    }

    /**
     * 设置登陆用户
     * @param $user
     */
    static function setLogonUser($user)
    {
        Session::set(LOGON_USER, $user);
    }

    /**
     * 获取登陆用户
     * @return mixed
     */
    static function getLogonUser()
    {
        // 获取会话信息中已登录的用户数据
        $user = Session::get(LOGON_USER);
        return $user;
    }

    public function buildModel()
    {
        // TODO: Implement buildModel() method.
        return new User();
    }

    /**
     * 用户注册功能
     * 由于用户参数较多，所以需要创建一个数组来存储数据。
     * @param $param
     * @return string
     */
    function itemAdd($param)
    {
        $data = [
            'username' => array_get_item($param, 'username', ''),
            'password' => array_get_item($param, 'password', ''),
            'is_admin' => array_get_item($param, 'is_admin', false),
            'email' => array_get_item($param, 'email', ''),
            'phone' => array_get_item($param, 'phone', ''),
            'introduce' => array_get_item($param, 'introduce', '')
        ];

        return $this->itemAdd($data);
    }
}