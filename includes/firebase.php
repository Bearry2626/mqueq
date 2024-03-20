<script src="https://www.gstatic.com/firebasejs/8.3.1/firebase.js"></script>
<script>
  // Your web app's Firebase configuration
  const firebaseConfig = {
  apiKey: "AIzaSyBEpVXEafOyl_ArM1AYRdU6byfgggud4xE",
  authDomain: "mqueq-12002.firebaseapp.com",
  projectId: "mqueq-12002",
  storageBucket: "mqueq-12002.appspot.com",
  messagingSenderId: "806103381638",
  appId: "1:806103381638:web:dadb644367516498444307",
  measurementId: "G-P0L4QN8J0C"
};

  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  firebase.analytics();
</script>

<script>
  let phoneAuthing = false;
  window.onload = function() {
    render();
  };

  function render() {
    window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');
    recaptchaVerifier.render();
  }

  async function phoneAuth() {
    var numberText = document.getElementById('phone_number').value;
    const checkResult = await checkPhone(numberText);
    if (!checkResult.includes("found-phone-number")) {
      Swal.fire({
        title: "เกิดข้อผิดพลาด!",
        text: "ไม่พบเบอร์โทรนี้อยู่ในระบบ!",
        icon: "error"
      })
      return;
    }
    let number = "+66" + numberText;
    const recaptchaMark = document.getElementsByClassName("recaptcha-checkbox-checkmark");
    if (recaptchaMark.length == 0) {
      Swal.fire({
        title: "ขออภัย!",
        text: "โปรดกดแคปช่าก่อน!!",
        icon: "error"
      })
    }
    document.getElementById("phone_confirm_number").value = numberText;
    if (phoneAuthing) {
      return;
    }
    phoneAuthing = true;

    firebase.auth().signInWithPhoneNumber(number, window.recaptchaVerifier).then(function(confirmationResult) {
      phoneAuthing = false;
      window.confirmationResult = confirmationResult;
      coderesult = confirmationResult;
      Swal.fire({
        title: "ส่งรหัส OTP แล้ว",
        text: "กรอกรหัส OTP เพื่อยันยันการเปลี่ยนรหัสผ่าน",
        icon: "success"
      })
      displayShowOtpConfirm();
    }).catch(function(error) {
      phoneAuthing = false;
      Swal.fire({
        title: "เกิดข้อผิดพลาด!",
        text: error.message,
        icon: "error"
      }).then(function() {
        window.location.reload;
      });
    });

  }

  function codeverify() {
    var code = document.getElementById('verificationCode').value;
    coderesult.confirm(code).then(function(result) {
      Swal.fire({
        title: "รหัส OTP ถูกต้อง!",
        text: "มาเปลี่ยนรหัสผ่านกัน!",
        icon: "success"
      })
      displayResetPassword();
    }).catch(function(error) {
      Swal.fire({
        title: "ขออภัย!",
        text: "รหัส OTP ไม่ถูกต้อง!",
        icon: "error"
      })
    });
  }

  function displayShowOtpConfirm() {
    const phoneFormContainer = document.getElementById("phone-form-container");
    const otpFormContainer = document.getElementById("otp-form-container");
    phoneFormContainer.classList.add("hidden");
    otpFormContainer.classList.remove("hidden");
  }

  function displayResetPassword() {
    const otpFormContainer = document.getElementById("otp-form-container");
    otpFormContainer.classList.add("hidden");
    const resetPasswordFormContainer = document.getElementById("reset-password-form-container");
    resetPasswordFormContainer.classList.remove("hidden");
  }
</script>

<script>
  const phoneForm = document.getElementById("phone-form");
  phoneForm.onsubmit = (e) => {
    e.preventDefault();
    phoneAuth();
  }

  const otpForm = document.getElementById("otp-form");
  otpForm.onsubmit = (e) => {
    e.preventDefault();
    codeverify();
  }

  const resetPasswordForm = document.getElementById("reset-password-form");
  resetPasswordForm.onsubmit = (e) => {
    const password = document.getElementById("password").value;
    const repassword = document.getElementById("repassword").value;
    if (password == "" || repassword == "") {
      e.preventDefault();
      Swal.fire({
        title: "ขออภัย!",
        text: "โปรดกรอกข้อมูลให้ครบถ้วน!",
        icon: "error"
      })
      return;
    }
    if (password != repassword) {
      e.preventDefault();
      Swal.fire({
        title: "ขออภัย!",
        text: "รหัสผ่านไม่ตรงกัน!",
        icon: "error"
      })
      return;
    }
  }
</script>

<script>
  async function checkPhone(phoneNumber) {
    try {
      const response = await fetch('../funcs/check-phone.php?phone=' + phoneNumber, {
        method: 'GET',
      });

      if (!response.ok) {
        throw new Error(`HTTP error ${response.status}`);
      }

      const text = await response.text(); // Get raw text response
      return text.replace(" ", "").replace(/\n/g, ' ');
    } catch (error) {
      console.error('Error fetching response:', error);
      throw error; // Re-throw the error for further handling
    }
  }
</script>