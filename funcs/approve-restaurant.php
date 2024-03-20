<?php
include_once(dirname(dirname(__FILE__)) .  "/index.php");
?>

<?php
if (!isAdmin()) {
  setError("โปรดเข้าสู่ระบบก่อน!");
  setRedirectLink("/user/main.php", true);
  exit();
}
$id = $_GET["id"];
$page = $_GET["page"];
$pageLink = "/admin/$page.php";
if ($id == "") {
  setError("โปรดกรอกข้อมูลให้ครบถ้วน!");
  setRedirectLink($pageLink, true);
  exit();
}
$resResult = query("SELECT * FROM restaurant WHERE id=$id");
if ($resResult->num_rows == 0) {
  setError("ไม่พบร้านนี้อยู่ในระบบ!");
  setRedirectLink($pageLink, true);
  exit();
}
$resData = $resResult->fetch_assoc();
if ($resData["status"] != "waiting") {
  setError("ไม่สามารถอนุมัติร้านนี้ได้! เนื่องจากถูกปรับสถานะไปแล้ว!");
  setRedirectLink($pageLink, true);
  exit();
}
query("UPDATE restaurant SET status='approved' WHERE id=$id");
setSuccess("อนุมัติ ร้าน " . $resData["name"] . " เรียบร้อยแล้ว!");
setRedirectLink($pageLink, true);
