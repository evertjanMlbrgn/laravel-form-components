import {
    createAssetLoader,
    collectConfigs,
    mergeConfigs,
} from './asset-loader-core';

/**
 * Shared bootstrapper for all MLBRGN asset bundles
 */
function bootAssets({ selector, namespace, runner }) {
    const configs = collectConfigs(selector);
    const manifest = mergeConfigs(configs);

    if (!manifest) return;

    const loader = createAssetLoader(namespace, {
        basePath: manifest.assetBasePath,
    });

    runner(loader, manifest);
}

/* =========================================================
 * FORM COMPONENTS
 * ========================================================= */

async function loadFormAssets(loader, manifest) {
    const { assets = {}, debug } = manifest;
    const { loadScript, loadStyle } = loader;

    try {
        await loadStyle('css/index.css');
        await loadScript('js/index.js');

        const tasks = [];

        if (assets.validation) {
            tasks.push(
                loadStyle('css/form-validation.css'),
                loadScript('js/form-validation.js')
            );
        }

        if (
            assets.htmlEditor &&
            document.querySelector('[data-mlbrgn-html-editor]')
        ) {
            tasks.push(
                loadStyle('css/tinymce-content.css'),
                loadScript('js/html-editor.js')
            );
        }

        if (assets.preview) {
            tasks.push(
                loadStyle('css/preview.css'),
                loadScript('js/preview.js')
            );
        }

        await Promise.allSettled(tasks);

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

/* =========================================================
 * BOOTSTRAP ENTRIES
 * ========================================================= */

bootAssets({
    selector: '.mlbrgn-form-components-config',
    namespace: 'form',
    runner: loadFormAssets,
});


// import {
//     createAssetLoader,
//     collectConfigs,
//     mergeConfigs,
// } from './asset-loader-core';
//
// async function loadFormAssets(loader, manifest) {
//     const { assets, debug } = manifest;
//     const { loadScript, loadStyle } = loader;
//
//     // async function run() {
//         try {
//             // always load
//             await loadStyle(`css/index.css`);
//             await loadScript(`js/index.js`);
//
//             if (assets.validation) {
//                 await loadStyle(`css/form-validation.css`);
//                 await loadScript(`js/form-validation.js`);// TODO
//             }
//
//             if (assets.htmlEditor && document.querySelector('[data-mlbrgn-html-editor]')) {
//                 await loadStyle(`css/tinymce-content.css`);
//                 await loadScript(`js/html-editor.js`);
//             }
//
//             if (assets.preview) {
//                 await loadStyle(`css/preview.css`);
//                 await loadScript(`js/preview.js`);
//             }
//
//             document.dispatchEvent(
//                 new CustomEvent('mlbrgn:form:assets:loaded', {
//                     detail: manifest,
//                 })
//             );
//
//             if (debug) {
//                 console.log('[form] assets loaded', manifest);
//             }
//         } catch (e) {
//             console.error('[form] asset loading failed', e);
//         }
//     // }
//
//     // run();
// }
//
// // Boot
// const configs = collectConfigs('.mlbrgn-form-components-config');
// const manifest = mergeConfigs(configs);
// console.log('mfc configs', configs)
// console.log('mfc manifest', manifest)
//
// if (manifest) {
//     console.log('mfc manifest', manifest)
//     const loader = createAssetLoader('form', {
//         basePath: manifest.assetBasePath,
//     });
//
//     loadFormAssets(loader, manifest);
// }
