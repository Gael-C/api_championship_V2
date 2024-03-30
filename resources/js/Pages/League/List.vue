<template>
    <section class="py-10">
      <div class="mx-auto grid max-w-6xl grid-cols-1 gap-6 p-6 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-6">
        <card v-for="league in leagues"
        :key="league.slug" :id="league.slug" :logo="league.logo" :name="league.name" ></card>
      </div>
    </section>
  
  </template> 
  
  <script>
  import card from "@/Components/LeagueCard.vue";
  export default {
    name: 'leagues',
    components: {
      card,
    },
    props: ['leagues'],
  }
  </script>
  