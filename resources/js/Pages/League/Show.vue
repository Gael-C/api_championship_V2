<template>
    <NavBar></NavBar>
    <div class="md:flex items-start justify-center py-12 2xl:px-20 md:px-6 px-4" v-if="League">
        <div class="xl:w-2/6 lg:w-2/5 w-80 md:block hidden">
            <img class="w-6/12 mx-auto" alt="logo of the league"
                :src="'/storage/' + League.logo" />
          
    <select @change="getMatchWeeks($event)" class="mt-5 space-mono-regular bg-gris_clair">
      <option value="" selected>Choisissez une journée</option>
      <option class="text-center" v-for="matchWeek in MatchWeeks" :value="matchWeek.id">{{ matchWeek.match_week_number }}</option>
    </select>
    <table class="text-sm divide-y divide-gray-100 mt-5">
            <tr class="border-b space-mono-regular">
              <th class="py-2 px-4 border-b">Domicile</th>
              <th class="py-2 px-4 border-b">Résultat</th>
              <th class="py-2 px-4 border-b">Extérieur</th>
          </tr>          <tbody>
              <tr v-for="match in Matches" class="space-mono-regular">
                  <td class="py-2 px-2 text-center border-b"> {{ getTeamName(match.home_team_id) }}</td>
                  <td class="py-2 border-b">({{ match.home_team_tries }}){{ match.home_team_result }}-{{ match.away_team_result }}({{match.away_team_tries}})</td>
                  <td class="py-2 px-2 text-center border-b">{{ getTeamName(match.away_team_id) }}</td>
              </tr>
          </tbody>
    </table>
            <!-- <img class="mt-6 w-full" alt="image of a girl posing" src="https://i.ibb.co/qxkRXSq/component-image-two.png" /> -->
        </div>
        <div>
        </div>
        <div class="md:hidden">
            <img class="w-9/12 mx-auto" alt="logo of the league"
                :src="'/storage/' + League.logo" />
            <div class="flex items-center justify-between mt-3 space-x-4 md:space-x-0">

            </div>
        </div>
        <div class="xl:w-2/5 md:w-1/2 lg:ml-8 md:ml-6 md:mt-0 mt-6">
            <div class="border-b border-gray-200 pb-6">
                <h1 class="lg:text-2xl text-xl lg:leading-6 leading-7 space-mono-bold text-center">{{
                    League.name }}</h1>
            </div>
            <detail :cle="'Création'" :valeur="League.creation" />
            <detail v-if="getLCTeam" :cle="'Champion en titre'" :valeur="getLCTeam" />
            <detail v-if="getMSTeam" :cle="'Club le plus titré'" :valeur="getMSTeam" />
            <br>
            <div class="w-full max-w-2xl mx-auto bg-gris_clair shadow-lg rounded-xl border">
                <header class="px-5 py-4 border-b">
                    <h2 class="space-mono-bold text-center text-gray-800">Équipes</h2>
                </header>
                 <div>
                    <div class="overflow-x-auto">
                        <table class="text-sm divide-y divide-gris space-mono-regular">
                             <tr class="border-b font-medium dark:border-neutral-500">
                                <th class="py-2 px-4 border-b">Équipe</th>
                                <th class="py-2 px-4 border-b">Pts</th>
                                <th class="py-2 px-4 border-b">B</th>
                                <th class="py-2 px-4 border-b">V</th>
                                <th class="py-2 px-4 border-b">N</th>
                                <th class="py-2 px-4 border-b">D</th>
                                <th class="py-2 px-4 border-b">P</th>
                                <th class="py-2 px-4 border-b">C</th>
                                <th class="py-2 px-4 border-b">D</th>
                            </tr>
                            <tbody >
                                <tr v-for="clasmt in League.classment">
                                    <a :href="route('team.show',getTeamSlug(clasmt.team_id))">
                                        <td class="py-2 px-2 border-b">{{clasmt.classement}} - {{ getTeamName(clasmt.team_id) }}</td>
                                    </a>
                                        <td class="py-2 px-4 border-b">{{ clasmt.points }}</td>
                                        <td class="py-2 px-4 border-b">{{ clasmt.bonus }}</td>
                                        <td class="py-2 px-4 border-b">{{ clasmt.victoires }}</td>
                                        <td class="py-2 px-4 border-b">{{ clasmt.nuls }}</td>
                                        <td class="py-2 px-4 border-b">{{ clasmt.défaites }}</td>
                                        <td class="py-2 px-4 border-b">{{ clasmt.pour }}</td>
                                        <td class="py-2 px-4 border-b">{{ clasmt.contre }}</td>
                                        <td class="py-2 px-4 border-b">{{ clasmt.goal_average }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div> 
                </div>
            </div>
             <div class="md:hidden mt-5 space-mono-regular">
                    <select @change="getMatchWeeks($event)" class="mt-5 w-full bg-gris_clair">
                        <option value="" selected>Choisissez une journée</option>
                        <option class="text-center" v-for="matchWeek in MatchWeeks" :value="matchWeek.id">{{ matchWeek.match_week_number }}</option>
                    </select>
                   <table class="text-sm divide-y divide-gray-100 mt-5 w-full">
                        <tr class="border-b font-medium dark:border-neutral-500">
                          <th class="py-2 px-4 border-b">Domicile</th>
                          <th class="py-2 px-4 border-b">Résultat</th>
                          <th class="py-2 px-4 border-b">Extérieur</th>
                      </tr>
                      <tbody>
                          <tr v-for="match in Matches" class="space-mono-regular">
                              <td class="py-2 px-2 text-center border-b"> {{ getTeamName(match.home_team_id) }}</td>
                              <td class="py-2 border-b">({{ match.home_team_tries }}){{ match.home_team_result }}-{{ match.away_team_result }}({{match.away_team_tries}})</td>
                              <td class="py-2 px-2 text-center border-b">{{ getTeamName(match.away_team_id) }}</td>
                          </tr>
                      </tbody>
                </table>
             </div>
        </div>
    </div>
</template>

<script>
import detail from '@/Components/Details.vue';
import reseau from '@/Components/Reseaux.vue';
import table from '@/Components/Table.vue';
import classement from '@/Components/Classment.vue';
import { usePage } from '@inertiajs/vue3';
import NavBar from '@/Components/NavBar.vue'


export default {
    name: 'LeagueView',
    components: {
        detail,
        reseau,
        table,
        classement,
        NavBar
    },
    props: ['league', 'teams','matchWeeks'],
    data() {
    return {
      Matches: [] // Propriété pour stocker les résultats de la fonction getMatchWeeks
    };
  },
    computed: {
        // Computed property permettant de récupérer le championnat via son id
        League() {
            return usePage().props.league;
        },
        Teams() {
            return usePage().props.teams;
        },
        MatchWeeks() {
            return usePage().props.matchWeeks;
        },
        getLCTeam() {
            let team = '';
            this.Teams.forEach(element => {
                if (element.id === this.League.last_champion) {
                    team = element.name
                }
            })
            return team
        },
        getMSTeam() {
            let team = '';
            this.Teams.forEach(element => {
                if (element.id === this.League.most_successfull) {
                    team = element.name
                }
            })
            return team;
        },
    },
    methods: {
        getTeamName(id) {
            let name = '';
            this.Teams.forEach(element => {
                if (element.id === id) {
                    name = element.name
                }            
            })
            return name;
        },
        getTeamSlug(id) {
            let slug = '';
            this.Teams.forEach(element => {
                if (element.id === id) {
                    slug = element.slug
                }            
            })
            return slug;
        },
        getMatchWeeks(event){
            this.Matches = []
            // let matchWeek = this.$store.getters.getMatchWeekById(event.target.value);
            this.MatchWeeks.forEach(element => {
                if (element.id == event.target.value) {
                    let matchWeek = element
                    matchWeek.matches.forEach(value => {
                        console.log(matchWeek)
                        if (value.league_id == this.League.id) {
                            this.Matches.push(value)
                        }
                    })
                }
            });
        }      
    }
}
</script>