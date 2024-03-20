<?php
include('../index.php');
include('navbar.php');
?>
<?php
if (!isUser()) {
    redirect("../into/login.php");
}
?>
<?php
$result =  query("SELECT * FROM reservation WHERE user_id=" . $user["id"] . " AND status='waiting'");
if ($result->num_rows == 0) {
?>
    <div class='flex items-center justify-center min-h-screen  bg-[#F3F4F6] p-12'>
        <div class='w-full max-w-lg px-4 py-8 mx-auto bg-white rounded-lg shadow-xl'>
            <div class='max-w-md mx-auto space-y-6'>

                <div class="px-4 mx-auto max-w-screen-xl 6 lg:px-4">
                    <div class="mx-auto max-w-screen-sm text-center">
                        <h1 class="mb-4 text-7xl tracking-tight font-extrabold lg:text-9xl text-primary-600 dark:text-primary-500">
                            -
                        </h1>
                        <p class="mb-4 text-3xl tracking-tight font-bold text-black md:text-4xl">คุณยังไม่ได้จองคิว</p>
                        <p class="mb-4  font-light text-gray-500 dark:text-gray-400">
                            สามารถเลือกร้านเพื่อจองคิวได้เลย</p>
                        <a href="./main.php" class="mb-2 md:mb-0 bg-gray-900 px-5 py-2 shadow-sm tracking-wider text-white rounded-full hover:bg-gray-800" aria-label="like">ร้านอาหาร</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
<?php
} else {
    $reservation = $result->fetch_assoc();
    $restaurant = query("SELECT * FROM restaurant WHERE id=" . $reservation["restaurant_id"])->fetch_assoc();
?>
    <div class='flex items-center justify-center min-h-screen  bg-[#F3F4F6] p-12'>
        <div class='w-full max-w-lg px-4 py-8 mx-auto bg-white rounded-lg shadow-xl'>
            <div class='max-w-md mx-auto space-y-6'>

                <div class="px-4 mx-auto max-w-screen-xl 6 lg:px-4">
                    <div class="mx-auto max-w-screen-sm text-center">
                        <h1 class="mb-4 text-7xl tracking-tight font-extrabold lg:text-9xl text-primary-600 dark:text-primary-500">
                            <?php echo formatQueqNumber($reservation["queq_number"]); ?>
                        </h1>
                        <p class="mb-4 text-3xl tracking-tight font-bold text-black md:text-4xl">ร้าน <?php echo $restaurant["name"]; ?></p>
                        <p class="mb-4  font-light text-gray-500 dark:text-gray-400">
                            หากท่านมารายงานตัวช้าทางเราขอสงวนสิทธิ์ให้คิวถัดไป</p>
                        <button class="mb-2 md:mb-0 bg-gray-900 px-5 py-2 shadow-sm tracking-wider text-white rounded-full hover:bg-gray-800" type="button" aria-label="like" type="button" data-modal-toggle="authentication-modal">ยกเลิก</button>
                    </div>
                </div>

            </div>
        </div>
    </div>

<?php

}
?>






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
                <form class="space-y-6 px-6 lg:px-8 pb-4 sm:pb-6 xl:pb-8" action="../funcs/cancel-reservation.php" method="post">
                    <h3 class="text-xl font-medium text-gray-900 dark:text-white">ต้องการยกเลิกการจองคิว</h3>
                    <button type="submit" class="w-full text-white bg-[#82AA33] hover:bg-[#95C754] focus:ring-4 focus:ring-blue-300 
                    font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">ตกลง</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>