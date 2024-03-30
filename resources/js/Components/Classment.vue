<template>
    <a :href="route('team.show', id)">
        <tr>
            <td class="py-2 px-4 border-b">{{ nom }}</td>
            <td class="py-2 px-4 border-b">{{ points }}</td>
            <td class="py-2 px-4 border-b">{{ bonus }}</td>
            <td class="py-2 px-4 border-b">{{ victoires }}</td>
            <td class="py-2 px-4 border-b">{{ nuls }}</td>
            <td class="py-2 px-4 border-b">{{ defaites }}</td>
            <td class="py-2 px-4 border-b">{{ pour }}</td>
            <td class="py-2 px-4 border-b">{{ contre }}</td>
            <td class="py-2 px-4 border-b">{{ diff }}</td>
        </tr>
    </a>
</template>

<script>
export default {
    name: 'classement',
    props: {
        Id: {
        type: Number,
        required: true
        },
        nom: {
            type: Number,
            required: true
        },
        points: {
            type: Number,
            required: true
        },
        bonus: {
            type: Number,
            required: true
        },
        victoires: {
            type: Number,
            required: true
        },
        nuls: {
            type: Number,
            required: true
        },
        defaites: {
            type: Number,
            required: true
        },
        pour: {
            type: Number,
            required: true
        },
        contre: {
            type: Number,
            required: true
        },
        diff: {
            type: Number,
            required: true
        }
    }
}
</script>
