<?php
	require_once('login.php');
?>
<html><!--월별 매출정보를 정리하여 올려주는 곳이다. 차트로는 원래 Google차트를 사용하려고 하였으나 api 잦은 서버 다운으로 Google chart 대신 HighChart를 사용한다. RAS-POS 1.5ver 부터 적용된다.-->
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">

<title>월별 매상장부 차트 출력</title>

		<script type="text/javascript" src="jquery.min.js"></script>
</head>
<body>

<p align="center"><span style="font-size:48pt;"><font face="휴먼둥근헤드라인">
<?php

$year = $_POST['year'];

echo $year;

?>
년도 월별 매상 장부 차트</font></span></p>


		<form name="form1" method="post" action="yearchart.php" target="_self">
    <p align="center"><font face="HY울릉도M"><span style="font-size:22pt;">월별 매상 차트 :</span></font><span style="font-size:22pt;"> </span><select name="year" size="1" style="font-family:HY울릉도B; font-size:24;">
        <option selected value="">판매년도</option>
        <?php //판매 년도를 정리해서 리스트로 나타낸다.

$hostname = "localhost";
$username = "raspos";
$password = "raspospw";
$dbname = "raspos";
 
$connect = mysql_connect($hostname, $username, $password) or die("MySQL Server 연결에 실패했습니다");
mysql_select_db($dbname,$connect);
 
$sql="SELECT distinct(year) FROM sold_book";  //반복되는 년도는 과감하게 없애버린다.

$result=mysql_query($sql);
 
while($row=mysql_fetch_array($result)){ 
 
echo '<option value="' . $row[year] . '">' . $row[year] . '</option>';//
 

mysql_close($connect);

}
?>
</select> <input type="submit" name="search" value="검색" style="font-family:HY울릉도B; font-size:24;"></p>
    <p align="center"><font face="HY울릉도M"></font></p>
</form> <p align="center"><!--year값을 입력받은 폼은 yearchart로 정보를 넘겨준다.-->


<?php
$year = $_POST['year'];

$Y01th = $year . '-01';//SQL의 yearmonth 칼럼의 정보를 출력하기 위해서이다. yearmonth는 '년도'-'월' 형식으로 기록된다.
$Y02th = $year . '-02';
$Y03th = $year . '-03';
$Y04th = $year . '-04';
$Y05th = $year . '-05';
$Y06th = $year . '-06';
$Y07th = $year . '-07';
$Y08th = $year . '-08';
$Y09th = $year . '-09';
$Y10th = $year . '-10';
$Y11th = $year . '-11';
$Y12th = $year . '-12';


$hostname = "localhost";
$username = "raspos";
$password = "raspospw";
$dbname = "raspos"; 
 
$connect = mysql_connect($hostname, $username, $password) or die("MySQL Server 연결에 실패했습니다");
mysql_select_db($dbname,$connect);
 
$query = "select sum(totalprice) from sold_book where yearmonth='$Y01th'"; // 해당 년수의 1월달 수익의 총 합을 계산하는 쿼리문이다. 나머지들도 동일하다.
$result = mysql_fetch_array(mysql_query($query, $connect)); 
$total01th = $result[0];

if ($total01th == '') { //값이 없을 경우 0으로 처리하게 되었는데 모든 차트들은 NULL값을 인식할 수 없기 때문에 NULL 값은 0으로 바뀐다. 나머지들도 동일하다.

	$total01th = 0;

}

$query2 = "select sum(totalprice) from sold_book where yearmonth='$Y02th'"; 
$result2 = mysql_fetch_array(mysql_query($query2, $connect)); 
$total02th = $result2[0];

if ($total02th == '') {

	$total02th = 0;

}

$query3 = "select sum(totalprice) from sold_book where yearmonth='$Y03th'"; 
$result3 = mysql_fetch_array(mysql_query($query3, $connect)); 
$total03th = $result3[0];

if ($total03th == '') {

	$total03th = 0;

}

$query4 = "select sum(totalprice) from sold_book where yearmonth='$Y04th'"; 
$result4 = mysql_fetch_array(mysql_query($query4, $connect)); 
$total04th = $result4[0];

if ($total04th == '') {

	$total04th = 0;

}

$query5 = "select sum(totalprice) from sold_book where yearmonth='$Y05th'"; 
$result5 = mysql_fetch_array(mysql_query($query5, $connect)); 
$total05th = $result5[0];

if ($total05th == '') {

	$total05th = 0;

}

$query6 = "select sum(totalprice) from sold_book where yearmonth='$Y06th'"; 
$result6 = mysql_fetch_array(mysql_query($query6, $connect)); 
$total06th = $result6[0];

if ($total06th == '') {

	$total06th = 0;

}

$query7 = "select sum(totalprice) from sold_book where yearmonth='$Y07th'"; 
$result7 = mysql_fetch_array(mysql_query($query7, $connect)); 
$total07th = $result7[0];

if ($total07th == '') {

	$total07th = 0;

}

$query8 = "select sum(totalprice) from sold_book where yearmonth='$Y08th'"; 
$result8 = mysql_fetch_array(mysql_query($query8, $connect)); 
$total08th = $result8[0];

if ($total08th == '') {

	$total08th = 0;

}

$query9 = "select sum(totalprice) from sold_book where yearmonth='$Y09th'"; 
$result9 = mysql_fetch_array(mysql_query($query9, $connect)); 
$total09th = $result9[0];

if ($total09th == '') {

	$total09th = 0;

}

$query10 = "select sum(totalprice) from sold_book where yearmonth='$Y10th'"; 
$result10 = mysql_fetch_array(mysql_query($query10, $connect)); 
$total10th = $result10[0];

if ($total10th == '') {

	$total10th = 0;

}

$query11 = "select sum(totalprice) from sold_book where yearmonth='$Y11th'"; 
$result11 = mysql_fetch_array(mysql_query($query11, $connect)); 
$total11th = $result11[0];

if ($total11th == '') {

	$total11th = 0;

}

$query12 = "select sum(totalprice) from sold_book where yearmonth='$Y12th'"; 
$result12 = mysql_fetch_array(mysql_query($query12, $connect)); 
$total12th = $result12[0];

if ($total12th == '') {

	$total12th = 0;

	

}


	mysql_close($connect);


?>
<script type="text/javascript">$(function () {
        $('#container').highcharts({
            chart: {
                type: 'column',
                margin: [ 50, 50, 100, 80]
            },
            title: {
                text: ''
            },
            xAxis: {
                categories: [
                    '1월<br/>.<br/><b><?=$total01th ?> 원</b>', //차트 하단과 마우스오버(마우스를 가져다 댈 시에 뜨는 말풍선)에 나타나는 내용이다.
                    '2월<br/>.<br/><b><?=$total02th ?> 원</b>',
					'3월<br/>.<br/><b><?=$total03th ?> 원</b>',
					'4월<br/>.<br/><b><?=$total04th ?> 원</b>',
					'5월<br/>.<br/><b><?=$total05th ?> 원</b>',
					'6월<br/>.<br/><b><?=$total06th ?> 원</b>',
					'7월<br/>.<br/><b><?=$total07th ?> 원</b>',
					'8월<br/>.<br/><b><?=$total08th ?> 원</b>',
					'9월<br/>.<br/><b><?=$total09th ?> 원</b>',
					'10월<br/>.<br/><b><?=$total10th ?> 원</b>',
					'11월<br/>.<br/><b><?=$total11th ?> 원</b>',
					'12월<br/>.<br/><b><?=$total12th ?> 원</b>'
                ],
                labels: {
                    rotation: 0,
                    align: 'right',
                    style: {
                        fontSize: '20px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: '월 수입'
                }
            },
            legend: {
                enabled: false
            },
            tooltip: {
                pointFormat: '',
            },
            series: [{
                name: 'Population',
                data: [<?=$total01th ?>, <?=$total02th ?>, <?=$total03th ?>, <?=$total04th ?>,//PHP와 연결된 내용이다.
				<?=$total05th ?>, <?=$total06th ?>, <?=$total07th ?>, <?=$total08th ?>, <?=$total09th ?>,
				<?=$total10th ?>, <?=$total11th ?>, <?=$total12th ?>],
                dataLabels: {
                    enabled: true,
                    rotation: -90,
                    color: '#FFFFFF',
                    align: 'right',
                    x: 4,
                    y: 10,
                    style: {
                        fontSize: '20px',
                        fontFamily: 'Verdana, sans-serif',
                        textShadow: '0 0 3px black'
                    }
                }
            }]
        });
    });
    

		</script>

<script src="highcharts.js">
</script>
<script src="exporting.js">
</script>

<div id="container" style="margin-top:0; margin-right:auto; margin-bottom:0; margin-left:auto; height:800px; min-width: 500px;"></div>


<p align="center"><img src="license.png" width="1000" height="100" border="0">



</body>
</html> <!--builded Web-Application by KAERIUS-->