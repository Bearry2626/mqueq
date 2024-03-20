<?php
include_once(dirname(dirname(__FILE__)) .  "/config/config.php");
function setError($msg) {
  $_SESSION["error"] = $msg;
}
function setSuccess($msg) {
  $_SESSION["success"] = $msg;
}

function setRedirectLink($link, $addFooter = false) {
  global $projectUrl;
  $_SESSION["redirectLink"] = $link;
  if ($addFooter) {
    include_once(dirname(dirname(__FILE__)) .  "/includes/footer-script.php");
  }
}
function isError() {
  return isset($_SESSION["error"]) && !empty($_SESSION["error"]);
}



function isRestaurant() {
  global $restaurant;
  return isset($_SESSION["restaurant_id"]) && isset($restaurant);
}

function isUser() {
  global $user;
  return isset($_SESSION["user_id"]) && $user["role"] == "user";
}
function isAdmin() {
  global $user;
  return isset($_SESSION["user_id"]) && $user["role"] == "admin";
}
function isUserOrAdmin() {
  return isUser() || isAdmin();
}
function redirect($url) {
?>
  <script>
    window.location.href = '<?php echo $url; ?>';
  </script>
<?php
  exit();
}
function isPhoneNumber($text) {
  $cleanedText = preg_replace('/[^0-9]/', '', $text);
  return strlen($cleanedText) === 10;
}

function isDuplicatePhone($phone) {
  $result = query("SELECT * FROM user WHERE phone='$phone'");
  if ($result->num_rows >= 1) {
    return true;
  } else {
    $result2 = query("SELECT * FROM restaurant WHERE phone='$phone'");
    return $result2->num_rows >= 1;
  }
}


function getQueqMsg($restaurant_id) {
  $result = query("SELECT * FROM reservation WHERE restaurant_id=$restaurant_id AND status='waiting'");
  $queqCount = $result->num_rows;
  if ($queqCount > 0) {
    return "คิวก่อนหน้าอีก " . $queqCount . " คิว";
  } else {
    return "ยังไม่มีผู้จองคิว";
  }
}

function getLastQueqNumber($restaurant_id) {
  $today = date("Y-m-d");
  $check = query("SELECT * FROM reservation WHERE restaurant_id=$restaurant_id AND CAST(reservation_date AS DATE) = '$today' ORDER BY id DESC");
  if ($check->num_rows == 0) {
    return 0;
  } else {
    $reservation_data = $check->fetch_assoc();
    return $reservation_data["queq_number"];
  }
}
function formatQueqNumber($number) {
  return sprintf("%03d", $number);
}

function getUser($user_id) {
  $result = query("SELECT * FROM user WHERE id=$user_id");
  if ($result->num_rows == 0) {
    return null;
  } else {
    return $result->fetch_assoc();
  }
}
