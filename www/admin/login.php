<?php
	require_once('login.php');
?>
<?php
  if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW'])) {
    // ID PW �Է� ��
    header('HTTP/1.1 401 Unauthorized');
    header('WWW-Authenticate: Basic realm="RAS-POS 2.0"');
    exit('<h3>RAS-POS 2.0</h3>�ٽ� �Է����ּ���.');
  }

  // �����ͺ��̽� ����
  $dbc = mysqli_connect(localhost, raspos, raspospw, raspos);

  // ������ ID PW ����
  $user_username = mysqli_real_escape_string($dbc, trim($_SERVER['PHP_AUTH_USER']));
  $user_password = mysqli_real_escape_string($dbc, trim($_SERVER['PHP_AUTH_PW']));

  // ã�Ƽ� ���غ��ϴ�.
  $query = "SELECT username FROM admin WHERE username = '$user_username' AND password = SHA('$user_password')";
  $data = mysqli_query($dbc, $query);

  if (mysqli_num_rows($data) == 1) {
    // �α��� ������ ������ OK����
    $row = mysqli_fetch_array($data);
    $username = $row['username'];
  }
  else {
    // Ʋ���� �ٽ� ������.
    header('HTTP/1.1 401 Unauthorized');
    header('WWW-Authenticate: Basic realm="RAS-POS 2.0"');
    exit('<h3>RAS-POS 2.0</h3>�ٽ� �Է����ּ���.');
  }

?>