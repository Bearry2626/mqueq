<?php
include_once(dirname(dirname(__FILE__)) .  "/index.php");
?>

<?php
if (!isUser()) {
  setError("โปรดเข้าสู่ระบบก่อน!");
  setRedirectLink("/user/main.php", true);
  exit();
}
$persons = $_POST["persons"];
$restaurant_id = $_POST["restaurant_id"];

$resResult = query("SELECT * FROM restaurant WHERE id=$restaurant_id");
if ($resResult->num_rows == 0) {
  setError("ไม่พบร้านที่คุณต้องการจะจอง!");
  setRedirectLink("/user/main.php", true);
  exit();
}
$resData = $resResult->fetch_assoc();
if ($resData["status"] != "approved") {
  setError("ร้านนี้ยังไม่ได้รับการอนุมัติ! จึงไม่สามารถจองคิวได้!");
  setRedirectLink("/user/main.php", true);
  exit();
}

$waiting = query("SELECT * FROM reservation WHERE user_id=" . $user["id"] . " AND status='waiting'");
if ($waiting->num_rows >= 1) {
  setError("คุณจองคิวไปแล้ว! หากต้องการจองคิวอื่น กรุณายกเลิกคิวล่าสุดของคุณก่อน");
  setRedirectLink("/user/main.php", true);
  exit();
}
$lastQueqNumber = getLastQueqNumber($restaurant_id);
$user_id = $user["id"];
$queq_number = $lastQueqNumber + 1;
query("INSERT INTO reservation (user_id, restaurant_id, queq_number, persons) VALUES (
  $user_id, $restaurant_id, $queq_number, $persons
)");
setSuccess("จองคิวเรียบร้อยแล้ว!");
setRedirectLink("/user/queq.php", true);
