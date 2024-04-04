<template>
    <article class="rounded-xl bg-gris_clair p-3 shadow-lg hover:shadow-xl hover:transform hover:scale-105 duration-300">
        <a :href="route('team.show', id)">
            <div class="relative flex items-center overflow-hidden rounded-xl">
                <img :src="'/storage/'+logo" alt="Logo">
            </div>
            <div class=" mt-1 p-2">
                <div class="mt-3 items-center justify-between">
                    <p class="text-center space-mono-regular text-bleu">{{ name }}</p>
                </div>
            </div>
        </a>
    </article>
</template>

<style scoped>
img{
    height: 130px;
    width: 120px;
    margin: auto;
}
</style>
<script>
export default {
    name: 'Card',
    props: {
        id: {
            type: String,
            required: true
        },
        logo: {
            type: String,
            required: true
        },
        name: {
            type: String,
            required: true
        },
    }
}
</script>
