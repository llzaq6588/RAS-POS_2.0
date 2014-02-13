<?php
	require_once('login.php');
?>
<html><!--이전버젼에 비해 프레임셋을 위해 맞춘 것 외에는 달라진 것은 없다.-->

<head>
<script type="text/javascript">
 
    function check(){
 
        var form1 = document.form1;
 
        for(var i =0 ; i < form1.elements.length ; i++){
 
            if(form1.elements[i].value==""){
 
                alert(form1.elements[i].title+"을(를) 넣어주세요" ); //입력 폼의 유혀성을 검사부분이다. ver 1.2부터 추가된다. 사용자가 실수로 정보를 입력하지 않은 것을 미연에 방지할 수 있다.
 
                form1.elements[i].focus();
 
                return false;
 
            }
 
 
        }
 
        return true;
 
    }
 
</script>


<base target="detail">
</head>

<body>

<form name="form1" method="post"  onsubmit="return check()" action="insert.php" target="_self"> 
<font face="HY울릉도M"><span style="font-size:22pt;">

<?php
  $date = date("Y-m-d");
  $code = $_POST['code']; // 상품정보를 insert.html이나 insert.php나 delete.php로부터 전송받아 변수로 선언된다.
  $name = $_POST['name'];
  $price = $_POST['price'];


$hostname = "localhost"; //DB 연결
$username = "raspos";
$password = "raspospw";
$dbname = "raspos";
 
$connect = mysql_connect($hostname, $username, $password) or die("MySQL Server 연결에 실패했습니다");
mysql_select_db($dbname,$connect);
 

$sql2="INSERT INTO price (date, code, name, price) " .
    "VALUES ('$date', '$code', '$name', '$price')"; //변수들은 table "price"에 이렇게 저장된다.
 
$result=mysql_query($sql2);


mysql_close($connect);



  echo '상품 등록 날짜 : ' .$date . '<br/>';
  echo '상품 바코드 : ' . $code . '<br />'; //입력 성공시 결과를 출력한다.
  echo '상품 이름 : ' . $name . '<br />';
  echo '상품 가격 : ' . $price . '<br />';

?>


</span></font>
    <p align="center"><font face="HY울릉도B"><span style="font-size:36pt;">* 상품 추가시 *</span></font></p>
    <p>&nbsp;</p>
    <p><font face="HY울릉도B"><span style="font-size:36pt;">상품 바코드 : <input type="text" name="code" title="상품 바코드" style="font-family:HY울릉도B; font-size:50; border-width:2; border-color:black; border-style:double;" size="15"></span></font></p>
    <p><font face="HY울릉도B"><span style="font-size:36pt;">상품 이름</span></font><span style="font-size:36pt;"><font face="돋움"> &nbsp;&nbsp;&nbsp;</font></span><font face="HY울릉도B"><span style="font-size:36pt;">: <input type="text" name="name" title="상품 이름" style="font-family:HY울릉도B; font-size:50; border-width:2; border-color:black; border-style:double;" size="15"></span></font></p>
    <p><font face="HY울릉도B"><span style="font-size:36pt;">상품 가격</span></font><span style="font-size:36pt;"><font face="돋움"> &nbsp;&nbsp;&nbsp;</font></span><font face="HY울릉도B"><span style="font-size:36pt;">: <input type="text" name="price" title="상품 가격" style="font-family:HY울릉도B; font-size:50; border-width:2; border-color:black; border-style:double;" size="15">원</span></font></p>
    <p><input type="submit" name="post" value="상품추가" style="font-family:HY울릉도B; font-size:50;"></p>
</form></body>

</html>