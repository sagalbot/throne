<template>
    <tr>
        <td class="border">
            <NameSpaceHeader
                :avatar_url="avatar_url"
                :full_path="full_path"
                :id="id"
                :name="name"
                :web_url="web_url"
                class="max-w-full h-full py-2 px-5"
            />
        </td>
        <td class="px-5 border text-right">
            {{ members_count_with_descendants }}
        </td>
        <td class="px-5 border text-right">{{ project_members }}</td>
        <td class="px-5 border text-right text-orange-500">
            {{ billable_members_count }}
        </td>
    </tr>
</template>
<script>
import NameSpaceHeader from "./NameSpaceHeader";
import { nameSpaceProps } from "./nameSpaceApi";

export default {
    name: "NameSpace",
    components: { NameSpaceHeader },
    props: {
        ...nameSpaceProps,
        isSubGroup: {
            default: false,
        },
    },
};
</script>
