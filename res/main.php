<?php
include('../index.php');
include('nuvbar.php');
?>
<?php
if (!isRestaurant()) {
    redirect("../into/login.php");
}
?>

</div>
<section class="bg-[#F3F4F6]">
    <div class="max-w-screen-xl  py-5 mx-auto pt-20 px-2 md:px-5 pb-4 ">
        <div class="bg-white shadow-md  rounded-t-lg p-2">
            <div class="flex flex-wrap  mx-2 md:mx-2">
                <!-- content -->
                <div class="w-full lg:w-1/4 p-1">
                    <div class="text-2xl">
                        <p>การจองคิว</p>
                    </div>
                </div>
                <!-- content -->
            </div>
        </div>
        <div class="bg-white shadow-md  rounded-md p-4 mt-4">
            <div class="flex flex-wrap  mx-5 md:mx-2">
                <!-- content -->
                <?php
                $result = query("SELECT * FROM reservation WHERE restaurant_id=" . $restaurant["id"] . " AND status='waiting'");
                while ($reservation = $result->fetch_assoc()) {
                    $user_data = getUser($reservation["user_id"]);
                    if ($user_data != null) {
                ?>
                        <div class="w-full lg:w-1/4 p-1">
                            <div class="flex items-center flex-row w-full bg-white border-solid border-2 rounded-md p-3 " type="button">
                                <div class="flex flex-col justify-around flex-grow ml-5">
                                    <div class="text-2xl  text-black">
                                        คิวที่ <?php echo formatQueqNumber($reservation["queq_number"]) ?>
                                    </div>
                                    <div class="text-md text-black">
                                        <?php echo $user_data["username"] ?>
                                    </div>
                                    <a href="../funcs/accept-queq.php?reservation_id=<?php echo $reservation['id']; ?>" class=" mt-2 stext-white  bg-[#82AA33]  hover:bg-[#9BBA62]   text-white rounded-lg text-sm px-5 
        py-2.5 me-2 mb-2 0 text-center">รับคิว</a>
                                    <a href="../funcs/cancel-queq.php?reservation_id=<?php echo $reservation['id']; ?>" type="button" class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 rounded 
        md:hover:text-[#82AA33] focus:outline-none bg-white rounded-lg border border-gray-200
        hover:bg-gray-100  focus:z-10 focus:ring-4 focus:ring-gray-200 text-center d
        ">ลบคิว</a>
                                </div>
                            </div>

                        </div>
                <?php
                    }
                }
                ?>
                <!-- content -->
            </div>
        </div>
    </div>
</section>


