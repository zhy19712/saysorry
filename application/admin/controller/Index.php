<?php

namespace app\admin\controller;


use think\Controller;
use think\Session;

class Index extends Controller
{
    public function index()
    {
        if (Session::has('admin')) {
            return $this->fetch();
        } else {
            return $this->redirect('admin/login/login');
        }
    }

}
