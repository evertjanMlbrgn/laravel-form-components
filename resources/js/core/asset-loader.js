// --- helpers ---
const loadedAssets = new Set();

function loadScript(url) {
    return new Promise((resolve, reject) => {
        if (loadedAssets.has(url)) return resolve();

        const script = document.createElement('script');
        script.src = url;
        script.defer = true;
        script.onload = () => {
            loadedAssets.add(url);
            resolve();
        };
        script.onerror = reject;
        document.head.appendChild(script);
    });
}

function loadStyle(url) {
    if (loadedAssets.has(url)) return;
    const link = document.createElement('link');
    link.rel = 'stylesheet';
    link.href = url;
    document.head.appendChild(link);
    loadedAssets.add(url);
}

// --- main loader ---
document.addEventListener('DOMContentLoaded', async () => {
    const configEl = document.getElementById('mlbrgn-asset-config');
    if (!configEl) return;

    let config;
    try {
        config = JSON.parse(configEl.textContent);
    } catch (err) {
        console.error('Failed to parse mlbrgn config JSON', err);
        return;
    }

    const basePath = config.basePath;
    const features = config.features ?? {};
    const debug = config.debug ?? false;

    try {
        // Core assets
        await loadStyle(`${basePath}/css/mlbrgn-form-components.css`);
        await loadScript(`${basePath}/js/mlbrgn-form-components.js`);

        // Validation
        if (features.validation && document.querySelector('[data-mlbrgn-validation]')) {
            await loadStyle(`${basePath}/css/mlbrgn-form-validation.css`);
            await loadScript(`${basePath}/js/mlbrgn-form-validation.js`);
        }

        // HTML editor
        if (features.htmlEditor && document.querySelector('[data-mlbrgn-html-editor]')) {
            await loadStyle(`${basePath}/css/tiny-mce-content.css`);
            await loadScript(`${basePath}/js/mlbrgn-html-editor.js`);
        }

        // Preview (demo only)
        if (features.preview && document.querySelector('[data-mlbrgn-preview]')) {
            await loadStyle(`${basePath}/css/mlbrgn-preview.css`);
            await loadScript(`${basePath}/js/mlbrgn-preview.js`);
        }

        // Dispatch event after all assets loaded
        document.dispatchEvent(new CustomEvent('mlbrgn:assets:loaded', { detail: config }));

        if (debug) console.log('mlbrgn assets loaded', config);
    } catch (err) {
        console.error('mlbrgn asset loading failed', err);
    }
});

export function reloadAssets(newConfig) {
    const configEl = document.getElementById('mlbrgn-asset-config');
    if (configEl) configEl.textContent = JSON.stringify(newConfig);
    // optionally re-run loader logic
}
// // --- helpers ---
// const loadedAssets = new Set();
//
// function loadScript(url) {
//     return new Promise((resolve, reject) => {
//         if (loadedAssets.has(url)) return resolve();
//
//         const script = document.createElement('script');
//         script.src = url;
//         script.defer = true;
//         script.onload = () => {
//             loadedAssets.add(url);
//             resolve();
//         };
//         script.onerror = reject;
//         document.head.appendChild(script);
//     });
// }
//
// function loadStyle(url) {
//     if (loadedAssets.has(url)) return;
//     const link = document.createElement('link');
//     link.rel = 'stylesheet';
//     link.href = url;
//     document.head.appendChild(link);
//     loadedAssets.add(url);
// }
//
// // --- main loader ---
// document.addEventListener('DOMContentLoaded', async () => {
//     const configEl = document.getElementById('mlbrgn-asset-config');
//     if (!configEl) return;
//
//     const config = JSON.parse(configEl.dataset.config);
//     const basePath = config.basePath;
//     const features = config.features ?? {};
//     const debug = config.debug ?? false;
//
//     try {
//         // Core assets
//         await loadStyle(`${basePath}/css/mlbrgn-form-components.css`);
//         await loadScript(`${basePath}/js/mlbrgn-form-components.js`);
//
//         // Conditional feature: Validation
//         if (features.validation && document.querySelector('[data-mlbrgn-validation]')) {
//             await loadStyle(`${basePath}/css/mlbrgn-form-validation.css`);
//             await loadScript(`${basePath}/js/mlbrgn-form-validation.js`);
//         }
//
//         // Conditional feature: HTML editor
//         if (features.htmlEditor && document.querySelector('[data-mlbrgn-html-editor]')) {
//             await loadStyle(`${basePath}/css/tiny-mce-content.css`);
//             await loadScript(`${basePath}/js/mlbrgn-html-editor.js`);
//         }
//
//         // Conditional feature: Preview (demo only)
//         if (features.preview && document.querySelector('[data-mlbrgn-preview]')) {
//             await loadStyle(`${basePath}/css/mlbrgn-preview.css`);
//             await loadScript(`${basePath}/js/mlbrgn-preview.js`);
//         }
//
//         // Dispatch event when all assets loaded
//         document.dispatchEvent(new CustomEvent('mlbrgn:assets:loaded', { detail: config }));
//
//         if (debug) console.log('mlbrgn assets loaded', config);
//     } catch (err) {
//         console.error('mlbrgn asset loading failed', err);
//     }
// });

// const configEl = document.getElementById('mlbrgn-asset-config');
// if (!configEl) throw new Error('mlbrgn config missing');
//
// const config = JSON.parse(configEl.dataset.config);
//
// const basePath = config.basePath;
// const features = config.features ?? {};
// const debug = config.debug ?? false;
//
// // Core assets always load
// await loadStyle(`${basePath}/css/mlbrgn-form-components.css`);
// await loadScript(`${basePath}/js/mlbrgn-form-components.js`);
//
// // Conditional features
// if (features.validation && document.querySelector('[data-mlbrgn-validation]')) {
//     await loadStyle(`${basePath}/css/mlbrgn-form-validation.css`);
//     await loadScript(`${basePath}/js/mlbrgn-form-validation.js`);
// }
//
// if (features.htmlEditor && document.querySelector('[data-mlbrgn-html-editor]')) {
//     await loadScript(`${basePath}/js/mlbrgn-html-editor.js`);
//     await loadStyle(`${basePath}/css/tiny-mce-content.css`);
// }
//
// if (features.preview && document.querySelector('[data-mlbrgn-preview]')) {
//     await loadStyle(`${basePath}/css/mlbrgn-preview.css`);
//     await loadScript(`${basePath}/js/mlbrgn-preview.js`);
// }
//
// if (debug) console.log('mlbrgn assets loaded', config);
//
// function enableHtmlEditor() {
//     if (!document.querySelector('[data-mlbrgn-html-editor]')) return;
//     loadScript(`${config.basePath}/js/mlbrgn-html-editor.js`);
//     loadStyle(`${config.basePath}/css/tiny-mce-content.css`);
// }
//
// const loadedAssets = new Set();
//
// /**
//  * Load a JS file dynamically
//  * @param {string} url
//  * @returns {Promise<void>}
//  */
// export function loadScript(url) {
//     return new Promise((resolve, reject) => {
//         if (loadedAssets.has(url)) return resolve();
//
//         const script = document.createElement('script');
//         script.src = url;
//         script.defer = true;
//         script.onload = () => {
//             loadedAssets.add(url);
//             resolve();
//         };
//         script.onerror = reject;
//         document.head.appendChild(script);
//     });
// }
//
// /**
//  * Load a CSS file dynamically
//  * @param {string} url
//  */
// export function loadStyle(url) {
//     if (loadedAssets.has(url)) return;
//
//     const link = document.createElement('link');
//     link.rel = 'stylesheet';
//     link.href = url;
//     document.head.appendChild(link);
//     loadedAssets.add(url);
// }
