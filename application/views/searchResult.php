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

    <form action="<?=base_url().'indexAction/search/'?>" class="navbar-form navbar-left" role="search" >
        <div class="form-group">
          <input type="text" class="form-control" name="info" size="30" placeholder="不满意？继续查找老师名/课程名">
        </div>
        <button type="submit" class="btn btn-default">搜索</button>
      </form>

        <?php if (isset($_SESSION['username'])) {
          echo "<li><a>欢迎你，".$_SESSION['username']."</a></li>
          <li><a href='".base_url()."indexAction/logout/'>退出</a></li>"; }
              else { echo "<li><a href='".base_url()."indexAction/goregister/'>注册</a></li>
                          <li><a href='".base_url()."indexAction/gologin/'>登录</a></li>" ;}?>
      </ul>
      </div>
      </nav>
</head>

<body>


</form>
</div>
<img src="<?=base_url().'static/images/RelatedInstructors.png'?>" style="position: absolute; left:35%; top: 15% ; "width="80px" height="23px" />
    <form action="" method="get" class="left">
    <img src="<?=base_url().'static/images/RelatedCourses.png'?>" style="position: absolute; left:60%; top: 15% ; "width="80px" height="23px" />
    <form action="" method="get" class="left">

<table border="0" style="position: absolute; left:28%; top: 22% ;"   width=250 align=center>

 <?php if (isset($teacher))
 {
 ?>
    <tr>
    <td rowspan="3">
    <img src="<?=base_url().'static/'.$teacher['image'] ?>" width="80px" height="80px" />
      </td>
       <tr>
      <td align=center> <a href="<?=base_url().'indexAction/details/'.$teacher['tid'].'/'?>" >
        <font size="5" style="font-weight: bold; ">
            <?=$teacher['tname']?></a> </td>
      <td align=center>  <?=$teacher['tsex']?></td>   
      </tr>
      <tr>
    
      <td align=center> <?=$teacher['trank']?></td>
       <td align=center>  <?=$teacher['tapartment']?></td>
      </tr>
    </tr>
    <tr > <td > 
        &nbsp; </td>
    </tr> 
 <?php 
  }
 ?>

 

</table>

<table border="0" style="position: absolute; left:53.3%; top: 22% ; "  width=300 align=center>

<?php if (isset($lesson))
 {
 ?>
    <tr>
    <td rowspan="3">
    <img src="<?=base_url().'static/'.$lesson['limage'] ?>" width="80px" height="80px" />
      </td>
       <tr>
      <td align=center> <a href="<?=base_url().'indexAction/lessondetails/'.$lesson['lid'].'/'?>" >
        <font size="5" style="font-weight: bold; ">
            <?=$lesson['lname']?></a> </td>
      <td align=center>  <?=$lesson['ltype']?></td>   
      </tr>
      <tr>
    
      <td align=center> <?=$lesson['lapartment']?></td>
       <td align=center>  <?=$lesson['lteachers']?></td>
      </tr>
    </tr>
    <tr > <td > 
        &nbsp; </td>
    </tr> 
 <?php 
  }
 ?>
  


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