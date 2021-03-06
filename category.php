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

<section class="wrapper md:flex mt-4">
    <!-- <div class="w-96">

    </div> -->
    <div class="w-full">
        <div class="md:grid md:grid-cols-3 md:gap-2 w-full">
        <?php 
            if(have_posts()){
                while (have_posts()){
                    the_post();
                    ?>
            <div class="wrapper antialiased text-gray-900 w-64 my-4 md:my-0">
                <div>
                    <img src="<?php the_post_thumbnail_url(); ?>" alt=" random imgee"
                        class="w-full h-64 object-cover bg-cover bg-top object-center rounded-lg shadow-md">

                    <div class="relative px-4 -mt-16 ">
                        <div class="bg-gray-800 text-white p-6 rounded-lg shadow-lg">
                            <div class="flex items-baseline">
                                <div class="ml-2 text-yellow-600 uppercase text-xs font-semibold tracking-wider">
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
    <div class="bg-gray-800 rounded text-gray-100 mr-2 p-1 w-500">
        <h1 class="bg-gray-900 text-center text-lg py-3 rounded-lg text-gray-100 border-2 border-red-500">أخر الأخبار
        </h1>

        <?php
            $args = array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'category_name' => 'أخبار متفرقة',
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
                <li class="flex items-center justify-center my-4">
                    <h1 class="text-5xl"><?php the_time( 'j' );?></h1>
                    <div class="p-1 mx-2 line">
                        <h2 class="text-sm"><?php the_time( 'M' );?></h2>
                        <span class="text-xs"><?php the_time( 'g:i' );?></span>
                    </div>

                    <img src="<?php the_post_thumbnail_url(); ?>" alt="" class="w-12 h-12 rounded-full shadow-md ">
                    <div class="p-1">
                        <h1 class="text-yellow-600 text-sm"><?php echo get_the_date('F j, Y') ?> </h1>
                        <a class="text-xs" href="<?php the_permalink() ?>">
                                <?php the_title(); ?>
                        </a>
                    </div>
                </li>

                <?php
                   
                endwhile;
            endif;
        ?>

            </ul>
        </div>
        <h1 class="bg-gray-900 text-center text-lg py-3 rounded-lg text-gray-100 border-2 border-red-500 mt-8">البطولة التونسية 
        </h1>
        <div class="bg-gray-800 text-xs w-full p-4 text-gray-100">
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
                    <td class="p-2">الترجي الرياضي</td>
                    <td>34</td>
                    <td>12</td>
                    <td>11</td>
                    <td>1</td>
                    <td>0</td>
                    <td>21</td>
                </tr>
                <tr class="bg-gray-900 my-2">
                    <td class="p-2">الإتحاد المنستيري</td>
                    <td>28</td>
                    <td>12</td>
                    <td>8</td>
                    <td>4</td>
                    <td>0</td>
                    <td>14</td>
                </tr>
                <tr class="bg-gray-800 my-2">
                    <td class="p-2">النادي الصفاقسي</td>
                    <td>25</td>
                    <td>13</td>
                    <td>1</td>
                    <td>4</td>
                    <td>5</td>
                    <td>14</td>
                </tr>
                <tr class="bg-gray-900 my-2">
                    <td class="p-2">الملعب التونسي</td>
                    <td>24</td>
                    <td>13</td>
                    <td>7</td>
                    <td>3</td>
                    <td>3</td>
                    <td>6</td>
                </tr>
                <tr class="bg-gray-800 my-2">
                    <td class="p-2">النادي الإفريقي</td>
                    <td>23</td>
                    <td>13</td>
                    <td>9</td>
                    <td>2</td>
                    <td>2</td>
                    <td>15</td>
                </tr>
                <tr class="bg-gray-900 my-2">
                    <td class="p-2">النجم الساحلي</td>
                    <td>23</td>
                    <td>13</td>
                    <td>9</td>
                    <td>2</td>
                    <td>2</td>
                    <td>15</td>
                </tr>
                <tr class="bg-gray-800 my-2">
                    <td class="p-2">اتحاد بن قردان </td>
                    <td>23</td>
                    <td>13</td>
                    <td>9</td>
                    <td>2</td>
                    <td>2</td>
                    <td>15</td>
                </tr>
                <tr class="bg-gray-900 my-2">
                    <td class="p-2">مستقبل سليمان</td>
                    <td>23</td>
                    <td>13</td>
                    <td>9</td>
                    <td>2</td>
                    <td>2</td>
                    <td>15</td>
                </tr>
                <tr class="bg-gray-800 my-2">
                    <td class="p-2">هلال الشابة</td>
                    <td>23</td>
                    <td>13</td>
                    <td>9</td>
                    <td>2</td>
                    <td>2</td>
                    <td>15</td>
                </tr>
                <tr class="bg-gray-900 my-2">
                    <td class="p-2">شبيبة القيروان</td>
                    <td>23</td>
                    <td>13</td>
                    <td>9</td>
                    <td>2</td>
                    <td>2</td>
                    <td>15</td>
                </tr>
                <tr class="bg-gray-800 my-2">
                    <td class="p-2">النادي البنزرتي</td>
                    <td>23</td>
                    <td>13</td>
                    <td>9</td>
                    <td>2</td>
                    <td>2</td>
                    <td>15</td>
                </tr>
                <tr class="bg-gray-900 my-2">
                    <td class="p-2">نجم المتلوي</td>
                    <td>23</td>
                    <td>13</td>
                    <td>9</td>
                    <td>2</td>
                    <td>2</td>
                    <td>15</td>
                </tr>
                <tr class="bg-gray-800 my-2">
                    <td class="p-2">نادي حمام الانف</td>
                    <td>23</td>
                    <td>13</td>
                    <td>9</td>
                    <td>2</td>
                    <td>2</td>
                    <td>15</td>
                </tr>
                <tr class="bg-gray-800 my-2">
                    <td class="p-2">اتحاد تطاوين</td>
                    <td>23</td>
                    <td>13</td>
                    <td>9</td>
                    <td>2</td>
                    <td>2</td>
                    <td>15</td>
                </tr>
            </table>
        </div>
    </div>
</section>



<?php
	get_footer(); 
 ?>