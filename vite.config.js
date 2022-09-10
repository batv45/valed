import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

const path = require('path')

export default defineConfig({
    server:{
        host:'valed.test'
    },
    plugins: [
        laravel({
            input: ['resources/js/app.js','resources/js/hotspot.js'],
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    resolve: {
        alias: {
            '@': '/resources/js',
            '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
        },
    },
});
