<template>
  <NavBar></NavBar>
    <section class="py-10">
        <div class="mx-auto grid max-w-6xl  grid-cols-1 gap-6 p-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 ">
        <Card v-for="team in teams"
        :key="team.slug" :id="team.slug" :logo="team.logo" :name="team.name"></card>
      </div>
    </section>
  
</template>
  <script>
import Card from "@/Components/TeamCard.vue";
import NavBar from '@/Components/NavBar.vue';
  export default {
    name: 'teams',
    components: {
      Card,
      NavBar
    },
    props: ['teams']

  }
  </script>
  