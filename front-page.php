<?php

    /**
     * The main template file
     *
     * @link https://digigate.tn
     *
     * @package DIGiGATE
     * @subpackage DIGiGATE
     * @since DIGiGATE 1.0
     */

get_header();

?>

<section class="wrapper mx-auto h-64 bg-gray-800">

</section>
<nav class="wrapper mx-auto flex items-center justify-between py-4 px-5 bg-gray-900 text-gray-100">

    <ul class="flex items-center justify-between">
        <li>Foot 24</li>
        <li class="px-2">Link 1</li>
        <li class="px-2">Link 1</li>
        <li class="px-2">Link 1</li>
        <li class="px-2">Link 1</li>
    </ul>
    <ul class="flex items-center">
        <li>
            <a href="#" class="text-white p-2 bg-gray-800 bg-opacity-50 rounded ml-2 hover:text-green-600">
                <ion-icon name="logo-facebook"></ion-icon>
            </a>
        </li>
        <li>
            <a href="#" class="text-white p-2 bg-gray-800 bg-opacity-50 rounded ml-2 hover:text-green-600">
                <ion-icon name="logo-instagram"></ion-icon>
            </a>
        </li>
        <li>
            <a href="#" class="text-white p-2 bg-gray-800 bg-opacity-50 rounded hover:text-green-600">
                <ion-icon name="logo-youtube"></ion-icon>
            </a>
        </li>
    </ul>
</nav>
<section class="wrapper mx-auto h-96 bg-gray-100 w-full relative">

    <div class="h-full flex flex-col justify-center items-center">

        <div class="w-full mx-auto relative z-50" x-data="{ activeSlide: 1, 
            slides: [[1, '<?php echo 'har'?>'], [2, <?php echo '1'?>]]

        }">
            <!-- Slides -->
            <template x-for="slide in slides" :key="slide">
                <div x-show="activeSlide === slide[0]"
                    class="relative z-10 font-bold text-5xl h-96 flex items-center justify-start text-gray bg-cover bg-center bg-top object-fill"
                    style="background-image: url(<?php echo get_template_directory_uri() . '/assets/images/foot-slider.jpg'; ?>)">
                    <div class="absolute top-0 left-0 z-20 bg-gray-800 bg-opacity-50 w-full h-96">
                    </div>
                    <div class="relative z-40 pr-16">
                        <div class="flex">
                            <div class="text-gray-100 bg-red-500 py-2 px-1 text-xs">
                                الأخبار الوطنية
                            </div>
                            <div class="text-gray-100 bg-green py-2 px-1 text-xs">
                                17 mars 2021
                            </div>

                        </div>
                        <div class="text-white mt-3" x-text="slide">

                        </div>

                    </div>
                    <!-- <span class="text-teal-300">/</span>
                    <span class="w-12 text-center" x-text="slides.length"></span> -->
                </div>
            </template>

            <!-- Prev/Next Arrows -->
            <div class="z-40 absolute inset-0 flex">
                <div class="flex items-center justify-start w-1/2">
                    <button
                        class="flex items-center justify-center bg-red-500 text-gray-100 hover:text-orange-500 font-bold hover:shadow-lg rounded-full w-12 h-12 -mr-6"
                        x-on:click="activeSlide = activeSlide === 1 ? slides.length : activeSlide - 1">
                        <ion-icon name="chevron-forward-outline" class="text-xl"></ion-icon>
                    </button>
                </div>
                <div class="flex items-center justify-end w-1/2">
                    <button
                        class="flex items-center justify-center bg-red-500 text-gray-100 hover:text-gray-100 font-bold hover:shadow rounded-full w-12 h-12 -ml-6"
                        x-on:click="activeSlide = activeSlide === slides.length ? 1 : activeSlide + 1">
                        <ion-icon name="chevron-back-outline" class="text-xl"></ion-icon>
                    </button>
                </div>
            </div>
        </div>

    </div>
</section>

<section class="wrapper flex mt-16 w-full">

    <div class="grid grid-cols-3 gap-2 w-full">

        <!-- **************************
                *   begin card template  *
                ************************** -->

        <div class="wrapper antialiased text-gray-900 w-64">
            <div>
                <img src="https://source.unsplash.com/random/350x350" alt=" random imgee"
                    class="w-full object-cover object-center rounded-lg shadow-md">

                <div class="relative px-4 -mt-16 ">
                    <div class="bg-gray-800 text-white p-6 rounded-lg shadow-lg">
                        <div class="flex items-baseline">
                            <div class="ml-2 text-gray-100 uppercase text-xs font-semibold tracking-wider">
                                27 mars 2021
                            </div>
                            <span
                                class="bg-red-500 text-red-800 text-xs px-2 inline-block rounded-full  uppercase font-semibold tracking-wide">
                                New
                            </span>
                        </div>

                        <h4 class="my-3 text-sm font-semibold uppercase leading-tight">برنامج تحضيرات المنتخب لمباراة
                            ليبيا</h4>

                        <div class="mt-1">
                            الأخبار الوطنية

                        </div>
                        <div class="mt-4 bg-green-500 px-4 py-2 rounded text-center">
                            <span class="text-white text-md font-semibold">اقرأ المزيد</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>


        <div class="wrapper antialiased text-gray-900 w-64">
            <div>
                <img src="https://source.unsplash.com/random/350x350" alt=" random imgee"
                    class="w-full object-cover object-center rounded-lg shadow-md">

                <div class="relative px-4 -mt-16 ">
                    <div class="bg-gray-800 text-white p-6 rounded-lg shadow-lg">
                        <div class="flex items-baseline">
                            <div class="ml-2 text-gray-100 uppercase text-xs font-semibold tracking-wider">
                                27 mars 2021
                            </div>
                            <span
                                class="bg-red-500 text-red-800 text-xs px-2 inline-block rounded-full  uppercase font-semibold tracking-wide">
                                New
                            </span>
                        </div>

                        <h4 class="my-3 text-sm font-semibold uppercase leading-tight">اتحاد بن قردان: القاسمي وبن طرشة
                            يعودان ضد الصفاقسي</h4>

                        <div class="mt-1">
                            الأخبار الوطنية

                        </div>
                        <div class="mt-4 bg-green-500 px-4 py-2 rounded text-center">
                            <span class="text-white text-md font-semibold">اقرأ المزيد</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="wrapper antialiased text-gray-900 w-64">
            <div>
                <img src="https://source.unsplash.com/random/350x350" alt=" random imgee"
                    class="w-full object-cover object-center rounded-lg shadow-md">

                <div class="relative px-4 -mt-16 ">
                    <div class="bg-gray-800 text-white p-6 rounded-lg shadow-lg">
                        <div class="flex items-baseline">
                            <div class="ml-2 text-gray-100 uppercase text-xs font-semibold tracking-wider">
                                27 mars 2021
                            </div>
                            <span
                                class="bg-red-500 text-red-800 text-xs px-2 inline-block rounded-full  uppercase font-semibold tracking-wide">
                                New
                            </span>
                        </div>

                        <h4 class="my-3 text-sm font-semibold uppercase leading-tight">برنامج تحضيرات المنتخب لمباراة
                            ليبيا</h4>

                        <div class="mt-1">
                            الأخبار الوطنية

                        </div>
                        <div class="mt-4 bg-green-500 px-4 py-2 rounded text-center">
                            <span class="text-white text-md font-semibold">اقرأ المزيد</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>


    </div>
    <div class="w-96 bg-gray-800 rounded text-gray-100 p-1">
        <div>
            <!-- <ion-icon name="camera-outline" class="text-3xl"></ion-icon> -->
            <h1 class="bg-gray-900 text-center text-lg py-3 text-gray-100 border-2 border-red-500 rounded-lg">صور</h1>

            <div class="p-2">
                <img src="https://source.unsplash.com/random/" alt=" random imgee"
                    class="w-full h-32  object-cover object-center rounded-lg shadow-md">

                <h1 class="text-sm text-center mt-3">مريول ألمانيا في يورو 2020</h1>
            </div>
            <div class="p-2">
                <img src="https://source.unsplash.com/random/350x350" alt=" random imgee"
                    class="w-full h-32 object-cover object-center rounded-lg shadow-md">

                <h1 class="text-center text-sm mt-3">مريول ألمانيا في يورو 2020</h1>
            </div>
            <div class="p-2">
                <img src="https://source.unsplash.com/random/350x350" alt=" random imgee"
                    class="w-full h-32 object-cover object-center rounded-lg shadow-md">

                <h1 class="text-center text-sm mt-3">مريول ألمانيا في يورو 2020</h1>
            </div>

        </div>

    </div>
    <div class="bg-gray-800 rounded text-gray-100 mr-2 p-1" style="width: 500px">
        <h1 class="bg-gray-900 text-center text-lg py-3 rounded-lg text-gray-100 border-2 border-red-500">أخر الأخبار
        </h1>

        <div class="px-2 mt-6">
            <ul>
                <li class="flex items-center justify-center">
                    <h1 class="text-5xl">18</h1>
                    <div class="p-1 mx-2 line">
                        <h2 class="text-sm">Mars</h2>
                        <span class="text-xs">23:23</span>
                    </div>

                    <img src="https://source.unsplash.com/random/350x350" alt=" random imgee"
                        class="w-12 h-12 rounded-full shadow-md ">
                    <div class="p-1">
                        <h1 class="text-yellow-600 text-sm">mars mars </h1>
                        <p class="text-xs">Lorem ipsum dolor sit, amet consectetur </p>
                    </div>
                </li>
                <li class="flex items-center justify-center">
                    <h1 class="text-5xl">18</h1>
                    <div class="p-1 mx-2 line">
                        <h2 class="text-sm">Mars</h2>
                        <span class="text-xs">23:23</span>
                    </div>

                    <img src="https://source.unsplash.com/random/350x350" alt=" random imgee"
                        class="w-12 h-12 rounded-full shadow-md ">
                    <div class="p-1">
                        <h1 class="text-yellow-600 text-sm">mars mars </h1>
                        <p class="text-xs">Lorem ipsum dolor sit, amet consectetur </p>
                    </div>
                </li>
            </ul>
        </div>
    </div>


</section>

<section class="wrapper mt-8">
    <div class="flex">
        <div class="flex">
            <!-- **************************
                *   begin card template  *
                ************************** -->

            <div id="app" class="w-96 h-60 rounded shadow-md flex rounded-lg ml-4">
                <img class="w-40 object-cover object-center rounded-l-sm" src="https://bit.ly/2EApSiC" alt="Room Image">
                <div class="w-56 flex flex-col bg-gray-900 rounded-l-lg">
                    <div class="p-4 pb-0 flex-1">
                        <h3 class="font-light text-gray-100 mb-6 text-xs"> الأخبار الوطنية</h3>
                        
                        <span class="text-sm font-semibold text-gray-100"> الأخبار الوطنية</span>
                        <div class="flex items-center mt-4 text-gray-100">
                            <div class="pr-2 text-xs">
                               28 mars
                            </div>
                            <div class="px-2 text-xs">
                             23:23
                            </div>
                        </div>
                    </div>
                    <div class="bg-green-500 p-3 flex items-center text-gray-100 justify-between transition ">
                    اقرأ المزيد
                        <i class="fas fa-chevron-right"></i>
                    </div>
                </div>
            </div>
            <!-- **************************
                *   begin card template  *
                ************************** -->

            <div id="app" class="w-96 h-60 rounded shadow-md flex rounded-lg ml-4">
                <img class="w-40 object-cover object-center rounded-l-sm" src="https://bit.ly/2EApSiC" alt="Room Image">
                <div class="w-56 flex flex-col bg-gray-900 rounded-l-lg">
                    <div class="p-4 pb-0 flex-1">
                        <h3 class="font-light text-gray-100 mb-6 text-xs"> الأخبار الوطنية</h3>
                        
                        <span class="text-sm font-semibold text-gray-100"> الأخبار الوطنية</span>
                        <div class="flex items-center mt-4 text-gray-100">
                            <div class="pr-2 text-xs">
                               28 mars
                            </div>
                            <div class="px-2 text-xs">
                             23:23
                            </div>
                        </div>
                    </div>
                    <div class="bg-green-500 p-3 flex items-center text-gray-100 justify-between transition ">
                    اقرأ المزيد
                        <i class="fas fa-chevron-right"></i>
                    </div>
                </div>
            </div>
           
           

        </div>

        <div class="bg-gray-800 text-xs mr-3 w-full p-4 text-gray-100">
            <table class="w-full rounded-lg ">
                <tr class="bg-gray-900 py-2 border border-gray-800">
                    <td class="p-2">الفريق</td>
                    <td class="p-2">نقاط</td>
                    <td class="p-2">ل</td>
                    <td class="p-2">ف</td>
                    <td class="p-2">ت</td>
                    <td class="p-2">خ</td>
                    <td class="p-2">فارق</td>
                </tr>
                <tr class="bg-gray-800 my-2">
                    <td class="p-2">الفريق</td>
                    <td>نقاط</td>
                    <td>ل</td>
                    <td>ف</td>
                    <td>ت</td>
                    <td>خ</td>
                    <td>فارق</td>
                </tr>
            </table>
        </div>

    </div>

</section>

<?php
	get_footer(); 
 ?>