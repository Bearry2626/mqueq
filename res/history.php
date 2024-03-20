<?php
include('../index.php');
include('nuvbar.php');
?>

<?php
if (!isRestaurant()) {
    redirect("../into/login.php");
}
?>
<?php
if (isset($_GET["date"])) {
    $date = $_GET["date"];
} else {
    $date = "";
}
$condition = "";
$restaurant_id = $restaurant["id"];
$queq_amount = 0;
$queq_cancel = 0;
if ($date == "") {
    $queq_amount = "X";
    $queq_cancel = "X";
} else if ($date == "1") {
    $today = date("Y-m-d");
    $result = query("SELECT * FROM reservation WHERE restaurant_id=$restaurant_id AND status='approved' AND CAST(reservation_date AS DATE) = '$today'");
    $queq_amount = $result->num_rows;
    $result_cancel = query("SELECT * FROM reservation WHERE restaurant_id=$restaurant_id AND status='cancel' AND CAST(reservation_date AS DATE) = '$today'");
    $queq_cancel = $result_cancel->num_rows;
} else if ($date == 2) {
    $today = date('Y-m-d');
    $two_days_ago = date('Y-m-d', strtotime('-2 days', strtotime($today)));
    $result =  query("SELECT * FROM reservation WHERE restaurant_id=$restaurant_id AND status='approved' AND reservation_date >= '$two_days_ago' AND reservation_date <= '$today'");
    $queq_amount = $result->num_rows;
    $result_cancel =  query("SELECT * FROM reservation WHERE restaurant_id=$restaurant_id AND status='cancel' AND  reservation_date >= '$two_days_ago' AND reservation_date <= '$today'");
    $queq_cancel = $result_cancel->num_rows;
} else if ($date == "all") {
    $result =  query("SELECT * FROM reservation WHERE restaurant_id=$restaurant_id AND status='approved'");
    $queq_amount = $result->num_rows;
    $result_cancel =  query("SELECT * FROM reservation WHERE restaurant_id=$restaurant_id AND status='cancel'");
    $queq_cancel = $result_cancel->num_rows;
} else {
    $queq_amount = "X";
    $queq_cancel = "X";
}
?>
<div class="max-w-screen-xl  mx-auto content  transform  duration-500 pt-20 px-2 md:px-5">
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
            <p>ประวัติรายการคิว</p>
        </div>
    </div>
    <!-- button back -->
    <div class="bg-white shadow-md  rounded-t-lg p-2 ">
        <div class="flex flex-wrap  mx-2 md:mx-2">
            <div class="w-full lg:w-1/4 p-1">
                <div class="text-2xl">
                    <p>ประวัติรายการคิว</p>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-white shadow-md  rounded-md p-2 mt-4">
        <!-- select -->
        <div class="grid justify-items-end ">
            <div class="max-w-2xl md:max-w-2xl">
                <form id="history-form">
                    <select id="date-select" name="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-2.5">
                        <option selected disabled>เลือกรายการสรุปย้อนหลัง</option>
                        <option value="1">วันนี้</option>
                        <option value="1">1 วัน</option>
                        <option value="2">2 วัน</option>
                        <option value="all">ทั้งหมด</option>
                    </select>
                </form>
            </div>
        </div>
        <!-- select -->
        <div class="flex flex-wrap mt-2">
            <div class="w-full lg:w-2/4 p-1">
                <div class="flex items-center flex-row w-full  rounded-md p-3  bg-[#82AA33] p-2 shadow duration-150  ">
                    <div class="flex   items-center bg-white  p-2 rounded-md flex-none w-12 h-12 md:w-12 md:h-12 ">
                        <svg class="w-16 h-16 flex items-center text-[#445D19] mx-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                        </svg>
                    </div>
                    <div class="flex flex-col justify-around flex-grow ml-5 ">
                        <p class="text-white  ">
                            คิวที่เข้าใช้บริการ
                        </p>
                    </div>
                    <div class=" flex items-center flex-none text-white ">
                        <p><?php echo $queq_amount; ?> คน</p>
                    </div>
                </div>
            </div>

            <div class="w-full lg:w-2/4 p-1">
                <div class="flex items-center flex-row w-full  rounded-md p-3 bg-[#82AA33] p-2 shadow duration-150 ">
                    <div class="flex items-center bg-white  p-2 rounded-md flex-none w-12 h-12 md:w-12 md:h-12 ">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 flex items-center text-[#445D19] mx-auto" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="flex flex-col justify-around flex-grow ml-5 ">
                        <p class="text-white  ">
                            คิวที่ข้าม/ยกเลิก
                        </p>
                    </div>
                    <div class=" flex items-center flex-none text-white">
                        <p><?php echo $queq_cancel; ?> คน</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    const dateSelect = document.getElementById("date-select");
    const historyForm = document.getElementById("history-form");
    dateSelect.onchange = (e) => {
        console.log("e = " + e.target.value)
        historyForm.submit();
    }
</script>