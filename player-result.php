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

<body class="bg-gray-300">

<nav class="md:hidden wrapper mx-auto py-4 px-5 bg-gray-900 text-gray-100">
        <ul class=" flex  justify-between">
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
    <section class="wrapper mx-auto" x-data="getPlayers()" x-init="fetchPlayers()">
        <div class="w-full relative">
            <!-- <div class="absolute w-full h-full z-20 bg-gray-900 bg-opacity-30"></div> -->
            <div class="w-full realtive z-10">
                <img class="w-full"
                    src="<?php echo get_template_directory_uri() . '/assets/images/player-result.jpg'; ?>" alt="">
            </div>
            <div class="absolute top-0 right-0  mt-56 z-40">
        

                <div class="">
                    <div class="md:flex md:items-center md:justify-center">
                        <div class="bg-white shadow-2xl rounded-2xl relative z-10">
                            <h1 class="text-center text-red-600 text-sm md:text-3xl py-1" x-text="playerOne.name"></h1>
                            <hr>
                            <div class="flex items-stretch">
                                <div
                                    class="bg-red-600 text-gray-100 rounded-br-2xl items-center flex justify-center w-24 md:w-32">
                                    <h1 class="text-4xl" x-text="playerOne.finalScore"></h1>
                                </div>
                                <div class="py-1 pl-1 md:pl-24 pr-2 w-64 md:w-96">

                                    <div id="public">

                                        <div class="flex w-full items-center justify-between">
                                            <div>
                                                <span class="text-xs">??????????</span>
                                                <h1 class='text-sm md:text-xl'>?????????? ??????????????</h1>
                                            </div>
                                            <div>
                                                <span class="text-sm" x-text="playerOne.totalScorePublic"></span>
                                            </div>
                                        </div>
                                        <div class="w-full h-3 bg-red-600 rounded-2xl"></div>
                                    </div>

                                    <div id="jouralist">

                                        <div class="flex w-full items-center justify-between">
                                            <div>
                                                <span class="text-xs">??????????</span>
                                                <h1 class='text-sm md:text-xl'>?????????? ????????????????</h1>
                                            </div>
                                            <div>
                                                <span class="text-sm" x-text="playerOne.totalScoreJournalist"></span>
                                            </div>
                                        </div>
                                        <div class="w-full h-3 bg-red-600 rounded-2xl"></div>
                                    </div>



                                </div>

                            </div>
                        </div>
                        <div class="flex items-center -mt-4 justify-end md:block md:mt-0">
                        
                            <div
                                class="flex items-center justify-center w-28 h-28 md:w-48 md:h-48 rounded-full relative z-20 -mr-4 md:-mr-16 shadow-2xl">
                                <img class="w-full rounded-full h-full bg-cover object-cover bg-center bg-top"
                                    :src="playerOne.imgUrl" alt="">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="md:grid md:grid-cols-2 md:gap-12 md:mt-12">
                    <template x-for="player in players" class="">
                        
                    <div class="md:flex md:items-center md:justify-center mt-4 md:mt-0">
                        <div class="bg-white shadow-2xl rounded-2xl relative z-10">
                            <h1 class="text-center text-red-600 text-sm md:text-3xl py-1" x-text="player.name"></h1>
                            <hr>
                            <div class="flex items-stretch">
                                <div
                                    class="bg-red-600 text-gray-100 rounded-br-2xl items-center flex justify-center w-24 md:w-32">
                                    <h1 class="text-4xl" x-text="player.finalScore"></h1>
                                </div>
                                <div class="py-1 pl-1 md:pl-24 pr-2 w-64 md:w-96">

                                    <div id="public">

                                        <div class="flex w-full items-center justify-between">
                                            <div>
                                                <span class="text-xs">??????????</span>
                                                <h1 class='text-sm md:text-xl'>?????????? ??????????????</h1>
                                            </div>
                                            <div>
                                                <span class="text-sm" x-text="player.totalScorePublic"></span>
                                            </div>
                                        </div>
                                        <div class="w-full h-3 bg-red-600 rounded-2xl"></div>
                                    </div>

                                    <div id="jouralist">

                                        <div class="flex w-full items-center justify-between">
                                            <div>
                                                <span class="text-xs">??????????</span>
                                                <h1 class='text-sm md:text-xl'>?????????? ????????????????</h1>
                                            </div>
                                            <div>
                                                <span class="text-sm" x-text="player.totalScoreJournalist"></span>
                                            </div>
                                        </div>
                                        <div class="w-full h-3 bg-red-600 rounded-2xl"></div>
                                    </div>



                                </div>

                            </div>
                        </div>
                        <div class="flex items-center justify-end -mt-4 md:mt-0 md:block">
                        
                            <div
                                class="flex items-center justify-center w-28 h-28 md:w-48 md:h-48 rounded-full relative z-20 -mr-4 md:-mr-16 shadow-2xl">
                                <img class="w-full rounded-full h-full bg-cover object-cover bg-center bg-top"
                                    :src="player.imgUrl" alt="">
                            </div>
                        </div>
                    </div>
                    </template>
                </div>
            
            </div>
        </div>
    </section>

    <script>
    function getPlayers() {
        return {
            playerOne: {
                name: "???????????? 1",
                imgUrl: "<?php echo get_template_directory_uri() ?>" + "/assets/images/profile.png",
                totalScorePublic: '0',
                totalScoreJournalist: '0'
            },
            players: [{
                    name: "???????????? 2",
                    imgUrl: "<?php echo get_template_directory_uri() ?>" + "/assets/images/profile.png",
                    totalScorePublic: '0',
                    totalScoreJournalist: '0'
                },
                {
                    name: "???????????? 3",
                    imgUrl: "<?php echo get_template_directory_uri() ?>" + "/assets/images/profile.png",
                    totalScorePublic: '0',
                    totalScoreJournalist: '0'
                },
                {
                    name: "???????????? 4",
                    imgUrl: "<?php echo get_template_directory_uri() ?>" + "/assets/images/profile.png",
                    totalScorePublic: '0',
                    totalScoreJournalist: '0'
                },
                {
                    name: "???????????? 5",
                    imgUrl: "<?php echo get_template_directory_uri() ?>" + "/assets/images/profile.png",
                    totalScorePublic: '0',
                    totalScoreJournalist: '0'
                },
            ],
            initialized: false,
            newPlayer: {
                name: "",
                imgUrl: "",
            },
            fetchPlayers() {

                this.getPercentage()
                setTimeout(() => {

                    // fetch('http://localhost/wordpress/get-players/')
                    fetch('http://wp.foot24.online/get-players/')
                        .then(response => response.json())
                        .then(data => {
                            
                            let arr =data.data
                            arr.forEach((p, index) => {
                                p.imgUrl = '<?php echo get_template_directory_uri() ?>' +
                                    '/player/images/' + p.imgUrl;
                                    p.finalScore =  ((p.totalScorePublic * this.percentage.publicPercentage)/100 +  (p.totalScoreJournalist * this.percentage.journalistPercentage)/100)
                                    p.totalScorePublic = p.totalScorePublic.toFixed(2);
                                    p.totalScoreJournalist = p.totalScoreJournalist.toFixed(2);
                                    p.finalScore = p.finalScore.toFixed(2)
                                    console.log(p.finalScore)
                            })
                            
                            arr.sort(function(a, b){return b.finalScore - a.finalScore});
                            this.playerOne = arr[0];
                            this.players = arr.filter((p, index) => index != 0)



                        })
                }, 1500);
            },
            /** Percentage Logic */
            percentage: {
                publicPercentage: 0,
                journalistPercentage: 0,
                showLoader: false,
                showModal: false

            },
            getPercentage(){

                fetch('http://localhost/wordpress/get-percentage/')
                    .then(response => response.json())
                    .then(data => {
                        console.log(data.data[0])
                        this.percentage.publicPercentage = data.data[0].publicPercentage
                        this.percentage.journalistPercentage = data.data[0].journalistPercentage
                    })
                },

        }
    }
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

// get_footer();