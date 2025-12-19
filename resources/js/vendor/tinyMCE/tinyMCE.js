/* Import TinyMCE */
// noinspection ES6MissingAwait

import tinymce from 'tinymce';

/* Icons & Theme */
import 'tinymce/icons/default/icons.min.js';
import 'tinymce/themes/silver/theme.min.js';
import 'tinymce/models/dom/model.min.js';

/* Skin & Translations */
import 'tinymce/skins/ui/oxide/skin.js';
import 'tinymce/skins/ui/oxide/content.js';
import './langs/nl.js';

/* Plugins */
import 'tinymce/plugins/autoresize'
import 'tinymce/plugins/autosave'
import 'tinymce/plugins/code';
import 'tinymce/plugins/emoticons';
import 'tinymce/plugins/emoticons/js/emojis';
import 'tinymce/plugins/link';
import 'tinymce/plugins/lists';
import 'tinymce/plugins/image';
import 'tinymce/plugins/table';
import 'tinymce/plugins/quickbars';

/**
 * Resolve callback string ("myFunc") → function ref from global scope.
 */
function resolveCallback(name) {
    if (typeof name === 'function') return name;
    if (typeof name === 'string' && name in window) {
        return window[name];
    }
    return null;
}

/**
 * Default file picker callback
 */
window.mfcDefaultFilePickerCallback = function(callback, value, meta) {
    const input = document.createElement('input');
    input.type = 'file';
    input.accept = 'image/*';

    input.onchange = function () {
        const file = this.files[0];
        if (!file) return;

        const editorElement = tinymce.activeEditor.getElement();
        const model = editorElement.getAttribute('data-model') || null;
        const id = editorElement.getAttribute('data-id') || null;

        console.log('formData test')
        const formData = new FormData();
        formData.append('file', file);
        if (model) formData.append('model', model);
        if (id) formData.append('id', id);

        // add extra data from dataset
        for (const [key, val] of Object.entries(editorElement.dataset)) {
            // Convert camelCase or kebab-case to snake_case
            const snakeKey = key.replace(/([A-Z])/g, "_$1").toLowerCase();
            formData.append(snakeKey, val);
        }

        // const extraFormData = editorElement.dataset.extraFormData
        //     ? JSON.parse(editorElement.dataset.extraFormData)
        //     : {};
        // for (const [key, val] of Object.entries(extraFormData)) {
        //     formData.append(key, val);
        // }

        // Allow listeners to tweak FormData
        const prepareEvent = new CustomEvent('tinymce:file-upload:prepare', {
            detail: { formData, file, model, id, editor: tinymce.activeEditor }
        });
        window.dispatchEvent(prepareEvent);

        console.log('formData', formData.toString());
        fetch('/form-upload-media', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content'),
            },
            body: formData,
        })
            .then(response => {
                const isJson = response.headers.get('content-type')?.includes('application/json');
                if (isJson) return response.json();
                if (response.status === 404) throw new Error("No upload route found (404)");
                if (response.status === 413) throw new Error("File too large (413)");
                throw new Error(`${response.status}`);
            })
            .then(result => {
                if (result.url) {
                    const hidden = document.createElement('input');
                    hidden.type = 'hidden';
                    hidden.name = 'content_media[]';
                    hidden.value = result.url;

                    editorElement.closest('form')
                        ?.querySelectorAll('.content-media')
                        .forEach(c => c.appendChild(hidden));

                    callback(result.url);
                } else {
                    alert(result.error || 'File upload failed: Unknown error');
                }
            })
            .catch(error => {
                console.error('Error uploading file:', error);
                alert('An error occurred while uploading the file: ' + error.message);
            });
    };

    input.click();
}

/**
 * Default setup (alignment + lists)
 */
function setupEditor(editor) {
    editor.ui.registry.addMenuButton('alignment', {
        icon: 'align-left',
        tooltip: 'Alignment',
        fetch: cb => cb([
            { type: 'menuitem', text: 'align left', icon: 'align-left', onAction: () => editor.execCommand('JustifyLeft') },
            { type: 'menuitem', text: 'align center', icon: 'align-center', onAction: () => editor.execCommand('JustifyCenter') },
            { type: 'menuitem', text: 'align right', icon: 'align-right', onAction: () => editor.execCommand('JustifyRight') },
            { type: 'menuitem', text: 'justify', icon: 'align-justify', onAction: () => editor.execCommand('JustifyFull') },
        ])
    });

    editor.ui.registry.addMenuButton('lists', {
        tooltip: 'Lists',
        icon: 'unordered-list',
        fetch: cb => cb([
            { type: 'menuitem', text: 'bullet list', icon: 'unordered-list', onAction: () => editor.execCommand('InsertUnorderedList') },
            { type: 'menuitem', text: 'numbered list', icon: 'ordered-list', onAction: () => editor.execCommand('InsertOrderedList') },
        ])
    });
}

// Helper: resolve string callbacks to functions
const resolveFilePickerCallback = (callback) => {
    if (typeof callback === 'string') {
        return resolveCallback(callback);
    }
    return callback;
};

// document.addEventListener('DOMContentLoaded', async () => {
    const globalHtmlEditorTinymceConfig = window.mlbHtmlEditorTinymceConfig ?? {};

    const allHtmlEditorsOnPage = document.querySelectorAll('[data-mlbrgn-html-editor]');
    console.log('all html editors on page', allHtmlEditorsOnPage);
    allHtmlEditorsOnPage.forEach(async el => {
        let elementTinymceConfig = {};
        if (el.dataset.tinymceConfig) {
            try {
                elementTinymceConfig = JSON.parse(el.dataset.tinymceConfig);
            } catch (e) {
                console.warn("Invalid JSON in data-tinymce-config", e);
            }
        }

        console.log('globalHtmlEditorTinymceConfig', globalHtmlEditorTinymceConfig);
        console.log('elementTinymceConfig', elementTinymceConfig);
        const mergedConfig = {
            ...globalHtmlEditorTinymceConfig,
            target: el,
            setup: setupEditor,
            ...elementTinymceConfig
        };

        // Resolve string callbacks after merging
        mergedConfig.file_picker_callback = resolveFilePickerCallback(mergedConfig.file_picker_callback);

        console.log('mergedConfig', mergedConfig);
        await tinymce.init(mergedConfig);
    });
// });
