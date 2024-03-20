<script>
  let errorMsg = "";
  let successMsg = "";
  let redirectLink = "";
  <?php
  if (isset($_SESSION["error"]) && $_SESSION["error"] != "") {
  ?>
    errorMsg = "<?php echo $_SESSION["error"]; ?>";
  <?php
    unset($_SESSION["error"]);
  } else if (isset($_SESSION["success"]) && $_SESSION["success"] != "") {
  ?>
    successMsg = "<?php echo $_SESSION["success"]; ?>";
  <?php
    unset($_SESSION["success"]);
  }
  if (isset($_SESSION["redirectLink"]) && $_SESSION["redirectLink"] != "") {
  ?>
    redirectLink = "<?php echo $projectUrl . $_SESSION["redirectLink"]; ?>";
    if (redirectLink == "-") {
      redirectLink = window.location;
    }
  <?php
    unset($_SESSION["redirectLink"]);
  }
  ?>
  if (errorMsg != "") {
    Swal.fire({
      title: "ขออภัย!",
      text: errorMsg,
      icon: "error"
    }).then(function() {
      if (redirectLink != "") {
        window.location = redirectLink;
      };
    });
  } else if (successMsg != "") {
    Swal.fire({
      title: "สำเร็จ!",
      text: successMsg,
      icon: "success"
    }).then(function() {
      if (redirectLink != "") {
        window.location = redirectLink;
      };
    });
  }
</script>