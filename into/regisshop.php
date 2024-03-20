<?php
include('../index.php');
include('../user/navbar.php');
?>
<div class="min-h-screen bg-gray-100 py-6 flex flex-col justify-center mt-12">
    <div class="relative py-3 sm:max-w-xl sm:mx-auto">

        <div class="relative px-4 py-10 bg-white mx-8 md:mx-0 shadow rounded-3xl  w-auto md:w-96">
            <div class="flex min-h-full flex-col justify-center  lg:px-8">
                <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                    <h2 class="mt-1 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">
                        ลงทะเบียนร้านอาหาร
                    </h2>
                </div>

                <div class="mt-5 sm:mx-auto sm:w-full sm:max-w-sm">
                    <form class="space-y-6" action="../funcs/registershop.php" method="POST" enctype="multipart/form-data">
                        <div>
                            <label for="name" class="block text-sm font-medium leading-6 text-gray-900">ชื่อร้านอาหาร</label>
                            <div class="mt-2">
                                <input id="name" name="name" type="text" autocomplete="name" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#82AA33] sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div>
                            <label for="phone" class="block text-sm font-medium leading-6 text-gray-900">เบอร์โทร</label>
                            <div class="mt-2">
                                <input id="phone" name="phone" type="text" autocomplete="phone" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#82AA33] sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div>
                            <label for="address" class="block text-sm font-medium leading-6 text-gray-900">ที่อยู่ร้านอาหาร</label>
                            <div class="mt-2.5">
                                <textarea name="address" id="address" rows="4" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#82AA33] sm:text-sm sm:leading-6"></textarea>
                            </div>
                        </div>
                        <div class="col-span-full">
                            <label for="photoshop" class="block text-sm font-medium leading-6 text-gray-900">รูปร้านอาหาร</label>
                            <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                                <div class="text-center">
                                    <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
                                    </svg>
                                    <div class="flex items-center justify-center mt-4">
                                        <div class="flex text-sm leading-6 text-gray-600">
                                            <label for="file-upload" class="relative cursor-pointer rounded-md bg-white font-semibold text-[#82AA33] focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:[#82AA33]">
                                                <span class="">Upload a file</span>
                                                <input id="file-upload" name="img" type="file" class="sr-only">
                                            </label>
                                        </div>
                                    </div>

                                    <p class="text-xs leading-5 text-gray-600">PNG, JPG, up to 10MB</p>
                                </div>
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
                        <div>
                            <button type="submit" class="flex w-full justify-center rounded-md  bg-[#D9D9D9] text-black hover:bg-[#82AA33] hover:text-white   px-3 py-1.5 text-sm font-semibold leading-6 text-shadow-sm focus-visible:outline  
                                focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">สมัครสมาชิก</button>
                        </div>
                    </form>
                    <p class="mt-8 text-center text-sm text-gray-500">

                        <a href="login.php" class="font-semibold leading-6 text-[#82AA33] hover:text-[#95C754] ">เข้าสู่ระบบ</a>
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>
<?php
include_once(dirname(dirname(__FILE__)) . "/includes/footer-script.php");

?>