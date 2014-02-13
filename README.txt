
=======================   RAS-POS system 2.0ver  ===================================

	※ 본 웹 에플리케이션은 웹서버(Apache) 위에서 동작합니다.
	※ 본 웹 에플리케이션은 UTF-8 인코딩을 사용합니다.
	※ 본 웹 에플리케이션 내에 상품정보는 사용자가 '직접' 입력해야합니다.
		<상품정보가 없다고 문의하지 마시기 바랍니다.>
	※ 본 웹 에플리케이션은 MIT LICENSE를 적용합니다.


기존 RAS-POS 1.5 ver이 동봉되어있음을 알려드립니다.

RAS-POS 2.0 ver의 소스코드는 zip파일에 동봉되어 있습니다.

RAS-POS system 설치방법은 RASPOS 2.0 DOCUMENT.pdf를 봐주시기 바랍니다.

RAS-POS system 1.0ver를 설치하신 분들은

RASPOS databases의 내용을 수정해주어야 합니다.

기존에 DB의 TABLE은 지워주시고,

만약 수정하실 수 있다면 TABLE을 다음과 같이 수정해 주시기 바랍니다.

---------------------------------------------------------------------------
TABLE price

#  이름        종류         데이터정렬방식
1  date        date                          <====== 추가
2  code        varchar(15)  utf8_general_ci
3  name        text         utf8_general_ci
4  price       int(11)
---------------------------------------------------------------------------
TABLE sold_book

#  이름        종류         데이터정렬방식
1  yearmonth   varchar(8)   utf8_general_ci <====== 추가, 변경
2  sellday     date                         <====== 추가, 변경
3  time        time
4  totalprice  int(10)



RAS-POS system 1.2ver를 설치하신 분들은

RASPOS databases의 내용을 수정해주어야 합니다.

기존에 DB의 TABLE은 지워주시고,

만약 수정하실 수 있다면 TABLE을 다음과 같이 수정해 주시기 바랍니다.

---------------------------------------------------------------------------
TABLE sold_book

#  이름        종류         데이터정렬방식
1  year        int                          <====== 추가, 변경
2  yearmonth   varchar(8)   utf8_general_ci
3  sellday     date                        
4  time        time
5  totalprice  int(10)

**************************      수정사항      *****************************

RASPOS 2.0 DOCUMENT.pdf를 봐주시기 바랍니다.


			builded Web-Application by KAERIUS
======================================================================================