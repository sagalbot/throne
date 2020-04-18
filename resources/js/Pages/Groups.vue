<template>
    <div class="flex-1 px-5 py-5">
        <h1 class="text-gray-500 text-xl">Groups</h1>
    </div>
</template>

<script>
import AppLayout from "../Layouts/AppLayout";

export default {
    name: "Groups",
    layout: AppLayout,
    props: {
        groups: {
            required: true,
            type: Array,
        },
    },
};
</script>

<style scoped></style>
