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

<body class="bg-white">

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
    <!-- fetch('http://wp.foot24.online/get-players/') -->
    <section class="wrapper mx-auto" x-data="playerChoose()" x-init="
        setTimeout(() => {
                
            
            fetch('http://http://wp.foot24.online/get-players/')
                .then(response => response.json())
                    .then(data =>{
                        if (data.data != undefined){
                        
                            players = data.data
                            players.forEach(p=>{
                                p.disabled = false
                                p.imgUrl = '<?php echo get_template_directory_uri() ?>' + '/player/images/' + p.imgUrl
                            })
                        }

            })
        }, 3000);
            ">
        <div class="fixed bottom-0 left-0 z-50 p-4 md:p-12" x-show="isAllowedToVote">
            <div class="w-72 md:w-96 bg-gray-800 rounded-2xl text-gray-100 shadow-2xl p-8">
                <div>
                    <label for="" class="block">الإسم واللقب</label>
                    <input x-model="userInfo.username" type="text" class="w-full py-3 bg-gray-700 rounded-xl my-4 px-2"
                        placeholder="الإسم واللقب">
                </div>
                <div>
                    <label for="" class="block">C.I.N</label>
                    <input x-model="userInfo.cin" type="text" class="w-full  py-3 bg-gray-700 rounded-xl my-4 px-2"
                        placeholder="cin" onkeypress="return onlyNumberKey(event)">
                </div>
                <div>
                    <label for="" class="block">الهاتف</label>
                    <input x-model="userInfo.phone" type="text" class="w-full  py-3 bg-gray-700 rounded-xl my-4 px-2"
                        placeholder="الهاتف">
                </div>
                <button class="w-full bg-gray-100 text-gray-900 text-xl py-3 rounded-xl" 
                    @click="saveUserInfo()"
                    x-show="!showLoader"
                >
                    <div >تسجيل</div>
                </button>
                <button class="w-full bg-gray-100 text-gray-900 text-xl py-3 rounded-xl flex items-center justify-center"
                    x-show="showLoader"
                >
                    <div class="loader"></div>
                </button>
            </div>
        </div>
        <div class="fixed bottom-0 right-0 z-50 p-4 md:p-12" x-show="errorMessage != ''">
            <div class="w-72 md:w-96 bg-red-600 rounded-2xl text-gray-100 shadow-2xl p-8 text-center" x-text="errorMessage">
            </div>
        </div>
        <div class="fixed bottom-0 right-0 z-50 p-4 md:p-12" x-show="successMessage != ''">
            <div class="w-72 md:w-96 bg-green-500 rounded-2xl text-gray-100 shadow-2xl p-8 text-center" x-text="successMessage">
            </div>
        </div>
        <div class="fixed bottom-0 right-0 z-50 p-4 md:p-12" x-show="finalMessage != ''">
            <div class="w-72 md:w-96 bg-green-500 rounded-2xl text-gray-100 shadow-2xl p-8 text-center" x-text="finalMessage">
            </div>
        </div>
        <div class="w-full relative">
            <!-- <div class="absolute w-full h-full z-20 bg-gray-900 bg-opacity-30"></div> -->
            <div class="w-full realtive z-10">
                <img class="w-full"
                    src="<?php echo get_template_directory_uri() . '/assets/images/player-choose.jpg'; ?>" alt="">
            </div>
            <div class="flex justify-center md:absolute md:top-0 md:right-0 w-full -mt-56 md:mt-96 z-40">
                <div class="md:mt-28">

                    <div class="w-full flex items-center md:justify-around justify-center">
                        <div class="">
                            <img class="w-24 h-24 md:w-48 md:h-48 bg-cover bg-center object-cover rounded-full shadow-2xl"
                                :src="playerTwo.imgUrl" x-show="playerTwo.triggred">
                            <img class="w-24 h-24 md:w-48 md:h-48 bg-cover bg-center object-cover rounded-full shadow-2xl"
                                src="<?php echo get_template_directory_uri() . '/assets/images/profile.png'; ?>" alt=""
                                x-show="!playerTwo.triggred">
                        </div>
                        <div class="mx-4 md:mx-32">
                            <img class="w-36 h-36 md:w-72 md:h-72 bg-cover bg-center object-cover rounded-full shadow-2xl"
                                :src="playerOne.imgUrl" alt="" x-show="playerOne.triggred">
                            <img class="w-36 h-36 md:w-72 md:h-72 bg-cover bg-center object-cover rounded-full shadow-2xl"
                                src="<?php echo get_template_directory_uri() . '/assets/images/profile.png'; ?>"
                                x-show="!playerOne.triggred">
                        </div>
                        <div class="">
                            <img class="w-24 h-24 md:w-48 md:h-48 bg-cover bg-center object-cover rounded-full shadow-2xl"
                                :src="playerThree.imgUrl" alt="" x-show="playerThree.triggred">
                            <img class="w-24 h-24 md:w-48 md:h-48 bg-cover bg-center object-cover rounded-full shadow-2xl"
                                src="<?php echo get_template_directory_uri() . '/assets/images/profile.png'; ?>"
                                x-show="!playerThree.triggred">
                        </div>
                    </div>

                    <!-- players list -->
                    <div class="w-full grid grid-cols-2 md:flex md:items-center md:justify-around mt-8 md:mt-24">
                        <template x-for="player in players" :key="player.id">

                            <div>
                                <div class="flex items-center justify-center">
                                    <div class="w-20 h-20 md:w-32 md:h-32 bg-gray-300 rounded-full ">
                                        <img class="w-20 h-20 md:w-32 md:h-32 bg-cover bg-center object-cover rounded-full shadow-2xl cursor-pointer"
                                            :src="player.imgUrl" @click="vote(player.id)" x-show="player.showPlayer == '0'">
                                    </div>
                                </div>
                                <h1 class="mt-3 text-center text-xl py-2 px-4" x-text="player.name"></h1>
                            </div>
                        </template>

                    </div>

                    <div class="flex items-center justify-center mt-12">
                        <button class="py-2 px-4 md:py-4 md:px-12 border-4 border-red-600 text-red-600 text-xl md:text-4xl ml-5 rounded-2xl">
                            <a href="/">
                                الغاء
                            </a>
                        </button>
                        <button
                            class="py-2 px-4 md:py-4 md:px-12 border-4 border-red-600 text-gray-100 bg-red-600 text-xl md:text-4xl  rounded-2xl"
                            @click="submitVoting()">
                            تأكيد
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
    function playerChoose() {
        return {
            players: [{
                    id: '1',
                    name: "اللاعب 1",
                    imgUrl: '<?php echo get_template_directory_uri() ?>' + '/assets/images/' + 'profile.png',
                    scoreJournalist: 0,
                    showPlayer: 0
                },
                {
                    id: '2',
                    name: "اللاعب 2",
                    imgUrl: '<?php echo get_template_directory_uri() ?>' + '/assets/images/' + 'profile.png',
                    scoreJournalist: 0,
                    showPlayer: 0
                },
                {
                    id: '3',
                    name: "اللاعب 3",
                    imgUrl: '<?php echo get_template_directory_uri() ?>' + '/assets/images/' + 'profile.png',
                    scoreJournalist: 0,
                    showPlayer: 0
                },
                {
                    id: '4',
                    name: "اللاعب 4",
                    imgUrl: '<?php echo get_template_directory_uri() ?>' + '/assets/images/' + 'profile.png',
                    scoreJournalist: 0,
                    showPlayer: 0
                },
                {
                    id: '5',
                    name: "اللاعب 5",
                    imgUrl: '<?php echo get_template_directory_uri() ?>' + '/assets/images/' + 'profile.png',
                    scoreJournalist: 0,
                    showPlayer: 0
                },
            ],
            showLoader: false,
            numberOfClicks: 0,
            playerOne: {
                imgUrl: "",
                triggred: false
            },
            playerTwo: {
                imgUrl: "",
                triggred: false
            },
            playerThree: {
                imgUrl: "",
                triggred: false
            },

            vote(id) {
                if (this.numberOfClicks === 3) {
                    return
                }

                this.numberOfClicks = this.numberOfClicks + 1
                this.players.forEach(p => {
                    if (p.id === id) {
                        switch (this.numberOfClicks) {
                            case 1:
                                p.scoreJournalist = 5;
                                p.showPlayer = 1;
                                this.playerOne.imgUrl = p.imgUrl;
                                this.playerOne.triggred = true;
                                break;
                            case 2:
                                p.scoreJournalist = 4;
                                p.showPlayer = 1;
                                this.playerTwo.imgUrl = p.imgUrl;
                                this.playerTwo.triggred = true;
                                break;
                            case 3:
                                p.scoreJournalist = 3;
                                p.showPlayer = 1;
                                this.playerThree.imgUrl = p.imgUrl;
                                this.playerThree.triggred = true;
                                break;
                        }
                    }
                })

            },
            userInfo: {
                username: "",
                phone: "",
                cin: ""
            },
            isChoosingIsCompleteMessage: true,
            isAllowedToVote: false,
            // isChoosingIsComplete: false,
            get isChoosingIsComplete() {

                return this.numberOfClicks === 3
            },

            errorMessage: "",
            successMessage: "",
            finalMessage: "",
            isUserRegistred: false,
            submitVoting() {
                /**Check wether user is registred or not */
                if (this.isUserRegistred) {

                    /** another if to check wether the user choose or not */
                    if (this.isChoosingIsComplete) {


                        // fetch('http://localhost/wordpress/update-players/', {
                        fetch('http://wp.foot24.online/update-players/', {
                            method: 'POST',
                            body: JSON.stringify(this.players),
                            headers:{
                                'Content-Type': 'Application/json'
                            }
                        })
                            .then(response => response.json())
                            .then(data => {
                                if(data.success == 'success'){
                                    this.finalMessage = " تم التصويت بنجاح سيقع تحويلك لصفحة إحصائيات"
                                    setTimeout(() => {
                                        this.finalMessage = ""
                                        window.location.href = "http://wp.foot24.online/player-result/";
                                        // window.location.href = "http://localhost/wordpress/player-result/";
                                    }, 1500);
                                }else{

                                    this.finalMessage = ""
                                    window.location.href = "http://wp.foot24.online/player-result/";
                                    // window.location.href = "http://localhost/wordpress/player-result/";
                                }
                            })
                    } else {
                        /** The user does not choose yet or information is incomplete */
                        /**show a message to the user */
                        this.errorMessage = "الرجاء اختيار اللاعبين"
                        setTimeout(() => {
                            this.errorMessage = ""
                        }, 2000);
                    }
                } else {
                    this.isAllowedToVote = true

                }
            },

            saveUserInfo() {
                if ((this.userInfo.username != "") && (this.userInfo.phone != "") && (this.userInfo.cin != "")) {
                    if(this.userInfo.cin.length != 8 ){
                        this.errorMessage = "هناك  خطآ في رقم البطاقة";
                        setTimeout(() => {
                            this.errorMessage = ""
                        }, 1500);
                        return
                    }
                    this.showLoader = true;
                    const formData = new FormData();
                    formData.append('cin', this.userInfo.cin);
                    // fetch('http://localhost/wordpress/get-single-user/',{
                    fetch('http://wp.foot24.online/get-single-user/',{
                        method: 'POST',
                        body: formData,
                        headers: {}
                    })
                        .then(response => response.json())
                        .then(data => {
                            if(data.found == 'no'){
                                // fetch('http://localhost/wordpress/create-user/',{
                                fetch('http://wp.foot24.online/create-user/',{
                                    method: 'POST',
                                    body: JSON.stringify({
                                        name: this.userInfo.username,
                                        phone: this.userInfo.phone,
                                        cin: this.userInfo.cin
                                    }),
                                    headers: {
                                        'Content-Type': 'Application/json'
                                    },
                                })
                                    .then(response => response.json())
                                    .then(data=> {

                                        /** if user saved show message done */
                                        if(data[0]=="success"){

                                            this.successMessage = "تم تسجيل البينات بنجاح"
                                            setTimeout(() => {
                                                this.successMessage = ""
                                            }, 1500);
                                            this.isUserRegistred = true
                                        }
                                        
                                        /** if user not saved show message not done */
                                        else{
                                            this.errorMessage = "هناك خطأ  الرجاء اعادة المحاولة"
                                            setTimeout(() => {
                                                this.errorMessage = ""
                                            }, 1500);
                                        }
                                    })
                            }else{
                                this.errorMessage = "لا يسمح لك بالتصويت مرتين"
                                setTimeout(() => {
                                    this.errorMessage = ""
                                }, 1500); 
                            }
                        })




                    
                    /** if the user created or not hide the spinner */
                    this.showLoader = false;
                    this.isAllowedToVote = false

                } else {
                    this.errorMessage = "الرجاء ادخال معلوماتك الخاصة"
                    setTimeout(() => {
                        this.errorMessage = ""
                    }, 1500);
                }

            }
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

        function onlyNumberKey(evt){

            // Only ASCII charactar in that range allowed
            var ASCIICode = (evt.which) ? evt.which : evt.keyCode
            if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
                return false;
            return true;
        }
       
    </script>