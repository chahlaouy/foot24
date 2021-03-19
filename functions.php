<?php

/**
 * 
 * Theme functions
 * 
 * @package DIGIGATE
 */

 if (! defined('DIGIGATE_DIR_PATH')) {
	 
	define('DIGIGATE_DIR_PATH', untrailingslashit(get_template_directory()));
 }

 require_once DIGIGATE_DIR_PATH . '/inc/helpers/autoloader.php';

	// enable wordpress menu 

	function dg_menu(){
		$locations = array(
			'primary' => 'primary menu top navbar',
			'footer'  => 'footer menu items'
		);

		register_nav_menus( $locations );
	}

	function dg_title_tag(){
		// Adds dynamic title tag support
		add_theme_support('title-tag');
	}

	

	// enqueueinh scripts second method the best one

	// you can register a style and enqueue it on a condition

	function dg_enqueue_scripts(){
		wp_register_style('dg-style', get_template_directory_uri() . '/assets/css/app.css', array(), '1.0');
		wp_register_style('animate-css', "https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css", array(), '1.0');

		wp_register_script('dg-ionicons', 'https://unpkg.com/ionicons@5.4.0/dist/ionicons.js', array(), '5.4.0');
		wp_register_script('alpine', 'https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.1/dist/alpine.min.js', array(), 'v2.8.1');
		wp_register_script('dg-js', get_template_directory_uri() . '/assets/js/app.js', array(), '5.4.0', true);

		wp_enqueue_style('dg-style');
		wp_enqueue_style('animate-css');

		wp_enqueue_script('dg-ionicons');
		wp_enqueue_script('alpine');
		wp_enqueue_script('dg-js');
	}

	// scripts hook

	add_action('wp_enqueue_scripts', 'dg_enqueue_scripts');
	
	// after_setup_theme hook

	add_action('after_setup_theme', 'dg_title_tag');

	// init hook

	add_action('init', 'dg_menu')

	// get the title of of a page
	// the_title
	// wordpress treats page and posts the same
	// getting all posts
	// if (have_posts()){
	// 	while(have_posts()){
	// 		the_post()
	//		the_content()
	// 	}
	// }


	// get_header('header-name') and you should call yur php file header-'header-name'

	// enqueueinh scripts first  method
	// function dg_register_styles(){

	// 	wp_enqueue_style('dg-style', get_template_directory_uri() . '/assets/css/app.css', array(), '1.0');
	// 	wp_enqueue_style('animate-csss', "https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css", array(), '1.0');
	// }

	// function dg_register_scripts(){

	// 	wp_enqueue_script('dg-ionicons', 'https://unpkg.com/ionicons@5.4.0/dist/ionicons.js', array(), '5.4.0');
	// 	wp_enqueue_script('js-animation-scroll', get_template_directory_uri() . '/assets/js/app.js', array(), '5.4.0', true);
	// }
	// add_action('wp_enqueue_scripts', 'dg_register_styles');
	// add_action('wp_enqueue_scripts', 'dg_register_scripts');
?>

