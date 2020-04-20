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
            <table class="text-gray-600 table table-auto">
                <tr>
                    <td colspan="2" class="font-bold text-gray-600 text-right">
                        {{ plan }} plan
                    </td>
                </tr>
                <tbody>
                    <tr>
                        <th class="text-right pr-2 font-normal">Total Seats</th>
                        <td class="font-bold">{{ billable_members_count }}</td>
                    </tr>
                    <tr class="text-sm">
                        <th class="text-right pr-2 font-normal">
                            Group Members
                        </th>
                        <td>{{ members_count_with_descendants }}</td>
                    </tr>
                    <tr class="text-sm">
                        <th class="text-right pr-2 font-normal">
                            Project Members
                        </th>
                        <td>{{ project_members }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
<script>
import NameSpaceHeader from "./NameSpaceHeader";
import { nameSpaceProps } from "./nameSpaceApi";

export default {
    name: "NameSpace",
    components: { NameSpaceHeader },
    props: { ...nameSpaceProps },
};
</script>
