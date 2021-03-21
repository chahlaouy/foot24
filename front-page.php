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
<section class="fixed bottom right-0 bottom-0 p-4 z-50">
    <div class="bg-gray-100 p-4 shadow-2xl rounded-2xl w-72 flex items-center justify-between">
        <div class="p-2">
            <div class="flex items-center justify-center">
                <img src="<?php echo get_template_directory_uri() . '/assets/images/est.png'?>" class="w-12" alt="">
            </div>
            <h1 class="text-sm text-center">الترجي الرياضي</h1>
        </div>
        <div class="text-center flex items-center justify-around p-4 rounded bg-gray-300">
            <h1 class="text-lg font-bold">7</h1>
            <h1 class="text-lg font-bold">-</h1>
            <h1 class="text-lg font-bold">1</h1>
        </div>
        <div class="p-2">
            <div class="flex items-center justify-center">
                <img src="<?php echo get_template_directory_uri() . '/assets/images/jsk.png'?>" class="w-12" alt="">
            </div>
            <h1 class="text-sm text-center">شبيبة القيروان</h1>
        </div>
    </div>
</section>
<section class="wrapper mx-auto bg-gray-100 w-full relative" style="height: 600px">

    <div class="h-full">

        <div class="w-full mx-auto relative z-40" x-data="getSlides()">
            <!-- Slides -->
            <template x-for="slide in slides">
                <div x-show="activeSlide === slide[0]" class="relative z-10 font-bold text-5xl h-full text-gray "
                    style="height: 600px">
                    <div class="relative ">
                        <div class="absolute top-0 left-0 z-20 bg-gray-800 bg-opacity-50 w-full h-full"
                            style="height: 600px; width: 100%">
                        </div>
                        <img :src="slide[2]" class="w-full relative z-10 bg-cover bg-center object-cover" alt=""
                            style="height: 600px">
                        <div class="flex -mt-96 md:-mt-64 relative z-40 px-4 md:px-8">
                            <div class="text-gray-100 bg-red-500 py-2 px-1 text-xs">
                                الأخبار الوطنية
                            </div>
                            <div class="text-gray-800 bg-green py-2 px-1 text-xs" x-text="slide[3]">

                            </div>

                        </div>
                        <div class="text-white mt-3 px-4 md:px-8 relative z-40" x-text="slide[1]">

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

<section class="px-2 md:px-0 wrapper md:flex mt-16 w-full">

    <div class="w-full">

        <div class="md:grid md:grid-cols-3 gap-2 w-full">

            <!-- **************************
                    *   begin card template  *
                    ************************** -->
            <?php
                $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'category_name' => 'الأخبار الوطنية',
                'posts_per_page' => 6,
                );
                $arr_posts = new WP_Query( $args );

                if ( $arr_posts->have_posts() ) :

                    while ( $arr_posts->have_posts() ) :

                        $arr_posts->the_post();
                        ?>
            <div class="wrapper antialiased text-gray-900 w-full md:w-64 mt-4 md:mt-0">
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
                    
                    endwhile;
                endif;
            ?>
        </div>

        <div class="md:grid md:grid-cols-2 md:gap-3 w-full mt-12">
            <!-- **************************
            *   begin card template  *
            ************************** -->
            <?php
                $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'category_name' => 'الأخبار العالمية',
                'posts_per_page' => 6,
                );
                $arr_posts = new WP_Query( $args );

                if ( $arr_posts->have_posts() ) :
                    ?>
            <?php
                    while ( $arr_posts->have_posts() ) :

                        $arr_posts->the_post();
                        ?>

            <div id="app" class="md:w-96 w-full md:h-60 rounded shadow-md md:flex rounded-lg ml-4 mt-4 md:mt-0">
                <img class="w-full md:w-40 h-60 object-cover object-center rounded-l-sm"
                    src="<?php the_post_thumbnail_url(); ?>" alt="Room Image">
                <div class="w-full md:w-56 flex flex-col bg-gray-900 rounded-l-lg">
                    <div class="p-4 pb-0 flex-1">
                        <h3 class="font-light text-gray-100 mb-6 text-xs"> <?php the_category() ?></h3>

                        <span class="text-sm font-semibold text-gray-100"> <?php the_title() ?></span>
                        <div class="flex items-center mt-4 text-gray-100">
                            <div class="pr-2 text-xs text-yellow-600">
                                <?php echo get_the_date('F j, Y') ?>
                            </div>
                        </div>
                    </div>
                    <div
                        class="bg-green-500 p-3 flex items-center text-gray-100 justify-between transition mt-2 md:mt-0">
                        <a href="<?php the_permalink() ?>">
                            اقرأ المزيد
                        </a>

                    </div>
                </div>
            </div>
            <?php
                    
                    endwhile;
                endif;
            ?>
        </div>

    </div>


    <div class="md:w-96 bg-gray-800 rounded text-gray-100 md:p-1">

        <?php
            $args = array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'category_name' => 'ألبومات الصور',
            'posts_per_page' => 6,
            );
            $arr_posts = new WP_Query( $args );

            if ( $arr_posts->have_posts() ) :
                ?>
        <h1 class="bg-gray-900 text-center text-lg py-3 text-gray-100 border-2 border-red-500 rounded-lg">صور</h1>
        <?php
                while ( $arr_posts->have_posts() ) :

                    $arr_posts->the_post();
                    ?>
        <div>

            <div class="p-2">
                <img src="<?php the_post_thumbnail_url(); ?>" alt=" random imgee"
                    class="w-full h-32  object-cover object-center rounded-lg shadow-md">

                <h1 class="text-sm text-center mt-3">
                    <a href="<?php the_permalink() ?>"><?php the_title() ?></a>
                </h1>
            </div>

        </div>

        <?php
                   
                endwhile;
            endif;
        ?>

    </div>
    <div class="bg-gray-800 rounded text-gray-100 md:mr-2 md:p-1 mt-8 md:mt-0 w-500 ">
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

        <h1 class="bg-gray-900 text-center text-lg py-3 rounded-lg text-gray-100 border-2 border-red-500 mt-8">البطولة
            التونسية
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


<section class="hidden md:block wrapper mt-8">
    <div class="flex items-center">

        <div class="flex-1 h-96 bg-gray-800 rounded-2xl">
            <div class="px-16">

                <h1 class="bg-gray-900 text-center text-lg py-3 rounded-lg text-gray-100 border-2 border-red-500 mt-8">فيديوهات
                </h1>
            </div>
            <div class="p-8 w-full grid grid-cols-2 gap-2">
                <div class="rounded-lg shadow-lg">
                    <img src="https://images.unsplash.com/photo-1600054800747-be294a6a0d26?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1053&q=80"
                        alt="" class="rounded-t-lg w-full">
                </div>
                <div class="rounded-lg shadow-lg">
                    <img src="https://images.unsplash.com/photo-1600054800747-be294a6a0d26?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1053&q=80"
                        alt="" class="rounded-t-lg w-full">
                </div>
            </div>
        </div>

        <div class="flex-1 relative pr-24 h-96 rounded-2xl" x-data="getPlayers()">

   

            <!-- Slides -->
            <template x-for="p in players">
                <div x-show="activePlayer === p[0]" class="relative z-10 font-bold text-5xl h-96 text-gray "
                    <div class="relative ">
                        <img :src="p[2]" class="w-full h-96 relative z-10 bg-cover bg-center object-cover rounded-2xl" alt="">
                        <div class="flex  md:-mt-32 relative z-40 px-4 md:px-8">
                            <div class="text-gray-100 bg-red-500 py-2 px-1 text-xs">
                                grade 1
                            </div>
                            <div class="text-gray-800 bg-green py-2 px-1 text-xs" x-text="p[3]">

                            </div>

                        </div>
                        <div class="bg-gray-900 text-center text-lg py-3 rounded-lg text-gray-100 border-2 border-red-500 mt-3 mx-8 relative z-40" x-text="p[1]">

                        </div>

                    </div>
                    <!-- <span class="text-teal-300">/</span>
                    <span class="w-12 text-center" x-text="slides.length"></span> -->
                </div>
            </template>

            <!-- Prev/Next Arrows -->
            <div class="z-40 absolute inset-0 flex pr-24">
                <div class="flex items-center justify-start w-1/2">
                    <button
                        class="flex items-center justify-center bg-red-500 text-gray-100 hover:text-orange-500 font-bold hover:shadow-lg rounded-full w-12 h-12 -mr-6"
                        x-on:click="activePlayer = activePlayer === 1 ? players.length : activePlayer - 1">
                        <ion-icon name="chevron-forward-outline" class="text-xl"></ion-icon>
                    </button>
                </div>
                <div class="flex items-center justify-end w-1/2">
                    <button
                        class="flex items-center justify-center bg-red-500 text-gray-100 hover:text-gray-100 font-bold hover:shadow rounded-full w-12 h-12 -ml-6"
                        x-on:click="activePlayer = activePlayer === players.length ? 1 : activePlayer + 1">
                        <ion-icon name="chevron-back-outline" class="text-xl"></ion-icon>
                    </button>
                </div>
            </div>



        </div>
    </div>

</section>


<script>
// { activeSlide: 1,

// slides: [

//   
//  ]

// }

    function getSlides() {
        return {
            slides: [
                <?php
                        $args = array(
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        'category_name' => 'الأخبار الوطنية',
                        'posts_per_page' => 6,
                        );
                        $arr_posts = new WP_Query( $args );

                        if ( $arr_posts->have_posts() ) :
                            $i = 1;
                            while ( $arr_posts->have_posts() ) :

                                $arr_posts->the_post();
                                $title = the_title('','',false);
                                $imageid = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
                                $featimage = $imageid['0'];
                                $date = get_the_date('F j, Y');
                                $open = '[';
                                $close = '],';
                                $qu = '"';
                                $v = ',';
                                echo $open . $i . $v . $qu . $title  . $qu . $v . $qu . $featimage . $qu . $v . $qu . $date . $qu. $close;
                                $i++;
                            endwhile;
                        endif;
                    ?>
            ],
            activeSlide: 1,
        }
    }

    function getPlayers(){
        return {
            players: [
                [1, 'foulen ben foulen' , '<?php echo get_template_directory_uri() ?>' + '/assets/images/' + 'messi.jpg', '2.5'],
                [2, 'foulen ben foulen' , '<?php echo get_template_directory_uri() ?>' + '/assets/images/' + 'profile.png', '2'],
                [3, 'foulen ben foulen' , '<?php echo get_template_directory_uri() ?>' + '/assets/images/' + 'profile.png', '1'],

            ],
            activePlayer: 1,
        }
    }
</script>

<?php
	get_footer(); 
 ?>