import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';
import tailwindcss from 'tailwindcss'

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    css: {
        postcss:{
            plugins: [tailwindcss()],
        },
    },
    resolve: {
        alias: {
            'bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
        },
    },
});
