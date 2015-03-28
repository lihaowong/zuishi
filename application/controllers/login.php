<?php
/**
* 用户登录
* @author leoHuang
* 2015/03/28
**/
    class Login extends CI_Controller
    {
        function __construct()
        {
            parent::__construct();
        }

        public function index()
        {
            //接收用户名和密码
            $username = Utils::GetValue("text1");
            if (!empty($username) && (strlen($username) >= 4) && (strlen($username) <= 16))
            {
                $username = Utils::EscapeDBInput($username);
            }
            else
            {
                echo json_encode(array('status'=>'99','msg'=>'用户名格式不正确!'));
                exit(0);
            }

            $password = Utils::GetValue("text2");
            if (!empty($password) && strlen($password) >= 4 && strlen($password) <= 12)
            {
                $password = Utils::EscapeDBInput($password);
                $password = md5($password);
            }
            else
            {
                echo json_encode(array('status'=>'99','msg'=>'密码格式不正确!'));
                exit(0);
            }

            //检验用户书否存在
            $table = 'users';
            $where = array('username' => $username, 'password' => $password);

            $mdb = MDBHelper::GenerateClient();

            $userArr = $mdb->query($table, $where);

            if (!empty($userArr))
            {
                //登录成功，写入session
                
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
                $data = array('msg' => "用户不存在，请重新登录！" );

                //使用helper的函数base_url()
                $this->load->helper('url');

                $this->load->view('login',$data);
            }


        }

    }

?>