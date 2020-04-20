<template>
    <div>
        <header class="flex items-center px-5 py-5">
            <img
                :src="namespace.avatar_url"
                :alt="namespace.name + ' avatar'"
                class="w-12 mr-4"
            />
            <h1 class="text-2xl">{{ namespace.name }}</h1>
            <a href=""></a>
        </header>
        <div>
            <ul class="my-5" v-if="withOutGroupMembers.length">
                <li class="text-lg font-bold px-5">
                    Members of {{ namespace.name }} through projects
                </li>
                <li
                    v-for="member in withOutGroupMembers"
                    :key="member.id"
                    class="flex justify-between items-center border-b last:border-none py-2 px-5"
                >
                    <Member
                        v-bind="member"
                        :projects="projectsForUser(member.id)"
                    />
                </li>
            </ul>

            <ul class="my-5">
                <li class="text-lg font-bold px-5">
                    Members of the {{ namespace.name }} group
                </li>
                <li
                    v-for="member in groupMembers"
                    class="flex justify-between items-center border-b last:border-none py-2 px-5"
                >
                    <Member v-bind="member" />
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
import AppLayout from "../Layouts/AppLayout";
import Member from "./Member";

export default {
    name: "ShowNameSpace",
    components: { Member },
    layout: AppLayout,
    props: [
        "namespace",
        "groupMembers",
        "projectMembers",
        "members",
        "projects",
    ],
    computed: {
        withOutGroupMembers() {
            const groupMemberIds = this.groupMembers.map(({ id }) => id);
            return this.members.filter(
                ({ id }) => !groupMemberIds.includes(id)
            );
        },
    },
    methods: {
        projectsForUser(userId) {
            return this.projects.filter(({ id }) =>
                this.projectMembers[id].includes(userId)
            );
        },
    },
};
</script>
