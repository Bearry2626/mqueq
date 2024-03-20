<?php
include('../index.php');
?>

<nav class="bg-white  fixed w-full z-20 top-0 start-0 border-b border-gray-200 ">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="<?php echo (isUser() ? 'main.php' : '../user/mainf.php'); ?>" class="flex items-center space-x-3 rtl:space-x-reverse">
    <img src="../img/logoo.png" class="h-8" alt="Flowbite Logo">
    <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">MQUEQ</span>
</a>

        <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">

            <?php
            if (isUser()) {
            ?>
                <div class=" relative inline-block text-left dropdown">
                    <!-- โค้ดส่วนที่แสดงเมื่อเข้าสู่ระบบ -->
                    <span class="rounded-md shadow-sm">
                        <button class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium leading-5 text-gray-700 transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800" type="button" aria-haspopup="true" aria-expanded="true" aria-controls="headlessui-menu-items-117">
                            <svg class="w-5 h-5  text-gray-800 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm-2 3h4a4 4 0 0 1 4 4v2H1v-2a4 4 0 0 1 4-4Z" />
                            </svg>
                            <span class="rounded-md shadow-sm hidden sm:flex"><?php echo $user["username"] ?></span>
                            <svg class="w-5 h-5 ml-2 -1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </span>
                    <div class="opacity-0 invisible dropdown-menu transition-all duration-300 transform origin-top-right -translate-y-2 scale-95">
                        <div class="absolute right-0 w-56 mt-2 origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none" aria-labelledby="headlessui-menu-button-1" id="headlessui-menu-items-117" role="menu">
                            <div class="py-1">
                                <a href="../logout.php" tabindex="3" class="text-gray-700 flex justify-between w-full px-4 py-2 text-sm leading-5 text-left md:hover:text-[#82AA33]" role="menuitem">Sign out</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            } else {
            ?>
                <!-- โค้ดส่วนที่แสดงเมื่อไม่ได้เข้าสู่ระบบ -->
                <a href="../into/login.php" type="button" class="md:hover:text-[#82AA33] text-black text-sm px-4 py-2 
                text-center ">เข้าสู่ระบบ</a>
                <div class=" relative inline-block text-left dropdown">
                    <span class="rounded-md shadow-sm">
                        <button class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium leading-5 text-gray-700 transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800" type="button" aria-haspopup="true" aria-expanded="true" aria-controls="headlessui-menu-items-117">
                            <svg class="w-5 h-5  text-gray-800 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm-2 3h4a4 4 0 0 1 4 4v2H1v-2a4 4 0 0 1 4-4Z" />
                            </svg>
                            <span class="rounded-md shadow-sm hidden sm:flex">ลงทะเบียน</span>
                            <svg class="w-5 h-5 ml-2 -1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </span>
                    <div class="opacity-0 invisible dropdown-menu transition-all duration-300 transform origin-top-right -translate-y-2 scale-95">
                        <div class="absolute right-0 w-56 mt-2 origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none" aria-labelledby="headlessui-menu-button-1" id="headlessui-menu-items-117" role="menu">
                            <div class="py-1">
                                <a href="../into/register.php" tabindex="0" class="text-gray-700 flex justify-between w-full px-4 py-2 text-sm leading-5 text-left md:hover:text-[#82AA33]" role="menuitem">ผู้ใช้ทั่วไป</a>
                            </div>
                            <div class="py-1">
                                <a href="../into/regisshop.php" tabindex="0" class="text-gray-700 flex justify-between w-full px-4 py-2 text-sm leading-5 text-left md:hover:text-[#82AA33]" role="menuitem">เข้าร่วมร้านอาหาร</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
        <!-- เพิ่มส่วนนี้เพื่อซ่อนเมื่อไม่ได้เข้าสู่ระบบ -->
        <?php
        if (isUser()) {
        ?>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
                <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="main.php" class="block py-2 px-3 text-gray-900 rounded 
                            md:hover:text-[#82AA33] md:p-0     " aria-current="page">ร้านอาหาร</a>
                    </li>
                    <li>
                        <a href="queq.php" class="block py-2 px-3 text-gray-900 rounded 
                            md:hover:text-[#82AA33] md:p-0    ">การจองของคุณ</a>
                    </li>
                </ul>
            </div>
        <?php
        }
        ?>
    </div>
</nav>

<style>
    .dropdown:focus-within .dropdown-menu {
        opacity: 1;
        transform: translate(0) scale(1);
        visibility: visible;
    }

    <?php
    if (!isUser()) {
    ?>
        /* เพิ่มส่วนนี้เพื่อซ่อนเมื่อไม่ได้เข้าสู่ระบบ */
        .hidden-when-not-logged-in {
            display: none;
        }
    <?php
    }
    ?>
</style>

<!-- เพิ่มส่วนนี้เพื่อซ่อนเมื่อไม่ได้เข้าสู่ระบบ -->
<div class="hidden-when-not-logged-in items-center justify-between w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
    <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
        <li>
            <a href="main.php" class="block py-2 px-3 text-gray-900 rounded 
                md:hover:text-[#82AA33] md:p-0     " aria-current="page">ร้านอาหาร</a>
        </li>
        <li>
            <a href="queq.php" class="block py-2 px-3 text-gray-900 rounded 
                md:hover:text-[#82AA33] md:p-0    ">การจองของคุณ</a>
        </li>
    </ul>
</div>
