<?php
include('../index.php');
include('../user/navbar.php');
?>

<div class="min-h-screen bg-gray-100 py-6 flex flex-col justify-center ">
    <div class="relative py-3 sm:max-w-xl sm:mx-auto">
        <div class="relative px-4 py-10 bg-white mx-8 md:mx-0 shadow rounded-3xl  w-auto md:w-96">
            <div class="flex min-h-full flex-col justify-center  lg:px-8">
                <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                    <img class="mx-auto h-20 w-auto" src="../img/logoo.png" alt="Your Company">
                    <h2 class="mt-3 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">เข้าสู่ระบบ
                    </h2>
                </div>

                <div class="mt-5 sm:mx-auto sm:w-full sm:max-w-sm">
                    <form action="../funcs/login.php" class="space-y-6" action="#" method="POST">
                        <div>
                            <label for="phone" class="block text-sm font-medium leading-6 text-gray-900">เบอร์โทร</label>
                            <div class="mt-2">
                                <input id="phone" name="phone" type="text" autocomplete="number" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#82AA33] sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div>
                            <label for="password" class="block text-sm font-medium leading-6 text-gray-900">รหัสผ่าน</label>
                            <div class="mt-2">
                                <input id="password" name="password" type="password" autocomplete="password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#82AA33] sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div>
                            <button type="submit" class="flex w-full justify-center rounded-md bg-[#D9D9D9] text-black hover:bg-[#82AA33] hover:text-white   px-3 py-1.5 text-sm font-semibold leading-6 text-shadow-sm focus-visible:outline 
                                focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">เข้าสู่ระบบ</button>
                        </div>

                    </form>

                    <div class="text-sm text-center mt-4">
                        <a href="forgot.php" class="font-semibold text-black hover:text-[#82AA33]">ลืมรหัสผ่าน?</a>
                    </div>
                    <p class="mt-4 text-center text-sm text-gray-500">
                        ยังไม่มีบัญชี?
                        <a href="register.php" class="font-semibold leading-6 text-black hover:text-[#82AA33]">ลงทะเบียนเข้าร่วม</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once(dirname(dirname(__FILE__)) . "/includes/footer-script.php");

?>