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
        <div class="relative px-4 py-10 bg-white mx-8 md:mx-0 shadow rounded-3xl  w-auto md:w-96">
            <div class="flex min-h-full flex-col justify-center  lg:px-8">
                <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                    <h2 class="mt-1 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">ลงทะเบียน
                    </h2>
                </div>

                <div class="mt-5 sm:mx-auto sm:w-full sm:max-w-sm">
                    <form action="../funcs/register.php" class="space-y-6" action="#" method="POST">
                        <div>
                            <label for="username" class="block text-sm font-medium leading-6 text-gray-900">ชื่อผู้ใช้</label>
                            <div class="mt-2">
                                <input id="username" name="username" type="text" autocomplete="username" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#82AA33] sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div>
                            <label for="phone" class="block text-sm font-medium leading-6 text-gray-900">เบอร์โทร</label>
                            <div class="mt-2">
                                <input id="phone" name="phone" type="text" autocomplete="phone" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#82AA33] sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div>
                            <label for="password" class="block text-sm font-medium leading-6 text-gray-900">รหัสผ่าน</label>
                            <div class="mt-2">
                                <input id="password" name="password" type="password" autocomplete="password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#82AA33] sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div>
                            <label for="cpassword" class="block text-sm font-medium leading-6 text-gray-900">ยืนยันรหัสผ่าน</label>
                            <div class="mt-2">
                                <input id="cpassword" name="cpassword" type="password" autocomplete="cpassword" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#82AA33] sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <button type="submit" class="flex w-full justify-center rounded-md px-3 py-1.5 text-sm font-semibold leading-6  bg-[#D9D9D9] text-black hover:bg-[#82AA33] hover:text-white   px-3 py-1.5 text-sm font-semibold leading-6 text-shadow-sm focus-visible:outline 
                                focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">สมัครสมาชิก</button>
                    </form>
                    <!-- <p class="mt-8 text-center text-sm text-gray-500">

                        <a href="login.php" class="font-semibold leading-6 text-black hover:text-[#82AA33]">เข้าสู่ระบบ</a>
                    </p> -->
                   
                    <!-- <div class="text-center mt-3">
                        <a href="regisshop.php"
                            class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">ลงทะเบียนร้านอาหาร</a>
                    </div> -->


                </div>
            </div>

        </div>
    </div>
</div>
<?php
include_once(dirname(dirname(__FILE__)) . "/includes/footer-script.php");

?>