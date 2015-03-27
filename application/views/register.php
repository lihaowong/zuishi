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

   <script language="javascript"> 
   function checkname(){ 
         var div = document.getElementById("div1"); 
         div.innerHTML = ""; 
         var name1 = document.form1.text1.value; 
         if (name1 == "") { 
           div.innerHTML = "<font size='2px' color='red' >用户名不能为空！</font>"; 
           document.form1.text1.focus(); 
           return false; 
                          } 

          if (name1.length < 4 || name1.length > 16) { 
           div.innerHTML = "<font size='2px' color='red' >用户名输入的长度区间为4-16个字符！</font>"; 
           document.form1.text1.select(); 
           return false; 
            } 

           var charname1 = name1.toLowerCase(); 
           for (var i = 0; i < name1.length; i++) { 
           var charname = charname1.charAt(i); 
           if (!(charname >= 0 && charname <= 9) && (!(charname >= 'a' && charname <= 'z')) && (charname != '_')) { 
            div.innerHTML = "<font size='2px' color='red' >用户名包含非法字母，只能包含字母，数字，和下划线！</font>"; 
            document.form1.text1.select(); 
            return false; 
                                                 } 
                        }

            $.ajax({
             type: "GET",
             url: "<?=base_url().'register/checkusername/'?>",
             data: {username:name1},
             dataType: "json",
             success: function(data){
                    if (data){
                      if (data.status == 1){
                          div.innerHTML = "<font size='2px' color='red' >该用户名已经被占用！</font>";
                      }
                    }
                }

         });

                return true;

                         }

    function checkpassword(){ 
        var div = document.getElementById("div2"); 
        div.innerHTML = ""; 
        var password = document.form1.text2.value; 
        if (password == "") { 
            div.innerHTML = "<font size='2px' color='red' >密码不能为空！</font>"; 
            document.form1.text2.focus(); 
             return false; 
        } 
        if (password.length < 4 || password.length > 12) { 
            div.innerHTML = "<font size='2px' color='red' >密码长度必须在4-12位！</font>"; 
            document.form1.text2.select(); 
            return false; 
        } 
        return true; 
    }

 function checkrepass(){ 
        var div = document.getElementById("div3"); 
        div.innerHTML = ""; 
        var password = document.form1.text2.value; 
        var repassword = document.form1.text3.value; 
      
        if (password != repassword) { 
            div.innerHTML = "<font size='2px' color='red' >确认密码长度与密码不相同！</font>"; 
            document.form1.text3.select(); 
            return false; 
        } 
        return true; 
    }

 

function check(){ 
if (checkname() && checkpassword() && checkrepass() ) { 
return true; 
} 
else { 
    return false; 
     }  
} 
</script> 
</head>


<body>
<img src="<?=base_url().'static/images/Zui.png'?>" style="position: absolute; left:41%; top: 15% ; "width="100px" height="80px" />
<img src="<?=base_url().'static/images/Shi.png'?>" style="position: absolute; left:49%; top: 15% ; "width="100px" height="80px" />

<form name="form1" method="post" action="<?=base_url().'register/'?>" onsubmit="return check()" style="position: absolute; left:40%; top: 30% ; "> 
<table> 

 <tr style="color:#00008D; font-weight: bold; "> <td > 
     账户信息</td>
</tr> 

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
<input id="text2" type="password" name="text2" onblur="check()"> 
<div id="div2" style="display:inline"> 
</div> </td> </tr> 

<tr> <td style="color:#333333; font-weight: bold; "> 
确认密码： 
</td> <td> 
<input id="text3" type="password" name="text3" onblur="check()"> 
<div id="div3" style="display:inline"> 
</div> </td> </tr>

<tr > <td > 
    &nbsp; </td>
</tr> 
 <tr style="color:#00008D; font-weight: bold; "> <td>
     个人资料</td>
</tr> 


<tr> <td style="color:#333333; font-weight: bold; "> 
姓名：&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
</td> <td> 
<input id="text4"  name="text4" onblur="check()"> 
<div id="div4" style="display:inline"> 
</div> </td> </tr>

<tr> <td style="color:#333333; font-weight: bold; "> 
学院：&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
</td> <td> 
<select name="apartment">
  <option value ="blank"></option>
  <option value ="chinese">文学院</option>
  <option value="history">历史文化学院</option>
  <option value="law">法学院</option>
  <option value="politics">政治与行政学院</option>
  <option value="economics">经济与管理学院</option>
  <option value="education">教育科学学院</option>
  <option value="psychology">心理学院</option>
  <option value="english">外国语言文化学院</option>
  <option value="management">公共管理学院</option>
  <option value="pe">体育科学学院</option>
  <option value="biology">生命科学学院</option>
  <option value="journalism">教育信息技术学院</option>
  <option value="light">信息光电子科技学院</option>
  <option value="physics">物理与电信工程学院</option>
  <option value="math">数学科学学院</option>
  <option value="chemistry">化学与环境学院</option>
  <option value="cs">计算机学院</option>
  <option value="se">软件学院</option>
  <option value="geography">地理科学学院</option>
  <option value="tourism">旅游管理学院</option>
  <option value="music">音乐学院</option>
  <option value="art">美术学院</option>
</select>
<div id="div5" style="display:inline"> 
</div> </td> </tr>
<tr> <td style="color:#333333; font-weight: bold; "> 
年级：&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
</td> <td> 
<select name="grade">
  <option value ="blank"></option>
  <option value ="freshman">大一</option>
  <option value ="sophomore">大二</option>
  <option value ="junior">大三</option>
  <option value ="senior">大四</option>
  <option value ="graduate">研究生</option>
</select>
<div id="div5" style="display:inline"> 
</div> </td> </tr>

<tr > <td > 
    &nbsp; </td>
</tr> 

<!-- 若存在警告信息 -->
<tr > 
  <td > 
    <div id="div6"> 
        <?php if($msg){echo $msg;} ?>
    </div> 
  </td>
</tr> 


<tr> <td > 
</td> <td> 
<input   style="height:35px; " type="image" src="<?=base_url().'static/images/RegisterButton.png'?>">&nbsp;&nbsp;<input style="height:35px;" type="image" onclick="reset();" src="<?=base_url().'static/images/ResetButton.png'?>" name="text7"> 
<div id="div4" style="display:inline"> 
</div> </td> </tr>


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