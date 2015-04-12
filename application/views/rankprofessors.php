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
          <input type="text" class="form-control" name="info" size="30" placeholder="老师名/课程名">
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
 <span id="spanFirst"  style="position: absolute; left:16%; top: 10% ; ">第一页</span> 
 <span id="spanPre" style="position: absolute; left:20%; top: 10% ; ">上一页</span> 
 <span id="spanNext" style="position: absolute; left:24%; top: 10% ; ">下一页</span> 
 <span id="spanLast" style="position: absolute; left:28%; top: 10% ; ">最后一页</span> 
 <font  style="position: absolute; left:71%; top: 10% ; ">
第</font>

 <span id="spanPageNum" style="position: absolute; left:72.5%; top: 10% ; "></span>
  <font  style="position: absolute; left:74%; top: 10% ; ">
页</font>

 <font  style="position: absolute; left:77%; top: 10% ; ">
共</font>
 <span id="spanTotalPage" style="position: absolute; left:78.5%; top: 10% ; "></span>
  <font  style="position: absolute; left:80%; top: 10% ; ">
页</font>



<table style="position: absolute; left:15%; top: 15% ; word-break:break-all;"   class="table table-striped table-hover table-condensed" >
  <tr align=center style="color:#000000; font-weight: bold; font-size:18px;"> 
    <th style="text-align:center;">姓名</th>
    <th style="text-align:center;">学院</th>
    <th style="text-align:center;">表达清晰</th>
    <th style="text-align:center;">教学严谨</th>
    <th style="text-align:center;">热情耐心</th>
    <th style="text-align:center;">总体评价</th>
    <th style="text-align:center;">评价人数</th>
   <tbody id="table2">
  <?php 
    foreach ($rankRecs as $key => $rankRec) 
    {
  ?>
  <tr align=center style=" font-size:15px;">
    <td> <a href="<?=base_url().'indexAction/gorate/'.$key.'/'?>"><?=$rankRec['tname']?></a></td>
    <td> <?=$rankRec['tapartment']?></td>
    <td> <?=$rankRec['score1']?></td>
    <td> <?=$rankRec['score2']?></td>
    <td> <?=$rankRec['score3']?></td>
    <td style="color:#FF0000; font-weight: bold; font-size:20px;"> <?=$rankRec['total']?></td>
    <td> <?=$rankRec['cnum']?></td>
  </tr>
  <?php 
    }
  ?>
</tbody>
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


 <script>
     var theTable = document.getElementById("table2");
     var totalPage = document.getElementById("spanTotalPage");
     var pageNum = document.getElementById("spanPageNum");


     var spanPre = document.getElementById("spanPre");
     var spanNext = document.getElementById("spanNext");
     var spanFirst = document.getElementById("spanFirst");
     var spanLast = document.getElementById("spanLast");


     var numberRowsInTable = theTable.rows.length;
     var pageSize = 15;
     var page = 1;


     //下一页
     function next() {


         hideTable();


         currentRow = pageSize * page;
         maxRow = currentRow + pageSize;
         if (maxRow > numberRowsInTable) maxRow = numberRowsInTable;
         for (var i = currentRow; i < maxRow; i++) {
             theTable.rows[i].style.display = '';
         }
         page++;


         if (maxRow == numberRowsInTable) { nextText(); lastText(); }
         showPage();
         preLink();
         firstLink();
     }


     //上一页
     function pre() {


         hideTable();


         page--;


         currentRow = pageSize * page;
         maxRow = currentRow - pageSize;
         if (currentRow > numberRowsInTable) currentRow = numberRowsInTable;
         for (var i = maxRow; i < currentRow; i++) {
             theTable.rows[i].style.display = '';
         }




         if (maxRow == 0) { preText(); firstText(); }
         showPage();
         nextLink();
         lastLink();
     }


     //第一页
     function first() {
         hideTable();
         page = 1;
         for (var i = 0; i < pageSize; i++) {
             theTable.rows[i].style.display = '';
         }
         showPage();


         preText();
         nextLink();
         lastLink();
     }


     //最后一页
     function last() {
         hideTable();
         page = pageCount();
         currentRow = pageSize * (page - 1);
         for (var i = currentRow; i < numberRowsInTable; i++) {
             theTable.rows[i].style.display = '';
         }
         showPage();


         preLink();
         nextText();
         firstLink();
     }


     function hideTable() {
         for (var i = 0; i < numberRowsInTable; i++) {
             theTable.rows[i].style.display = 'none';
         }
     }


     function showPage() {
         pageNum.innerHTML = page;
     }


     //总共页数
     function pageCount() {
         var count = 0;
         if (numberRowsInTable % pageSize != 0) count = 1;
         return parseInt(numberRowsInTable / pageSize) + count;
     }


     //显示链接
     function preLink() { spanPre.innerHTML = "<a href='javascript:pre();'>上一页</a>"; }
     function preText() { spanPre.innerHTML = "上一页"; }


     function nextLink() { spanNext.innerHTML = "<a href='javascript:next();'>下一页</a>"; }
     function nextText() { spanNext.innerHTML = "下一页"; }


     function firstLink() { spanFirst.innerHTML = "<a href='javascript:first();'>第一页</a>"; }
     function firstText() { spanFirst.innerHTML = "第一页"; }


     function lastLink() { spanLast.innerHTML = "<a href='javascript:last();'>最后一页</a>"; }
     function lastText() { spanLast.innerHTML = "最后一页"; }


     //隐藏表格
     function hide() {
         for (var i = pageSize; i < numberRowsInTable; i++) {
             theTable.rows[i].style.display = 'none';
         }


         totalPage.innerHTML = pageCount();
         pageNum.innerHTML = '1';


         nextLink();
         lastLink();
     }


     hide();
</script>

