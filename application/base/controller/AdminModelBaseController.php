<?php


namespace app\base\controller;


use app\base\service\ModelBaseService;

abstract class AdminModelBaseController extends AdminBaseController
{
    /**
     * @return ModelBaseService
     */
    abstract function buildService();

    function index()
    {
        $pagi = $this->buildService()->buildModel()->paginate();

        $this->assign('pages', $pagi->render());
        $this->assign('items', $pagi->items());

        return $this->fetch();
    }

    function add()
    {
        return $this->fetch();
    }

    function addPost()
    {
        $param = $this->request->post();

        $item_id = $this->buildService()->itemAdd($param);
        if (!empty($item_id)) {
            $this->success('添加成功');
        } else {
            $this->error('添加失败');
        }
    }

    function edit()
    {
        $item_id = $this->request->param('id');
        $item = $this->buildService()->getItemByCol($item_id);
        $this->assign('item', $item);

        return $this->fetch();
    }

    function editPost()
    {
        $param = $this->request->post();

        $result = $this->buildService()->itemEdit($param);
        if (!empty($result)) {
            $this->success('编辑成功');
        } else {
            $this->error('编辑失败');
        }
    }

    function delete()
    {
        $item_id = $this->request->param('id');

        $result = $this->buildService()->itemDelete($item_id);
        if (!empty($result)) {
            $this->success('删除成功');
        } else {
            $this->error('删除失败');
        }
    }
}