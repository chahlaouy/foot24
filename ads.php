<?php /* Template Name: ads */ ?>

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
                            class="block py-1 md:py-3 pl-1 align-middle text-white no-underline">
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
                        <a href="http://wp.foot24.online/ads/"
                            class="block py-1 md:py-3 pl-0 md:pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-red-500 hover:text-white border-b-2 border-blue-600 hover:border-pink-500">
                            <i class="fa fa-wallet pr-0 md:pr-5"></i><span
                                class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">Panneau
                                publicitaire</span>
                        </a>
                    </li>
                </ul>
            </div>


        </div>

        <div class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">

            <div class="bg-gray-800 pt-3">
                <div class="rounded-tl-3xl bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white">
                    <h3 class="font-bold pl-2">Sondage</h3>
                </div>

            </div>

            <div class="flex items-center justify-center fixed bottom-0 right-0 p-8 z-50 shadow-2xl">

                <div id="form" class="w-96">
                    
                    <div>
                        <label for="" class="block">Url</label>
                        <input type="text" required id="linkUrl" name="linkUrl"
                            class="w-full py-3 bg-gray-100 rounded-xl my-4 px-2 border border-gray-800" placeholder="url"
                             >
                    </div>
                    <div>
                        <label for="" class="block">Image</label>
                        <input type="file" name="imgUrl" id="imgUrl"
                            class="w-full py-3 bg-gray-100 rounded-xl my-4 px-2"  required>
                    </div>
                    
                    <button class="w-full bg-gray-800 text-gray-100 text-xl py-3 rounded-xl"
                        id="btnUpload">submit</button>
                </div>

            </div>




        </div>
    </div>
<script>
    const imgUrl = document.querySelector('#imgUrl')
    const btn = document.querySelector('#btnUpload')
    
    btn.addEventListener('click', upload)
    
    async function upload(){
        const name = document.getElementById("linkUrl").value;
        const formData = new FormData();
        formData.append('image', imgUrl.files[0])
        formData.append('linkUrl', name)

        try {
            const response = await fetch('http://wp.foot24.online/create-ad/',{
                method: 'POST',
                body: formData
            });

            const result = await response.json()
            

        } catch (error) {
            console.log(error)
        }
        window.location.href = "http://wp.foot24.online/";
    }
</script>
</body>

</html>