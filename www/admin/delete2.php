<?php
	require_once('login.php');
?>
<html><!--delete.php로부터 넘겨받은 code정보로 상품 삭제를 시도한다. 이는 RAS-POS 1.5ver 이전에 delete의 과정과 동일하다.-->

<head>
</head>

<body>
    <p align="center"><font face="HY울릉도B"><span style="font-size:36pt;">* 상품 제거시 *</span></font></p>
<p align="center"><font face="HY울릉도B"><span style="font-size:22pt;">
<?php


$code = $_POST['code']; // 상품코드를 insert.html이나 insert.php나 delete.php로부터 전송받는다.

$hostname = "localhost"; //DB연결
$username = "raspos";
$password = "raspospw";
$dbname = "raspos"; 
 
$connect = mysql_connect($hostname, $username, $password) or die("MySQL Server 연결에 실패했습니다"); 
mysql_select_db($dbname,$connect); 
 
$sql="SELECT * FROM price WHERE code = '$code'"; //바코드 데이터를 통하여 지워지는 상품정보를 찾는다.
 
$result=mysql_query($sql);
 
while($array=mysql_fetch_array($result)){ 
 

echo '상품명 "' .$array[name]; //지워지는 상품명을 "지워지기전에" 출력한다.

 

mysql_close($connect); //안정성을 위해 php를 끊어놓았다?? 뭐 사실은 내가 미흡한거지만 말이야.

}
?></span></font></b><b><font face="HY울릉도B"><span style="font-size:22pt;">


<?php //php문에 다시 재접속한다.

  $code = $_POST['code'];

  $dbc = mysqli_connect('localhost', 'raspos', 'raspospw', 'raspos')
    or die('Error connecting to MySQL server.'); //DB연결, <연결문이 자꾸 뒤죽박죽이 된 것은 여기저기 코드를 많이 빌려와서 그렇다. 양해바란다.>

  $query = "DELETE FROM price WHERE code = '$code'"; //해당 코드의 상품을 리스트에서 제거한다.

mysqli_query($dbc, $query)
    or die('Error querying database.');


  mysqli_close($dbc);


  echo '" 은(는) 제거' //성공적으로 제거하였을 경우 '제거'라는 단어가 화면상에 나타난다.

?>
</span></font></b><font face="HY울릉도B"><span style="font-size:22pt;">되었습니다.</span></font>
</span></font></p>
<form name="form2" method="post" action="delete.php" target="_self"> <!--상품 제거 과정이다. code정보는 delete.php로 넘어간다. 이후 설명은 delete.php참조-->

    <p>&nbsp;</p>
    <p><font face="HY울릉도B"><span style="font-size:36pt;">상품 이름</span></font><span style="font-size:36pt;">&nbsp;</span><font face="HY울릉도B"><span style="font-size:36pt;">:</span></font><span style="font-size:36pt;"> </span><font face="HY울릉도B"><span style="font-size:36pt;"><input type="text" name="name" style="font-family:HY울릉도B; font-size:50; border-width:2; border-color:black; border-style:double;" size="10"> </span></font><input type="submit" name="post" value="찾기" style="font-family:HY울릉도B; font-size:40;"></p>
</form>
</body>

</html>
