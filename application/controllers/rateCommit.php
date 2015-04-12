<?php
/**
* 提交评论 1：评价教授 2：评价课程 3.畅所欲言
* @author leoHuang
* 2015/03
**/
    class RateCommit extends CI_Controller
    {
        function __construct()
        {
            parent::__construct();
        }

        public function index()
        {
            $userid = 0;
            $url = "";
            $typeArr = array(1, 2, 3);
            $scoreArr = array(0, 1, 2, 3, 4, 5);

            //判断登录状态
            if (!isset($_SESSION['username']))
            {
                echo json_encode(array('status'=>'999','msg'=>'请先登录!'));
                $this->load->helper('url');
                $this->load->view('login');
            }
            else
            {

                $rtype = intval(Utils::GetValue("rtype"));

                if (!in_array($rtype, $typeArr))
                {
                    echo json_encode(array('status'=>'99','msg'=>'参数出错!'));
                    exit(0);
                }

                //获取评论参数
                $targetid = Utils::GetValue("tid");
                $score1 = Utils::GetValue("score1");
                $score2 = Utils::GetValue("score2");
                $score3 = Utils::GetValue("score3");
                $comment = Utils::GetValue("textArea1");

                if (!in_array($score1, $scoreArr)|| !in_array($score2, $scoreArr)|| !in_array($score3, $scoreArr))
                {
                    echo json_encode(array('status'=>'99','msg'=>'parameter error!'));
                    exit(0);
                }
                $comment = Utils::EscapeDBInput($comment);
                
                //获取相关信息
                $username = $_SESSION['username'];

                //根据username获取userid
                $mdb = MDBHelper::GenerateClient();
                $userInfoArr = $mdb->query('users', array('username' => $username));
                if (!empty($userInfoArr))
                {
                    $userid = $userInfoArr[0]['userid'];
                }

                //获取记录编号rid
                $rid = $mdb->getRecNum('rankaction', "") + 1;
                
                $dataArr = array (
                      "comments" => $comment,
                      "rdate"=> date('Y-m-d H:i:s',time()),
                      "rid" => intval($rid),
                      "rtype" => $rtype,
                      "score1" => intval($score1),
                      "score2" => intval($score2),
                      "score3" => intval($score3),
                      "targetid" => intval($targetid) ,
                      "userid" => intval($userid),
                    );
                
                //存入数据库前判断是否存在，避免多次提交
                $commentArr = $mdb->query('rankaction', array('comments' => $comment));

                if (!empty($commentArr))
                {
                    //提交成功
                    if ($rtype == 1)
                    {
                        //评教授
                        $url = 'http://localhost/zuishi/indexAction/gorate/'.$targetid;
                    }
                    else if ($rtype == 2)
                    {
                        //评价课程
                        $url = 'http://localhost/zuishi/indexAction/lessondetails/'.$targetid;
                    }
                    else
                    {
                        //畅所欲言
                        $url = 'http://localhost/zuishi/indexAction/freetalk/';
                    }
                    
                    header("location:".$url);
                }
                else 
                {
                    if ($mdb->insert('rankaction', $dataArr))
                    {  
                        //提交成功
                        if ($rtype == 1)
                        {
                            //评教授
                            $url = 'http://localhost/zuishi/indexAction/gorate/'.$targetid;
                        }
                        else if ($rtype == 2)
                        {
                            //评价课程
                            $url = 'http://localhost/zuishi/indexAction/lessondetails/'.$targetid;
                        }
                        else
                        {
                            //畅所欲言
                            $url = 'http://localhost/zuishi/indexAction/freetalk/';
                        }
                        
                        header("location:".$url);

                        }
                    else
                    {
                        //提交失败
                        $this->load->helper('url');

                        $this->load->view('404', array('msg' => "评论提交失败！" ));
                    }
                }

            }

        }

    }

?>