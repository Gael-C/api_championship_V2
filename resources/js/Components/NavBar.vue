<template>
  <nav class="w-full border-b md:border-0 md:static">
    <div class="items-center px-4 max-w-screen-xl mx-auto md:flex md:px-8">
      <div class="flex items-center justify-between py-3 md:py-5 md:block">
        <a href="/">
          <img src="/storage/site/Logo_site.png" width="400"  alt="API Championship logo" />
        </a>
        <div class="md:hidden">
          <button class="text-gray-700 outline-none p-2 rounded-md focus:border-gray-400 focus:border" @click="menuOpen()">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor" :class="[open ? 'block' : 'hidden']">
              <path fillRule="evenodd"
                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                clipRule="evenodd" />
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" :class="[open ? 'hidden' : 'block']"
              stroke="currentColor">
              <path strokeLinecap="round" strokeLinejoin="round" d="M4 8h16M4 16h16" />
            </svg>
          </button>
        </div>
      </div>
      <div class="flex-1 justify-self-center pb-3 mt-8 md:block md:pb-0 md:mt-0" :class="[open ? 'block' : 'hidden']">
        <ul class="justify-center items-center space-y-8 md:flex md:space-x-6 md:space-y-0">
          <li class="text-bleu space-mono-bold hover:text-gris_clair">
              <a :href="route('team.index')">
                LES ÉQUIPES
              </a>
              </li>
              <li class="text-bleu space-mono-bold hover:text-gris_clair">
              <a :href="route('league.index')">
                LES CHAMPIONNATS
              </a>
            </li>
        </ul>
      </div>
    </div>
  </nav>
    <!-- <nav class="w-full border-b md:border-0 md:static px-auto">
      <div class="items-center px-4 max-w-screen-xl mx-auto md:px-8">
        <div class="flex items-center justify-between py-3 md:py-5 md:block">
          <a href="javascript:void(0)">
          <img src="/storage/site/Logo_site.png" width="400" height="100" alt="Float UI logo" />
        </a>
          <div class="md:hidden">
            <button class="text-gray-700 outline-none p-2 rounded-md focus:border-gray-400 focus:border" @click="menuOpen()">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor" :class="[open ? 'block' : 'hidden']">
                <path fillRule="evenodd"
                  d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                  clipRule="evenodd" />
              </svg>
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" :class="[open ? 'hidden' : 'block']"
                stroke="currentColor">
                <path strokeLinecap="round" strokeLinejoin="round" d="M4 8h16M4 16h16" />
              </svg>
            </button>
          </div>
        </div>
        <div class="flex-1 justify-self-center pb-3 mt-8 md:block md:pb-0 md:mt-0" :class="[open ? 'block' : 'hidden']">
          <ul class="justify-center items-center space-y-8 md:flex md:space-x-6 md:space-y-0">
            <li class="text-bleu space-mono-bold hover:text-gris_clair">
              <a :href="route('team.index')">
                LES ÉQUIPES  |
              </a>
              </li>
              <li class="text-bleu space-mono-bold hover:text-gris_clair">
              <a :href="route('league.index')">
                LES CHAMPIONNATS
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav> -->
  </template>
  
  <script>
import { ref } from 'vue';
  export default {
    name:'NavBar',
    data: function () {
    return {
      navigation: [
        { title: "Customers", router: "/Customers" },
        { title: "Careers", router: "/Careers" },
        { title: "Guides", router: "/Guides" },
        { title: "Partners", router: "/Partners" },
      ]
    }
  },
  setup() {
    let open = ref(false);
    function menuOpen() {
      open.value = !open.value;
    }
    return { open, menuOpen }
  }
  }
  </script>