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
            //从数据库获取教授相关信息
            $table = "teachers";

            $mdb = MDBHelper::GenerateClient();
            $teachersArr = $mdb->query($table, "");

            $data = array('teachers' => $teachersArr);
            //使用helper的函数base_url()
            $this->load->helper('url');

            $this->load->view('professors', $data);
        }

        //查看教授详情
        public function details()
        {
            $tid = $this->uri->segment(3);

            if (empty($tid) || !is_numeric($tid)) 
            {
                echo json_encode(array('status'=>'99','msg'=>'参数出错!'));
                exit(0);
            }

            $table = 'teachers';
            $where = array('tid' => strval($tid));

            $mdb = MDBHelper::GenerateClient();
            $teachersArr = $mdb->query('teachers', array('tid' => 1));

            if (!empty($teachersArr) && (count($teachersArr) == 1) )
            {
                $data = array('teacher' => $teachersArr[0] );

                $this->load->helper('url');
                $this->load->view('instructor', $data);
            }
            else
            {
                $this->load->helper('url');
                $this->load->view('404');
            }
    

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