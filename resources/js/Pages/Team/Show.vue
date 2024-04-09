<template>
  <NavBar></NavBar>
    <div class="md:flex items-center justify-center py-12 2xl:px-20 md:px-6 px-4" v-if="Team">
    
      <div class="xl:w-2/6 lg:w-2/5 w-80 md:block hidden">
        <img class="w-6/12 mx-auto" alt="image of a team logo" :src="'/storage/'+Team.logo" />
        <br>
        <div class="overflow-x-auto">
          <table class="text-sm divide-y divide-gray-100 w-full space-mono-regular"  v-for="clasmt in Team.classment">
              <tr>
                <th colspan="9" class="text-center py-2">{{ getLeagueName(clasmt.league_id) }}</th>
              </tr>
                <tr class="border-b font-space_mono dark:border-neutral-500">
                  <th class="py-2 px-4 border-b">#</th>
                  <th class="py-2 px-4 border-b">Pts</th>
                  <th class="py-2 px-4 border-b">B</th>
                  <th class="py-2 px-4 border-b">V</th>
                  <th class="py-2 px-4 border-b">N</th>
                  <th class="py-2 px-4 border-b">D</th>
                  <th class="py-2 px-4 border-b">P</th>
                  <th class="py-2 px-4 border-b">C</th>
                  <th class="py-2 px-4 border-b">D</th>
              </tr>
              <tbody>
                  <tr>
                      <td class="py-2 px-4 border-b">{{ clasmt.classement }}</td>
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
        <br>
        <select @change="getMatchWeeks($event)" class="mt-auto bg-gris_clair">
          <option value="" selected>Choisissez une journée</option>
          <option class="text-center" v-for="matchWeek in MatchWeeks" :value="matchWeek.id">{{ matchWeek.match_week_number }}</option>
        </select>
        <div class="overflow-x-auto">
          <table class="text-sm divide-y divide-gray-100 w-full" v-for="match in teamMatches">
                <tr>
                  <th>{{ match.match_week_number }}</th>
                </tr>
                  <tr class="border-b font-medium dark:border-neutral-500">
                    <th class="py-2 px-4 border-b">Domicile</th>
                    <th class="py-2 px-4 border-b">Résultat</th>
                    <th class="py-2 px-4 border-b">Extérieur</th>
                </tr>
                <tbody>
                    <tr>
                        <td class="py-2 px-2 text-center border-b"> {{ getTeamName(match.home_team_id) }}</td>
                        <td class="py-2 border-b">({{ match.home_team_tries }}) {{ match.home_team_result }}-{{ match.away_team_result }} ({{match.away_team_tries}})</td>
                        <td class="py-2 px-2 text-center border-b mx-auto">{{ getTeamName(match.away_team_id) }}</td>
                    </tr>
                </tbody>
          </table>
        </div>
      </div>
      <div class="md:hidden">
        <img class="w-9/12 mx-auto" alt="image of a team logo" :src="'/storage/'+Team.logo" />
      </div>
      <div class="xl:w-2/5 md:w-1/2 lg:ml-8 md:ml-6 md:mt-0 mt-6">
        <div class="border-b border-gray-200 pb-6">
          <h1 class="lg:text-2xl text-xl space-mono-bold lg:leading-6 leading-7 text-gray-800 dark mt-2 text-center">{{ Team.name }}</h1>
        </div>
        <detail :cle="'Surnom'" :valeur="Team.nickname"/>
        <detail :cle="'Fondation'" :valeur="Team.foundation"/>
        <detail :cle="'Stade'" :valeur="Team.stade"/>
        <detail :cle="'Capacité'" :valeur="Team.capacity"/>
        <detail :cle="'Site Web'" :valeur="Team.website"/>
        <br>
        <h2 class="lg:text-2xl text-xl space-mono-bold lg:leading-6 leading-7 text-gray-800 dark mt-2 text-center">Réseaux sociaux</h2>
        <reseau v-if="Team.facebook" :cle="'Facebook'" :valeur="Team.facebook"/>
        <reseau :cle="'Twitter'" :valeur="Team.twitter"/>
        <reseau :cle="'Instagram'" :valeur="Team.instagram"/>
        <reseau v-if="Team.youtube" :cle="'Youtube'" :valeur="Team.youtube"/>
      </div>
      <div class="md:hidden mt-5">
        <div class="overflow-x-auto">
          <table class="text-sm divide-y divide-gray-100"  v-for="clasmt in Team.classment">
              <tr>
                <th>{{ getLeagueName(clasmt.league_id) }}</th>
              </tr>
               <tr class="border-b font-medium dark:border-neutral-500">
                  <th class="py-2 px-4 border-b">#</th>
                  <th class="py-2 px-4 border-b">Pts</th>
                  <th class="py-2 px-4 border-b">B</th>
                  <th class="py-2 px-4 border-b">V</th>
                  <th class="py-2 px-4 border-b">N</th>
                  <th class="py-2 px-4 border-b">D</th>
                  <th class="py-2 px-4 border-b">P</th>
                  <th class="py-2 px-4 border-b">C</th>
                  <th class="py-2 px-4 border-b">D</th>
              </tr>
              <tbody>
                  <tr>
                      <td class="py-2 px-4 border-b">{{ clasmt.classement }}</td>
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
        <br>
        <select class="mt-5" @change="getMatchWeeks($event)">
          <option value="" selected>Choisissez une journée</option>
          <!-- <option v-for="matchWeek in $store.state.matchWeeks" :value="matchWeek.id">{{ matchWeek.match_week_number }}</option> -->
        </select> 
        <table class="text-sm divide-y divide-gray-100 w-full" v-for="match in teamMatches">
              <tr>
                <th>{{ match.match_week_number }}</th>
              </tr>
                <tr class="border-b font-medium dark:border-neutral-500">
                  <th class="py-2 px-4 border-b">Domicile</th>
                  <th class="py-2 px-4 border-b">Résultat</th>
                  <th class="py-2 px-4 border-b">Extérieur</th>
              </tr>
              <tbody>
                  <tr>
                      <td class="py-2 px-2 text-center border-b"> {{ getTeamName(match.home_team_id) }}</td>
                      <td class="py-2 border-b">({{ match.home_team_tries }}) {{ match.home_team_result }}-{{ match.away_team_result }} ({{match.away_team_tries}})</td>
                      <td class="py-2 px-2 text-center border-b">{{ getTeamName(match.away_team_id) }}</td>
                  </tr>
              </tbody>
        </table>
      </div>
    </div>
    
    </template>
    
    <script>
    import detail from '@/Components/Details.vue';
    import reseau from '@/Components/Reseaux.vue';
    import NavBar from '@/Components/NavBar.vue'
    import { usePage, router } from '@inertiajs/vue3';
    
    export default {
        name: 'TeamView',
        components: {
            detail,
            reseau,
            NavBar
        },
        props: ['team', 'teams','matchWeeks'],
        data() {
        return {
          teamMatches: [] // Propriété pour stocker les résultats de la fonction getMatchWeeks
        };
      },
        computed: {      
            Team() {
              let team = usePage().props.team;
              return team
              },
            MatchWeeks() {
              let matchWeeks = usePage().props.matchWeeks;
              return matchWeeks;
            }
        },
        methods: {
          getMatchWeeks(event){
            this.teamMatches = []
            let matchWeeks = usePage().props.matchWeeks;
            matchWeeks.forEach( element => {
              if(element.id == event.target.value) {
                let matchWeek = element
                matchWeek.matches.forEach(value => {
                  if (value.away_team_id === this.Team.id || value.home_team_id === this.Team.id) {
                    this.teamMatches.push(value)
                  }
                });
              }
            })
          },
          getTeamName(id) {
                let teams = usePage().props.teams
                let name = '';
                teams.forEach(element => {
                  if(element.id === id) {
                    name = element.name
                  }
                })
                return name
          },
          getLeagueName(id) {

            let team = usePage().props.team;
            let name = '';
            let league = team.leagues
            league.forEach(element => {
              if(element.pivot.league_id === id) {
                name =  element.name
              }
            })
            return name
          }
        }
    }
    </script>