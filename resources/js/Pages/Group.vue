<template>
    <div>
        <header class="flex items-center px-5 py-5">
            <img
                :src="group.avatar_url"
                :alt="group.name + ' avatar'"
                class="w-12 rounded-full border mr-4"
            />
            <h1 class="text-2xl">{{ group.name }}</h1>
            <a href=""></a>
        </header>
        <div class="px-5">
            <ul class="my-5">
                <li class="text-lg font-bold">All Members</li>
                <li v-for></li>
            </ul>
        </div>
    </div>
</template>

<script>
import AppLayout from "../Layouts/AppLayout";

export default {
    name: "Group",
    layout: AppLayout,
    props: ["allMembers", "members", "projects", "group"],
};
</script>

<style scoped></style>
