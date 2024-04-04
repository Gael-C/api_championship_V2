<template>
    <nav class="w-full border-b md:border-0 md:static px-auto">
      <div class="items-center px-4 max-w-screen-xl mx-auto md:flex md:px-8">
        <div class="flex-1 justify-self-center pb-3 mt-8 md:block md:pb-0 md:mt-0" :class="[open ? 'block' : 'hidden']">
          <ul class="justify-center items-center space-y-8 md:flex md:space-x-6 md:space-y-0">
            <li class="text-bleu space-mono-regular hover:text-gris_clair">
              <a :href="route('team.index')">
                Les équipes
              </a>
              </li>
              <li class="text-bleu space-mono-regular hover:text-gris_clair">
              <a :href="route('league.index')">
                Les Championnats
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
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