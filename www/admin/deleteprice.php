<?php
	require_once('login.php');
?>
<html><!--이전과는 달리 삭제 검색 기능이 추가되었다. 이전에 삭제 에플리케이션에서는 정확한 바코드를 입력해야 되지만, 1.5ver부터는 상품내용을 검색한 뒤에 선택해서 삭제의 용이성과 정확성을 추가하였다.-->

<head>
</head>

<body>
<form name="form2" method="post" action="delete.php" target="_self">
    <p align="center"><font face="HY울릉도B"><span style="font-size:36pt;">* 상품 제거시 *</span></font></p>
    <p>&nbsp;</p><!--이름을 입력하는 경우... 이름의 정보는 delete.php로 넘어간다.-->
    <p><font face="HY울릉도B"><span style="font-size:36pt;">상품 이름</span></font><span style="font-size:36pt;">&nbsp;</span><font face="HY울릉도B"><span style="font-size:36pt;">:</span></font><span style="font-size:36pt;"> </span><font face="HY울릉도B"><span style="font-size:36pt;"><input type="text" name="name" style="font-family:HY울릉도B; font-size:50; border-width:2; border-color:black; border-style:double;" size="10"> </span></font><input type="submit" name="post" value="찾기" style="font-family:HY울릉도B; font-size:40;"></p>
</form>
</body>

</html>
