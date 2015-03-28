<?php
/**
* 用户注册
* @author leoHuang
* 2015/03/27
**/
    class Register extends CI_Controller
    {
        function __construct()
        {
            parent::__construct();
        }

        //相应注册页面的用户名查重请求
        public function checkusername()
        {
            $username = Utils::GetValue("username");
            if (!empty($username) && (strlen($username) >= 4) && (strlen($username) <= 16))
            {
                $username = Utils::EscapeDBInput($username);

                //查询数据库
                $table = 'users';
                $where = array('username' => $username );

                $mdb = MDBHelper::GenerateClient();

                $data = $mdb->query($table, $where);

                if (!empty($data))
                {
                    echo json_encode(array('status'=>'1','msg'=>'此用户名已经被占用!'));
                    exit(0);
                }
                else
                {
                    echo json_encode(array('status'=>'2','msg'=>'此用户名可用!'));
                    exit(0);
                }
            }
            else
            {
                exit(0);
            }

        }

        public function index()
        {
            //学院对应数组
            $apartmentArr = array(
                'blank' => "", 
                'chinese' => "文学院", 
                'history' => "历史文化学院", 
                'law' => "法学院", 
                'politics' => "政治与行政学院", 
                'economics' => "经济与管理学院", 
                'education' => "教育科学学院", 
                'psychology' => "心理学院", 
                'english' => "外国语言文化学院", 
                'management' => "公共管理学院", 
                'pe' => "体育科学学院", 
                'biology' => "生命科学学院", 
                'journalism' => "教育信息技术学院", 
                'light' => "信息光电子科技学院", 
                'physics' => "物理与电信工程学院", 
                'math' => "数学科学学院", 
                'chemistry' => "化学与环境学院", 
                'cs' => "计算机学院", 
                'se' => "软件学院", 
                'geography' => "地理科学学院", 
                'tourism' => "旅游管理学院", 
                'music' => "音乐学院", 
                'art' => "美术学院"
                );

            $gradeArr = array(
                'blank' => "",
                'freshman' => "大一",
                'sophomore' => "大二",
                'junior' => "大三",
                'senior' => "大四",
                'graduate' => "研究生"
             );

            //获取用户注册信息
            $username = Utils::GetValue("text1");

            if (!empty($username) && (strlen($username) >= 4) && (strlen($username) <= 16))
            {
                $username = Utils::EscapeDBInput($username);
            }
            else
            {
                exit(0);
            }

            $password = Utils::GetValue("text2");
            $password2 = Utils::GetValue("text3");

            if (!empty($password) && !empty($password2) && ( $password == $password2 ) && strlen($password) >= 4 && strlen($password) <= 12)
            {
                $password = Utils::EscapeDBInput($password);
                $password = md5($password);
            }
            else
            {
                exit(0);
            }

            $realname = Utils::GetValue("text4");

            if (!empty($realname))
            {
                $realname = Utils::EscapeDBInput($realname);
            }
            else
            {
                exit(0);
            }

            $apartment = Utils::GetValue("apartment");

            if (!empty($apartment) && array_key_exists($apartment, $apartmentArr))
            {
                $apartment = $apartmentArr[$apartment];
            }
            else
            {
                exit(0);
            }

            $grade = Utils::GetValue("grade");
            if (!empty($grade) && array_key_exists($grade, $gradeArr))
            {
                $grade = $gradeArr[$grade];
            }
            else
            {
                exit(0);
            }

            //echo "username: ".$username."password: ".$password."realname: ".$realname."apartment: ".$apartment."grade: ".$grade;

            //查询当前users表的记录数
            $table = 'users';

            $mdb = MDBHelper::GenerateClient();

            $userid = $mdb->getRecNum($table, "") + 1;

            //写入users表
            $data = array(
                  "userid" => $userid,       
                  "username" => $username,    
                  "password" => $password,    
                  "realname" => $realname,    
                  "type" => 1,           //用户类型：1普通用户，2管理员
                  "apartment" => $apartment,    //院系
                  "grade" => $grade,           //年级
                  "uimage" => "images/users/default.jpg"
                 );

            //存入数据库前判断是否存在，避免多次提交
            $nameArr = $mdb->query('users', array('username' => $username));

            if (!empty($nameArr))
            {
                    //注册成功，存入session，跳转到主页或评师页面
                    
                    if (!isset($_SESSION['username']))
                    {
                        $_SESSION['username'] = $username;
                    } 
                    //使用$_SESSION['username']

                    //使用helper的函数base_url()
                    $this->load->helper('url');

                    $this->load->view('index');
            }
            else
            {
                if ($mdb->insert($table, $data))
                {
                    //注册成功，存入session，跳转到主页或评师页面
                    
                    if (!isset($_SESSION['username']))
                    {
                        $_SESSION['username'] = $username;
                    } 
                    //使用$_SESSION['username']

                    //使用helper的函数base_url()
                    $this->load->helper('url');

                    $this->load->view('index');

                }
                else
                {
                    //注册失败，重新提交
                    $data = array('msg' => "注册失败，请重新提交" );

                    //使用helper的函数base_url()
                    $this->load->helper('url');

                    $this->load->view('register',$data);
                }
            }
            
        }


    }

?>