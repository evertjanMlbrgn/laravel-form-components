// --- helpers ---
const loadedAssets = new Set();

function loadScript(url) {
    return new Promise((resolve, reject) => {
        if (loadedAssets.has(url)) return resolve();

        console.log('loadScript', url)
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
    console.log('loadStyle', url)

    const link = document.createElement('link');
    link.rel = 'stylesheet';
    link.href = url;
    document.head.appendChild(link);
    loadedAssets.add(url);
}

// --- main loader ---
document.addEventListener('DOMContentLoaded', async () => {
    const configEl = document.getElementById('mlbrgn-asset-config');
    console.log(configEl);
    if (!configEl) {
        console.warn('no config element')
        return;
    }

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
        await loadStyle(`${basePath}/css/index.css`);
        await loadScript(`${basePath}/js/index.js`);

        // Validation
        // if (features.validation && document.querySelector('[data-mlbrgn-validation]')) {
        if (features.validation) {
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
