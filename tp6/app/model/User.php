<?php

namespace app\model;

use think\Model;
use think\model\concern\SoftDelete;

class User extends Model
{

    public function index()
    {
        return json(User::select());
    }

    //一对一
//    public function profile()
//    {
//        return $this->hasOne(Profile::class,'user_id');
//    }

    //一对多
    public function profile()
    {
        return $this->hasMany(Profile::class, 'user_id');
    }

    public function book()
    {
        return $this->hasMany(Book::class, 'user_id');
    }

    //多对多关联
    public function roles()
    {
        return $this->belongsToMany(Role::class, Access::class);
    }








    //添加后缀需要设置模型名称
    //protected $name = 'user';

    //设置主键
    //protected $pk = 'id';

    //设置表
    //protected $table = 'tp_user';

    //初始化操作
    //protected static function init()
    //{
    //    parent::init(); // TODO: Change the autogenerated stub
    //echo '初始化操作！';
    //}


    //设置字段信息
//    protected $schema = [
//        'id' => 'int',
//        'username' => 'string',
//        'password' => 'string',
//        'gender' => 'string',
//        'email' => 'string',
//        'price' => 'float',
//        'details' => 'string',
//        'uid' => 'int',
//        'status' => 'int',
//        'list' => 'string',
//        'delete_time' => 'datetime',
//        'create_time' => 'datetime',
//        'update_time' => 'datetime',
//        '_pk' => 'id',
//        '_autoinc' => 'id',
//    ];

    //是否严格却分大小写
    //protected $strict = false;

//    public function getUsername()
//    {
//        $obj = $this->find(19);
//        return $obj->getAttr('username');
//    }

    //设置status修改器
//    public function getStatusAttr($value)
//    {
//        $arr = [-1=>'删除', 0=>'禁用', 1=>'正常', 2=>'待审核'];
//        return $arr[$value];
//    }

    //设置一个虚拟nothing字段的修改器
//    public function getNothingAttr($value, $data)
//    {
//        $arr = [-1=>'删除', 0=>'禁用', 1=>'正常', 2=>'待审核'];
//        return $arr[$data['status']];
//    }

    //email修改器
//    public function setEmailAttr($value)
//    {
//        return strtoupper($value);
//    }


    //强制全局查询条件，任何查询都必须加上这个条件
    //定义全局
//    protected $globalScope = ['status'];
//
//    //定义全局方法
//    public function scopeStatus($query)
//    {
//        $query->where('status', 1);
//    }
//
//    //查询范围,男 5条
//    public function scopeMale($query)
//    {
//        $query->where('gender', '男')
//              ->field('id,username,gender,email')
//              ->limit(5);
//    }
//
//    //
//    public function scopeEmail($query, $value)
//    {
//        $query->where('email', 'like', '%'.$value.'%');
//    }
//
//    public function scopePrice($query, $value)
//    {
//        $query->where('price', '>', $value);
//    }


    /** 搜索器
     * @param $query
     * @param $value
     * @param $data
     */
    public function searchEmailAttr($query, $value, $data)
    {
        $query->where('email', 'like', '%' . $value . '%');
        if (isset($data['sort'])) {
            $query->order($data['sort']);
        }
    }

//
    public function searchCreateTimeAttr($query, $value, $data)
    {
        $query->whereBetweenTime('create_time', $value[0], $value[1]);
    }
    /** 29. 模型的自动时间戳和只读字段
     * @var bool
     */
    //独立开启自动时间戳写入
    protected $autoWriteTimestamp = true;

    //自定义新增和修改的时间戳
    //protected $createTime = 'create_at';
    //protected $updateTime = 'update_at';

    //protected $updateTime = false;

    //只读字段，修改时无法修改
    //protected $readonly = ['username', 'email'];

    //类型转换
//    protected $type = [
//        'status'        =>      'boolean',
//        'price'         =>      'float',
//        'create_time'   =>      'datetime:Y/m/d'
//    ];

    //废弃字段
    //protected $disuse = ['status', 'uid'];


    //设置JSON字段
    protected $json = ['list'];

    /**
     * 32. 模型的软删除
     */
    //开启软删除
    //use SoftDelete;
    //protected $deleteTime = 'delete_time';
    //protected $defaultSoftDelete = 0;
    /**
     * 33. 模型和数据库的事件
     */
//    protected static function onAfterRead($query)
//    {
//        echo '一条数据被查询！';
//    }
//
//    protected static function onBeforeUpdate($query)
//    {
//        echo '准备修改...';
//    }
//
//    protected static function onAfterUpdate($query)
//    {
//        echo '已修改完毕...';
//    }


}