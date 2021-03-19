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
    <div class="w-full p-3">
    <?php
    
        if(have_posts()){

            the_post();
            ?>
                <img src="<?php the_post_thumbnail_url() ?>" alt=" random imgee"
                    class="w-full rounded shadow-2xl h-96 object-cover bg-cover bg-center bg-top">
                <span class="block py-4 text-gray-300"><?php the_date() ?></span>
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
                                class="w-full h-36 bg-cover bg-top bg-center object-cover shadow-2xl mt-6 rounded-lg">
            
                            <div class="mr-5">
                                <span class="text-gray-100 text-sm"><?php the_date() ?></span>
                                <h1 class="text-lg">
                                    <a href="<?php the_permalink() ?>">
                                        <?php the_title() ?>
                                    </a>
                                </h1>
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