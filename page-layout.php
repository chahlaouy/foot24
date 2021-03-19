<?php

    /**
     * The main template file
     *
     * @link https://digigate.tn
     *
     * @package WordPress
     * @subpackage DIGiGATE
     * @since DIGiGATE 1.0
     */

get_header();
?>
<div class="bg-gray-100">
    <div class="bg-purple-800 xl:pb-48 sm:px-12 md:px-24 xl:px-48 text-gray-100">
        <nav-bar></nav-bar>
        <div class="xl:grid xl:grid-cols-2 xl:gap-8 mt-16">
            <div>
                <div class="relative md:px-0 w-full">
                    <div class="bg-gray-900 bg-opacity-50 w-full h-full absolute z-10 rounded-lg"></div>
                    <img src="img/img2.jpg" alt="" class="w-full rounded-lg shadow-xl">
                </div>
                <div class="flex items-center justify-center mt-4">

                    <div class="bg-purple-500 mr-8 rounded shadow-lg flex items-center justify-center">
                        <div class="py-2 px-2 bg-purple-700 rounded-l">
                            <font-awesome-icon icon="shopping-cart" class="text-xl" />
                        </div>
                        <div class="py-2 px-4 text-base">
                            Apercu
                        </div>
                    </div>

                    <div class="bg-purple-500 mr-2 rounded shadow-lg flex items-center justify-center">
                        <div class="py-2 px-2 bg-purple-700 rounded-l">
                            <font-awesome-icon icon="share-square" class="text-xl" />
                        </div>
                        <div class="py-2 px-4 text-base">
                            Partager
                        </div>
                    </div>

                </div>
            </div>
            <div class="my-24 md:my-12 xl:my-0">
                <div class="flex items-center w-full h-full">
                    <div class="bg-purple-500 rounded-lg w-full">

                        <div
                            class="bg-purple-700 flex justify-between items-center text-lg md:text-3xl font-bold px-4 rounded-t-lg">
                            <h1>VueJs DashBoard Argon</h1>
                            <h1 class="flex items-start text-right">
                                <div class="text-xl py-3">69</div>
                                <span class="text-xs text-gray-400 pt-3">/TND</span>
                            </h1>
                        </div>
                        <div class="p-4 text-sm">
                            <ul>
                                <li class="py-2">
                                    <font-awesome-icon icon="check" class="text-sm" /> Qualité contrôlée par DIGiTEAM
                                </li>
                                <li class="py-2">
                                    <font-awesome-icon icon="check" class="text-sm" /> Inclus: futures mises à jour
                                </li>
                                <li class="py-2">
                                    <font-awesome-icon icon="check" class="text-sm" /> Offre d'hébergement de thème
                                </li>
                                <li class="py-2">
                                    <font-awesome-icon icon="check" class="text-sm" /> 6 mois de support de DIGITEAM
                                </li>
                            </ul>
                            <div class="pt-6 flex relative" @mouseenter="toggleLisence" @mouseleave="toggleLisence">
                                <div class="absolute z-40 bg-gray-700 left-0 bottom-0 mb-16 rounded-lg shadow-lg transition ease-in-out duration-300"
                                    :class="toggleLisenceVar ? '' : 'hidden'">

                                    <div class="px-4 py-3">
                                        <h1 class="text-lg font-bold">licence régulière
                                            <span class="p-1 uppercase text-xs bg-white rounded-lg text-gray-800">
                                                choisie
                                            </span>
                                            <span class="float-right">100/TND</span>
                                        </h1>

                                        <p class="p-4">
                                            Utilisation, par vous ou un client, dans un seul produit final pour lequel
                                            les utilisateurs finaux ne sont pas facturés. Le prix total comprend le prix
                                            de l'article et des frais d'achat.
                                        </p>
                                    </div>
                                    <hr class="border-gray-600 my-4 mx-12">
                                    <div class="px-4 py-3">
                                        <h1 class="text-lg font-bold">
                                            Licence étendue

                                            <span class="float-right">500/TND</span>
                                        </h1>
                                        <p class="p-4">
                                            Utilisation, par vous ou un client, dans un seul produit final dont les
                                            utilisateurs finaux peuvent être facturés. Le prix total comprend le prix de
                                            l'article et des frais d'achat.
                                        </p>
                                    </div>
                                    <div class="py-2 text-center bg-gray-800 rounded-b-lg">
                                        <router-link to="/">Afficher les détails de la licence</router-link>
                                    </div>

                                </div>
                                <div class="flex items-center mr-4 mb-4">
                                    <input id="radio1" type="radio" name="radio" class="hidden" checked />
                                    <label for="radio1" class="flex items-center cursor-pointer text-sm md:text-lg">
                                        <span
                                            class="w-8 h-8 inline-block mr-2 rounded-full border border-grey flex-no-shrink"></span>
                                        licence régulière</label>
                                </div>

                                <div class="flex items-center mr-4 mb-4">
                                    <input id="radio2" type="radio" name="radio" class="hidden" />
                                    <label for="radio2" class="flex items-center cursor-pointer text-sm md:text-lg">
                                        <span
                                            class="w-8 h-8 inline-block mr-2 rounded-full border border-grey flex-no-shrink"></span>
                                        Licence étendue</label>
                                </div>

                            </div>

                            <div class="flex items-center justify-center mt-4">

                                <div class="bg-gray-700 mr-8 rounded shadow-lg flex items-center justify-center">
                                    <div class="py-1 px-2 md:py-2 md:px-4 bg-gray-800 rounded-l">
                                        <font-awesome-icon icon="shopping-cart" class="text-xl" />
                                    </div>
                                    <div class="py-1 px-2 md:py-2 md:px-3 text-xs">
                                        Acheter Maintenant
                                    </div>
                                </div>

                                <div class="bg-gray-700 mr-2 rounded shadow-lg flex items-center justify-center">
                                    <div class="py-1 px-2 md:py-2 md:px-4 bg-gray-800 rounded-l">
                                        <font-awesome-icon icon="download" class="text-xl" />
                                    </div>
                                    <div class="py-1 px-2 md:py-2 md:px-3 text-xs">
                                        Obtenir une Démo
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="px-3 xl:px-12 -mt-16 text-gray-700 leading-normal tracking-normal text-lg">
        <div class="xl:flex xl:items-start xl:justify-start bg-gray-100 sh rounded-lg py-16 px-4 xl:p-16">
            <div class="xl:flex-2 xl:pr-8">
                <h1 class="font-bold md:text-2xl uppercase ">Premuim Vuejs Black dashboard</h1>
                <div>
                    <h2 class="text-gray-800 text-3xl">Description du produit</h2>
                    <p class="py-6 xl:py-24">Commencez votre développement avec un kit de réaction matériel-UI Badass
                        inspiré de la conception matérielle. Si vous aimez le Material Design de Google, vous allez
                        adorer ce kit! Il comporte un grand nombre de composants conçus pour s'emboîter et avoir un look
                        incroyable.</p>
                </div>
                <div>
                    <h2 class="text-gray-800 text-3xl">Description du produit</h2>
                    <p class="py-6 xl:py-24">Commencez votre développement avec un kit de réaction matériel-UI Badass
                        inspiré de la conception matérielle. Si vous aimez le Material Design de Google, vous allez
                        adorer ce kit! Il comporte un grand nombre de composants conçus pour s'emboîter et avoir un look
                        incroyable.</p>
                </div>
                <div>
                    <h2 class="text-gray-800 text-3xl">Description du produit</h2>
                    <p class="py-6 xl:py-24">Commencez votre développement avec un kit de réaction matériel-UI Badass
                        inspiré de la conception matérielle. Si vous aimez le Material Design de Google, vous allez
                        adorer ce kit! Il comporte un grand nombre de composants conçus pour s'emboîter et avoir un look
                        incroyable.</p>
                </div>
                <div>
                    <h2 class="text-gray-800 text-3xl">Description du produit</h2>
                    <p class="py-6 xl:py-24">Commencez votre développement avec un kit de réaction matériel-UI Badass
                        inspiré de la conception matérielle. Si vous aimez le Material Design de Google, vous allez
                        adorer ce kit! Il comporte un grand nombre de composants conçus pour s'emboîter et avoir un look
                        incroyable.</p>
                </div>


            </div>

            <div class="flex flex-col justify-center items-center flex-1" id="icons">
                <h1 class="font-bold md:text-2xl uppercase">Technologies utilisées</h1>

                <div class="w-full mt-5">
                    <ul class="flex items-center justify-around">
                        <li class="flex items-center justify-center w-12 h-12 rounded-full bg-gray-300 shadow-xl">
                            <font-awesome-icon :icon="['fab', 'bootstrap']" class="text-blue-500 text-3xl" />
                        </li>
                        <li class="flex items-center justify-center w-12 h-12 rounded-full bg-gray-300 shadow-xl">
                            <font-awesome-icon :icon="['fab', 'vuejs']" class="text-green-500 text-3xl" />
                        </li>
                        <li class="flex items-center justify-center w-12 h-12 rounded-full bg-gray-300 shadow-xl">
                            <font-awesome-icon :icon="['fab', 'sass']" class="text-pink-600 text-3xl" />
                        </li>
                        <li class="flex items-center justify-center w-12 h-12 rounded-full bg-gray-300 shadow-xl">
                            <font-awesome-icon :icon="['fab', 'html5']" class="text-red-500 text-3xl" />
                        </li>
                    </ul>
                </div>

                <div class="my-5 xl:px-8 xl:my-16">
                    <hr class="border-gray-800">
                </div>

                <div class="w-full bg-gray-200 text-base">
                    <div class="rounded-lg">
                        <div class="font-bold border-2 border-purple-500 rounded-t-lg text-base">
                            <h1 class="py-1 bg-purple-500 rounded-tl text-gray-100 text-center">
                                <font-awesome-icon icon="book" /> Détails
                            </h1>

                        </div>
                        <div class="p-6">
                            <ul>
                                <li class="pt-6">
                                    <div class="flex justify-between">
                                        <p>
                                            <font-awesome-icon icon="download" /> Téléchargements
                                        </p>
                                        <p>122</p>
                                    </div>
                                </li>
                                <li class="pt-6">
                                    <div class="flex justify-between">
                                        <p>
                                            <font-awesome-icon icon="sort-numeric-up-alt" /> Version
                                        </p>
                                        <p>1.0.9</p>
                                    </div>
                                </li>
                                <li class="pt-6">
                                    <div class="flex justify-between">
                                        <p>
                                            <font-awesome-icon icon="list-ol" /> Changelog
                                        </p>
                                        <p>Apercu</p>
                                    </div>
                                </li>
                                <li class="pt-6">
                                    <div class="flex justify-between">
                                        <p>
                                            <font-awesome-icon icon="sync-alt" /> Actualisé
                                        </p>
                                        <p>Il ya 1 mois</p>
                                    </div>
                                </li>
                                <li class="pt-6">
                                    <div class="flex justify-between">
                                        <p>
                                            <font-awesome-icon icon="calendar" /> libéré
                                        </p>
                                        <p>il ya un an</p>
                                    </div>
                                </li>
                                <li class="pt-6">
                                    <div class="flex justify-between">
                                        <p>
                                            <font-awesome-icon icon="star" /> Avis
                                        </p>
                                        <p>Voir 122 avis</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="w-full bg-gray-200 text-base mt-12">
                    <div class="rounded-lg">
                        <div class="font-bold border-2 border-purple-500 rounded-t-lg text-base">
                            <h1 class="py-1 text-center">
                                <font-awesome-icon icon="info" /> Info sur le produit
                            </h1>
                        </div>
                        <div class="p-6">
                            <ul>
                                <li class="pt-6">
                                    <div class="flex justify-between">
                                        <p>
                                            <font-awesome-icon icon="download" /> Téléchargements
                                        </p>
                                        <p>122</p>
                                    </div>
                                </li>
                                <li class="pt-6">
                                    <div class="flex justify-between">
                                        <p>
                                            <font-awesome-icon icon="sort-numeric-up-alt" /> Version
                                        </p>
                                        <p>1.0.9</p>
                                    </div>
                                </li>
                                <li class="pt-6">
                                    <div class="flex justify-between">
                                        <p>
                                            <font-awesome-icon icon="list-ol" /> Changelog
                                        </p>
                                        <p>Apercu</p>
                                    </div>
                                </li>
                                <li class="pt-6">
                                    <div class="flex justify-between">
                                        <p>
                                            <font-awesome-icon icon="sync-alt" /> Actualisé
                                        </p>
                                        <p>Il ya 1 mois</p>
                                    </div>
                                </li>
                                <li class="pt-6">
                                    <div class="flex justify-between">
                                        <p>
                                            <font-awesome-icon icon="calendar" /> libéré
                                        </p>
                                        <p>il ya un an</p>
                                    </div>
                                </li>
                                <li class="pt-6">
                                    <div class="flex justify-between">
                                        <p>
                                            <font-awesome-icon icon="star" /> Avis
                                        </p>
                                        <p>Voir 122 avis</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div id="price-tables">
        <div class="text-gray-600 text-center mt-16">
            <div class="px-3 xl:px-40 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-1">

                <div class="xl:py-12 xl:pl-12">

                    <div class="shadow-xl bg-white rounded-l-lg" id="price-one-table">
                        <div id="card-header">
                            <h1 class="text-3xl pt-6">Freelancer</h1>
                            <p class="text-xs tracking-wide leading-relaxed pt-2 pb-6">Idéal pour une application web /
                                mobile personnelle ou client.</p>
                            <h1 class="flex items-start justify-center">
                                <div class="text-4xl">69</div>
                                <span class="text-xs text-gray-500 pt-3">/TND</span>
                            </h1>
                        </div>
                        <div id="buitton-buy" class="shadow-2xl my-6">
                            <button class="w-full bg-purple-600 py-3 text-gray-100">
                                <font-awesome-icon icon="shopping-bag" /> Acheter Maintenant
                            </button>
                        </div>
                        <div id="list-benefits" class="px-4">
                            <ul>
                                <li class="py-3">
                                    <div class="flex justify-between">
                                        <p>Documentation</p>
                                        <p>
                                            <font-awesome-icon icon="check" />
                                        </p>
                                    </div>
                                </li>
                                <li class="py-3">
                                    <div class="flex justify-between">
                                        <p>Documentation</p>
                                        <p>
                                            <font-awesome-icon icon="check" />
                                        </p>
                                    </div>
                                </li>
                                <li class="py-3">
                                    <div class="flex justify-between">
                                        <p>Documentation</p>
                                        <p>
                                            <font-awesome-icon icon="check" />
                                        </p>
                                    </div>
                                </li>
                                <li class="py-3">
                                    <div class="flex justify-between">
                                        <p>Documentation</p>
                                        <p>
                                            <font-awesome-icon icon="check" />
                                        </p>
                                    </div>
                                </li>
                                <li class="py-3">
                                    <div class="flex justify-between">
                                        <p>Documentation</p>
                                        <p>
                                            <font-awesome-icon icon="check" />
                                        </p>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>




                <div class="shadow-2xl bg-purple-600 text-gray-100 rounded-lg" id="price-one-table">


                    <div class="flex flex-col justify-center items-center h-full w-full">

                        <div id="card-header">
                            <h1 class="text-3xl pt-6 -mt-6">Startup</h1>
                            <p class="text-xs tracking-wide leading-relaxed pt-2 pb-6">Créez votre application web /
                                mobile de démarrage ou client.</p>
                            <h1 class="flex items-start justify-center">
                                <div class="text-4xl">160</div>
                                <span class="text-xs text-gray-500 pt-3">/TND</span>
                            </h1>
                        </div>
                        <div id="buitton-buy" class="my-6 w-full shadow-2xl">
                            <button class="bg-gray-800 w-full py-3 text-white">
                                <font-awesome-icon icon="shopping-bag" /> Acheter Maintenant
                            </button>
                        </div>
                        <div id="list-benefits" class="px-4 w-full">
                            <ul>
                                <li class="py-3">
                                    <div class="flex justify-between">
                                        <p>Documentation</p>
                                        <p>
                                            <font-awesome-icon icon="check" />
                                        </p>
                                    </div>
                                </li>
                                <li class="py-3">
                                    <div class="flex justify-between">
                                        <p>Documentation</p>
                                        <p>
                                            <font-awesome-icon icon="check" />
                                        </p>
                                    </div>
                                </li>
                                <li class="py-3">
                                    <div class="flex justify-between">
                                        <p>Documentation</p>
                                        <p>
                                            <font-awesome-icon icon="check" />
                                        </p>
                                    </div>
                                </li>
                                <li class="py-3">
                                    <div class="flex justify-between">
                                        <p>Documentation</p>
                                        <p>
                                            <font-awesome-icon icon="check" />
                                        </p>
                                    </div>
                                </li>
                                <li class="py-3">
                                    <div class="flex justify-between">
                                        <p>Documentation</p>
                                        <p>
                                            <font-awesome-icon icon="check" />
                                        </p>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>

                </div>


                <div class="xl:py-12 xl:pr-12">

                    <div class="shadow-xl bg-white rounded-r-lg" id="price-one-table">
                        <div id="card-header">
                            <h1 class="text-3xl pt-6">Company</h1>
                            <p class="text-xs tracking-wide leading-relaxed pt-2 pb-6">Parfait pour les applications Web
                                / mobiles ou les projets SaaS.</p>
                            <h1 class="flex items-start justify-center">
                                <div class="text-4xl">350</div>
                                <span class="text-xs text-gray-500 pt-3">/TND</span>
                            </h1>
                        </div>
                        <div id="buitton-buy" class="shadow-2xl my-6">
                            <button class="w-full bg-purple-600 py-3 text-gray-100">
                                <font-awesome-icon icon="shopping-bag" /> Acheter Maintenant
                            </button>
                        </div>
                        <div id="list-benefits" class="px-4">
                            <ul>
                                <li class="py-3">
                                    <div class="flex justify-between">
                                        <p>Documentation</p>
                                        <p>
                                            <font-awesome-icon icon="check" />
                                        </p>
                                    </div>
                                </li>
                                <li class="py-3">
                                    <div class="flex justify-between">
                                        <p>Documentation</p>
                                        <p>
                                            <font-awesome-icon icon="check" />
                                        </p>
                                    </div>
                                </li>
                                <li class="py-3">
                                    <div class="flex justify-between">
                                        <p>Documentation</p>
                                        <p>
                                            <font-awesome-icon icon="check" />
                                        </p>
                                    </div>
                                </li>
                                <li class="py-3">
                                    <div class="flex justify-between">
                                        <p>Documentation</p>
                                        <p>
                                            <font-awesome-icon icon="check" />
                                        </p>
                                    </div>
                                </li>
                                <li class="py-3">
                                    <div class="flex justify-between">
                                        <p>Documentation</p>
                                        <p>
                                            <font-awesome-icon icon="check" />
                                        </p>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div id="get-demo">

    </div>
    <Footer></Footer>
</div>

<?php
	get_footer(); 
 ?>