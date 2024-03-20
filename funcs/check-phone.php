<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
include_once(dirname(dirname(__FILE__)) .  "/connection/connection.php");
include_once(dirname(dirname(__FILE__)) .  "/funcs/functions.php");
?>

<?php
$phone = $_GET["phone"];
$result = query("SELECT * FROM user WHERE phone='$phone'");
if ($result->num_rows == 0) {
  $result2 = query("SELECT * FROM restaurant WHERE phone='$phone'");
  if ($result2->num_rows == 0) {
    echo "not-found";
  } else {
    echo "found-phone-number";
  }
} else {
  echo "found-phone-number";
}
