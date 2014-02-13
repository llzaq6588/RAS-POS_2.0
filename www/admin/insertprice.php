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
 
                alert(form1.elements[i].title+"을(를) 넣어주세요" ); //입력 폼의 유혀성을 검사부분입니다. ver 1.2부터 추가됩니다. 사용자가 실수로 정보를 입력하지 않은 것을 미연에 방지할 수 있습니다.
 
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
<form name="form1" method="post"  onsubmit="return check()" action="insert.php" target="_self"> <!--상품 등록 과정이다. code와 상품명, 가격정보는 insert.php로 넘어간다. 이후 설명은 insert.php참조-->
    <p align="center"><font face="HY울릉도B"><span style="font-size:36pt;">* 상품 추가시 *</span></font></p>
    <p>&nbsp;</p>
    <p><font face="HY울릉도B"><span style="font-size:36pt;">상품 바코드 : <input type="text" name="code" title="상품 바코드" style="font-family:HY울릉도B; font-size:50; border-width:2; border-color:black; border-style:double;" size="15"></span></font></p><!--바코드로 code를 입력할 경우 바코드에서 자동enter기능 (바코드 환경설정마다 다르지만 QR이라고 되어있을 것이다)을 none으로 바꾸어야 한다. 아니면 code값만 자동 입력되어 귀찮은 일이 벌어질 것이다.-->
    <p><font face="HY울릉도B"><span style="font-size:36pt;">상품 이름</span></font><span style="font-size:36pt;"><font face="돋움"> &nbsp;&nbsp;&nbsp;</font></span><font face="HY울릉도B"><span style="font-size:36pt;">: <input type="text" name="name" title="상품 이름" style="font-family:HY울릉도B; font-size:50; border-width:2; border-color:black; border-style:double;" size="15"></span></font></p>
    <p><font face="HY울릉도B"><span style="font-size:36pt;">상품 가격</span></font><span style="font-size:36pt;"><font face="돋움"> &nbsp;&nbsp;&nbsp;</font></span><font face="HY울릉도B"><span style="font-size:36pt;">: <input type="text" name="price" title="상품 가격" style="font-family:HY울릉도B; font-size:50; border-width:2; border-color:black; border-style:double;" size="15">원</span></font></p>
    <p><input type="submit" name="post" value="상품추가" style="font-family:HY울릉도B; font-size:50;"></p><!--초기 등록이란 꽤 힘들고 귀찮은 일이지만 이렇게 해야만 프로그램이 돌아간다.-->
</form></body>

</html>