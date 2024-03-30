<template>
    <td class="p-2 whitespace-nowrap">
        <a :href="route('team.show', id)">
            <div class="font-medium text-center text-gray-800">{{name}}</div>
        </a>
    </td>
</template>

<script>
export default {
    name: 'table',
    props: {
    id: {
        type: Number,
        required: true
    },
    name: {
        type: String,
        required: true
    }
    }
}
</script>
