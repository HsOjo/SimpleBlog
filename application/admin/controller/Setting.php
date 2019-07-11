<?php


namespace app\admin\controller;


use app\base\controller\AdminBaseController;

class Setting extends AdminBaseController
{
    function index()
    {
        return $this->fetch();
    }

    function indexPost()
    {
        $site_setting = $this->request->post('site_setting/a');

        if (save_setting('site_setting', $site_setting)) {
            $this->success('保存完成');
        } else {
            $this->error('保存失败');
        }
    }

    function info()
    {
        return $this->fetch();
    }

    function infoPost()
    {
        $info_setting = $this->request->post('info_setting/a');

        if (save_setting('info_setting', $info_setting)) {
            $this->success('保存完成');
        } else {
            $this->error('保存失败');
        }
    }
}