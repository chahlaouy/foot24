<?php /* Template Name: player_home */ ?>
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

    $header_menu_id = get_menu_id('primary');
    $header_nav_items = wp_get_nav_menu_items( $header_menu_id )
?>

<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="profile" href="https://gmpg.org/xfn/11" />
    <?php wp_head(); ?>
</head>

<body class="bg-gray-700">

    <nav class="md:hidden wrapper mx-auto py-4 px-5 bg-gray-900 text-gray-100">
        <ul class=" flex items-center justify-between">
            <li>
                <ion-icon name="grid" class="text-3xl"></ion-icon>
            </li>
            <li class="text-xl font-bold">Foot 24</li>
        </ul>
    </nav>
    <nav class="hidden md:flex wrapper mx-auto  items-center justify-between py-4 px-5 bg-gray-900 text-gray-100">

        <?php 
            if (! empty($header_nav_items) && is_array($header_nav_items)){
                ?>
        <ul class="flex items-center">
            <li class="text-xl font-bold">Foot 24</li>
            <?php 
                    foreach ($header_nav_items as $item) {
                       if (! $item->menu_item_parent){
                           $children_menu_items = get_menu_item_children($header_nav_items, $item->menu_item_parent);
                           $has_children = ! empty($children_menu_items) && is_array($children_menu_items);
                       }

                       if (! $has_children){
                           ?>
            <li class="px-2">
                <a href="<?php echo esc_url( $item->url); ?>"><?php echo esc_html( $item->title ) ?></a>
            </li>
            <?php
                       } else {
                           // here the drop down menu
                       }
                    }
                ?>
        </ul>
        <?php
            }
        ?>
        <ul class="flex items-center">
            <li>
                <a href="#" class="text-white p-2 bg-gray-800 bg-opacity-50 rounded ml-2 hover:text-red-500">
                    <ion-icon name="logo-facebook"></ion-icon>
                </a>
            </li>
            <li>
                <a href="#" class="text-white p-2 bg-gray-800 bg-opacity-50 rounded ml-2 hover:text-red-500">
                    <ion-icon name="logo-instagram"></ion-icon>
                </a>
            </li>
            <li>
                <a href="#" class="text-white p-2 bg-gray-800 bg-opacity-50 rounded hover:text-red-500">
                    <ion-icon name="logo-youtube"></ion-icon>
                </a>
            </li>
        </ul>
    </nav>
    <section class="wrapper mx-auto">
        <div class="w-full">
            <div class="w-full">
                <img class="w-full" src="<?php echo get_template_directory_uri() . '/assets/images/player-home.jpg'; ?>"
                    alt="">
            </div>
            <div class="flex items-center justify-center -mt-40">
                <button class="py-4 px-12 border-4 border-red-600 text-red-600 text-4xl ml-5 rounded-2xl">
                    <a href="/">
                        Cancel
                    </a>    
                 </button>
                <button class="py-4 px-12 border-4 border-red-600 text-gray-100 bg-red-600 text-4xl  rounded-2xl">
                    <a href="/wordpress/player-choose">
                        confirm
                    </a>   
                </button>
            </div>
        </div>
    </section>

    <?php

// get_footer();