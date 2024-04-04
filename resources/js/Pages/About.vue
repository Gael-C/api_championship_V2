<template>
    <NavBar></NavBar>

    <div class="flex flex-col min-h-screen mt-10">
        <h1 class="space-mono-bold text-center">Pourquoi ce site ?</h1>
        <div class="md:flex text-center space-mono-regular py-12 2xl:px-20 md:px-6 px-4">
            <p>
                Ce site avait pour but à la base, de m'entrainer, de pratiquer dans le but de monter en compétence.
                <br/>
                Il s'est avéré au final que ce site servira de base pour mon dossier de projet pour mon examen de Concepteur Développeur d'Applications.
                Il se divise en deux parties, l'interface sur laquelle vous êtes et une API pour gérer les données.
                <br/>
                Je suis preneur de toutes remarques et/ou suggestions afin d'améliorer ce site.
                <br/>
                En vous souhaitant une bonne visite. 
            </p>
        </div>
    </div>
</template>

<script>
import NavBar from '@/Components/NavBar.vue'

export default {
    name: 'About',
    components :{
        NavBar
    }
}
</script>