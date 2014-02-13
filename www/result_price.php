<html><!--insert.html에서 가장 먼저 오는 곳은 이곳이다. reslut_price는 DB관리문제때문에 분리되었다. 첫번째 단계에서는 임시DB인 sell이 생성된다.
RAS-POS 1.5ver는 7인치 화면에 최적화되도록 조정되어있다.-->

<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<title>상품 가격</title>

</head>

<body onload="document.form1.code.focus();"><!--입력장치로는 키보드와 마우스는 없고 유일하게 바코드리더기만 있다는 가정하에 작성된 프로그램이기 때문에 포커스 유도는 필수이다.-->
<p>
<?php //본 페이지에서는 임시 DB인 sell이 생성된다. sell이 살아있는 기간은 물건계산이 끝날 때까지 이다.

$hostname = "localhost"; //DB 연결
$username = "raspos";
$password = "raspospw";
$dbname = "raspos";
 
$connect = mysql_connect($hostname, $username, $password) or die("MySQL Server 연결에 실패했습니다");
mysql_select_db($dbname,$connect);
 
$sql="CREATE TABLE sell (name text, price int(11))"; //sell테이블이 생성되는데 이는 손님의 '장바구니'라고 생각하면 이해하기 쉽다.
 
$result=mysql_query($sql);

mysql_close($connect);//안정성을 위해 php를 끊어놓았다?? 뭐 사실은 내가 미흡한거지만 말이야.

?>
<?php //코드에 맞추어 상품을 입력하다.


$code = $_POST['code']; //index.html로부터 바코드 정보를 받아 code라고 변수 선언을 한다.

$hostname = "localhost"; //DB 연결
$username = "raspos";
$password = "raspospw";
$dbname = "raspos";
 
$connect = mysql_connect($hostname, $username, $password) or die("MySQL Server 연결에 실패했습니다");
mysql_select_db($dbname,$connect);
 
$sql1="SELECT * FROM price WHERE code = '$code'"; //code로부터 물품의 정보를 찾아서 나열한다.
 
$result=mysql_query($sql1);
 
while($array=mysql_fetch_array($result)){ 
 

$name = $array[name]; //나열해서 나타난 상품의 이름과 가격을 각각 name, price라는 변수로 선언해준다.
$price = $array[price];

$sql2="INSERT INTO sell (name, price) " .
		"VALUES ('$name', '$price')"; //변수 name과 price는 임시 테이블인 sell로 전송된다.
 
$result=mysql_query($sql2);


mysql_close($connect);

}
?></p><!--각각의 정보는 표로 나타난다. result_price.php와 result_price_2.php는 이 주석을 중심으로 전부 같은 code이다.-->
<div align="left">
    <table border="1" width="629">
        <tr>
            <td width="62%" height="50">

                <p align="center"><b><span style="font-size:20pt;">상품명</span></b></p>
</td>
            <td width="111" height="50">

                <p align="center"><b><span style="font-size:20pt;">가격</span></b></p>
</td>
            <td width="111" height="118" rowspan="3">                <form name="form1" method="post" action="result_price_2.php"><!--7인치 화면에 맞는 가독성을 위하여 코드 입력란을 우편에 두었다.-->
                    <p><input type="text" name="code" maxlength="15" size="10"><input type="submit" name="formbutton1" value="입력" style="font-size:20;"></p>
                </form>
                <p>&nbsp;</p>
</td>
    </tr>
        <tr>
            <td width="62%">

                <p align="center"><span style="font-size:36pt;"><b>
			
</b></span><b><span style="font-size:20pt;"><?php //이 녀석은 장바구니인 table sell에서 상품 이름을 뽑아서 나열해주는 문이다.

$hostname = "localhost";
$username = "raspos";
$password = "raspospw";
$dbname = "raspos";
 
$connect = mysql_connect($hostname, $username, $password) or die("MySQL Server 연결에 실패했습니다");
mysql_select_db($dbname,$connect);
 
$sql="SELECT * FROM sell";
 
$result=mysql_query($sql);
 
while($array=mysql_fetch_array($result)){ 
 

echo $array[name] . '<br/>';

 

mysql_close($connect);

}
?>
			
			
			
			
			</span></b></p>
</td>
            <td width="112">

                <p align="center"><span style="font-size:36pt;"><b>
</b></span><b><span style="font-size:20pt;"><?php //이 녀석은 장바구니인 table sell에서 상품 가격을 뽑아서 나열해주는 문이다.

$hostname = "localhost";
$username = "raspos";
$password = "raspospw";
$dbname = "raspos";
 
$connect = mysql_connect($hostname, $username, $password) or die("MySQL Server 연결에 실패했습니다");
mysql_select_db($dbname,$connect);
 
$sql="SELECT * FROM sell";
 
$result=mysql_query($sql);
 
while($array=mysql_fetch_array($result)){ 
 

echo $array[price] . '<br/>';
 

mysql_close($connect);

}
?>
			
			</span></b></p>
</td>
    </tr>
        <tr>
            <td width="62%">

                <p align="center"><b><span style="font-size:20pt;">총합</span></b></p>
</td>
            <td width="112">

                <p align="center"><span style="font-size:36pt;"><b>
			


</b></span><b><span style="font-size:20pt;"><?php //이 녀석은 장바구니인 table sell에서 나타난 상품의 가격의 총합(sum값)을 구해 나열해준다.

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


?>

			</span></b></p>
</td>
    </tr>
</table>    <p>&nbsp;</p>
</div>


</body>
</html><!--builded Web-Application by KAERIUS-->