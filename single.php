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

<section class="wrapper flex  mt-4">
    <div class="w-96">

    </div>
    <div class="w-full">
    <?php
    
        if(have_posts()){

            the_post();
            ?>
                <img src="<?php the_post_thumbnail_url() ?>" alt=" random imgee"
                    class="w-full rounded shadow-2xl h-96 object-cover bg-cover bg-center bg-top">
                <span class="block py-4 text-gray-300"><?php echo get_the_date('F j, Y') ?></span>
                <h1 class="my-4 text-5xl"><?php the_title() ?></h1>
                <div class="px-4">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. In beatae exercitationem iusto molestiae dignissimos voluptate atque, iure doloribus quisquam ipsa. Ullam, ipsam labore quo doloremque a porro dolorem rem itaque.
                </div>

            <?php
             $post_id = get_the_ID();
            $cat_ids = array();
            $categories = get_the_category( $post_id );

            if(!empty($categories) && !is_wp_error($categories)):
                foreach ($categories as $category):
                    array_push($cat_ids, $category->term_id);
                endforeach;
            endif;

            $current_post_type = get_post_type($post_id);

            $query_args = array( 
                'category__in'   => $cat_ids,
                'post_type'      => $current_post_type,
                'post__not_in'    => array($post_id),
                'posts_per_page'  => '4',
            );

            $related_cats_post = new WP_Query( $query_args );

            if($related_cats_post->have_posts()):
                ?>
                    <h1 class="text-3xl text-gray-100 my-6">Related posts</h1>
                <?php
                while($related_cats_post->have_posts()): $related_cats_post->the_post(); ?>
                    <div class="grid grid-cols-2 gap-4">
                        
                        <div class="flex items-center mt-2">
                            <img src="<?php the_post_thumbnail_url() ?>" alt=" random imgee"
                                class="w-36 h-36 bg-cover bg-top bg-center object-cover shadow-2xl mt-6 rounded-lg">
                            <div class="mr-5">

                                <span class="text-gray-100 text-sm"><?php echo get_the_date('F j, Y') ?></span>
                                <h1 class="text-lg font-bold">
                                    <a href="<?php the_permalink() ?>">
                                        <?php the_title() ?>
                                    </a>
                                </h1>
                                <!-- <button class="w-full py-2 bg-red-500 text-gray-100">
                                    <a href="<?php the_permalink() ?>">
                                        readmore
                                    </a>
                                </button> -->
                            </div>

            
                        </div>
                    </div>

                <?php endwhile;

                // Restore original Post Data
                wp_reset_postdata();
            endif;


        }
        
        ?>

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



<?php
	get_footer(); 
 ?>