<template>
    <div class="flex flex-col min-h-screen">
        <nav
            class="flex items-baseline justify-between w-full px-5 py-2 border-b border-gray-300"
        >
            <nav class="flex items-baseline">
                <h1 class="text-gitlab-orange font-bold mr-5">
                    <inertia-link href="/" class="flex items-center">
                        Throne
                        <GitLabLogo class="w-8" />
                    </inertia-link>
                </h1>

                <inertia-link
                    class="mr-5 hover:text-blue-800"
                    :class="{ 'text-blue-800': routeActive('namespaces') }"
                    :href="route('namespaces')"
                >
                    Namespaces
                </inertia-link>
                <inertia-link
                    class="mr-5 hover:text-blue-800"
                    :class="{ 'text-blue-800': routeActive('members') }"
                    :href="route('members')"
                >
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
