<?php /* Template Name: player_result */ ?>
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
    <section class="wrapper mx-auto" x-data="getPlayers()">
        <div class="w-full relative">
            <div class="absolute w-full h-full z-20 bg-gray-900 bg-opacity-30"></div>
            <div class="w-full realtive z-10">
                <img class="w-full"
                    src="<?php echo get_template_directory_uri() . '/assets/images/player-result.jpg'; ?>" alt="">
            </div>
            <div class="flex justify-center absolute top-0 right-0 w-full h-full mt-24 z-40">
                <div class="">
                    /** card begin */
                    <div class="flex items-center justify-center">
                        <div class="bg-white shadow-2xl rounded-2xl relative z-10">
                            <h1 class="text-center text-red-600 text-3xl py-1">Player name</h1>
                            <hr>
                            <div class="flex items-stretch">
                                <div
                                    class="bg-red-600 text-gray-100 rounded-br-2xl items-center flex justify-center w-32">
                                    <h1 class="text-4xl">2.5</h1>
                                </div>
                                <div class="py-1 pl-24 pr-2 w-96">

                                    <div id="public">

                                        <div class="flex w-full items-center justify-between">
                                            <div>
                                                <span class="text-xs">voting</span>
                                                <h1 class='text-xl'>publique</h1>
                                            </div>
                                            <div>
                                                <span class="text-sm">2.5</span>
                                            </div>
                                        </div>
                                        <div class="w-full h-3 bg-red-600 rounded-2xl"></div>
                                    </div>

                                    <div id="jouralist">

                                        <div class="flex w-full items-center justify-between">
                                            <div>
                                                <span class="text-xs">voting</span>
                                                <h1 class='text-xl'>journalist</h1>
                                            </div>
                                            <div>
                                                <span class="text-sm">2.5</span>
                                            </div>
                                        </div>
                                        <div class="w-full h-3 bg-red-600 rounded-2xl"></div>
                                    </div>



                                </div>

                            </div>
                        </div>
                        <div
                            class="flex items-center justify-center w-48 h-48 rounded-full relative z-20 -mr-16 shadow-2xl">
                            <img class="w-full rounded-full h-full bg-cover object-cover bg-center bg-top"
                                src="<?php echo get_template_directory_uri() . '/assets/images/profile.png'; ?>" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>

function getPlayers(){
        return {
            players: [
                {name: "اللاعب 1", imgUrl: "<?php echo get_template_directory_uri() ?>" + "/assets/images/profile.png"},
                {name: "اللاعب 2", imgUrl: "<?php echo get_template_directory_uri() ?>" + "/assets/images/profile.png"},
                {name: "اللاعب 3", imgUrl: "<?php echo get_template_directory_uri() ?>" + "/assets/images/profile.png"},
                {name: "اللاعب 4", imgUrl: "<?php echo get_template_directory_uri() ?>" + "/assets/images/profile.png"},
                {name: "اللاعب 5", imgUrl: "<?php echo get_template_directory_uri() ?>" + "/assets/images/profile.png"},
            ],
            initialized: false,
            newPlayer: {
                name: "",
                imgUrl: "",
            },
            fetchPlayers(){

                setTimeout(() => {
                
                fetch('http://localhost/wordpress/get-players/')
                    .then(response => response.json())
                        .then(data =>{
                            this.players = data.data
                            this.players.forEach(p=>{
                                p.imgUrl = '<?php echo get_template_directory_uri() ?>' + '/player/images/' + p.imgUrl
                                console.log(p.imgUrl)
                            })
                    })
                }, 2000);
            }
             
        }
    }

    </script>
    <?php

// get_footer();