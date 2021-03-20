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

<section class="wrapper mx-auto h-96 bg-gray-100 w-full relative">

    <div class="h-full flex flex-col justify-center items-center">

        <div class="w-full mx-auto relative z-50" x-data="{ activeSlide: 1,

            slides: [
            
                [1, '<?php echo 'الترجي الرياضي يستعيد خدمات رائد الفادع'?>'],
                [2, '<?php echo 'كأس الكاف : تصدي أيمن دحمان ضمن قائمة الأفضل'?>']
             ]

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
                                19 mars 2021
                            </div>

                        </div>
                        <div class="text-white mt-3" x-text="slide[1]">

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
                                <img class="w-full md:w-40 h-60 object-cover object-center rounded-l-sm" src="<?php the_post_thumbnail_url(); ?>"
                                    alt="Room Image">
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
                                    <div class="bg-green-500 p-3 flex items-center text-gray-100 justify-between transition mt-2 md:mt-0">
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

                <h1 class="text-sm text-center mt-3"> <?php the_title() ?></h1>
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
                    <td class="p-2">الفريق</td>
                    <td>نقاط</td>
                    <td>ل</td>
                    <td>ف</td>
                    <td>ت</td>
                    <td>خ</td>
                    <td>فارق</td>
                </tr>
                <tr class="bg-gray-900 my-2">
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

<!-- <section class="wrapper mt-8">
    <div class="grid grid-cols-2 gap-3 w-full">
        
    </div>
</section> -->

<section class="hidden md:block wrapper mt-8">
    <div class="flex">

        <div class="flex-1">

            <div class="p-8 bg-gray-800 w-full grid grid-cols-2 gap-2">
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

        <div class="flex-1">

        </div>
    </div>

</section>

<?php
	get_footer(); 
 ?>