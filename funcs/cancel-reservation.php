<?php
include_once(dirname(dirname(__FILE__)) .  "/index.php");
?>

<?php
if (!isUser()) {
  setError("โปรดเข้าสู่ระบบก่อน!");
  setRedirectLink("/user/main.php", true);
  exit();
}
query("UPDATE reservation SET status='cancel' WHERE user_id=" . $user["id"] . " AND status='waiting'");
setSuccess("ยกเลิกคิวเรียบร้อยแล้ว!");
setRedirectLink("/user/main.php", true);
