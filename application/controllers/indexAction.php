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

            $tid = intval($tid);
            $table = 'teachers';
            $where = array('tid' =>$tid );

            $mdb = MDBHelper::GenerateClient();
            $teachersArr = $mdb->query($table, $where);

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
            $score1 = 0;
            $score2 = 0;
            $score3 = 0;
            $recordNum = 0;
            $rankData = array();

            //获取评价教授信息
            $table = 'rankaction';
            $where = array('rtype' =>1 );

            $mdb = MDBHelper::GenerateClient();
            $rankResArr = $mdb->query($table, $where);

            //根据targetid为key建立数组
            foreach ($rankResArr as $key => $rankRes) 
            {
                $rankResArrSorted[$rankRes['targetid']][] = $rankRes;
            }

            //根据targetid查找评价对象相关信息
            foreach ($rankResArrSorted as $key => $targetrankArr) 
            {
                $recordNum = count($targetrankArr);
                $targetid = $key;

                $teacherInfo = $mdb->query('teachers', array('tid' =>intval($targetid)));

                if (!empty($teacherInfo) && (count($teacherInfo) == 1) )
                {
                    $rankData[$key]['tname'] = $teacherInfo[0]['tname'];
                    $rankData[$key]['tapartment'] = $teacherInfo[0]['tapartment'];


                    foreach ($targetrankArr as $num => $targetrank) 
                    {
                        //根据$key获取score1,score2,score3的总数
                        $score1 += $targetrank['score1'];
                        $score2 += $targetrank['score2'];
                        $score3 += $targetrank['score3'];
                    }

                    //获取score1,score2,score3的平均数
                    $scoreAvg1 = $score1 / $recordNum;
                    $scoreAvg2 = $score2 / $recordNum;
                    $scoreAvg3 = $score3 / $recordNum;
                    $totalScore = ($scoreAvg1 + $scoreAvg2 + $scoreAvg3) / 3;
    
                    $rankData[$key]['score1'] = round($scoreAvg1,1);
                    $rankData[$key]['score2'] = round($scoreAvg2,1);
                    $rankData[$key]['score3'] = round($scoreAvg3,1);
                    $rankData[$key]['total'] = round($totalScore,1);
                    //评价人数
                    $rankData[$key]['cnum'] = $recordNum;
                }
            }

            unset($rankResArrSorted);
            $retdata = array('rankRecs' => $rankData);
            //使用helper的函数base_url()
            $this->load->helper('url');

            $this->load->view('rankprofessors', $retdata);
        }

        //相关课程
        public function lessons()
        {
            //从数据库获取课程相关信息
            $table = "lessons";

            $mdb = MDBHelper::GenerateClient();
            $teachersArr = $mdb->query($table, "");

            $data = array('lessons' => $teachersArr);


            //使用helper的函数base_url()
            $this->load->helper('url');

            $this->load->view('lessons', $data);
        }

        //查看某课程详细信息
        public function lessondetails()
        {
            $lid = $this->uri->segment(3);

            if (empty($lid) || !is_numeric($lid)) 
            {
                echo json_encode(array('status'=>'99','msg'=>'参数出错!'));
                exit(0);
            }

            $lid = intval($lid);
            $table = 'lessons';
            $where = array('lid' =>$lid );

            $mdb = MDBHelper::GenerateClient();
            $lessonsArr = $mdb->query($table, $where);

            //获取课程相关评论
            $commentArr = $mdb->query('rankaction', array('rtype' => 2, 'targetid' => $lid));

            //根据userId获取用户相关信息
            foreach ($commentArr as $key => $comment) 
            {
                $userid = $comment['userid'];

                $userInfo = $mdb->query('users', array('userid' =>intval($userid)));

                if (!empty($userInfo) && (count($userInfo) == 1) )
                {
                    $commentArr[$key]['num'] = $key + 1;
                    $commentArr[$key]['username'] = $userInfo[0]['username'];
                    $commentArr[$key]['apartment'] = $userInfo[0]['apartment'];
                }
            }

            if (!empty($lessonsArr) && (count($lessonsArr) == 1) )
            {
                $data = array('lesson' => $lessonsArr[0], 'comments' => $commentArr);

                $this->load->helper('url');
                $this->load->view('ratecourse', $data);
            }
            else
            {
                $this->load->helper('url');
                $this->load->view('404');
            }
        }

        //畅所欲言
        public function freetalk()
        {
            //获取数据库畅所欲言的数据
            $table = 'rankaction';
            $where = array('rtype' =>3 );

            $mdb = MDBHelper::GenerateClient();
            $freetalkArr = $mdb->query($table, $where);

            //根据userId获取用户相关信息
            foreach ($freetalkArr as $key => $freetalk) 
            {
                $userid = $freetalk['userid'];

                $userInfo = $mdb->query('users', array('userid' =>intval($userid)));

                if (!empty($userInfo) && (count($userInfo) == 1) )
                {
                    $freetalkArr[$key]['num'] = $key + 1;
                    $freetalkArr[$key]['username'] = $userInfo[0]['username'];
                    $freetalkArr[$key]['apartment'] = $userInfo[0]['apartment'];
                }
            }

            $data = array('freetalks' => $freetalkArr );

            //使用helper的函数base_url()
            $this->load->helper('url');

            $this->load->view('freetalk', $data);
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