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

<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="profile" href="https://gmpg.org/xfn/11" />
    <?php wp_head(); ?>
</head>

<body class="bg-gray-700">

    <?php 
        if (function_exists('wp_body_open')){
            wp_body_open();
        }
    ?>

    <!-- Section NavBar -->

    <?php 
        get_template_part('template-parts/header/nav-bar');