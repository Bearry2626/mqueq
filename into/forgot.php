<?php
include('../index.php');
include('../user/navbar.php');
?>
<div class="min-h-screen bg-gray-100 py-6 flex flex-col justify-center mt-9">
    <div class="relative py-3 sm:max-w-xl sm:mx-auto">
        <!-- button back -->
        <div class="flex  flex-row  ">
            <a href="login.php" class="basis-1 lg:basis-1 p-2 text-sm lg:text-sm ">
                <button type="submit" class="w-full  bg-gray-300 rounded-lg px-4 py-2  text-white hover:scale-105">
                    <svg class="w-4 h-4 text-gray-800 text-sm " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4" />
                    </svg>
                </button>
            </a>
        </div>
        <!-- button back -->
        <div id="phone-form-container" class="relative px-4 py-10 bg-white mx-8 md:mx-0 shadow rounded-3xl  w-auto md:w-96">
            <div class="flex min-h-full flex-col justify-center  lg:px-8">
                <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                    <h2 class="mt-1 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">ลืมรหัสผ่าน
                    </h2>
                </div>
                <div class="mt-5 sm:mx-auto sm:w-full sm:max-w-sm">
                    <form id="phone-form" class="space-y-6">
                        <div>
                            <label for="number" class="block text-sm font-medium leading-6 text-gray-900">เบอร์โทร</label>
                            <div class="mt-2">
                                <input id="phone_number" name="phone_number" type="text" autocomplete="number" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#82AA33] sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div id="recaptcha-container"></div>
                        <div>
                            <button id="send_phone_btn" type="submit" class="flex w-full justify-center rounded-md bg-[#82AA33]  hover:bg-[#9BBA62]  px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm  focus-visible:outline 
                                focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">ส่ง OTP</button>
                        </div>
                    </form>
                    <div class="text-sm text-center mt-4">
                        <a href="login.php" class="font-semibold text-black hover:text-[#82AA33]">กลับเข้าสู่ระบบ</a>
                    </div>
                </div>
            </div>
        </div>
        <div id="otp-form-container" class="hidden relative px-4 py-10 bg-white mx-8 md:mx-0 shadow rounded-3xl  w-auto md:w-96">
            <div class="flex min-h-full flex-col justify-center  lg:px-8">
                <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                    <h2 class="mt-1 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">ยืนยันรหัส OTP
                    </h2>
                </div>
                <div class="mt-5 sm:mx-auto sm:w-full sm:max-w-sm">
                    <form id="otp-form" class="space-y-6">
                        <div>
                            <label for="number" class="block text-sm font-medium leading-6 text-gray-900">รหัส OTP</label>
                            <div class="mt-2">
                                <input id="verificationCode" name="verificationCode" type="text" autocomplete="false" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#82AA33] sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div>
                            <button id="otp-confirm-btn" type="submit" class="flex w-full justify-center rounded-md bg-[#82AA33]  hover:bg-[#9BBA62]  px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm  focus-visible:outline 
                                focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">ยืนยัน OTP</button>
                        </div>
                    </form>
                    <div class="text-sm text-center mt-4">
                        <a href="login.php" class="font-semibold text-black hover:text-[#82AA33]">กลับเข้าสู่ระบบ</a>
                    </div>
                </div>
            </div>
        </div>
        <div id="reset-password-form-container" class="hidden relative px-4 py-10 bg-white mx-8 md:mx-0 shadow rounded-3xl  w-auto md:w-96">
            <div class="flex min-h-full flex-col justify-center  lg:px-8">
                <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                    <h2 class="mt-1 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">ยืนยันการเปลี่ยนรหัส
                    </h2>
                </div>
                <div class="mt-5 sm:mx-auto sm:w-full sm:max-w-sm">
                    <form id="reset-password-form" action="../funcs/reset-password.php" method="post" class="space-y-6">
                        <div>
                            <label for="password" class="block text-sm font-medium leading-6 text-gray-900">รหัสผ่าน</label>
                            <div class="mt-2">
                                <input id="password" name="password" type="password" autocomplete="password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div>
                            <label for="repassword" class="block text-sm font-medium leading-6 text-gray-900">ยืนยันรหัสผ่าน</label>
                            <div class="mt-2">
                                <input id="repassword" name="repassword" type="password" autocomplete="repassword" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <input id="phone_confirm_number" type="hidden" name="phone_number" value="">
                        <div>
                            <button type="submit" class="flex w-full justify-center rounded-md bg-[#82AA33]  hover:bg-[#9BBA62]  px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm  focus-visible:outline 
                                focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">ยืนยันการเปลี่ยนรหัส</button>
                        </div>
                    </form>
                    <div class="text-sm text-center mt-4">
                        <a href="login.php" class="font-semibold text-black hover:text-[#82AA33]">กลับเข้าสู่ระบบ</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once("../includes/firebase.php");
?>