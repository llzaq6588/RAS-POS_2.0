<html><!--change.php는 거스름돈 데이터를 받아오는 곳이다.  이곳으로 들어오려면 code == ''상태가 되어야 한다.
RAS-POS 1.5ver부터 적용된다.
-->

<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<title>거스름돈 계산</title>

</head>

<body onload="document.form2.money.focus();">
<table width="664" align="center" cellspacing="0" style="border-collapse:collapse;">
    <tr>
        <td width="660" style="border-width:1; border-color:white; border-style:solid;">
            <p align="center"><b><span style="font-size:48pt;">총 가격 : 
			<?php //이 녀석은 장바구니인 table sell에서 나타난 상품의 가격의 총합(sum값)을 구해 나열해준다.

$hostname = "localhost"; //sql 연결
$username = "raspos";
$password = "raspospw";
$dbname = "raspos";
 
$connect = mysql_connect($hostname, $username, $password) or die("MySQL Server 연결에 실패했습니다");
mysql_select_db($dbname,$connect);
 
$sql="SELECT sum(price) FROM sell"; //price값을 전체 더하는 식이다.
 
$result=mysql_query($sql);
 
$totalprice=mysql_result($result,0,0);
 
 
echo $totalprice . ' 원'; 
 

mysql_close($connect);


?></span></b></p>
</td>
    </tr>
    <tr>
        <td width="660" style="border-width:1; border-color:white; border-style:solid;" height="72">
            <form name="form2" method="post" action="sell.php">

            <p align="center"><b><span style="font-size:48pt;">지불금액 : <input type="text" name="money" maxlength="15" size="7" style="font-size:48;"><input type="submit" name="submit" value="원" style="font-size:48;"></span></b><span style="font-size:48pt;"></span></p>
            </form>
            <p>&nbsp;</p>
</td>
    </tr>
</table>


</body>
</html><!--builded Web-Application by KAERIUS-->
