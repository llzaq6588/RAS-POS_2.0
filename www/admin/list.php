<?php
	require_once('login.php');
?>
<html><!--등록된 상품정보를 출력하는 code이다.-->
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">

<title>우리슈퍼 상품현황</title>
</head>
<body>

<p align="center"><span style="font-size:48pt;"><font face="휴먼둥근헤드라인">상품 현황</font></span></p>
<!--상품검색을 원하는 경우 바코드와 상품명으로 검색이 가능하다. 다만 이름으로 검색할 경우에는 이름이 "반드시 정확"해야 한다. 그 이유에 대해서는 list_search_name.php의 line50의 각주를 참고하기를 바란다.-->
<form name="form1" method="post" action="list_search_code.php">
    <p align="center"><font face="HY울릉도B"><span style="font-size:24pt;">상품</span></font><span style="font-size:24pt;"> </span><font face="HY울릉도B"><span style="font-size:24pt;">검색</span></font><span style="font-size:16pt;"></span></p>
    <p align="center"><font face="HY울릉도B"><span style="font-size:16pt;">바코드로</span></font><span style="font-size:16pt;"><font face="굴림">&nbsp;</font><font face="HY울릉도B">찾아보기</font><font face="굴림">&nbsp;</font><font face="HY울릉도B">:</font> <font face="HY울릉도B"><input type="text" name="code" style="font-family:HY울릉도B; font-size:24;"></font><font face="굴림">&nbsp;<input type="submit" name="search" value="검색" style="font-family:HY울릉도B; font-size:24;">&nbsp;</font></span></p>
	<!--바코드는 변수 code로 선언되어 list_search_code.php로 넘어간다.-->
</form>
<form name="form2" action="list_search_name.php" method="post">
    <p align="center"><font face="HY울릉도B"><span style="font-size:16pt;">이름로</span></font><span style="font-size:16pt;"><font face="굴림">&nbsp;</font><font face="HY울릉도B">찾아보기</font><font face="굴림">&nbsp;</font><font face="HY울릉도B">:</font><font face="굴림">&nbsp; </font><font face="HY울릉도B"><input type="text" name="name" style="font-family:HY울릉도B; font-size:24;"></font><font face="굴림">&nbsp;<input type="submit" name="search" value="검색" style="font-family:HY울릉도B; font-size:24;">&nbsp;</font></span></p>
    <p align="center"><font face="HY울릉도B"><span style="font-size:14pt;"></span></font></p>
	<!--상품이름은 변수 name으로 선언되어 list_search_name.php로 넘어간다.-->
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table border="1" width="1268" align="center">
    <tr>
        <td width="234">
            <p align="center"><font face="HY울릉도B"><span style="font-size:24pt;">상품등록날짜</span></font></p>
</td>
        <td width="416">            

            <p align="center"><font face="HY울릉도B"><span style="font-size:24pt;">바코드</span></font></p>
</td>
        <td width="378">

            <p align="center"><font face="HY울릉도B"><span style="font-size:24pt;">상품이름</span></font></p>
</td>
        <td width="212">

            <p align="center"><font face="HY울릉도B"><span style="font-size:24pt;">상품가격</span></font></p>
</td>
    </tr>
    <tr>
        <td width="234" height="27">
            <p align="center" style="line-height:200%;"><font face="HY울릉도M"><span style="font-size:24pt;"><?php

// 전체 상품목록에 대한 출력문으로 code, name, price값이 나온다.

$hostname = "localhost";
$username = "raspos";
$password = "raspospw";
$dbname = "raspos"; 
 
$connect = mysql_connect($hostname, $username, $password) or die("MySQL Server 연결에 실패했습니다");
mysql_select_db($dbname,$connect);
 
$sql="select * from price"; 
 
$result=mysql_query($sql);
 
while($array=mysql_fetch_array($result)){ 
 

echo $array[date] . '<br/>'; 
 

mysql_close($connect);

}
?></span></font></p>
</td>
        <td width="416" height="27">                                    <p align="center" style="line-height:200%;">
<font face="HY울릉도B"><span style="font-size:24pt;"><?php

// 전체 상품목록에 대한 출력문으로 code, name, price값이 나온다.

$hostname = "localhost";
$username = "raspos";
$password = "raspospw";
$dbname = "raspos"; 
 
$connect = mysql_connect($hostname, $username, $password) or die("MySQL Server 연결에 실패했습니다");
mysql_select_db($dbname,$connect);
 
$sql="select * from price"; 
 
$result=mysql_query($sql);
 
while($array=mysql_fetch_array($result)){ 
 

echo $array[code] . '<br/>'; 
 

mysql_close($connect);

}
?></span></font></p>
</td>
        <td width="378" height="27">		
            <p align="center" style="line-height:200%;">
<font face="HY울릉도B"><span style="font-size:24pt;"><?php


$hostname = "localhost";
$username = "raspos";
$password = "raspospw";
$dbname = "raspos";
 
$connect = mysql_connect($hostname, $username, $password) or die("MySQL Server 연결에 실패했습니다");
mysql_select_db($dbname,$connect);
 
$sql="select * from price"; 
 
$result=mysql_query($sql);
 
while($array=mysql_fetch_array($result)){ 
 

echo $array[name] . '<br/>'; 
 

mysql_close($connect);

}
?></span></font></p>
</td>
        <td width="212" height="27">

            <p align="center" style="line-height:200%;">
<font face="HY울릉도B"><span style="font-size:24pt;"><?php


$hostname = "localhost";
$username = "raspos";
$password = "raspospw";
$dbname = "raspos"; 
 
$connect = mysql_connect($hostname, $username, $password) or die("MySQL Server 연결에 실패했습니다"); 
mysql_select_db($dbname,$connect); 
 
$sql="select * from price"; 
 
$result=mysql_query($sql);
 
while($array=mysql_fetch_array($result)){ 
 

echo $array[price] . '원 <br/>'; 

 

mysql_close($connect);

}
?>
</span></font></p>
</td>
    </tr>
</table>&nbsp;
<p>&nbsp;</p>
</body>
</html> <!--builded Web-Application by KAERIUS-->