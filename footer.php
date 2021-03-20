<?php
    /**
     * The header for our DIGIGATE theme
     *
     * This is the template that displays all of the <head> section and everything
     * 
     * @link https://digigate.tn
     * @package DIGiGATE
     * @subpackage DIGiGATE
     * @since DIGiGATE 1.0
     */
?>

<footer class="wrapper mt-8 md:grid md:grid-cols-4 md:gap-4 p-2 md:p-12 bg-gray-900 text-gray-100">

    <div class="px-2 w-full">
        <span class="border-b-2 border-red-500 py-3 text-xl">أخبار متفرقة</span>
        <?php
            $args = array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'category_name' => 'أخبار متفرقة',
            'posts_per_page' => 4,
            );
            $arr_posts = new WP_Query( $args );

            if ( $arr_posts->have_posts() ) :
                ?>
                    <?php
                while ( $arr_posts->have_posts() ) :

                    $arr_posts->the_post();
                    ?>
                    
                    <div class="flex items-center mt-2">
                        <img src="<?php the_post_thumbnail_url(); ?>" alt=" random imgee"
                            class="w-24 h-24 bg-cover bg-top bg-center object-cover shadow-2xl mt-6 rounded-lg">

                        <div class="mr-5">
                            <span class="text-yellow-600 text-sm"><?php echo get_the_date('F j, Y') ?></span>
                            <h1 class="text-sm">
                                <a class="text-lg font-bold" href="<?php the_permalink() ?>">
                                    <?php the_title() ?>
                                </a>
                            </h1>
                        </div>

                    </div>
                    <?php
                   
                endwhile;
            endif;
        ?>
        <button class="w-full py-2 text-gray-100 bg-green-500 rounded-lg mt-2">اقرأ المزيد</button>
    </div>
    <div class="px-2 w-full">
        <span class="border-b-2 border-red-500 py-3 text-xl">الأخبار العالمية</span>
        <?php
            $args = array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'category_name' => 'الأخبار العالمية',
            'posts_per_page' => 4,
            );
            $arr_posts = new WP_Query( $args );

            if ( $arr_posts->have_posts() ) :
                ?>
                    <?php
                while ( $arr_posts->have_posts() ) :

                    $arr_posts->the_post();
                    ?>
                    
                    <div class="flex items-center mt-2">
                        <img src="<?php the_post_thumbnail_url(); ?>" alt=" random imgee"
                            class="w-24 h-24 bg-cover bg-top bg-center object-cover shadow-2xl mt-6 rounded-lg">

                        <div class="mr-5">
                            <span class="text-yellow-600 text-sm"><?php echo get_the_date('F j, Y') ?></span>
                            <h1 class="text-sm">
                                <a class="text-lg font-bold" href="<?php the_permalink() ?>">
                                    <?php the_title() ?>
                                </a>
                            </h1>
                        </div>

                    </div>
                    <?php
                   
                endwhile;
            endif;
        ?>
        <button class="w-full py-2 text-gray-100 bg-green-500 rounded-lg mt-2">اقرأ المزيد</button>
    </div>
    <div class="px-2 w-full">
    
        <span class="border-b-2 border-red-500 py-3 text-xl">الأخبار الوطنية</span>
        <?php
            $args = array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'category_name' => 'الأخبار الوطنية',
            'posts_per_page' => 4,
            );
            $arr_posts = new WP_Query( $args );

            if ( $arr_posts->have_posts() ) :
                ?>
                    <?php
                while ( $arr_posts->have_posts() ) :

                    $arr_posts->the_post();
                    ?>
                    
                    <div class="flex items-center mt-2">
                        <img src="<?php the_post_thumbnail_url(); ?>" alt=" random imgee"
                            class="w-24 h-24 bg-cover bg-top bg-center object-cover shadow-2xl mt-6 rounded-lg">

                        <div class="mr-5">
                            <span class="text-yellow-600 text-sm"><?php echo get_the_date('F j, Y') ?></span>
                            <h1 class="text-sm">
                                <a class="text-lg font-bold" href="<?php the_permalink() ?>" >
                                    <?php the_title(); ?>
                                </a>
                            </h1>
                        </div>

                    </div>
                    <?php
                   
                endwhile;
            endif;
        ?>
        <button class="w-full py-2 text-gray-100 bg-green-500 rounded-lg mt-2">اقرأ المزيد</button>
    </div>
    
    
    <div class="px-2 w-full">
        <span class="border-b-2 border-red-500 py-3 text-xl">Foot 24</span>
        <div class="mt-12">
            <span class="text-sm text-gray-500 my-4 block">فووت24 الموقع التونسي رقم 1 في الكورة</span>
            <span class="text-sm text-gray-100 my-4 block">إقامة زهرة البحيرة، حدائق البحيرة تونس 1001</span>
            <span class="text-sm text-gray-100 my-4 block">216 29 909 954 +</span>
            <span class="text-sm text-gray-100 my-4 block"> recrutement@foot24.tn I pub@foot24.tn</span>
        </div>

        <div class="w-full flex items-center justify-center mt-4">
            <img src="<?php echo get_template_directory_uri() . '/assets/images/logo24.png'; ?>" alt="">
        </div>

    </div>

</footer>

<?php wp_footer(); ?>
</body>

</html>