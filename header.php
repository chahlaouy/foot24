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

<body class="bg-gray-100">

    <?php 
        if (function_exists('wp_body_open')){
            wp_body_open();
        }
    ?>

    <!-- Section NavBar -->
    <section class="wrapper mx-auto bg-gray-400 md:p-4 p1">
        <img src="<?php echo get_template_directory_uri() . '/assets/images/coca.png'; ?>" class="w-full" alt="">
    </section>
    <nav class="md:hidden wrapper mx-auto px-5 bg-gray-900 text-gray-100">
        <ul class=" flex items-center justify-between">
            <li x-data="dropdown()">
                <ion-icon name="grid" class="text-3xl" x-on:click="open"></ion-icon>
                <div x-show="isOpen()" x-on:click.away="close">


                    <?php 
                    if (! empty($header_nav_items) && is_array($header_nav_items)){
                    ?>
                    <ul class="">
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



                </div>
            </li>
            <li class="text-xl font-bold">
                <a href="/">
                    <img src="<?php echo get_template_directory_uri() ?> . '/assets/images/logo24.png'" alt="" class="w-12">
                </a>
            </li>
        </ul>
    </nav>
    <nav class="hidden md:flex wrapper mx-auto items-center justify-between px-5 bg-gray-900 text-gray-100">

        <?php 
            if (! empty($header_nav_items) && is_array($header_nav_items)){
                ?>
        <ul class="flex items-center">
            <li class="text-xl font-bold">
                <a href="/">
                    <img src="<?php echo get_template_directory_uri() ?> . '/assets/images/logo24.png'" alt="" class="w-12">
                </a>
            </li>
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
            <li x-data="dropdown()">
                <a target="_blank" href="https://www.facebook.com/www.foot24.tn/" class="text-white p-2 bg-green-500 rounded ml-2 hover:text-red-500">
                    <ion-icon name="logo-facebook"></ion-icon>
                </a>
            </li>
            <li>
                <a target="_blank" href="https://www.instagram.com/foot24tn/" class="text-white p-2 bg-green-500 rounded ml-2 hover:text-red-500">
                    <ion-icon name="logo-instagram"></ion-icon>
                </a>
            </li>
            <li>
                <a target="_blank" href="https://www.youtube.com/channel/UCuPDFRItTEn34XWqAcdCgNg" class="text-white p-2 bg-green-500 rounded hover:text-red-500">
                    <ion-icon name="logo-youtube"></ion-icon>
                </a>
            </li>
        </ul>
    </nav>
    <script>
    function dropdown() {
        return {
            show: false,
            open() {
                this.show = true
            },
            close() {
                this.show = false
            },
            isOpen() {
                return this.show === true
            },
        }
    }
    </script>
    <?php 
        get_template_part('template-parts/header/nav-bar');