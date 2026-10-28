import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';
import fs from 'node:fs';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],

    server: {
        host: '0.0.0.0',
        port: 5173,

        https: {
            key: fs.readFileSync('/var/www/ssl/key.pem'),
            cert: fs.readFileSync('/var/www/ssl/cert.pem'),
        },

        hmr: {
            host: '192.168.1.225',
            protocol: 'wss',
            port: 5173,
        },
    },
});