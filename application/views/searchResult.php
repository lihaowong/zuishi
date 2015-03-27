<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>最师（华南师范大学）</title>
    <link href="<?=base_url().'static/css/bootstrap.min.css'?>" rel="stylesheet">
    <link href="<?=base_url().'static/css/style.css'?>" rel='stylesheet' type='text/css' />

 <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
  
        

    
        <a href="<?=base_url()?>" style="float: left;"><img src="<?=base_url().'static/images/Zuishi.png'?>" width="100px" height="50px"></a>
      
        <a class="navbar-brand" href="<?=base_url().'indexAction/professors/'?>" >名师简介</a>
        <a class="navbar-brand" href="<?=base_url().'indexAction/rankprofessors/'?>">我来评师</a>
        <a class="navbar-brand" href="<?=base_url().'indexAction/lessons/'?>">相关课程</a>
        <a class="navbar-brand" href="<?=base_url().'indexAction/freetalk/'?>">畅所欲言</a>
        

   <ul class="nav navbar-nav navbar-right">

    <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control"  size="30" placeholder="不满意？继续查找老师名/课程名">
        </div>
        <button type="submit" class="btn btn-default">搜索</button>
      </form>

        <li><a href="<?=base_url().'indexAction/goregister/'?>">注册</a></li>
        <li><a href="<?=base_url().'indexAction/gologin/'?>">登录</a></li>
      </ul>
      </div>
      </nav>
</head>

<body>

  <div  style="float:left"><input name="search" style="height:35px;" type="image" src="<?=base_url().'static/images/SearchButton.png'?>" /></div>
  </div>
  
</form>
</div>
<img src="<?=base_url().'static/images/RelatedInstructors.png'?>" style="position: absolute; left:35%; top: 15% ; "width="80px" height="23px" />
    <form action="" method="get" class="left">
    <img src="<?=base_url().'static/images/RelatedCourses.png'?>" style="position: absolute; left:60%; top: 15% ; "width="80px" height="23px" />
    <form action="" method="get" class="left">

<table border="0" style="position: absolute; left:28%; top: 22% ;"   width=250 align=center>
 
  <tr>
  <td rowspan="3">
  <img src="<?=base_url().'static/images/instructors/Tangyong.jpg'?>" width="80px" height="80px" />
    </td>
     <tr>
    <td align=center> <a href="RateInstructor.html" ><font size="5" style="font-weight: bold; ">
汤庸</a> </td>
    <td align=center>  男</td>   
    </tr>
    <tr>
  
    <td align=center> 计算机学院</td>
     <td align=center>  教授</td>
    </tr>
  </tr>
<tr > <td > 
    &nbsp; </td>
</tr> 
  <tr>
  <td rowspan="3">
  <img src="<?=base_url().'static/images/instructors/Lijianguo.jpg'?>" width="80px" height="80px" />
    </td>
     <tr>
    <td align=center> <a href="RateInstructor.html" ><font size="5" style="font-weight: bold; ">
李建国</a> </td>
    <td align=center>  男</td>   
    </tr>
    <tr>
  
    <td align=center> 计算机学院</td>
     <td align=center>  副教授</td>
    </tr>
  </tr>
<tr > <td > 
    &nbsp; </td>
</tr>

    <tr>
  <td rowspan="3">
  <img src="<?=base_url().'static/images/instructors/Xiaojing.jpg'?>" width="80px" height="80px" />
    </td>
     <tr>
    <td align=center> <a href="RateInstructor.html" ><font size="5" style="font-weight: bold; ">
肖菁</a> </td>
    <td align=center>  女</td>   
    </tr>
    <tr>
  
    <td align=center> 计算机学院</td>
     <td align=center>  副教授</td>
    </tr>
  </tr>
<tr > <td > 
    &nbsp; </td>
</tr>

</table>

<table border="0" style="position: absolute; left:53.3%; top: 22% ; "  width=300 align=center>
  <tr>
  <td rowspan="3">
  <img src="<?=base_url().'static/images/textbooks/DataStructure.jpg'?>" width="80px" height="80px" />
    </td>
     <tr>
    <td align=center> <a href="CommentCourse.html" ><font size="5" style="font-weight: bold; ">
数据结构</a> </td>
    <td align=center>  专业必修课</td>   
    </tr>
    <tr>
  
    <td align=center> 计算机学院</td>
     <td align=center> 黄煜廉 </td>
    </tr>
  </tr>
<tr > <td > 
    &nbsp; </td>
</tr>

<tr>
  <td rowspan="3">
  <img src="<?=base_url().'static/images/textbooks/Compilers.jpg'?>" width="80px" height="80px" />
    </td>
     <tr>
    <td align=center> <a href="CommentCourse.html" ><font size="5" style="font-weight: bold; ">
编译原理</a> </td>
    <td align=center>  专业任选课</td>   
    </tr>
    <tr>
  
    <td align=center> 计算机学院</td>
     <td align=center> 黄煜廉、詹泳 </td>
    </tr>
  </tr>
<tr > <td > 
    &nbsp; </td>
</tr>

<!--  for test
<tr>
  <td>
      sssssssssssss:<?php echo $search ;?>
  </td>
</tr>
-->

</table>


<nav class="navbar navbar-inverse navbar-fixed-bottom">
  <div class="container">

    <ul class="nav navbar-nav navbar-right">
        <li><a href="mailto:371839782@qq.com">联系我们</a></li>

      </ul>
   
  </div>
</nav>

      <script src="<?=base_url().'static/js/jquery-1.11.2.min.js'?>"></script>
      <script src="<?=base_url().'static/js/bootstrap.min.js'?>"></script>

</body>
</html>