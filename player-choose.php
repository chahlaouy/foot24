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
            <div class="w-96 bg-gray-800 rounded-2xl text-gray-100 shadow-2xl p-8">
                <div>
                    <label for=""  class="block">Nom et prénom</label>
                    <input x-model="userInfo.username" type="text" class="w-full  py-3 bg-gray-700 rounded-xl my-4 px-2" placeholder="Nom et prénom">
                </div>
                <div>
                    <label for="" class="block">C.I.N</label>
                    <input x-model="userInfo.cin" type="number" class="w-full  py-3 bg-gray-700 rounded-xl my-4 px-2" placeholder="cin">
                </div>
                <div>
                    <label for="" class="block">Télephone</label>
                    <input x-model="userInfo.phone" type="text" class="w-full  py-3 bg-gray-700 rounded-xl my-4 px-2" placeholder="telephone">
                </div>
                <button class="w-full bg-gray-100 text-gray-900 text-xl py-3 rounded-xl" @click="saveUserInfo()">submit</button>
            </div>
        </div>
        <div class="fixed bottom-0 right-0 z-50 p-12" x-show="isChoosingIsCompleteMessage">
            <div class="w-96 bg-red-600 rounded-2xl text-gray-100 shadow-2xl p-8 text-center" x-text="errorMessage">
                
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
                        <button class="py-4 px-12 border-4 border-red-600 text-gray-100 bg-red-600 text-4xl  rounded-2xl" @click="submitVoting()">
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
                  username: "",
                  phone: "",
                  cin: "" 
                },
                isChoosingIsCompleteMessage: false,
                isAllowedToVote: false,
                isChoosingIsComplete: false,
                errorMessage: "",
                get isUserRegistred(){
                    return (this.userInfo.username != "") && (this.userInfo.phone != "") && (this.userInfo.cin != "")
                },
                submitVoting(){
                    /**Check wether user is registred or not */
                    if(this.isUserRegistred){

                        /** another if to check wether the user choose or not */
                        if(this.isChoosingIsComplete){
                            console.log("submit voting to back end")
                        }
                        else{
                            /** The user does not choose yet or information is incomplete */
                            /**show a message to the user */
                            this.isChoosingIsCompleteMessage = true
                            this.errorMessage = "plz vote"
                            setTimeout(() => {
                                this.isChoosingIsCompleteMessage = false
                            }, 1000);
                        }
                    }else{
                        // if((this.userInfo.username != "") && (this.userInfo.phone != "") && (this.userInfo.cin != "")){
                        //     console.log("submit voting to back end")
                        // }
                        this.isAllowedToVote = true
                        
                    }
                },

                saveUserInfo(){
                    if((this.userInfo.username != "") && (this.userInfo.phone != "") && (this.userInfo.cin != "")){
                        console.log("sending user data to backend");
                        this.isAllowedToVote = false
                    }else{
                        console.log("user info incomplete")
                        this.errorMessage = "plz complete the form"
                        this.isChoosingIsCompleteMessage = true
                        setTimeout(() => {
                            this.isChoosingIsCompleteMessage = false
                        }, 1000);
                    }
    
                }
            }
        }
    </script>