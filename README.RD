1.环境说明：
php版本5.3.7
MongoDB版本2.4.6
需先添加php-Mongo扩展

2.数据库名：zuishi
配置文件：/application/config/mongo.php

3.数据库表结构
(1)用户信息表
users:(json)
{
  "userid": 1,          //用户id
  "username": "leo",	//用户名
  "password": "leo",	//密码
  "realname": "leo",	//真实姓名
  "type": 1,			//用户类型：1普通用户，2管理员
  "apartment": "school of computer",	//院系
  "grade": 4,			//年级
  "uimage": "images/users/default.jpg"
}

(2)教授信息表
teachers:(json)
{
   "tid": 1,            //教授id
   "tname": "汤庸",     //教授姓名
   "tsex": "男",		//教授性别
   "trank": "教授",		//教授职称
   "tapartment": "计算机学院",  				//教授院系
   "image": "images/instructors/Tangyong.jpg",  //教授照片地址
   "tarea": "社交网络与大数据应用……",			//研究领域
   "tintroduce": "汤庸，湖南张家界人。……"		//教授简介
}

(3)课程信息表
lessons:(json)
{
    "lid":1,                    //课程id
    "lname": "数据结构",        //课程名
    "ltype": "专业必修课"
    "lapartment": "计算机学院", //开课学院
    "lteachers": "黄煜廉",      //授课老师
    "limage": "images/textbooks/DataStructure.jpg"   //课本图片
    "linfo": "数据结构是一门……"                      //课程简介
}

(4)评价行为表
rankaction:(json)
{
	"rid": 1,			//行为id
  "rtype": 1,         //评价类型1：教授 2：课程 3.畅所欲言
	"targetid": 1,		//所评价教授或课程id
	"userid": 1,		//进行评价的用户id
	"score": "1:4,2:3,3:4",	//1:表达清晰分数 2:教学严谨分数 3.热情耐心分数
	"comments": "我很喜欢这个老师",		//用户评价
	"rdate": "2015-03-26 20:00:00"		//评价时间
}

4.MongoDB数据库操作类：
MDBUtils.php
MDBHelper.php

