// vite.config.mjs
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/js/main.js',
                'resources/js/html-editor.js',
                'resources/js/form-validation.js',
                'resources/css/main.scss',
                'resources/css/form-validation.scss',
                'resources/js/preview.js',
                'resources/css/preview.scss',
            ],
            refresh: true, // enables Blade auto-refresh during dev
        }),
    ],
    build: {
        outDir: 'dist',
        manifest: false, // generates manifest.json at root of dist
        rollupOptions: {
            output: {
                // JS filenames
                entryFileNames: chunk => {
                    const nameMap = {
                        'main.js': 'js/mlbrgn-form-components.js',
                        'html-editor.js': 'js/mlbrgn-html-editor.js',
                        'form-validation.js': 'js/mlbrgn-form-validation.js',
                        'preview.js': 'js/mlbrgn-preview.js',
                    };
                    return Object.entries(nameMap).find(([key]) => chunk.facadeModuleId?.endsWith(key))?.[1]
                        || 'assets/mlbrgn-[name].[hash].js';
                },
                // CSS filenames
                assetFileNames: chunk => {
                    const nameMap = {
                        'main.css': 'css/mlbrgn-form-components.css',
                        'form-validation.css': 'css/mlbrgn-form-validation.css',
                        'preview.css': 'css/mlbrgn-preview.css',
                    };
                    return nameMap[chunk.name] || 'assets/mlbrgn-[name].[hash][extname]';
                },
            },
        },
    },
});
