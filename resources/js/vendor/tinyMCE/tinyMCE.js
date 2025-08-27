/* Import TinyMCE */
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
 * Allow host app to extend instead of replace
 */
function chainCallbacks(defaultCb, override) {
    if (!override) return defaultCb;
    return (...args) => {
        let usedNext = false;
        const next = (...cbArgs) => {
            usedNext = true;
            return defaultCb(...cbArgs);
        };
        override(...args, next);
        if (!usedNext && override.length < defaultCb.length) {
            return defaultCb(...args);
        }
    };
}

/**
 * Default file picker callback
 */
function defaultFilePickerCallback(callback, value, meta) {
    const input = document.createElement('input');
    input.type = 'file';
    input.accept = 'image/*';

    input.onchange = function () {
        const file = this.files[0];
        if (!file) return;

        const editorElement = tinymce.activeEditor.getElement();
        const model = editorElement.getAttribute('data-model') || null;
        const id = editorElement.getAttribute('data-id') || null;

        const formData = new FormData();
        formData.append('file', file);
        if (model) formData.append('model', model);
        if (id) formData.append('id', id);

        // Add extra form data
        const extraFormData = editorElement.dataset.extraFormData
            ? JSON.parse(editorElement.dataset.extraFormData)
            : {};
        for (const [key, val] of Object.entries(extraFormData)) {
            formData.append(key, val);
        }

        // Allow listeners to tweak FormData
        const prepareEvent = new CustomEvent('tinymce:file-upload:prepare', {
            detail: { formData, file, model, id, editor: tinymce.activeEditor }
        });
        window.dispatchEvent(prepareEvent);

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

document.addEventListener('DOMContentLoaded', async () => {
    document.querySelectorAll('.html-editor').forEach(async el => {
        let overrides = {};
        if (el.dataset.tinymceEditorConfig) {
            try {
                overrides = JSON.parse(el.dataset.tinymceEditorConfig);
            } catch (e) {
                console.warn("Invalid JSON in data-tinymce-editor-config", e);
            }
        }

        const baseConfig = {
            target: el,
            skin_url: 'default',
            body_class: 'form-control html-content p-3 rounded-0 border-0 shadow-none',
            min_height: 300,
            autoresize_bottom_margin: 0,
            menubar: false,
            branding: false,
            promotion: false,
            highlight_on_focus: true,
            plugins: 'autoresize autosave code emoticons link lists image table',
            content_css: '',
            toolbar: 'restoredraft code | blocks | bold italic underline strikethrough | alignment lists outdent indent | table image link emoticons',
            link_default_target: '_blank',
            document_base_url: '/',
            language: 'nl',
            convert_urls: false,
            license_key: 'gpl',
            automatic_uploads: false,
            images_upload_handler: null,
            image_list: null,
            file_picker_callback: defaultFilePickerCallback,
            setup: setupEditor,
        };

        // Resolve string references like "myCustomFilePicker"
        if (typeof overrides.file_picker_callback === 'string') {
            overrides.file_picker_callback = resolveCallback(overrides.file_picker_callback);
        }

        // Chain with default
        if (overrides.file_picker_callback) {
            overrides.file_picker_callback = chainCallbacks(
                baseConfig.file_picker_callback,
                overrides.file_picker_callback
            );
        }

        const finalConfig = Object.assign({}, baseConfig, overrides);
        await tinymce.init(finalConfig);
    });
});


// /* Import TinyMCE */
// // noinspection SpellCheckingInspection
//
// import tinymce from 'tinymce';
//
// /* Default icons are required. After that, import custom icons if applicable */
// import 'tinymce/icons/default/icons.min.js';
//
// /* Required TinyMCE components */
// import 'tinymce/themes/silver/theme.min.js';
// import 'tinymce/models/dom/model.min.js';
//
// /* Import a skin (can be a custom skin instead of the default) */
// import 'tinymce/skins/ui/oxide/skin.js';
// import 'tinymce/skins/ui/oxide/content.js';
//
// /* Import translations */
// import './langs/nl.js';
//
// /* Import plugins */
// import 'tinymce/plugins/autoresize'
// import 'tinymce/plugins/autosave'
// import 'tinymce/plugins/code';
// import 'tinymce/plugins/emoticons';
// import 'tinymce/plugins/emoticons/js/emojis';
// import 'tinymce/plugins/link';
// import 'tinymce/plugins/lists';
// import 'tinymce/plugins/image';
// import 'tinymce/plugins/table';
//
// document.addEventListener('DOMContentLoaded', async() => {
//     // const municipality = import.meta.env.VITE_MUNICIPALITY;
//     // const response = await fetch('/build/manifest.json');
//     // const manifest = await response.json();
//     // const cssKey = Object.keys(manifest).find(key => key.includes(`${municipality}/app.scss`));
//
//     await tinymce.init({
//         skin_url: 'default',
//         selector: `.html-editor`,
//         body_class: 'form-control html-content p-3 rounded-0 border-0 shadow-none',
//         min_height: 300,
//         autoresize_bottom_margin: 0,
//         menubar: false,
//         branding: false,
//         promotion: false,
//         highlight_on_focus: true,
//         plugins: 'autoresize autosave code emoticons link lists image table',
//         content_css: '',
//         toolbar: 'restoredraft code | blocks | bold italic underline strikethrough | alignment lists outdent indent | table image link emoticons',
//         link_default_target: '_blank', //purifier adds rel attributes and target="_blank" to outgoing links
//         document_base_url: '/',
//         language: 'nl',
//         convert_urls: false,
//         license_key: 'gpl',
//         automatic_uploads: false, // Disable the default image upload handler
//         images_upload_handler: null, // Not needed if using `file_picker_callback`
//         file_picker_callback: (callback, value, meta) => {
//             const input = document.createElement('input');
//             input.setAttribute('type', 'file');
//             input.setAttribute('accept', 'image/*'); // Limit to images
//
//             input.onchange = function () {
//                 const file = this.files[0];
//                 if (!file) return;
//
//                 const editorElement = tinymce.activeEditor.getElement();
//                 const model = editorElement.getAttribute('data-model') || null;
//                 const id = editorElement.getAttribute('data-id') || null;
//                 const container = editorElement;
//
//                 const formData = new FormData();
//                 formData.append('file', file);
//                 if (model) formData.append('model', model);
//                 if (id) formData.append('id', id);
//
//                 // Parse extra form data from data attribute
//                 const extraFormData = editorElement.dataset.extraFormData
//                     ? JSON.parse(editorElement.dataset.extraFormData)
//                     : {};
//
//                 // Append all extra form data
//                 for (const [key, val] of Object.entries(extraFormData)) {
//                     formData.append(key, val);
//                 }
//
//                 // Dispatch custom event so the host app can modify FormData, this will be synchronous,
//                 // so it will be used when fetching directly after this
//                 const prepareEvent = new CustomEvent('tinymce:file-upload:prepare', {
//                     detail: { formData, file, model, id, editor: tinymce.activeEditor }
//                 });
//                 window.dispatchEvent(prepareEvent);
//
//                 fetch('/form-upload-media', {
//                     method: 'POST',
//                     headers: {
//                         'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content'),
//                     },
//                     body: formData,
//                 })
//                     .then(response => {
//                         const isJsonResponse = response.headers.get('content-type')?.includes('application/json');
//                         if (isJsonResponse) {
//                             return response.json(); // Parse as JSON if the response is successful
//                         } else {
//                             // Handle specific HTTP status codes
//                             if (response.status === 404) {
//                                 throw new Error("No upload route found (404)");
//                             } else if (response.status === 413) {
//                                 throw new Error("File too large (413)");
//                             } else {
//                                 throw new Error(`${response.status}`);
//                             }
//                         }
//                     })
//                     .then(result => {
//                         if (result.url) {
//                             const input = document.createElement('input');
//                             input.type = 'hidden';
//                             input.name = 'content_media[]';
//                             input.value = result.url; // Store the temporary path
//
//                             editorElement.closest('form').querySelectorAll('form .content-media').forEach(container => {
//                                 container.appendChild(input);
//                             });
//
//                             callback(result.url); // Pass the image URL back to TinyMCE
//                         } else {
//                             alert(result.error || 'File upload failed: Unknown error');
//                         }
//                     })
//                     .catch(error => {
//                         console.error('Error uploading file:', error);
//                         alert('An error occurred while uploading the file: ' + error.message);
//                     });
//             };
//
//             input.click();
//         },
//
//         setup: (editor) => {
//             editor.ui.registry.addMenuButton('alignment', {
//                 icon: 'align-left',
//                 tooltip: 'Alignment',
//                 fetch: (callback) => {
//                     const items = [
//                         {
//                             type: 'menuitem',
//                             text: 'align left',
//                             icon: 'align-left',
//                             onAction: () => editor.execCommand('JustifyLeft')
//                         },
//                         {
//                             type: 'menuitem',
//                             text: 'align center',
//                             icon: 'align-center',
//                             onAction: () => editor.execCommand('JustifyCenter')
//                         },
//                         {
//                             type: 'menuitem',
//                             text: 'align right',
//                             icon: 'align-right',
//                             onAction: () => editor.execCommand('JustifyRight')
//                         },
//                         {
//                             type: 'menuitem',
//                             text: 'justify',
//                             icon: 'align-justify',
//                             onAction: () => editor.execCommand('JustifyFull')
//                         },
//                     ];
//                     callback(items);
//                 }
//             });
//
//             editor.ui.registry.addMenuButton('lists', {
//                 tooltip: 'Lijsten',
//                 icon: 'unordered-list',
//                 fetch: (callback) => {
//                     const items = [
//                         {
//                             type: 'menuitem',
//                             text: 'bullet list',
//                             icon: 'unordered-list',
//                             onAction: () => editor.execCommand('InsertUnorderedList')
//                         },
//                         {
//                             type: 'menuitem',
//                             text: 'numbered list',
//                             icon: 'ordered-list',
//                             onAction: () => editor.execCommand('InsertOrderedList')
//                         }
//                     ];
//                     callback(items);
//                 }
//             });
//
//         }
//     });
// });
