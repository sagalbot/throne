const mix = require("laravel-mix");

const purgecss = require("@fullhuman/postcss-purgecss")({
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.vue",
        "./resources/**/*.css",
    ],
    defaultExtractor: (content) => content.match(/[\w-/:]+(?<!:)/g) || [],
});

mix.webpackConfig((webpack) => ({
    resolve: {
        alias: {
            ziggy: path.resolve("vendor/tightenco/ziggy/dist/js/route.js"),
        },
    },
}));

mix.js("resources/js/app.js", "public/js");

mix.postCss("resources/css/app.css", "public/css", [
    require("tailwindcss"),
    require("autoprefixer"),
    ...(process.env.NODE_ENV === "production" ? [purgecss] : []),
]);

if (mix.inProduction()) {
    mix.version();
}
