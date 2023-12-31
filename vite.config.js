import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['public/admin-assets/scss/style.scss'],
            refresh: true,
        }),
    ],
});
