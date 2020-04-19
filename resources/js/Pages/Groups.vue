<template>
    <div class="flex-1">
        <ul class="px-5">
            <li v-for="group in groups.root" class="border-t first:border-none">
                <RootNameSpace v-bind="group" />
                <ul v-if="groups[group.id]" class="border-t">
                    <li
                        v-for="subgroup in groups[group.id]"
                        class="border-b border-l border-gray-200 last:border-b-none pl-5 ml-10"
                    >
                        <NameSpace v-bind="subgroup" />
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</template>

<script>
import AppLayout from "../Layouts/AppLayout";
import NameSpace from "../Components/NameSpace/NameSpace";
import RootNameSpace from "../Components/NameSpace/RootNameSpace";

export default {
    name: "Groups",
    components: { RootNameSpace, NameSpace },
    layout: AppLayout,
    props: {
        groups: {
            required: true,
            type: Object,
        },
    },
};
</script>
