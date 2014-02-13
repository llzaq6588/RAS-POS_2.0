<html><!--손님에게서 받은 금액은 변수 money로 선언되어 지불금액과 잔액이 표시된다. 
계산이 끝이 난 경우 바로 enter을 누르면 result_priec_2의 과정으로 넘어간다.
여기에서도 계산 실폐시가 고려되었다, 코드는 동일한 100000000000001이다.
RAS-POS 1.5ver부터 적용된다.
-->

<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<title>거스름돈 계산</title>

</head>

<body onload="document.form1.money.focus();">
<?php

$money = $_POST['money'];

if ($money == '') {
	/* 
	계산을 완료하였을 경우. 즉 손님이 돈을 지불하고 물건을 사 간 뒤에 입력되는 코드를 말한다. 이때 입력되는 변수 money는 ''이다.
	
이 코드에 대한 설명은 result_price_2.php의 주석을 확인하면 된다.
	*/

	$year = date("Y");
	$yearmonth = date("Y-m");
	$sellday = date("Y-m-d");
	$time = date("H:i:s");

	$hostname = "localhost";
	$username = "raspos";
	$password = "raspospw";
	$dbname = "raspos";
 
	$connect = mysql_connect($hostname, $username, $password) or die("MySQL Server 연결에 실패했습니다");
	mysql_select_db($dbname,$connect);
 
	$sql1="SELECT sum(price) FROM sell";
 
	$result=mysql_query($sql1);
	
 
	while($totalprice=mysql_result($result,0,0))
	{ 

		$sql2="INSERT INTO sold_book (year, yearmonth, sellday, time, totalprice) " .
				"VALUES ('$year', '$yearmonth', '$sellday', '$time', '$totalprice')"; //변수로 선언된 날짜, 시간, totalprice는 sold_book 매상장부 테이블로 전송된다.
 
			while($result=mysql_query($sql2))
			{

				$sql3="DROP TABLE sell"; 

				$result=mysql_query($sql3);

				mysql_close($connect);

				echo '<meta http-equiv="refresh" content="0; url=index.html" />';

			}
	}

}

elseif ($money > 100000000000000) {  //이런일이 없기를 바라지만 다 해놓고 계산이 실패된 경우를 말한다.

	$hostname = "localhost";
	$username = "raspos";
	$password = "raspospw";
	$dbname = "raspos";
 
	$connect = mysql_connect($hostname, $username, $password) or die("MySQL Server 연결에 실패했습니다");
	mysql_select_db($dbname,$connect);
 
	$sql="DROP TABLE sell"; //잘못된 장바구니는 가차없이 drop시켜버린다.
 
	$result=mysql_query($sql);

	mysql_close($connect);

	
	echo '<meta http-equiv="refresh" content="0; url=index.html" />'; //마찬가지로 처음부터 시작하기 때문에 index.html로 돌아간다.

}

?>

<table border="1" width="712" align="center" bordercolor="white" bordercolordark="white" bordercolorlight="white">
    <tr>
        <td width="702" height="100" colspan="2" bordercolor="white" bordercolordark="white" bordercolorlight="white">
            <p align="center"><b><span style="font-size:60pt;">구매 감사합니다.</span></b></p>
</td>
    </tr>
    <tr>
        <td width="320" height="46" bordercolor="white" bordercolordark="white" bordercolorlight="white">
            <p align="center"><b><span style="font-size:36pt;">총 금액</span></b><span style="font-size:22pt;"></span></p>
</td>
        <td width="376" height="46" bordercolor="white" bordercolordark="white" bordercolorlight="white">            <p align="center"><b><span style="font-size:48pt;">
		
</span><span style="font-size:36pt;">		<?php //이 녀석은 장바구니인 table sell에서 나타난 상품의 가격의 총합(sum값)을 구해 나열해준다.

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
        <td width="320" height="46" bordercolor="white" bordercolordark="white" bordercolorlight="white">
            <p align="center"><b><span style="font-size:36pt;">지불금액</span></b><span style="font-size:22pt;"></span></p>
</td>
        <td width="376" height="46" bordercolor="white" bordercolordark="white" bordercolorlight="white">
            <p align="center"><b><span style="font-size:48pt;">
</span><span style="font-size:36pt;">			<?php
			
			$money = $_POST['money'];
			
			echo $money . '원';
			
			?>
</span></b></p>
</td>
    </tr>
    <tr>
        <td width="320" height="39" bordercolor="white" bordercolordark="white" bordercolorlight="white">
            <p align="center"><b><span style="font-size:36pt;">잔액</span></b><span style="font-size:22pt;"></span></p>
</td>
        <td width="376" height="79" bordercolor="white" bordercolordark="white" bordercolorlight="white">
            <p align="center"><b><span style="font-size:48pt;">
			
</span><span style="font-size:36pt;">			<?php //장바구니의 상품의 가격의 총합(sum값)과 지불금액과의 차액을 계산하여 거스름돈을 나타낸다.
			
			$money = $_POST['money'];

$hostname = "localhost"; //sql 연결
$username = "raspos";
$password = "raspospw";
$dbname = "raspos";
 
$connect = mysql_connect($hostname, $username, $password) or die("MySQL Server 연결에 실패했습니다");
mysql_select_db($dbname,$connect);
 
$sql="SELECT sum(price) FROM sell"; //price값을 전체 더하는 식이다.
 
$result=mysql_query($sql);
 
$totalprice=mysql_result($result,0,0);
 

 $charge = ($totalprice - $money) * -1; //거스름돈의 음수계산을 양수로 바꾸어 표시한다. 지불금액이 부족하다면 음수로 나타난다.
 
echo $charge . ' 원'; 
 

mysql_close($connect);


?></span></b></p>
</td>
    </tr>
    <tr>
        <td width="702" height="22" colspan="2" bordercolor="white" bordercolordark="white" bordercolorlight="white">
            <form name="form1" method="post" action="sell.php">
                <p><input type="text" name="money" maxlength="16" size="1"><input type="submit" name="formbutton1" style="font-size:1; color:white; border-color:white;"></p>
            </form>
            <p>&nbsp;</p>
</td>
    </tr>
</table>
<p>&nbsp;</p>


</body>
</html><!--builded Web-Application by KAERIUS-->