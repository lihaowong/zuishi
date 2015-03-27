<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 跳转到首页
* @author leoHuang
* 2015/03
**/
    class Index extends CI_Controller 
    {

        function __construct()
        {
            parent::__construct();
        }

        //首页
        public function index()
        {
            //使用helper的函数base_url()
            $this->load->helper('url');

            $this->load->view('index');
        }


    }
?>