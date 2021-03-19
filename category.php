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

<section class="wrapper flex mt-4">
    <div class="w-96">

    </div>
    <div class="w-full">
        <div class="grid grid-cols-3 gap-2 w-full">
        <?php 
            if(have_posts()){
                while (have_posts()){
                    the_post();
                    ?>
            <div class="wrapper antialiased text-gray-900 w-64">
                <div>
                    <img src="<?php the_post_thumbnail_url(); ?>" alt=" random imgee"
                        class="w-full h-64 object-cover bg-cover bg-top object-center rounded-lg shadow-md">

                    <div class="relative px-4 -mt-16 ">
                        <div class="bg-gray-800 text-white p-6 rounded-lg shadow-lg">
                            <div class="flex items-baseline">
                                <div class="ml-2 text-gray-100 uppercase text-xs font-semibold tracking-wider">
                                    <?php echo get_the_date('F j, Y') ?>
                                </div>
                                <span
                                    class="bg-red-500 text-red-800 text-xs px-2 inline-block rounded-full  uppercase font-semibold tracking-wide">
                                    New
                                </span>
                            </div>

                            <h4 class="my-3 text-sm font-semibold uppercase leading-tight"><?php the_title(); ?></h4>

                            <div class="mt-1">
                                الأخبار الوطنية

                            </div>
                            <div class="mt-4 bg-green-500 px-4 py-2 rounded text-center">
                                <span class="text-white text-md font-semibold">
                                    <a href="<?php the_permalink() ?>">
                                        اقرأ المزيد
                                    </a>
                                </span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <?php


                }
            }
        ?>
        </div>
    </div>
    <div class="bg-gray-800 rounded text-gray-100 mr-2 p-1" style="width: 500px">
        <h1 class="bg-gray-900 text-center text-lg py-3 rounded-lg text-gray-100 border-2 border-red-500">أخر الأخبار
        </h1>

        <?php
            $args = array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'category_name' => 'cat1',
            'posts_per_page' => 6,
            );
            $arr_posts = new WP_Query( $args );

            if ( $arr_posts->have_posts() ) :
                ?>
        <div class="px-2 mt-6">
            <ul>
                <?php
                while ( $arr_posts->have_posts() ) :

                    $arr_posts->the_post();
                    ?>
                <li class="flex items-center justify-center">
                    <h1 class="text-5xl"><?php the_time( 'j' );?></h1>
                    <div class="p-1 mx-2 line">
                        <h2 class="text-sm"><?php the_time( 'M' );?></h2>
                        <span class="text-xs"><?php the_time( 'g:i' );?></span>
                    </div>

                    <img src="<?php the_post_thumbnail_url(); ?>" alt="" class="w-12 h-12 rounded-full shadow-md ">
                    <div class="p-1">
                        <h1 class="text-yellow-600 text-sm"><?php echo get_the_date('F j, Y') ?> </h1>
                        <p class="text-xs"> <?php the_title(); ?></p>
                    </div>
                </li>

                <?php
                   
                endwhile;
            endif;
        ?>

            </ul>
        </div>
    </div>
</section>



<?php
	get_footer(); 
 ?>