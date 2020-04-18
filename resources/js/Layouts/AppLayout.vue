<template>
    <div class="flex flex-col min-h-screen">
        <nav class="flex w-full px-5 py-2 border-b border-gray-300">
            <h1 class="text-gitlab-orange flex items-center font-bold">
                Throne
                <GitLabLogo class="w-8" />
            </h1>
        </nav>
        <slot></slot>
    </div>
</template>

<script>
import GitLabLogo from "../Components/GitLabLogo";

export default {
    name: "AppLayout",
    components: { GitLabLogo },
};
</script>
