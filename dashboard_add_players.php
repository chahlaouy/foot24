<?php /* Template Name: dashboard_add_players */ ?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Player Of the Month</title>
    <meta name="author" content="name">
    <meta name="description" content="description here">
    <meta name="keywords" content="keywords,here">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.1/dist/alpine.min.js" defer></script>
    <!--Replace with your tailwind.css once created-->
    <?php wp_head(); ?>
</head>

<body class="bg-gray-800 font-sans leading-normal tracking-normal mt-12" style="direction: ltr ! important">


    <div class="flex flex-col md:flex-row relative z-30" >

        <!-- Side Nav bar -->
        <div class="bg-gray-800 shadow-xl h-16 fixed bottom-0 mt-12 md:relative md:h-screen z-10 w-full md:w-48">

            <div
                class="md:mt-12 md:w-48 md:fixed md:left-0 md:top-0 content-center md:content-start text-left justify-between">
                <ul class="list-reset flex flex-row md:flex-col py-0 md:py-3 px-1 md:px-2 text-center md:text-left">
                    <li class="mr-3 flex-1">
                        <a href="http://wp.foot24.online/dashboard-add-players/"
                            class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-blue-600 hover:border-pink-500">
                            <i class="fas fa-tasks pr-0 md:pr-5 text-blue-600"></i><span
                                class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">Ajouter
                                un sondage</span>
                        </a>
                    </li>

                    <li class="mr-3 flex-1 my-4">
                        <a href="http://wp.foot24.online/player-of-the-month/"
                            class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white ">
                            <i class="fas fa-chart-area pr-0 md:block"></i><span
                                class="pb-1 md:pb-0 text-xs md:text-base text-white md:text-white block md:inline-block">Statistique</span>
                        </a>
                    </li>
                    <li class="mr-3 flex-1">
                        <a href="http://wp.foot24.online/wordpress/ads/"
                            class="block py-1 md:py-3 pl-0 md:pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-red-500">
                            <i class="fa fa-wallet pr-0 md:pr-5"></i><span
                                class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">Panneau
                                publicitaire</span>
                        </a>
                    </li>
                </ul>
            </div>


        </div>

        <div class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5" x-data="getPlayers()" x-init="
            setTimeout(() => {
                
                fetch('http://wp.foot24.online/get-players/')
                    .then(response => response.json())
                        .then(data =>{
                            if (data.data != undefined){
                                showButtons = true
                                players = data.data
                                console.log(players)
                                players.forEach(p=>{
                                    p.imgUrl = '<?php echo get_template_directory_uri() ?>' + '/player/images/' + p.imgUrl
                                })
                            }
                            getPercentage()
                })
            }, 3000);
        
        "> 

            <div class="bg-gray-800 pt-3 flex justify-between items-center">
                <div class="rounded-tl-3xl bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white">
                    <h3 class="font-bold pl-2">Sondage</h3>
                </div>
                <div class="rounded-tl-3xl bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-lg text-white flex items-center">
                    <div>
                        Poucentage Public <span class="bg-green-400 p-1 rounded-2xl ml-2" x-text="percentage.publicPercentage"></span>
                    </div>
                    <div class="ml-4">
                        Poucentage Journalist <span class="bg-green-400 p-1 rounded-2xl ml-2" x-text="percentage.journalistPercentage"></span>
                    </div>
                    <button class="ml-4 py-2 px-4 bg-green-300 rounded-lg text-green-800" @click="percentage.showModal = true">
                        Changer Pourcentage
                    </button>
                    
                </div>

            </div>
            
            <!-- players list  -->

            <div class="w-full flex items-center justify-around mt-24 relative z-20">
                <template x-for="player in players">

                    <div>
                        <div class="flex items-center my-4" x-show="showButtons">
                            <button class="py-2 px-4 bg-red-500 text-gray-100 mr-2 rounded" @click="destroyPlayer(player.id)">Supprimer</button>
                            <button class="py-2 px-4 bg-green-500 text-gray-100 rounded" @click="setPlayerDataForUpdate(player)">Modifier</button>
                        </div>
                        <div class="flex items-center justify-center">
                            <div class="w-32 h-32 bg-gray-800 rounded-full">
                                <img class="w-32 h-32 bg-cover bg-center object-cover rounded-full shadow-2xl cursor-pointer" 
                                :src="player.imgUrl"
                                
                                >
                                
                            </div>
                        </div>
                        <h1 class="mt-3 text-center text-xl py-2 px-4 text-gray-800" x-text="player.name"></h1>
                    </div>
                </template>

            </div>

            <div class="fixed bottom-80 right-0 z-50 p-8" x-show="errorMessage != ''">
                <div class="w-96 bg-red-600 rounded-2xl text-gray-100 shadow-2xl p-8 text-center" x-text="errorMessage">
                </div>
            </div>
            <div class="fixed bottom-80 right-0 z-50 p-8" x-show="successMessage != ''">
                <div class="w-96 bg-green-500 rounded-2xl text-gray-100 shadow-2xl p-8 text-center" x-text="successMessage">
                </div>
            </div>

            <div class="flex items-center justify-center fixed bottom-0 right-0 p-8 z-50 shadow-2xl">

                <div id="form" class="w-96">
                    <div>
                        <label for="" class="block">Nom de joueur</label>
                        <input type="text" id="name" 
                            class="w-full py-3 bg-gray-100 rounded-xl my-4 px-2 border border-gray-800"
                            x-model="newPlayer.name"
                        >
                    </div>
                    <div>
                        <label for="" class="block">Image Joueur</label>
                        <input type="file" name="imgUrl" id="imgUrl"
                            class="w-full py-3 bg-gray-100 rounded-xl my-4 px-2" x-model="newPlayer.image">
                    </div>
                    
                    <button class="w-full bg-gray-800 text-gray-100 text-xl py-3 rounded-xl"
                        id="btnUpload" 
                        @click()="savePlayer"
                        x-show="!showLoader && playerID == ''"
                    >
                        Enregistrer
                    </button>
                    <button class="w-full bg-gray-800 text-gray-100 text-xl py-3 rounded-xl"
                        id="btnUpload" 
                        @click()="updatePlayer"
                        x-show="playerID != ''"
                    >
                        Modifier
                    </button>
                    <button class="w-full bg-gray-800 text-gray-100 text-xl py-3 rounded-xl flex items-center justify-center"
                        x-show="showLoader"
                    >
                        <div class="loader"></div>
                    </button>
                </div>

            </div>


            <div class="absolute top-0 left-0 w-full p-4 bg-gray-800 bg-opacity-50 h-screen z-50" x-show="percentage.showModal">
                    
                <div class="flex items-center justify-center w-full h-full">
                    <div class="w-96 bg-white shadow-2xl rounded-2xl p-8">

                        <div>
                            <label for="" class="block">Pourcentage Public</label>
                            <input type="text" id="name" 
                                class="w-full py-3 bg-gray-100 rounded-xl my-4 px-2 border border-gray-800"
                                x-model="percentage.publicPercentage"
                            >
                        </div>
                        <div>
                            <label for="" class="block">Pourcentage Journalist</label>
                            <input type="text" id="name" 
                                class="w-full py-3 bg-gray-100 rounded-xl my-4 px-2 border border-gray-800"
                                x-model="percentage.journalistPercentage"
                            >
                        </div>
                        <div class="flex items-center justify-between">
                        
                            <button class="w-full bg-gray-800 text-gray-100 text-xl py-3 rounded-xl"
                                id="btnUpload" 
                                @click()="setPercentage()"
                                x-show="!percentage.showLoader"
                                
                            >
                                Enregistrer
                            </button>
                            <button class="w-full bg-gray-800 text-gray-100 text-xl py-3 rounded-xl flex items-center justify-center"
                                x-show="percentage.showLoader"
                            >
                                <div class="loader"></div>
                            </button>
                            <button class="w-full bg-gray-800 text-gray-100 text-xl py-3 rounded-xl"
                                id="btnUpload" 
                                @click()="percentage.showModal = false"
                                
                            >
                                Ignorer
                            </button>
                        </div>
                    </div>
                
                </div>
            </div>


        </div>
    </div>
    

    
<script>
    function getPlayers(){
        return {
            players: [
                {id: 1, name: "اللاعب 1", imgUrl: "<?php echo get_template_directory_uri() ?>" + "/assets/images/profile.png"},
                {id: 2, name: "اللاعب 2", imgUrl: "<?php echo get_template_directory_uri() ?>" + "/assets/images/profile.png"},
                {id: 3,name: "اللاعب 3", imgUrl: "<?php echo get_template_directory_uri() ?>" + "/assets/images/profile.png"},
                {id: 4,name: "اللاعب 4", imgUrl: "<?php echo get_template_directory_uri() ?>" + "/assets/images/profile.png"},
                {id: 5,name: "اللاعب 5", imgUrl: "<?php echo get_template_directory_uri() ?>" + "/assets/images/profile.png"},
            ],
            showButtons: false,
            playerID: "",
            initialized: false,
            newPlayer: {
                name: "",
                image: null
            },
            successMessage: "",
            errorMessage: "",
            showLoader: false,
            savePlayer(){
                if ((this.newPlayer.image == null) && this.newPlayer.name == ""){
                    return
                }
                this.showLoader = true;
                const imgUrl = document.querySelector('#imgUrl')
                const formData = new FormData();
                formData.append('image', imgUrl.files[0])
                formData.append('username', this.newPlayer.name);

                try {
                    
                    // fetch('http://localhost/wordpress/create-player/', {
                    fetch('http://wp.foot24.online/create-player/', {
                        method: 'POST',
                        body: formData,
                        headers : {}
                    })
                        .then(response => response.json())
                        .then(data => {
                            
                            this.successMessage = "تم تسجيل البينات بنجاح"
                            this.newPlayer.name = ""
                            this.newPlayer.image = null
                            setTimeout(() => {
                                this.successMessage = ""
                            }, 1500);
                            this.fetchPlayers();
                            this.showLoader = false;
                        })
                } catch (error) {
                    console.log(error)
                }
            },
            fetchPlayers(){

                setTimeout(() => {
                
                // fetch('http://localhost/wordpress/get-players/')
                fetch('http://wp.foot24.online/get-players/')
                    .then(response => response.json())
                        .then(data =>{
                            if (data.data != undefined){
                                this.players = data.data
                                this.showButtons = true
                                this.players.forEach(p=>{
                                    p.imgUrl = '<?php echo get_template_directory_uri() ?>' + '/player/images/' + p.imgUrl
                                })
                            }else{
                                this.players = [
                                        {id: 1, name: "اللاعب 1", imgUrl: "<?php echo get_template_directory_uri() ?>" + "/assets/images/profile.png"},
                                        {id: 2, name: "اللاعب 2", imgUrl: "<?php echo get_template_directory_uri() ?>" + "/assets/images/profile.png"},
                                        {id: 3,name: "اللاعب 3", imgUrl: "<?php echo get_template_directory_uri() ?>" + "/assets/images/profile.png"},
                                        {id: 4,name: "اللاعب 4", imgUrl: "<?php echo get_template_directory_uri() ?>" + "/assets/images/profile.png"},
                                        {id: 5,name: "اللاعب 5", imgUrl: "<?php echo get_template_directory_uri() ?>" + "/assets/images/profile.png"},
                                ]
                                this.showButtons = false
                            }
                    })
                }, 2000);
            },
            destroyPlayer(id){
                this.showLoader = true;
                const formData = new FormData();
                formData.append('id', id);
                // fetch('http://localhost/wordpress/destroy-player/', {
                fetch('http://wp.foot24.online/destroy-player/', {
                    method: 'POST',
                    body: formData,
                    // headers:{}
                })
                    .then(response => response.json())
                    .then(data => {
                        if(data.success == 'success'){
                            this.successMessage = "تم الحذف بنجاح"
                            setTimeout(() => {
                                this.successMessage = ""
                                this.fetchPlayers();
                                this.showLoader = false;
                            }, 1500);
                        }else{
                            this.errorMessage = "هناك  خطآ يرجي اعادة المحاولة"
                            setTimeout(() => {
                                this.errorMessage = ""
                            }, 1500);
                        }
                    })
            },
            updatePlayer(){
                if ((this.newPlayer.image == null) && this.newPlayer.name == ""){
                    return
                }
                if (this.newPlayer.image == null){
                    this.showLoader = true;
                    // const formData = new FormData();
                    // formData.append('id', this.playerID);
                    // formData.append('name', this.newPlayer.name);
                    // this.playerID = ""
                    // formData.append('image', "no-image");
                    // fetch('http://localhost/wordpress/player-update/', {
                    fetch('http://wp.foot24.online/player-update/', {
                        method: 'POST',
                        body: JSON.stringify({
                            id: this.playerID,
                            name: this.newPlayer.name,
                            image: "no-image"
                        }),
                        headers:{
                            "Content-Type": "application/json",
                        }
                    })
                        .then(response => response.json())
                        .then(data => {
                            if(data.success == 'success'){
                                this.successMessage = "تم التعديل بنجاح"
                                setTimeout(() => {
                                    this.successMessage = ""
                                    this.fetchPlayers();
                                    this.showLoader = false;
                                    this.playerID = "";
                                    this.fetchPlayers();
                                }, 1500);
                            }else{
                                this.errorMessage = "هناك  خطآ يرجي اعادة المحاولة"
                                setTimeout(() => {
                                    this.errorMessage = ""
                                }, 1500);
                            }
                        })
                }
                else{
                    this.showLoader = true;
                        const imgUrl = document.querySelector('#imgUrl')
                        const formData = new FormData();
                        formData.append('id', this.playerID)
                        formData.append('image', imgUrl.files[0])
                        formData.append('username', this.newPlayer.name);
                        console.log(formData)

                        try {
                            
                            // fetch('http://localhost/wordpress/update-player-with-image/', {
                            fetch('http://wp.foot24.online/update-player-with-image/', {
                                method: 'POST',
                                body: formData,
                                headers : {}
                            })
                                .then(response => response.json())
                                .then(data => {
                                    this.successMessage = "تم تسجيل البينات بنجاح"
                                    this.newPlayer.name = ""
                                    this.newPlayer.image = null
                                    setTimeout(() => {
                                        this.successMessage = ""
                                    }, 1500);
                                    this.fetchPlayers();
                                    this.showLoader = false;
                                })
                        } catch (error) {
                            console.log(error)
                        }
                    }
                    /**end */
            },
            setPlayerDataForUpdate(player){
                this.newPlayer.name = player.name;
                this.newPlayer.image = null;
                this.playerID = player.id;
                console.log( this.playerID)

            },



            /** Percantage logic */

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
            setPercentage(){
                this.percentage.showLoader = true
                fetch('http://localhost/wordpress/update-percentage/', {
                    method: 'POST',
                    body: JSON.stringify({
                        publicPercentage: this.percentage.publicPercentage,
                        journalistPercentage: this.percentage.journalistPercentage,
                    }),
                    headers:{
                        "Content-Type": "application/json",
                    }
                })
                    .then(response => response.json())
                    .then(data => {
                        console.log(data)
                        this.percentage.showLoader = false
                        this.percentage.showModal = false
                        this.getPercentage()
                    })
                
            }
             
        }
    }
</script>
</body>

</html>