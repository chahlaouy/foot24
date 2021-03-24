<?php /* Template Name: dashboard_add_players */ ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
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

</head>
<style>
.dir {
    direction: rtl
}
</style>

<body class="bg-gray-800 font-sans leading-normal tracking-normal mt-12">


    <div class="flex flex-col md:flex-row" >

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
                
                fetch('http://localhost/wordpress/get-players/')
                    .then(response => response.json())
                        .then(data =>{
                            if (data.data != undefined){
                                players = data.data
                                players.forEach(p=>{
                                    p.imgUrl = '<?php echo get_template_directory_uri() ?>' + '/player/images/' + p.imgUrl
                                })
                            }
                })
            }, 3000);
        
        ">

            <div class="bg-gray-800 pt-3">
                <div class="rounded-tl-3xl bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white">
                    <h3 class="font-bold pl-2">Sondage</h3>
                </div>

            </div>
            
            <!-- players list  -->

            <div class="w-full flex items-center justify-around mt-24">
                <template x-for="player in players">

                    <div>
                        <div class="w-32 h-32 bg-gray-800 rounded-full">
                            <img class="w-32 h-32 bg-cover bg-center object-cover rounded-full shadow-2xl cursor-pointer" 
                            :src="player.imgUrl"
                            
                            >
                        </div>
                        <h1 class="mt-3 text-center text-xl py-2 px-4 text-gray-800" x-text="player.name"></h1>
                    </div>
                </template>

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
                        x-show="!showLoader"
                    >
                        Enregistrer
                    </button>
                    <button class="w-full bg-gray-800 text-gray-100 text-xl py-3 rounded-xl flex items-center justify-center"
                        x-show="showLoader"
                    >
                        <div class="loader"></div>
                    </button>
                </div>

            </div>




        </div>
    </div>
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
                image: null
            },
            showLoader: false,
            savePlayer(){
                const imgUrl = document.querySelector('#imgUrl')
                const formData = new FormData();
                formData.append('image', imgUrl.files[0])
                formData.append('username', this.newPlayer.name);

                try {
                    
                    fetch('http://localhost/wordpress/create-player/', {
                        method: 'POST',
                        body: formData
                    })
                        .then(response => response.json())
                        .then(console.log)
                        this.fetchPlayers();
                } catch (error) {
                    console.log(error)
                }
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
    // const imgUrl = document.querySelector('#imgUrl')
    // const btn = document.querySelector('#btnUpload')
    
    // btn.addEventListener('click', upload)
    
    // async function upload(){
    //     const name = document.getElementById("name").value;
    //     const formData = new FormData();
    //     formData.append('image', imgUrl.files[0])
    //     formData.append('username', name)

    //     try {
    //         const response = await fetch('http://localhost/wordpress/create-player/',{
    //             method: 'POST',
    //             body: formData
    //         });

    //         const result = await response.json()
    //         console.log(result);
    //     } catch (error) {
    //         console.log(error)
    //     }
    // }
</script>
</body>

</html>