<?php
include_once(dirname(dirname(__FILE__)) .  "/index.php");
?>

<?php
if (!isRestaurant()) {
  setError("โปรดเข้าสู่ระบบก่อน!");
  setRedirectLink("/user/main.php", true);
  exit();
}
if (!isset($_GET["reservation_id"])) {
  setError("โปรดกรอกข้อมูลให้ครบถ้วน!");
  setRedirectLink("/res/main.php", true);
  exit();
}
$restaurant_id = $restaurant["id"];
$reservation_id = $_GET["reservation_id"];
$result = query("SELECT * FROM reservation WHERE id=$reservation_id AND restaurant_id=$restaurant_id");
if ($result->num_rows == 0) {
  setError("ไม่พบการจองนี้อยู่ในระบบ!");
  setRedirectLink("/res/main.php", true);
  exit();
}
$reservation = $result->fetch_assoc();
if ($reservation["status"] != "waiting") {
  setError("การจองนี้ถูกเปลี่ยนสถานะไปแล้วจึงไม่สามารถลบคิวได้!");
  setRedirectLink("/res/main.php", true);
  exit();
}
query("UPDATE reservation SET status='cancel' WHERE id=$reservation_id AND restaurant_id=$restaurant_id");
setSuccess("ลบคิวเรียบร้อยแล้ว!");
setRedirectLink("/res/main.php", true);
