import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'
import path from 'node:path'

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/js/app.js'],
            // Also refresh when you edit package views:
            refresh: [
                'resources/views/**',
                path.resolve(__dirname, '../resources/views/**'),
            ],
        }),
    ],
    resolve: {
        alias: {
            // @pkg points to your package's /resources
            '@pkg': path.resolve(__dirname, '../resources'),
        },
    },
    server: {
        // Allow Vite to serve files from your package root
        fs: {
            allow: [
                path.resolve(__dirname, '..'), // the package root
            ],
        },
        open: 'http://127.0.0.1:8000/demo',
    },
    configureServer(server) {
        server.httpServer.once('listening', () => {
            console.log('\n🚀 Laravel Demo page: http://127.0.0.1:8000/demo\n');
        });
    },
})

