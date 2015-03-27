<?php
/**
* 处理由index发出的请求
* @author leoHuang
* 2015/03
**/
    class IndexAction extends CI_Controller
    {
        function __construct()
        {
            parent::__construct();
        }

        public function search()
        {

            //接收搜索索引
            $info = Utils::GetValue("info");

            //搜索数据库
            

            $data = array('search' => $info);

            //使用helper的函数base_url()
            $this->load->helper('url');

            $this->load->view('searchResult', $data);
        }        

        //名师简介
        public function professors()
        {
            //使用helper的函数base_url()
            $this->load->helper('url');

            $this->load->view('professors');
        }

        //我来评师
        public function rankprofessors()
        {
            //使用helper的函数base_url()
            $this->load->helper('url');

            $this->load->view('rankprofessors');
        }

        //相关课程
        public function lessons()
        {
            //使用helper的函数base_url()
            $this->load->helper('url');

            $this->load->view('lessons');
        }

        //畅所欲言
        public function freetalk()
        {
            //使用helper的函数base_url()
            $this->load->helper('url');

            $this->load->view('freetalk');
        }

        //前往登录
        public function gologin()
        {
            //使用helper的函数base_url()
            $this->load->helper('url');

            $this->load->view('login');
        }

        //前往注册
        public function goregister()
        {
            $data = array('msg' => "" );
            //使用helper的函数base_url()
            $this->load->helper('url');

            $this->load->view('register',$data);
        }

    }
?>