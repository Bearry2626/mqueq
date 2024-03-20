<?php
include('../index.php');
include('nuvbar.php');
?>
<?php
$whereCause = "";
if (isset($_GET["search"])) {
    $search = $_GET["search"];
    $search_other = str_replace("ร้าน", "", $search);
    $whereCause = "WHERE name LIKE '%$search%' OR name LIKE '%$search_other%'";
}
?>

<div class="max-w-screen-xl  mx-auto content  transform  duration-500 pt-20 px-2 md:px-5  ">
    <!-- select -->
    <form>
        <div class="grid justify-items-center ">
            <div class="mt-2 flex max-w-md w-full gap-x-4 ">
                <label for="search" class="sr-only">ค้นหาร้านอาหาร</label>
                <input id="search" name="search" type="text" autocomplete="search" required class="border-solid border-2 min-w-0 flex-auto rounded-md border-0 bg-white px-3.5 py-2 text-black shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 
                focus:ring-inset  sm:text-sm sm:leading-6" placeholder="ค้นหาร้านอาหาร">
                <button type="submit" class="flex-none rounded-md px-3.5 py-2.5 bg-[#82AA33] hover:bg-[#95C754] text-sm font-semibold text-white shadow-sm  focus-visible:outline 
                focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">ค้นหา</button>
            </div>
        </div>
    </form> <!-- select -->
    <div class="bg-white shadow-md  rounded-t-lg p-2 mt-2">
        <div class="flex flex-wrap  mx-5 md:mx-2">
            <div class="w-full lg:w-1/4 p-1">
                <div class="text-2xl">
                    <p>ข้อมูลร้านอาหาร</p>
                </div>
            </div>
        </div>
    </div>
    <div class="rounded-md mt-4">
        <div class="flex flex-wrap my-2 ">
            <!-- content -->
            <?php
            $all_res = query("SELECT * FROM restaurant $whereCause");
            while ($resData = $all_res->fetch_assoc()) {
            ?>
                <div class="w-full lg:w-2/4 restaurant-item">
                    <div class="flex flex-col">
                        <div class="bg-white shadow-md  rounded-3xl border-solid border-2 rounded-md p-4 ">
                            <div class="flex-none lg:flex">
                                <div class=" h-full w-full lg:h-50 lg:w-48   lg:mb-0 mb-3">
                                    <img src="../img/restaurant/<?php echo $resData['image']; ?>" alt="Just a flower" class=" w-full object-scale-down lg:object-cover lg:h-48 rounded-2xl">
                                </div>
                                <div class="flex-auto ml-3 justify-evenly ">
                                    <div class="flex flex-wrap ">
                                        <h2 class="flex-auto text-lg font-medium">ร้าน <?php echo $resData["name"] ?></h2>
                                        <a href="../funcs/delete-restaurant.php?restaurant_id=<?php echo $resData['id']; ?>" class="text-orange-500 ml-2" href="">ลบร้านค้า</a>

                                    </div>
                                    <div class="flex py-3  text-sm text-gray-500">
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
                                        <?php
                                        if ($resData["status"] == "waiting") {
                                        ?>
                                            <a href="../funcs/approve-restaurant.php?id=<?php echo $resData['id'] ?>&page=main" class="mb-2 md:mb-0 bg-gray-900 px-5 py-2 shadow-sm tracking-wider text-white rounded-full hover:bg-gray-800" type="button" aria-label="like" type="button" data-modal-toggle="authentication-modal">ยืนยันร้านอาหาร</a>
                                            <a href="../funcs/reject-restaurant.php?id=<?php echo $resData['id'] ?>&page=main" class="mb-2 md:mb-0 bg-gray-900 px-5 py-2 shadow-sm tracking-wider text-white rounded-full hover:bg-gray-800" type="button" aria-label="like" type="button" data-modal-toggle="authentication-modal">ยกเลิกร้านอาหาร</a>
                                        <?php
                                        } else if ($resData["status"] == "approved") {
                                        ?>
                                            <button class="mb-2 md:mb-0 bg-green-600 px-5 py-2 shadow-sm tracking-wider text-white rounded-full hover:bg-green-500" type="button" aria-label="like" type="button" data-modal-toggle="authentication-modal">อนุมัติแล้ว</button>
                                        <?php
                                        } else if ($resData["status"] == "rejected") {
                                        ?>
                                            <button class="mb-2 md:mb-0 bg-red-600 px-5 py-2 shadow-sm tracking-wider text-white rounded-full hover:bg-red-500" type="button" aria-label="like" type="button" data-modal-toggle="authentication-modal">ถูกยกเลิก</button>
                                        <?php
                                        }
                                        ?>
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
<style>
    .restaurant-item {
        margin-bottom: 20px; /* เพิ่มระยะห่างระหว่างแต่ละร้าน */
    }
</style>
