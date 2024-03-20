<?php
include('../index.php');
include('nuvbar.php');
?>

<div class="max-w-screen-xl  mx-auto content  transform  duration-500 pt-20 px-2 md:px-5  ">
    <!-- button back -->
    <div class="flex  flex-row">
        <a href="main.php" class="basis-1 lg:basis-1 p-2 lg:text-sm ">
            <button type="submit" class="w-full py-2 ">
                <svg class="w-4 h-4 text-gray-800  hover:text-[#9BBA62]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4" />
                </svg>
            </button>
        </a>
        <a href="main.php" class="lg:text-sm ">
            <button type="submit" class="w-full py-2 "></button>
        </a>
        <div class=" mt-2 text-lg">
            <p>คำขอเข้าร่วม</p>
        </div>
    </div>
    <!-- button back -->
    <div class="bg-white shadow-md  rounded-t-lg p-2 ">
        <div class="flex flex-wrap  mx-5 md:mx-2">
            <div class="w-full lg:w-1/4 p-1">
                <div class="text-2xl">
                    <p>คำขอเข้าร่วมร้านอาหาร</p>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-white shadow-md  rounded-md  mt-4">
        <div class="flex flex-wrap my-5 mx-2">
            <!-- content -->

            <?php
            $all_res = query("SELECT * FROM restaurant WHERE status='waiting'");
            while ($resData = $all_res->fetch_assoc()) {
            ?>
                <div class="w-full lg:w-2/4 ">
                    <div class="flex flex-col">
                        <div class="bg-white shadow-md  rounded-3xl border-solid border-2 rounded-md p-3 ">
                            <div class="flex-none lg:flex">
                                <div class=" h-full w-full lg:h-50 lg:w-48   lg:mb-0 mb-3">
                                    <img src="../img/restaurant/<?php echo $resData['image']; ?>" alt="Just a flower" class=" w-full object-scale-down lg:object-cover lg:h-48 rounded-2xl">
                                </div>
                                <div class="flex-auto ml-3 justify-evenly ">
                                    <div class="flex flex-wrap ">
                                        <h2 class="flex-auto text-lg font-medium">ร้าน <?php echo $resData["name"] ?></h2>
                                    </div>
                                    <div class="flex py-4  text-sm text-gray-500">
                                        <div class="flex-1 inline-flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                                </path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            </svg>
                                            <p class="">ที่อยู่ : <?php echo $resData["address"] ?></p>
                                        </div>
                                    </div>
                                    <div class="flex py-4  text-sm text-gray-500">
                                        <div class="flex-1 inline-flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                                </path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            </svg>
                                            <p class="">เบอร์โทร : <?php echo $resData["phone"] ?></p>
                                        </div>
                                    </div>
                                    <div class="flex p-4 pb-2 border-t border-gray-200 "></div>
                                    <div class="flex space-x-3 text-sm font-medium">
                                        <a href="../funcs/approve-restaurant.php?id=<?php echo $resData['id'] ?>&page=main" class="mb-2 md:mb-0 bg-gray-900 px-5 py-2 shadow-sm tracking-wider text-white rounded-full hover:bg-gray-800" type="button" aria-label="like" type="button" data-modal-toggle="authentication-modal">ยืนยันร้านอาหาร</a>
                                        <a href="../funcs/reject-restaurant.php?id=<?php echo $resData['id'] ?>&page=main" class="mb-2 md:mb-0 bg-gray-900 px-5 py-2 shadow-sm tracking-wider text-white rounded-full hover:bg-gray-800" type="button" aria-label="like" type="button" data-modal-toggle="authentication-modal">ยกเลิกร้านอาหาร</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php

            }
            ?>
        </div>
        <!-- product -->
    </div>
</div>
</div>
</div>