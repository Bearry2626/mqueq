<?php
include('../index.php');
include('nuvbar.php');
?>

<?php
if (!isRestaurant()) {
    redirect("../into/login.php");
}
?>
<form action="../funcs/edit-restaurant-profile.php" method="post" enctype="multipart/form-data">
    <div class="max-w-screen-xl  mx-auto content  transform  duration-500 pt-20 px-2 md:px-5">
        <!-- button back -->
        <div class="flex  flex-row">
            <a href="main.php" class="basis-1 lg:basis-1 p-2 lg:text-sm">
                <span type="submit" class="w-full py-2 ">
                    <svg class="w-4 h-4 text-gray-800  hover:text-[#9BBA62]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4" />
                    </svg>
                </span>
            </a>
            <a href="main.php" class="lg:text-sm ">
                <button type="submit" class="w-full py-2 "></button>
            </a>
            <div class=" mt-2 text-lg">
                <p>โปรไฟล์</p>
            </div>
        </div>
        <!-- button back -->
        <div class="bg-white shadow-md  rounded-t-lg p-2 ">
            <div class="flex flex-wrap  mx-2 md:mx-2">
                <div class="w-full lg:w-1/4 p-1">
                    <div class="text-2xl">
                        <p>ข้อมูลส่วนตัว</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white shadow-md rounded-md p-2 mt-4">
            <div class="flex  flex justify-center items-center">
                <div class="w-full lg:w-2/3 p-1">
                    <div class="flex items-center flex-row w-fullp-3  p-2 duration-150">
                        รูปภาพร้านอาหาร
                    </div>
                    <hr>
                    <div class="flex items-center flex-row w-fullp-3  p-2 duration-150">
                        <div class="w-full md:w-2/12 md:mx-2">
                            <div class="group max-w-xs cursor-pointer rounded-lg bg-white  shadow duration-150 ">
                                <img class="w-30 md:w-50 rounded-lg object-cover object-center" src="../img/restaurant/<?php echo $restaurant["image"]; ?>" alt="product" />
                            </div>
                        </div>
                        <div class="w-full md:w-6/12 md:mx-2 p-2">
                            <div class="col-span-full">
                                <label for="file-upload" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                    <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-3">
                                        <div class="text-center">
                                            <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
                                            </svg>
                                            <div class="mt-4 flex text-sm leading-6 text-gray-600">
                                                <span>Upload a file</span>
                                                <input id="file-upload" name="file" type="file" class="sr-only">
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white shadow-md rounded-md p-2 mt-4">
            <div class="flex  flex justify-center items-center">
                <div class="w-full lg:w-2/3 p-1">
                    <div class="flex items-center flex-row w-full p-3  p-2 ">
                        ข้อมูลร้านอาหาร
                    </div>
                    <hr>
                    <div class="space-y-12">
                        <div class="border-b border-gray-900/10 pb-12">
                            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                <div class="sm:col-span-3">
                                    <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">ชื่อร้านอาหาร</label>
                                    <div class="mt-2">
                                        <input type="text" name="name" id="name" autocomplete="given-name" class="p-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 
                                            placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="<?php echo $restaurant['name'] ?>" placeholder="ชื่อร้านอาหาร">
                                    </div>
                                </div>

                                <div class="sm:col-span-3">
                                    <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">เบอร์โทรร้านอาหาร</label>
                                    <div class="mt-2">
                                        <input type="text" name="phone" id="phone" autocomplete="family-name" class="p-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 
                                            placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="<?php echo $restaurant['phone'] ?>" placeholder="เบอรโทรร้านอาหาร">
                                    </div>
                                </div>

                                <div class="col-span-full">
                                    <label for="street-address" class="block text-sm font-medium leading-6 text-gray-900">ที่อยู่ร้านอาหาร</label>
                                    <div class="mt-2">
                                        <input type="text" name="address" id="address" autocomplete="address" class="p-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 
                                            placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="<?php echo $restaurant['address'] ?>" placeholder="ที่อยู่ร้านอาหาร">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 flex items-center justify-end gap-x-6">
                        <a href="" type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
                        <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                    </div>

                </div>
            </div>
        </div>

    </div>
</form>