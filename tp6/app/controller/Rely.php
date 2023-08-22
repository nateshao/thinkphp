<?php
namespace app\controller;
//use think\Request;
use think\facade\Request;

class Rely
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /** http://127.0.0.1:8000/Rely/index?username=%E5%8D%83%E7%BE%BD
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        return $_GET['username'];
        //return $request->param('username');
    }

    public function get($id = 0)
    {
//        return $this->request->param('username');
//        return Request::param('username');
//        return request()->param('username');  // http://127.0.0.1:8000/Rely/get?username=1
//        return Request::url(true); // http://127.0.0.1:8000/Rely/get?username=1
//        return Request::root(true); // http://127.0.0.1:8000
//        return Request::controller().'|'.Request::action(); // Rely|get

//        dump(Request::has('name', 'get')); // check返回
        //ump(Request::param('name', '', 'strtoupper,htmlspecialchars'));
        //dump(Request::param());
        //dump(Request::param(false));
        //dump(Request::param(['name', 'age'], '', null));

        //dump(Request::get('id'));
        //dump(Request::route('id'));
        //dump(Request::only(['name']));
        //dump(Request::except(['name']));

        //dump(Request::get('age/d'));
        //dump(input('?get.name'));
        //dump(input('get.name'));
        //dump(input('param.name'));
//
//        dump(Request::isGet());
//        dump(Request::isPost());
//        dump(Request::method());
//        dump(Request::isAjax());
//        dump(Request::header());
//        dump(Request::header('host'));


        //echo $id;
        //echo Request::ext();

        //return json($id);
        //return response($id)->code(201)->header(['Cache-control' => 'no-cache,must-revalidate']);

        //return redirect('http://www.baidu.com');
        //return redirect('/tp6/public/address/index');
        //return redirect(url('address/index'));
        //return redirect(url('address/index'))->with('name', 'Mr.Lee');

        if (session('?flag')) {
            return '死机警告！';
        } else {
            return redirect(url('address/index'))->remember();
        }

    }





}