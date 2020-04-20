<template>
    <div class="flex-1">
        <table class="table-auto table table- w-full">
            <thead>
                <tr class="font-normal">
                    <th class="py-2 px-5 border-b text-left">
                        Group
                    </th>
                    <th class="py-2 px-5 border-b border-l text-right w-48">
                        Group Members
                    </th>
                    <th class="py-2 px-5 border-b border-l text-right w-48">
                        Project Members
                    </th>
                    <th class="py-2 px-5 border-b border-l text-right w-48">
                        Total Seats
                    </th>
                </tr>
            </thead>
            <tbody>
                <template v-for="group in groups.root">
                    <NameSpaceRow v-bind="group" :key="group.id" />
                    <NameSpaceRow
                        v-if="hasSubGroups(group.id)"
                        v-for="subgroup in hasSubGroups(group.id)"
                        v-bind="subgroup"
                        :key="subgroup.id"
                        :is-sub-group="true"
                    />
                </template>
            </tbody>
        </table>
    </div>
</template>

<script>
import AppLayout from "../Layouts/AppLayout";
import NameSpaceRow from "../Components/NameSpace/NameSpaceRow";
import RootNameSpace from "../Components/NameSpace/RootNameSpace";

export default {
    name: "ShowNameSpaces",
    components: { RootNameSpace, NameSpaceRow },
    layout: AppLayout,
    props: {
        groups: {
            required: true,
            type: Object,
        },
    },
    methods: {
        hasSubGroups(id) {
            return this.groups[id] || false;
        },
    },
};
</script>
