<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>最师（华南师范大学）</title>
    <link href="<?=base_url().'static/css/bootstrap.min.css'?>" rel="stylesheet">
    <link href="<?=base_url().'static/css/style.css'?>" rel='stylesheet' type='text/css' />



   <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
  
        
        <a href="<?=base_url()?>"  ><img src="<?=base_url().'static/images/Zuishi.png'?>" width="100px" height="50px"></a>
   <ul class="nav navbar-nav navbar-right">
        <li><a href="<?=base_url().'indexAction/goregister/'?>">注册</a></li>
        <li><a href="<?=base_url().'indexAction/gologin/'?>">登录</a></li>
      </ul>
      </div>
      </nav>



</head>
<body>
<img src="<?=base_url().'static/images/Zui.png'?>" style="position: absolute; left:40%; top: 22% ; "width="130px" height="110px" />
<img src="<?=base_url().'static/images/Shi.png'?>" style="position: absolute; left:50%; top: 22% ; "width="130px" height="110px" />
<img src="<?=base_url().'static/images/Search.png'?>" style="position: absolute; left:32%; top: 44% ; "width="450px" height="45px" />
    <form action="<?=base_url().'indexAction/search/'?>" method="post" class="left">

    <div style="display:inline; " id="center" > 
  <div  style="float:left">
    <input name="info" id="search" style="height:25px; width: 426px; font-size:18px; border-style:none;" size="50"  value="老师名/课程名"type="text" onfocus="Onfocus()" onblur="Onblur()" />&nbsp;&nbsp;&nbsp;&nbsp;</div>

    
  <div  style="float:left">
    <input name="search" style="height:35px;" type="image" src="<?=base_url().'static/images/SearchButton.png'?>" /></div>
  </div>
  
  <div  style="position: absolute; left:40%; top: 55%; width: 98%">
  <a href="<?=base_url().'indexAction/professors/'?>" style="color:#000000; font-weight: bold; text-decoration:underline;"  >名师简介</a>
   <a href="<?=base_url().'indexAction/rankprofessors/'?>" style="color:#000000; font-weight: bold; text-decoration:underline;"  > 我来评师</a>
    <a href="<?=base_url().'indexAction/lessons/'?>" style="color:#000000; font-weight: bold; text-decoration:underline;"  >相关课程</a>
     <a href="<?=base_url().'indexAction/freetalk/'?>" style="color:#000000; font-weight: bold; text-decoration:underline;"  >畅所欲言</a>
     </div>
</form>
</div>




<nav class="navbar navbar-inverse navbar-fixed-bottom">
  <div class="container">

    <ul class="nav navbar-nav navbar-right">
        <li><a href="mailto:371839782@qq.com">联系我们</a></li>

      </ul>
   
  </div>
</nav>

  <script type="text/javascript">
      var Search=document.getElementById("search");
    function Onfocus()
    {
     if(Search.value=="老师名/课程名")
     {
      Search.value="";
     }
    }
    function Onblur()
    {
     if(Search.value=="")
     {
      Search.value="老师名/课程名";
     }
    }
  </script>

      <script src="<?=base_url().'static/js/jquery-1.11.2.min.js'?>"></script>
      <script src="<?=base_url().'static/js/bootstrap.min.js'?>"></script>

</body>
</html>
