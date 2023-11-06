import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel([
            'resources/js/app.js',
            'resources/css/variable.css'
        ]),
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
        alias: [
            { find: '@', replacement: path.resolve(__dirname, './resources/js') },
            { find: '@assets', replacement: path.resolve(__dirname, './resources') }
        ],
    }
});
