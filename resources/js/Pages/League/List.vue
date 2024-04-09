<template>
  <NavBar></NavBar>
    <section class="py-10 items-center">
      <div class="mx-auto grid max-w-6xl grid-cols-1 gap-6 p-6 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-5">
        <card v-for="league in Leagues"
        :key="league.slug" :id="league.slug" :logo="league.logo" :name="league.name" ></card>
      </div>
    </section>
  
  </template> 
  
  <script>
  import card from "@/Components/LeagueCard.vue";
  import NavBar from '@/Components/NavBar.vue'
  import { usePage } from '@inertiajs/vue3';


  export default {
    name: 'leagues',
    components: {
      card,
      NavBar
    },
    props: ['leagues'],
    computed: {
    Leagues() {
      let leagues = usePage().props.leagues
      delete leagues[5]
      delete leagues[4]
console.log(leagues)
      return leagues

    },
  }
}
  </script>
  