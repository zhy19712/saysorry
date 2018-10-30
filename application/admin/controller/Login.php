<?php
/**
 * Created by PhpStorm.
 * User: waterforest
 * Date: 2018/10/29
 * Time: 15:46
 */

namespace app\admin\controller;


use think\Controller;
use think\Db;
use think\db\exception\DataNotFoundException;
use think\db\exception\ModelNotFoundException;
use think\exception\DbException;
use think\Session;


class Login extends Controller
{
    public function index()
    {
        return $this->fetch();
    }
    /**
     * 登录
     * @return [type] [description]
     */
    public function login()
    {
        if(request()->isPost()){
            $username = $this->request->param('username');
            $date = date("Y-m-d H:i:s");
            $ip = $this->request->ip();
            $data = [];
            $data['username'] = $username;
            $data['time'] = $date;
            $data['ip'] = $ip;
            try {
                Db::name('log')->insert($data);
                $result = Db::name('admin')->where('username', $username)->find();
            } catch (DataNotFoundException $e) {
            } catch (ModelNotFoundException $e) {
            } catch (DbException $e) {
            }
            if (empty($result)) {
                return json(['code' => 0, 'msg' => "不是"]);
            } else {
                Session::set("admin",$username); //保存新的
                return json(['code' => 1, 'msg' => "是", 'data'=>'http://' . $_SERVER['HTTP_HOST'] . '/admin/index/index.html']);
            }
        }
        return $this->fetch();


    }

}
