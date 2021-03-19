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

<section class="wrapper flex">
    <div class="w-96">

    </div>
    <div class="w-full">
    <?php 
        if(have_posts()){
            while (have_posts()){
                the_post();
                
                the_title();
                the_content();


            }
        }
    ?>
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



<?php
	get_footer(); 
 ?>