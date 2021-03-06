<?php
$email = $_POST['email'];
$password = $_POST['password'];
include("../fragments/connection-begin.php");
$statement=$conn->prepare("
  SELECT client_id, client_name, client_password
  FROM client
  WHERE client_email = ?
  LIMIT 1
");
$statement->bind_param('s',$email);
$statement->execute();
$statement->store_result();
if ($statement->num_rows > 0) {
  $statement->bind_result($uId,$uName,$uPassword);
  $statement->fetch();
  if (password_verify($password, $uPassword)) {
    session_start();
    $_SESSION['user_id'] = $uId;
    $_SESSION['logged'] = TRUE;
    $_SESSION['user_name'] = $uName;
    $_SESSION['user_type'] = "client";
    $statement->close();
    echo "LOGIN_SUCCESS_CLIENT";
  }
} else {
    $statement=$conn->prepare("
      SELECT provider_id, provider_name, provider_password, DATE_FORMAT(opening_hours, '%H:%i') AS 'opening_hours', DATE_FORMAT(closing_hours, '%H:%i') AS 'closing_hours'
      FROM provider
      WHERE provider_email = ?
      LIMIT 1
    ");
    $statement->bind_param('s',$email);
    $statement->execute();
    $statement->store_result();
    if($statement->num_rows > 0) {
      $statement->bind_result($uId,$uName,$uPassword, $opening, $closing);
      $statement->fetch();
      if (password_verify($password, $uPassword)){
        session_start();
        $_SESSION['user_id'] = $uId;
        $_SESSION['logged'] = TRUE;
        $_SESSION['user_name'] = $uName;
        $_SESSION['user_type'] = "provider";
        $_SESSION['opening_hours'] = $opening;
        $_SESSION['closing_hours'] = $closing;
        $statement->close();
        echo "LOGIN_SUCCESS_PROVIDER";
    }
  } else {
    echo "Accesso fallito. Credenziali non valide.";
  }
}
include("../fragments/connection-end.php");
?>
