import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/styles.css',
                'ressources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
            buildDirectory: 'build', // 🔧 Important pour placer manifest.json au bon endroit
        }),
    ],
    base: '/build/', // ✅ Pour que les URLs des assets soient correctes
});
