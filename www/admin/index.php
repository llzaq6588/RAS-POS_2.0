<?php
	require_once('login.php');
?>

<html><!--상품관리 포스트의 매인관리부분인 상품리스트보기, 매상장부 보기, 월별 판매 그래프들을 나타낸다. RAS-POS 1.5ver 이전에는 하나로 통합되었던 화면이 가독성의 향상을 위하여 3개의 웹페이지로 분리되었다.-->

<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<title>상품 관리 post</title>
<base target="contents">
</head>

<body bgcolor="white" text="black" link="blue" vlink="purple" alink="red">
<form name="form3" target="_blank" action="list.php"  target="_blank">
    <p align="center"><b><span style="font-size:48pt;"><font face="HY울릉도B">상품관리</font></span></b></p> </form>
<table border="1" width="1306" bordercolor="white" bordercolordark="white" bordercolorlight="white">
    <tr>
        <td width="396" bordercolor="white" bordercolordark="white" bordercolorlight="white" height="59">
            <form name="form5" target="_blank" action="list.php">
                <p align="center"><input type="submit" name="list" value="상품리스트보기" style="font-family:HY울릉도B; font-size:36;"></p> 
            </form>
</td>
        <td width="421" bordercolor="white" bordercolordark="white" bordercolorlight="white" height="59">
            <form name="form6" target="_blank" action="sold_book.php">
                <p align="center"><input type="submit" name="sold_list" value="매상장부보기" style="font-family:HY울릉도B; font-size:36;"></p> 
            </form>
</td>
        <td width="467" bordercolor="white" bordercolordark="white" bordercolorlight="white" height="59">
		
<form name="form1" method="post" action="yearchart.php" target="_blank">
    <p align="center"><span style="font-size:22pt;"><font face="HY울릉도M">월별 판매 그래프 : </font></span><select name="year" size="1" style="font-family:HY울릉도B; font-size:24;">
        <option selected>판매년도</option>

<?php //RAS-POS 1.5ver부터 추가되는 기능이다. 월별 정보를 차트로 출력한다. 자세한 정보는 yearchart.php를 참고하라.

$hostname = "localhost";
$username = "raspos";
$password = "raspospw";
$dbname = "raspos";
 
$connect = mysql_connect($hostname, $username, $password) or die("MySQL Server 연결에 실패했습니다");
mysql_select_db($dbname,$connect);
 
$sql="SELECT distinct(year) FROM sold_book";  

$result=mysql_query($sql);
 
while($row=mysql_fetch_array($result)){ 
 
echo '<option value="' . $row[year] . '">' . $row[year] . '</option>';//반복되는 년도는 과감하게 없애버린다.

mysql_close($connect);

}
?>

</select> <input type="submit" name="search" value="검색" style="font-family:HY울릉도B; font-size:24;"></p>
    <p align="center"><font face="HY울릉도M"></font></p>
</form> <!--year과 month를 입력받은 폼은 yearchart.php로 정보를 넘겨준다.-->
		
		
		
		
		</td>
    </tr>
</table><p align="center"><iframe name="ifrm1" src="insertprice.php" width="650" height="1000" frameborder="1"></iframe>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<iframe name="ifrm2" src="deleteprice.php" width="650" height="1000" frameborder="1"></iframe></p>

</body>
</html>