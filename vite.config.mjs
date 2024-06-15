// vite.config.mjs

import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/js/main.js', 'resources/css/main.scss'],
            refresh: true,
        }),
    ],
    build: {
        manifest: true,
        outDir: 'dist',
        rollupOptions: {
            output: {
                entryFileNames: (chunk) => {
                    if (chunk.facadeModuleId.includes('main.js')) {
                        return `js/mlbrgn-form-components.js`; // Custom filename for JS
                    }
                    return 'assets/[name].[hash].js';
                },
                assetFileNames: (chunk) => {
                    if (chunk.name === 'main.css') {
                        return `css/mlbrgn-form-components.css`; // Custom filename for CSS
                    }
                    return 'assets/[name].[hash][extname]';
                },
            },
        },
    },
});
