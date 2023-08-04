<?php

namespace app\controller;

use app\BaseController;
use app\model\User;
use think\facade\Db;

class DataTest extends BaseController
{

//    public function initialize()
//    {
//        //parent::initialize(); // TODO: Change the autogenerated stub
//        Db::event('before_select', function ($query) {
//            echo '执行了批量查询';
//        });
//
//        Db::event('after_update', function ($query) {
//            echo '修改被执行...';
//        });
//    }

    public function index()
    {


//        $user = Db::connect('demo')->table('tp_user')->select();
//        return json($user);
//        $user = Db::table('tp_user')->where('id', 27)->find();
//        $user = Db::getLastSql();
//        $user = Db::table('tp_user')->where('id', 1)->findOrFail();
//        $user = Db::table('tp_user')->where('id', 1)->findOrEmpty();
        /**
         * 数据集查询
         */
//        $user = Db::table('tp_user')->select();
//        $user = Db::table('tp_user')->select()->toArray();
        /**
         * 其他查询
         */
//        $user = Db::name('user')->where('id', 27)->value('username');
//        $user = Db::name('user')->column('username','id');
//      $user =  Db::table('tp_user')->chunk(3,function ($users){
//            foreach ($users as $user){
//                dump($user);
//            }
//           echo 1;
//        });

        $users = Db::table('tp_user')->cursor();
        foreach ($users as $user) {
            dump($user);
        }


        /**
         * sql
         */
//        $user = Db::connect('mysql')->table('tp_user')->select();
        //$user = Db::table('tp_user')->where('id', 27)->find();
        //return Db::getLastSql();
        //$user = Db::table('tp_user')->where('id', 527)->findOrFail();
        //$user = Db::table('tp_user')->where('id', 527)->findOrEmpty();
        //$user = Db::table('tp_user')->where('status', 3)->select();
        //$user = Db::table('tp_user')->where('status', 3)->selectOrFail();
        //$user = Db::table('tp_user')->select()->toArray();
        //dump($user);

        //$user = Db::name('user')->select();
        //return Db::table('tp_user')->where('id', 27)->value('username');
        //$user = Db::name('user')->column('username', 'id');

//        Db::name('user')->chunk(100, function ($users) {
//            foreach ($users as $user) {
//                dump($user);
//            }
//            //echo 1;
//        });

//        $cursor = Db::name('user')->cursor();
//
//        foreach ($cursor as $user) {
//            dump($user);
//        }


        //$user = Db::name('user')->where('id', 27)->order('id', 'desc')->find();
        ///$user = Db::name('user')->where('id', 27)->order('id', 'desc')->select();
        //dump($user);

        //$userQuery = Db::name('user');
        //$userFind = $userQuery->where('id', 27)->find();
        //$userSelect = $userQuery->select();
        //$data1 = $userQuery->order('id', 'desc')->select();
        //$data2 = $userQuery->removeOption('order')->select();
        //return Db::getLastSql();
        //return json($userSelect);

        //$user = Db::name('user')->json(['list'])->find(287);
        //$user = Db::name('user')->json(['list'])->where('list->username', '小红')->find();
        return json($user);
    }

    public function demo()
    {
        $user = Db::connect('demo')->table('tp_user')->select();
        return json($user);
    }

    public
    function getUser()
    {
        $user = User::select();
        return json($user);
    }

    public function manySelect()
    {
        $userQuery = Db::name('user');
        $dataFind = $userQuery->where('id', 27)->find();
        $res = $userQuery->select();
        return json($dataFind);


    }

    public
    function insert()
    {
        $data = [
            'username' => '千羽',
            'password' => '123',
            'gender' => '女',
            'email' => 'huiye@163.com',
            'price' => 90,
            'details' => '123',
            'list' => ['username' => '小红', 'gender' => '女', 'email' => 'xiaohong@163.com']
            //'abc'           =>      'def'
        ];

        //return Db::name('user')->field('username, gender,email')->insert($data);
        //return Db::name('user')->strict(false)->insert($data);
        //Db::name('user')->replace()->insert($data);
        //return Db::getLastSql();
        //return Db::name('user')->insertGetId($data);
        return Db::name('user')->json(['list'])->save($data);

    }

    public
    function insertAll()
    {
        $dataAll = [
            [
                'username' => '辉夜',
                'password' => '123',
                'gender' => '女',
                'email' => 'huiye@163.com',
                'price' => 90,
                'details' => '123',
                //'abc'           =>      'def'
            ],
            [
                'username' => '辉夜',
                'password' => '123',
                'gender' => '女',
                'email' => 'huiye@163.com',
                'price' => 90,
                'details' => '123',
                //'abc'           =>      'def'
            ]
        ];

        return Db::name('user')->insertAll($dataAll);
    }

    public
    function update()
    {
//        $data = [
//            'username'      =>      '李白'
//        ];
//        return Db::name('user')->where('id', 228)->update($data);

//        $data = [
//            'id'            =>      228,
//            'username'      =>      '李黑'
//        ];
//        return Db::name('user')->update($data);

//        return Db::name('user')->where('id', 228)
////                                     ->exp('email', 'UPPER(email)')
////                                     ->update();
///
//        return Db::name('user')->where('id', 228)
//                                     ->inc('price')
//                                     ->dec('status', 2)
//                                     ->update();
        return Db::name('user')->where('id', 301)
            ->update([
                'email' => Db::raw('UPPER(email)'),
                'price' => Db::raw('price + 1'),
                'status' => Db::raw('status - 2')
            ]);

        //$data['list'] = ['username'=>'李白', 'gender'=>'男', 'email'=>'libai@163.com'];
        //$data['list->username'] = '李黑';
        //return Db::name('user')->where('id', 287)->json(['list'])->save($data);

    }

    public
    function delete()
    {
        //return Db::name('user')->delete(232);
        //return Db::name('user')->delete([229,230,231]);
        return Db::name('user')->where('id', 228)->delete();
    }

    public
    function query()
    {
        //$user = Db::name('user')->where('id', '=', 76)->find();
        //$user = Db::name('user')->where('id', 76)->find();
        //$user = Db::name('user')->where('id', '<>', 19)->select();
        //$user = Db::name('user')->where('email', 'like', 'xiao%')->select();
        //$user = Db::name('user')->where('email', 'like', ['xiao%', 'wu%'], 'or')->select();
        //$user = Db::name('user')->whereLike('email', 'xiao%')->select();
        //$user = Db::name('user')->whereNotLike('email', 'xiao%')->select();
        //$user = Db::name('user')->where('id', 'between', '21,27')->select();
        //$user = Db::name('user')->where('id', 'between', [21,27])->select();
        //$user = Db::name('user')->whereBetween('id', [21,27])->select();
        //$user = Db::name('user')->where('id', 'in', '25,26,29')->select();
        //$user = Db::name('user')->where('uid', 'null')->select();
        //$user = Db::name('user')->where('uid', 'not null')->select();
        //$user = Db::name('user')->where('id', 'in', '19,21,22')->select();
        $user = Db::name('user')->where('id', 'exp', 'IN (19,21,22)')->select();

        //return Db::getLastSql();
        return json($user);
    }

    public
    function time()
    {
        //$user = Db::name('user')->where('create_time', '>', '2018-1-1')->select();
        //$user = Db::name('user')->where('create_time', 'not between', ['2019-1-1', '2019-12-1'])->select();
        //$user = Db::name('user')->whereTime('create_time', '>', '2018-1-1')->select();
        //$user = Db::name('user')->whereBetween('create_time', ['2019-1-1', '2019-12-1'])->select();
        //$user = Db::name('user')->whereBetweenTime('create_time', '2019-1-1', '2019-12-1')->select();

        //$user = Db::name('user')->whereYear('create_time')->select();
        //$user = Db::name('user')->whereYear('create_time', 'last year')->select();
        //$user = Db::name('user')->whereYear('create_time', '2016')->select();
        //$user = Db::name('user')->whereTime('create_time', '-2 hours')->select();
        $user = Db::name('user')->whereBetweenTimeField('create_time', 'update_time')->select();

        return Db::getLastSql();
        //return json($user);
    }

    public
    function poly()
    {
        //$result = Db::name('user')->count();
        //$result = Db::name('user')->count('uid');
        //$result = Db::name('user')->max('price');
        //$result = Db::name('user')->min('price');
        //$result = Db::name('user')->min('email', false);
        //$result = Db::name('user')->max('email', false);
        //$result = Db::name('user')->avg('price');
        //$result = Db::name('user')->sum('price');
        //$result = Db::name('user')->fetchSql(true)->select();
        //$result = Db::name('user')->buildSql(true);

        //求出所有男的uid
        //$subQuery = Db::name('two')->field('uid')->where('gender', '男')->buildSql(true);
        //$result = Db::name('one')->where('id', 'exp', 'IN '.$subQuery)->select();

//        $result = Db::name('one')->where('id', 'in', function ($query) {
//            $query->name('two')->field('uid')->where('gender', '男');
//        })->select();

        //$result = Db::query('SELECT * FROM tp_user');
        $result = Db::execute('UPDATE tp_user SET username="孙武" WHERE id=29');
        //return Db::getLastSql();
        return json($result);
    }

    public
    function linkUp()
    {
        //$user = Db::name('user')->where('id', '>', 70)->select();

//        $user = Db::name('user')->where([
//            'gender'    =>      '男',
//            'price'     =>      100
//        ])->select();

//        $user = Db::name('user')->where([
//            ['gender', '=', '男'],
//            ['price', '>', '100']
//        ])->select();


//        $map[] = ['gender', '=', '男'];
//        $map[] = ['price', 'in', [60,70,80]];
//        $user = Db::name('user')->where($map)->select();

        //$user = Db::name('user')->whereRaw('gender="男" AND price IN (60,70,80)')->select();
        //$user = Db::name('user')->whereRaw('id=:id', ['id'=>19])->select();

        //$user = Db::name('user')->field('*')->select();
        //$user = Db::name('user')->field('id,username,email')->select();
        //$user = Db::name('user')->field('id,username as name,email')->select();
        //$user = Db::name('user')->fieldRaw('id,SUM(price)')->select();
        //$user = Db::name('user')->field(true)->select();
        //$user = Db::name('user')->withoutField('details')->select();

        $user = Db::name('user')->alias('a')->select();
        return Db::getLastSql();
        return json($user);
    }

    public
    function linkDown()
    {
        //$user = Db::name('user')->limit(5)->select();
        //$user = Db::name('user')->limit(2,5)->select();
        //$user = Db::name('user')->limit(0,5)->select();
        //$user = Db::name('user')->limit(5,5)->select();
        //$user = Db::name('user')->page(2,5)->select();

        //$user = Db::name('user')->order('id', 'desc')->select();
        //$user = Db::name('user')->order(['create_time'=>'desc', 'price'=>'asc'])->select();
        //$user = Db::name('user')->orderRaw('FIELD(username, "樱桃小丸子") DESC')->select();

        //$user = Db::name('user')->field('gender, SUM(price)')->group('gender')->select();
        //$user = Db::name('user')->field('gender, SUM(price)')->group('gender,password')->select();
        $user = Db::name('user')
            ->field('gender, SUM(price)')
            ->group('gender')
            ->having('SUM(price) > 600')
            ->select();

        //return Db::getLastSql();
        return json($user);
    }

    public
    function advanced()
    {
//        $user = Db::name('user')
//                    ->where('username|email', 'like', '%xiao%')
//                    ->where('price&uid', '>', 0)
//                    ->select();

//        $user = Db::name('user')->where([
//            ['id', '>', 0],
//            ['status', '=', 1],
//            ['price', 'exp', Db::raw('>=80')],
//            ['email', 'like', '%163%']
//        ])->select();

//        $map = [
//            ['id', '>', 0],
//            ['price', 'exp', Db::raw('>=80')],
//            ['email', 'like', '%163%']
//        ];
//        $user = Db::name('user')
//                ->where([$map])
//                ->where('status', 1)
//                ->select();

//        $map1 = [
//            ['username', 'like', '%小%'],
//            ['email', 'like', '%163%']
//        ];
//        $map2 = [
//            ['username', 'like', '%孙%'],
//            ['email', 'like', '%.com%']
//        ];
//        $user = Db::name('user')->whereOr([$map1, $map2])->select();

//        $user = Db::name('user')->where(function ($query) {
//            $query->where('id', '>', 0);
//        })->whereOr(function ($query) {
//            $query->where('username', 'like', '%小%');
//        })->select();

//        $user = Db::name('user')
//                    ->whereRaw('(username LIKE "%小%" AND status=1) OR id>0')
//                    ->select();

        $user = Db::name('user')
            ->whereRaw('(username LIKE :username AND status=:status) OR id>:id',
                ['username' => '%小%', 'status' => 1, 'id' => 0])
            ->select();

        //return Db::getLastSql();
        return json($user);
    }

    public
    function speedy()
    {
//        $user = Db::name('user')
//                    ->whereColumn('update_time', '=', 'create_time')
//                    ->select();

        //$user = Db::name('user')->whereEmail('xiaoxin@163.com')->find();
        //$user = Db::name('user')->whereUsername('蜡笔小新')->find();

        //$user = Db::name('user')->getByEmail('xiaoxin@163.com');
        //$user = Db::name('user')->getFieldByEmail('xiaoxin@163.com', 'username');

        $user = Db::name('user')->when(false, function ($query) {
            $query->where('id', '>', 0);
        }, function ($query) {
            $query->where('username', 'like', '%小%');
        })->select();

        return Db::getLastSql();
        return json($user);
    }

    public
    function getter()
    {
//        Db::Transaction(function () {
//            Db::name('user')->where('id', 19)->save(['price'=>Db::raw('price + 3')]);
//            Db::name('user')->where('id', 20)->save(['price'=>Db::raw('price - 3')]);
//        });

//        Db::startTrans();
//        try {
//            Db::name('user')->where('id', 19)->save(['price'=>Db::raw('price + 3')]);
//            Db::name('user1')->where('id', 20)->save(['price'=>Db::raw('price - 3')]);
//
//            Db::commit();
//        } catch (\Exception $e) {
//            echo '执行SQL失败，开始回滚数据';
//            Db::rollback();
//        }

        $user = Db::name('user')->withAttr('email', function ($value, $data) {
            return strtoupper($value);
        })->select();

        return json($user);
    }

    public
    function collection()
    {
        $user = Db::name('user')->select();

        //var_dump($user->toArray());
        //dump($user->shuffle());
        //dump($user->pop());
        dump($user->whereIn('id', [19, 20, 21]));
    }
}










