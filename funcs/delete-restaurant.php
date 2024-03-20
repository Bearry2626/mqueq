<?php
include_once(dirname(dirname(__FILE__)) .  "/index.php");
?>

<?php
if (!isAdmin()) {
  setError("โปรดเข้าสู่ระบบก่อน!");
  setRedirectLink("/user/main.php", true);
  exit();
}
$id = $_GET["restaurant_id"];
if ($id == "") {
  setError("โปรดกรอกข้อมูลให้ครบถ้วน!");
  setRedirectLink("/admin/main.php", true);
  exit();
}
$result = query("SELECT * FROM restaurant WHERE id=$id");
if ($result->num_rows == 0) {
  setError("ไม่พบร้านนี้อยู่ในระบบ!");
  setRedirectLink("/admin/main.php", true);
  exit();
}
$resData = $result->fetch_assoc();
query("DELETE FROM restaurant WHERE id=$id");
setSuccess("ลบร้าน " . $resData["name"] . " เรียบร้อยแล้ว!");
setRedirectLink("/admin/main.php", true);
