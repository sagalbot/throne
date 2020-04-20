<template>
    <div>
        <header class="flex items-center px-5 py-5">
            <img
                :src="namespace.avatar_url"
                :alt="namespace.name + ' avatar'"
                class="w-12 rounded-full border mr-4"
            />
            <h1 class="text-2xl">{{ namespace.name }}</h1>
            <a href=""></a>
        </header>
        <div>
            <ul class="my-5">
                <li class="text-lg font-bold px-5">
                    Members of {{ namespace.name }} projects
                </li>
                <li
                    v-for="project in projectsWithMembers"
                    :key="project.id"
                    class="flex justify-between items-center border-b last:border-none py-2 px-5"
                >
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th colspan="2">
                                    <figure class="flex items-center">
                                        <img
                                            v-if="project.avatar_url"
                                            :src="project.avatar_url"
                                            :alt="project.name"
                                            class="w-10 h-10 rounded-full mr-5"
                                        />
                                        <div
                                            v-else
                                            class="w-10 h-10 rounded-full mr-5 bg-purple-200"
                                        ></div>
                                        <header>
                                            <h2>{{ project.name }}</h2>
                                        </header>
                                    </figure>
                                </th>
                            </tr>
                            <tr>
                                <th>name</th>
                                <th>username</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="member in project.members.members">
                                <td>{{ member.name }}</td>
                                <td>{{ member.username }}</td>
                            </tr>
                        </tbody>
                    </table>
                </li>
            </ul>

            <ul class="my-5">
                <li class="text-lg font-bold px-5">
                    Members of the {{ namespace.name }} group
                </li>
                <li
                    v-for="member in members.members"
                    class="flex justify-between items-center border-b last:border-none py-2 px-5"
                >
                    <figure class="flex items-center">
                        <img
                            :src="member.avatar_url"
                            :alt="member.username"
                            class="w-10 h-10 rounded-full mr-5"
                        />
                        <header>
                            <h2>{{ member.name }}</h2>
                            <a
                                :href="`https://gitlab.com/`"
                                target="_blank"
                                class="text-blue-400"
                            >
                                @{{ member.username }}
                            </a>
                        </header>
                    </figure>
                    <a
                        :href="namespace.web_url"
                        target="_blank"
                        class="text-blue-400"
                    >
                        manage
                    </a>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
import AppLayout from "../Layouts/AppLayout";

export default {
    name: "ShowNameSpace",
    layout: AppLayout,
    props: ["members", "projectsWithMembers", "namespace"],
};
</script>

<style scoped></style>
