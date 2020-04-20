<template>
    <div class="flex w-full justify-between items-center">
        <header class="flex items-center">
            <img
                :src="avatar_url"
                :alt="name"
                class="w-12 h-12 rounded-full mr-3"
            />
            <h2>{{ name }}</h2>
        </header>
        <ul v-if="projects" class="max-w-lg">
            <li
                v-for="project in projects"
                :key="project.id"
                class="ml-1 inline"
            >
                <a
                    :href="project.web_url + '/-/project_members'"
                    target="_blank"
                    class="inline-flex px-2 py-1 bg-gray-200 rounded-full text-sm"
                    >{{ project.name }}</a
                >
            </li>
        </ul>
    </div>
</template>
<script>
export default {
    name: "Member",
    props: [
        "access_level",
        "avatar_url",
        "expires_at",
        "id",
        "name",
        "state",
        "username",
        "web_url",
        "projects",
    ],
};
</script>
