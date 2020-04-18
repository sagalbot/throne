<template>
    <div class="flex flex-col min-h-screen justify-center items-center">
        <div class="text-center max-w-lg">
            <h1
                class="flex justify-center items-center text-6xl font-black text-gitlab-orange mb-5"
            >
                Throne
                <GitLabLogo class="w-24" />
            </h1>

            <h2 class="text-2xl mb-2 text-gray-900">
                GitLab's missing user management system.
            </h2>

            <p class="text-gray-700">
                Manage the seats being used by your organization with a birds
                eye view of your groups and projects.
            </p>
        </div>

        <a
            :href="route('login.gitlab.redirect')"
            class="mt-10 text-2xl font-bold flex justify-center items-center rounded py-2 px-4 bg-gitlab-orange text-white"
        >
            Login with GitLab
        </a>
    </div>
</template>

<script>
import GitLabLogo from "../Components/GitLabLogo";
export default {
    name: "Login",
    components: { GitLabLogo },
};
</script>

<style scoped></style>
