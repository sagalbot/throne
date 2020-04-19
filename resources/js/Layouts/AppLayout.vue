<template>
    <div class="flex flex-col min-h-screen">
        <nav
            class="flex items-baseline justify-between w-full px-5 py-2 border-b border-gray-300"
        >
            <h1 class="text-gitlab-orange font-bold">
                <inertia-link href="/" class="flex items-center">
                    Throne
                    <GitLabLogo class="w-8" />
                </inertia-link>
            </h1>

            <nav>
                <inertia-link :href="route('namespaces')">
                    Namespaces
                </inertia-link>
                <inertia-link :href="route('members')">
                    Members
                </inertia-link>
            </nav>

            <inertia-link
                :href="route('logout')"
                method="post"
                class="text-sm text-gray-700"
            >
                Logout
            </inertia-link>
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
