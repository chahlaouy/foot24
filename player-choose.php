<?php /* Template Name: player_choose */ ?>
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
    <section class="wrapper mx-auto" x-data="playerChoose()">
        <div class="fixed bottom-0 left-0 z-50 p-12" x-show="isAllowedToVote">
            <div class="w-96 h-96 bg-gray-800 rounded-2xl text-gray-100 shadow-2xl p-4">
                <div>
                    <label for="" x-model="userInfo.username" class="block">Nom et prénom</label>
                    <input type="text" class="w-full border border-gray-400 py-3 bg-">
                </div>
            </div>
        </div>
        <div class="w-full relative">
            <!-- <div class="absolute w-full h-full z-20 bg-gray-900 bg-opacity-30"></div> -->
            <div class="w-full realtive z-10">
                <img class="w-full" src="<?php echo get_template_directory_uri() . '/assets/images/player-choose.jpg'; ?>"
                    alt="">
            </div>
            <div class="flex justify-center absolute top-0 right-0 w-full mt-96 z-40">
                <div class="mt-28">

                    <div class="w-full flex items-center justify-around">
                        <div class="">
                            <img class="w-48 h-48 bg-cover bg-center object-cover rounded-full shadow-2xl" src="<?php echo get_template_directory_uri() . '/assets/images/profile.png'; ?>" alt="">
                        </div>
                        <div class="mx-32">
                            <img class="w-64 h-64 bg-cover bg-center object-cover rounded-full shadow-2xl" src="<?php echo get_template_directory_uri() . '/assets/images/profile.png'; ?>" alt="">
                        </div>
                        <div class="">
                            <img class="w-48 h-48 bg-cover bg-center object-cover rounded-full shadow-2xl" src="<?php echo get_template_directory_uri() . '/assets/images/profile.png'; ?>" alt="">
                        </div>
                    </div>

                    <!-- players list -->
                    <div class="w-full flex items-center justify-around mt-24">

                        <div class="">
                            <img class="w-32 h-32 bg-cover bg-center object-cover rounded-full shadow-2xl" src="<?php echo get_template_directory_uri() . '/assets/images/profile.png'; ?>" alt="">
                            <h1 class="mt-3 text-center text-xl py-2 px-4">player1</h1>
                        </div>

                    </div>

                    <div class="flex items-center justify-center mt-12">
                        <button class="py-4 px-12 border-4 border-red-600 text-red-600 text-4xl ml-5 rounded-2xl">
                            <a href="/">
                                Cancel
                            </a>    
                        </button>
                        <button class="py-4 px-12 border-4 border-red-600 text-gray-100 bg-red-600 text-4xl  rounded-2xl" @click="submitForm()">
                            confirm
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function playerChoose(){
            return {
                players: [
                    {playerId: '1', playerName: 'Mahdi', playerImgUrl: '1.png'},
                    {playerId: '1', playerName: 'Mahdi', playerImgUrl: '2.png'},
                    {playerId: '1', playerName: 'Mahdi', playerImgUrl: '3.png'},
                    {playerId: '1', playerName: 'Mahdi', playerImgUrl: '4.png'},
                    {playerId: '1', playerName: 'Mahdi', playerImgUrl: '2.png'},
                ],

                userInfo: {
                  username: false,
                  phone: "",
                  cin: "" 
                },
                isAllowedToVote: false,
                submitForm(){
                    if((this.userInfo.username != "") && (this.userInfo.phone != "") && (this.userInfo.cin != "")){
                        console.log("forward")
                    }else{
                        this.isAllowedToVote = true
                    }
                }

            }
        }
    </script>