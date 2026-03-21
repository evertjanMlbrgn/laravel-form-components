import {
    createAssetLoader,
    collectConfigs,
    mergeConfigs,
} from './asset-loader-core';

const loader = createAssetLoader('form', {
    basePath: '/vendor/mlbrgn/laravel-form-components'
});

function loadFormAssets(loader, manifest) {
    const { assets, debug } = manifest;
    const { loadScript, loadStyle } = loader;

    async function run() {
        try {
            // always load
            await loadStyle(`css/index.css`);
            await loadScript(`js/index.js`);

            if (assets.validation) {
                await loadStyle(`css/form-validation.css`);
                await loadScript(`js/form-validation.js`);// TODO
            }

            if (assets.htmlEditor && document.querySelector('[data-mlbrgn-html-editor]')) {
                await loadStyle(`css/tinymce-content.css`);
                await loadScript(`js/html-editor.js`);
                // await loadScript('js/vendor/tinyMCE/tinyMCE.js');
                // await loadScript('js/vendor/tinyMCE/langs/nl.js');
            }

            if (assets.preview && document.querySelector('[data-mlbrgn-preview]')) {
                await loadStyle(`css/preview.css`);
                await loadScript(`js/preview.js`);
            }

            // if (features.validation) {
            //     await loadStyle(`${basePath}/css/mlbrgn-form-validation.css`);
            //     await loadScript(`${basePath}/js/mlbrgn-form-validation.js`);
            // }
            //
            // if (features.htmlEditor && document.querySelector('[data-mlbrgn-html-editor]')) {
            //     await loadStyle(`${basePath}/css/tinymce-content.css`);
            //     await loadScript(`${basePath}/js/mlbrgn-html-editor.js`);
            // }
            //
            // if (features.preview && document.querySelector('[data-mlbrgn-preview]')) {
            //     await loadStyle(`${basePath}/css/mlbrgn-preview.css`);
            //     await loadScript(`${basePath}/js/mlbrgn-preview.js`);
            // }


            document.dispatchEvent(
                new CustomEvent('mlbrgn:form:assets:loaded', {
                    detail: manifest,
                })
            );

            if (debug) {
                console.log('[form] assets loaded', manifest);
            }
        } catch (e) {
            console.error('[form] asset loading failed', e);
        }
    }

    run();
}

// Boot
const configs = collectConfigs('.mlbrgn-form-components-config');
const manifest = mergeConfigs(configs);
console.log('mfc configs', configs)
console.log('mfc manifest', manifest)

if (manifest) {
    loadFormAssets(loader, manifest);
}
