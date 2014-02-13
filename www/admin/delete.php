<?php
	require_once('login.php');
?>
<html><!--deleteprice.php에서 넘어온 이름 정보는 이곳에서 검색되어 리스트에 출력된다.-->


<head>
</head>

<body>
<p align="center"><font face="HY울릉도B"><span style="font-size:36pt;">* 상품 제거시 *</span></font></p>
<form name="form1" target="_self" action="deleteprice.php">
<p align="center"><input type="submit" value="재검색" style="font-family:HY울릉도M; font-size:22;"></p>
</form>
<p>&nbsp;</p>
<form name="form2" method="post" action="delete2.php" target="_self"> <!--상품 제거 과정이다. 사용자가 선택한 상품정보는 코드로 전송이 되어 delete2.php로 넘어간다.-->
    <p align="center"><span style="font-size:22pt;"><font face="HY울릉도M"></font></span>
	<select name="code" size="10" style="font-family:HY울릉도B; font-size:24;"><!--펼치기 매뉴의 size가 10인 이유는 펼침으로서 선택이 용이하게 하기 위함이다.-->

<?php //

$name = $_POST['name'];

$hostname = "localhost";
$username = "raspos";
$password = "raspospw";
$dbname = "raspos";
 
$connect = mysql_connect($hostname, $username, $password) or die("MySQL Server 연결에 실패했습니다");
mysql_select_db($dbname,$connect);
 
$sql="SELECT * FROM price WHERE name like '%$name%'";  //price로부터 이름이 검색되어 자료가 넘어온다.

$result=mysql_query($sql);
 
while($row=mysql_fetch_array($result)){ 
 
echo '<option value="' . $row[code] . '">' . $row[name] . '-' . $row[price] . '원 </option>';//html의 펼치기 매뉴이다. 사용자가 사용할 때에는 상품 정보와 가격만 볼 수 있으나, 사용자가 그 상품명과 가격을 선택해서 전송하면 실제로는 상품 코드만 POST되어 전송이 된다.
 

mysql_close($connect);

}
?>



</select> <input type="submit" name="delete" value="상품제거" style="font-family:HY울릉도B; font-size:50;"></p>
    <p align="center"><font face="HY울릉도M"></font></p>
</form>
</body>

</html>