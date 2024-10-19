import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/js/react/src/index.jsx'], // Путь к входному файлу React
            refresh: true,
        }),
        react(), // Поддержка React
    ],
});