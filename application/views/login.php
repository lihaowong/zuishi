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
          <input type="text" class="form-control"  size="30" placeholder="老师名/课程名">
        </div>
        <button type="submit" class="btn btn-default">搜索</button>
      </form>

        
      </ul>
      </div>
      </nav>

</head>

<body>

<img src="<?=base_url().'static/images/Zui.png'?>" style="position: absolute; left:41%; top: 15% ; "width="100px" height="80px" />
<img src="<?=base_url().'static/images/Shi.png'?>" style="position: absolute; left:49%; top: 15% ; "width="100px" height="80px" />


<form name="form1" method="post"  action="<?=base_url().'login/'?>"  style="position: absolute; left:40%; top: 30% ; "> 
<table> 


<tr> <td style="color:#333333; font-weight: bold; "> 
     用户名： 
</td> <td> 
<input id="text1" type="text" name="text1" onblur="check()"> 
<div id="div1" style="display:inline"> 
</div> 
</td> 
</tr> 

<tr> <td style="color:#333333; font-weight: bold; "> 
     密码： 
</td> <td> 
<input id="text1" type="text" name="text2" onblur="check()"> 
<div id="div1" style="display:inline"> 
</div> 
</td> </tr> 

<tr > <td > 
    &nbsp; </td>
</tr> 


<tr> <td style="color:#333333; font-weight: bold; font-size: 9pt;"> 
<input name="" type="checkbox"  />记住密码
</td> </tr>

<tr><td></td><td align=right>
<a href="" style="color:#000000; font-weight: bold; text-decoration:underline;"  >忘记密码？</a>
</td></tr>

<tr><td></td><td align=right>
<a href="<?=base_url().'register/'?>" style="color:#000000; font-weight: bold; text-decoration:underline;"  >现在注册！</a>
</td></tr>

<tr > <td > 
    &nbsp; </td>
</tr> 

<tr> <td > 
</td> <td> 
<input style="height:35px;" type="image" src="<?=base_url().'static/images/LoginButton.png'?>" name="text7"> </td> </tr>


</table> 
</form>


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