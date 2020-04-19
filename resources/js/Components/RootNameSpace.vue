<template>
    <div class="flex justify-between items-center py-5">
        <NameSpaceHeader
            :avatar_url="avatar_url"
            :full_path="full_path"
            :id="id"
            :name="name"
            :web_url="web_url"
        />
        <div class="text-gray-600">
            {{ plan }}
            <template v-if="plan !== 'free'">
                <span class="text-sm">Seats Billed:</span>
                <span class="font-bold text-gray-800">
                    {{ billable_members_count }}
                </span>
            </template>
        </div>
    </div>
</template>
<script>
import NameSpaceHeader from "./NameSpaceHeader";

export default {
    name: "NameSpace",
    components: { NameSpaceHeader },
    props: {
        id: {
            required: true,
        },
        name: {
            required: true,
        },
        web_url: {
            required: true,
        },
        full_path: {
            required: true,
        },
        billable_members_count: {
            required: true,
        },
        plan: {
            required: true,
        },
        avatar_url: {
            required: true,
        },
    },
};
</script>
