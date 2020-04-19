<template>
    <header class="flex items-center">
        <img :src="avatar_url" class="w-10 rounded-full border mr-4" />
        <div>
            <h2 class="text-blue-500 text-lg leading-none">
                <inertia-link
                    :href="route('namespace.projects', { namespace: id })"
                >
                    {{ name }}
                </inertia-link>
            </h2>
            <a
                class="text-gray-600 text-sm font-mono"
                :href="web_url"
                target="_blank"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20"
                    class="fill-current w-3 inline"
                >
                    <path
                        d="M9.26 13a2 2 0 0 1 .01-2.01A3 3 0 0 0 9 5H5a3 3 0 0 0 0 6h.08a6.06 6.06 0 0 0 0 2H5A5 5 0 0 1 5 3h4a5 5 0 0 1 .26 10zm1.48-6a2 2 0 0 1-.01 2.01A3 3 0 0 0 11 15h4a3 3 0 0 0 0-6h-.08a6.06 6.06 0 0 0 0-2H15a5 5 0 0 1 0 10h-4a5 5 0 0 1-.26-10z"
                    ></path>
                </svg>
                gitlab.com/{{ full_path }}
            </a>
        </div>
    </header>
</template>
<script>
export default {
    name: "NameSpaceHeader",
    props: {
        avatar_url: {},
        full_path: {},
        id: {},
        name: {},
        web_url: {},
    },
};
</script>
