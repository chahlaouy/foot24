<?php /* Template Name: dashoard */ ?>

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

    <div class="flex flex-col md:flex-row" x-data="getPlayers()" x-init="fetchPlayers()">

        <!-- Side Nav bar -->
        <div class="bg-gray-800 shadow-xl h-16 fixed bottom-0 mt-12 md:relative md:h-screen z-10 w-full md:w-48">

            <div
                class="md:mt-12 md:w-48 md:fixed md:left-0 md:top-0 content-center md:content-start text-left justify-between">
                <ul class="list-reset flex flex-row md:flex-col py-0 md:py-3 px-1 md:px-2 text-center md:text-left">
                    <li class="mr-3 flex-1">
                        <a href="http://wp.foot24.online/dashboard-add-players/"
                            class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-pink-500">
                            <i class="fas fa-tasks pr-0 md:pr-5"></i><span
                                class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">Ajouter
                                un sondage</span>
                        </a>
                    </li>

                    <li class="mr-3 flex-1 my-4">
                        <a href="http://wp.foot24.online/player-of-the-month/"
                            class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-blue-600">
                            <i class="fas fa-chart-area pr-0 md:block text-blue-600"></i><span
                                class="pb-1 md:pb-0 text-xs md:text-base text-white md:text-white block md:inline-block">Statistique</span>
                        </a>
                    </li>
                    <li class="mr-3 flex-1">
                        <a href="http://wp.foot24.online/ads/"
                            class="block py-1 md:py-3 pl-0 md:pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-red-500">
                            <i class="fa fa-wallet pr-0 md:pr-5"></i><span
                                class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">Panneau
                                publicitaire</span>
                        </a>
                    </li>
                </ul>
            </div>


        </div>

        <div class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">

            <div class="bg-gray-800 pt-3 flex justify-between items-center">
                <div class="rounded-tl-3xl bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white">
                    <h3 class="font-bold pl-2">Statistique</h3>
                </div>
                <button class="ml-4 py-2 px-4 bg-red-300 rounded-lg text-red-800" @click="percentage.showModal = true">
                    générer gagnant
                </button>
            </div>


            <!-- Card to use -->
            <div class="flex flex-wrap">


                <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                    <!--Metric Card-->
                    <div
                        class="bg-gradient-to-b from-pink-200 to-pink-100 border-b-4 border-pink-500 rounded-lg shadow-xl p-5">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded-full p-5 bg-pink-600"><i class="fas fa-users fa-2x fa-inverse"></i>
                                </div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h5 class="font-bold uppercase text-gray-600">nombre total d'utilisateurs</h5>
                                <h3 class="font-bold text-3xl" x-text="playerOne.numberOfJournalistVotes + playerOne.numberOfPublicVotes"></h3>
                            </div>
                        </div>
                    </div>
                    <!--/Metric Card-->
                </div>


                <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                    <!--Metric Card-->
                    <div
                        class="bg-gradient-to-b from-green-200 to-green-100 border-b-4 border-green-600 rounded-lg shadow-xl p-5">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded-full p-5 bg-green-600"><i
                                    class="fa fa-newspaper fa-2x fa-inverse"></i></div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h5 class="font-bold uppercase text-gray-600">nombre total de journalistes</h5>
                                <h3 class="font-bold text-3xl" x-text="playerOne.numberOfJournalistVotes"></h3>
                            </div>
                        </div>
                    </div>
                    <!--/Metric Card-->
                </div>



                <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                    <!--Metric Card-->
                    <div
                        class="bg-gradient-to-b from-yellow-200 to-yellow-100 border-b-4 border-yellow-600 rounded-lg shadow-xl p-5">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded-full p-5 bg-yellow-600"><i
                                        class="fas fa-user-plus fa-2x fa-inverse"></i></div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h5 class="font-bold uppercase text-gray-600">nombre total d'utilisateurs publique</h5>
                                <h3 class="font-bold text-3xl" x-text="playerOne.numberOfPublicVotes"></h3>
                            </div>
                        </div>
                    </div>
                    <!--/Metric Card-->
                </div>

                <div class="mt-4 dir wrapper">


                    <div class="">
                        <div class="flex items-center justify-center">
                            <div class="bg-white shadow-2xl rounded-2xl relative z-10">
                                <h1 class="text-center text-red-600 text-3xl py-1" x-text="playerOne.name"></h1>
                                <hr>
                                <div class="flex items-stretch">
                                    <div
                                        class="bg-red-600 text-gray-100 rounded-br-2xl items-center flex justify-center w-32">
                                        <h1 class="text-4xl" x-text="playerOne.finalScore"></h1>
                                    </div>
                                    <div class="py-1 pl-24 pr-2 w-96">

                                        <div id="public">

                                            <div class="flex w-full items-center justify-between">
                                                <div>
                                                    <span class="text-xs">voting</span>
                                                    <h1 class='text-xl'>publique</h1>
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
                                                    <span class="text-xs">voting</span>
                                                    <h1 class='text-xl'>journalist</h1>
                                                </div>
                                                <div>
                                                    <span class="text-sm"
                                                        x-text="playerOne.totalScoreJournalist">2.5</span>
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
                                    :src="playerOne.imgUrl" alt="">
                            </div>
                        </div>

                    </div>
                    <div class="">
                        <template x-for="player in players" class="">

                            <div class="flex items-center justify-center my-8">
                                <div class="bg-white shadow-2xl rounded-2xl relative z-10">
                                    <h1 class="text-center text-red-600 text-3xl py-1" x-text="player.name"></h1>
                                    <hr>
                                    <div class="flex items-stretch">
                                        <div
                                            class="bg-red-600 text-gray-100 rounded-br-2xl items-center flex justify-center w-32">
                                            <h1 class="text-4xl" x-text="player.finalScore"></h1>
                                        </div>
                                        <div class="py-1 pl-24 pr-2 w-96">

                                            <div id="public">

                                                <div class="flex w-full items-center justify-between">
                                                    <div>
                                                        <span class="text-xs">voting</span>
                                                        <h1 class='text-xl'>publique</h1>
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
                                                        <span class="text-xs">voting</span>
                                                        <h1 class='text-xl'>journalist</h1>
                                                    </div>
                                                    <div>
                                                        <span class="text-sm"
                                                            x-text="player.totalScoreJournalist"></span>
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
                                        :src="player.imgUrl" alt="">
                                </div>
                            </div>
                        </template>
                    </div>

                </div>



            </div>

        </div>
        <div class="absolute top-0 left-0 w-full p-4 bg-gray-800 bg-opacity-50 h-screen z-50" x-show="percentage.showModal">
                    
            <div class="flex items-center justify-center w-full h-full">
                <div class="w-96 bg-white shadow-2xl rounded-2xl p-8">

                    
                    <div class="flex items-center justify-between">
                    
                        <button class="w-full bg-gray-800 text-gray-100 text-xl py-3 rounded-xl mr-4"
                            id="btnUpload" 
                            @click()="setWinner()"
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


    <script>
    function getPlayers() {  
        return {
            playerOne: {
                name: "اللاعب 1",
                imgUrl: "<?php echo get_template_directory_uri() ?>" + "/assets/images/profile.png",
                totalScorePublic: '0',
                totalScoreJournalist: '0'
            },
            players: [{
                    name: "اللاعب 2",
                    imgUrl: "<?php echo get_template_directory_uri() ?>" + "/assets/images/profile.png",
                    totalScorePublic: '0',
                    totalScoreJournalist: '0'
                },
                {
                    name: "اللاعب 3",
                    imgUrl: "<?php echo get_template_directory_uri() ?>" + "/assets/images/profile.png",
                    totalScorePublic: '0',
                    totalScoreJournalist: '0'
                },
                {
                    name: "اللاعب 4",
                    imgUrl: "<?php echo get_template_directory_uri() ?>" + "/assets/images/profile.png",
                    totalScorePublic: '0',
                    totalScoreJournalist: '0'
                },
                {
                    name: "اللاعب 5",
                    imgUrl: "<?php echo get_template_directory_uri() ?>" + "/assets/images/profile.png",
                    totalScorePublic: '0',
                    totalScoreJournalist: '0'
                },
            ],
            fetchPlayers() {
                this.getPercentage()

                setTimeout(() => {

                    fetch('http://localhost/wordpress/get-players/')
                    // fetch('http://wp.foot24.online/get-players/')
                        .then(response => response.json())
                        .then(data => {

                            let arr = data.data
                            console.log(arr)
                            
                            arr.forEach((p, index) => {
                                p.imgUrl = '<?php echo get_template_directory_uri() ?>' +
                                    '/player/images/' + p.imgUrl
                                    p.finalScore =  ((p.totalScorePublic * this.percentage.publicPercentage)/100 +  (p.totalScoreJournalist * this.percentage.journalistPercentage)/100)
                                    p.totalScorePublic = p.totalScorePublic.toFixed(2);
                                    p.totalScoreJournalist = p.totalScoreJournalist.toFixed(2);
                                    p.finalScore = p.finalScore.toFixed(2)
                                    console.log(p.finalScore)
                            })
                            arr.sort(function(a, b){ return b.finalScore - a.finalScore });
                            this.playerOne = arr[0];
                            console.log(this.playerOne)
                            this.players = arr.filter((p, index) => index != 0)
                            console.log(this.players)
                        })
                }, 2000);
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
            setWinner(){
                this.percentage.showLoader =  true
                try {
                    
                    fetch('http://localhost/wordpress/create-winner/', {
                    // fetch('http://wp.foot24.online/create-player/', {
                        method: 'POST',
                        body: JSON.stringify({
                            winnerName : this.playerOne.name,
                            imgUrl : 'img',
                            score : this.playerOne.finalScore,
                        }),
                        headers : {}
                    })
                        .then(response => response.json())
                        .then(data => {
                            
                            // this.successMessage = "تم تسجيل البينات بنجاح"
                            // this.newPlayer.name = ""
                            // this.newPlayer.image = null
                            // setTimeout(() => {
                            //     this.successMessage = ""
                            // }, 1500);
                            this.fetchPlayers();
                            this.showLoader = false;
                        })
                } catch (error) {
                    console.log(error)
                }
            }

        }
    }
    </script>

</body>

</html>