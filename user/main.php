<?php
include_once('../index.php');
include_once('navbar.php');
?>
<?php
$whereCause = "";
if (isset($_GET["search"])) {
    $search = $_GET["search"];
    $search_other = str_replace("ร้าน", "", $search);
    $whereCause = " AND (name LIKE '%$search%' OR name LIKE '%$search_other%')";
}
?>
</div>
<section class=" mt-12">
    <div class="max-w-screen-xl px-4 py-3 mx-auto ">
        <form>
            <div class="grid justify-items-center ">
                <div class="mt-2 flex max-w-md w-full gap-x-4 ">
                    <label for="search" class="sr-only">ค้นหาร้านอาหาร</label>
                    <input id="search" name="search" type="text" autocomplete="search" required class="border-solid border-2 min-w-0 flex-auto rounded-md border-0 bg-white px-3.5 py-2 text-black shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 
                focus:ring-inset  sm:text-sm sm:leading-6" placeholder="ค้นหาร้านอาหาร">
                    <button type="submit" class="flex-none rounded-md bg-[#82AA33] hover:bg-[#95C754] px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm  focus-visible:outline 
                focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">ค้นหา</button>
                </div>
            </div>
        </form>
        <div class="flex flex-wrap my-5 mx-2">
            <!-- content -->
            <?php
            $all_res = query("SELECT * FROM restaurant WHERE status='approved' $whereCause");
            while ($resData = $all_res->fetch_assoc()) {
            ?>
                <div class="w-full lg:w-2/4 p-1">
                    <div class="flex flex-col">
                        <div class="bg-white shadow-md  rounded-3xl p-4">
                            <div class="flex-none lg:flex">
                                <div class=" h-full w-full lg:h-48 lg:w-48   lg:mb-0 mb-3">
                                    <img src="../img/restaurant/<?php echo $resData['image']; ?>" alt="Just a flower" class=" w-full  object-scale-down lg:object-cover  lg:h-48 rounded-2xl">
                                </div>
                                <div class="flex-auto ml-3 justify-evenly py-2">
                                    <div class="flex flex-wrap ">
                                        <h2 class="flex-auto text-lg font-medium"><?php echo $resData["name"] ?> </h2>
                                    </div>
                                    <p class="mt-3"></p>
                                    <div class="flex py-4  text-sm text-gray-500">
                                        <div class="flex-1 inline-flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                                </path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            </svg>
                                            <p class=""><?php echo $resData["address"] ?></p>

                                        </div>
                                        <button class="mb-2 md:mb-0 bg-white px-4 py-2 shadow-sm tracking-wider border text-gray-600 rounded-full  inline-flex items-center space-x-2 ">
                                            <span><?php echo getQueqMsg($resData["id"]) ?></span>
                                        </button>
                                    </div>
                                    <form method="post" action="../funcs/reservation.php">
                                        <div class="flex p-4 pb-2 border-t border-gray-200 "></div>
                                        <div class="flex space-x-3 text-sm font-medium">
                                            <div class="max-w-sm mx-auto">
                                                <input type="number" name="persons" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="เลือกจำนวนคน" required>
                                                <input type="hidden" name="restaurant_id" value="<?php echo $resData['id'] ?>">
                                            </div>
                                            <div class="flex-auto flex space-x-3">
                                                <input type="submit" value="จองคิว" class="mb-2 md:mb-0 cursor-pointer bg-white px-4 py-2 shadow-sm tracking-wider border text-gray-600 rounded-full hover:bg-gray-100 inline-flex items-center space-x-2 " />
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>

        </div>

    </div>
</section>

<!-- modal -->
<div class="max-w-2xl mx-auto">
    <div id="authentication-modal" aria-hidden="true" class="hidden overflow-x-hidden overflow-y-auto fixed h-modal md:h-full top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center">
        <div class="relative w-full max-w-md px-4 h-full md:h-auto">
            <!-- Modal content -->
            <div class="bg-white rounded-lg shadow relative dark:bg-gray-700">
                <div class="flex justify-end p-2">
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="authentication-modal">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <form class="space-y-6 px-6 lg:px-8 pb-4 sm:pb-6 xl:pb-8" action="#">
                    <h3 class="text-xl font-medium text-gray-900">จองคิว</h3>
                    <input type="number" class="w-full border-3">
                    <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 
                    font-medium rounded-lg text-sm px-5 py-2.5 text-center  ">จอง</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.bundle.js"></script>

<script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>

</html>
