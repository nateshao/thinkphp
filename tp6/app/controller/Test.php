<?php

namespace app\controller;

use app\BaseController;
use think\facade\Db;
use think\facade\Env;

class Test extends BaseController
{
    public function index()
    {
//        return 'index，方法名：' . $this->request->action() . ', 当前实际路径：' . $this->app->getBasePath();
//        $data = array('a'=>1, 'b'=>2, 'c'=>3);
//        return json($data);
//        //返回实际路径
//        return $this->app->getBasePath();
        //返回当前方法名
//        return $this->request->action();

        $user = Db::connect('demo')->table('tp_user')->select();
        return json($user);
    }

    public function hello($value = '')
    {
        return 'hello ' . $value;
    }

    public function arrayOutput()
    {
        $data = ['a' => 1, 'b' => 2, 'c' => 3];

        halt('中断输出！');

        return json($data);
    }
}