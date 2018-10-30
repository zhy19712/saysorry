<?php
/**
 * Created by PhpStorm.
 * User: waterforest
 * Date: 2018/10/29
 * Time: 21:49
 */

namespace app\admin\controller;


use think\Controller;

class Test extends Controller
{
    public function index()
    {
        return $this->fetch();
    }


}
