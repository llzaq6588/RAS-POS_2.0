<?php
	require_once('login.php');
?>
<?php
  if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW'])) {
    // ID PW 입력 폼
    header('HTTP/1.1 401 Unauthorized');
    header('WWW-Authenticate: Basic realm="RAS-POS 2.0"');
    exit('<h3>RAS-POS 2.0</h3>다시 입력해주세요.');
  }

  // 데이터베이스 연결
  $dbc = mysqli_connect(localhost, raspos, raspospw, raspos);

  // 폼에서 ID PW 대조
  $user_username = mysqli_real_escape_string($dbc, trim($_SERVER['PHP_AUTH_USER']));
  $user_password = mysqli_real_escape_string($dbc, trim($_SERVER['PHP_AUTH_PW']));

  // 찾아서 비교해봅니다.
  $query = "SELECT username FROM admin WHERE username = '$user_username' AND password = SHA('$user_password')";
  $data = mysqli_query($dbc, $query);

  if (mysqli_num_rows($data) == 1) {
    // 로그인 정보가 맞으면 OK사인
    $row = mysqli_fetch_array($data);
    $username = $row['username'];
  }
  else {
    // 틀리면 다시 폼이죠.
    header('HTTP/1.1 401 Unauthorized');
    header('WWW-Authenticate: Basic realm="RAS-POS 2.0"');
    exit('<h3>RAS-POS 2.0</h3>다시 입력해주세요.');
  }

?>