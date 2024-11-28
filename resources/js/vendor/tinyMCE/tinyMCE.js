/* Import TinyMCE */
// noinspection SpellCheckingInspection

import tinymce from 'tinymce';

/* Default icons are required. After that, import custom icons if applicable */
import 'tinymce/icons/default/icons.min.js';

/* Required TinyMCE components */
import 'tinymce/themes/silver/theme.min.js';
import 'tinymce/models/dom/model.min.js';

/* Import a skin (can be a custom skin instead of the default) */
import 'tinymce/skins/ui/oxide/skin.js';
import 'tinymce/skins/ui/oxide/content.js';

/* Import translations */
import './langs/nl.js';

/* Import plugins */
import 'tinymce/plugins/autoresize'
import 'tinymce/plugins/autosave'
import 'tinymce/plugins/code';
import 'tinymce/plugins/emoticons';
import 'tinymce/plugins/emoticons/js/emojis';
import 'tinymce/plugins/link';
import 'tinymce/plugins/lists';
import 'tinymce/plugins/image';
import 'tinymce/plugins/table';

document.addEventListener('DOMContentLoaded', async() => {
    // const municipality = import.meta.env.VITE_MUNICIPALITY;
    // const response = await fetch('/build/manifest.json');
    // const manifest = await response.json();
    // const cssKey = Object.keys(manifest).find(key => key.includes(`${municipality}/app.scss`));

    await tinymce.init({
        skin_url: 'default',
        selector: `.html-editor`,
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
        link_default_target: '_blank', //purifier adds rel attributes and target="_blank" to outgoing links
        document_base_url: '/',
        language: 'nl',
        convert_urls: false,
        license_key: 'gpl',
        automatic_uploads: false, // Disable the default image upload handler
        images_upload_handler: null, // Not needed if using `file_picker_callback`
        file_picker_callback: (callback, value, meta) => {
            const input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*'); // Limit to images

            input.onchange = function () {
                const file = this.files[0];
                if (!file) return;

                const formData = new FormData();
                formData.append('file', file);

                fetch('/api/upload-media', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    },
                    body: formData,
                })
                    .then(response => response.json())
                    .then(result => {
                        if (result.location) {
                            callback(result.location); // Pass the image URL back to TinyMCE
                        } else {
                            alert('File upload failed: ' + (result.error || 'Unknown error'));
                        }
                    })
                    .catch(error => {
                        console.error('Error uploading file:', error);
                        alert('An error occurred while uploading the file: ' + error.message);
                    });
            };

            input.click();
        },

        setup: (editor) => {
            editor.ui.registry.addMenuButton('alignment', {
                icon: 'align-left',
                tooltip: 'Alignment',
                fetch: (callback) => {
                    const items = [
                        {
                            type: 'menuitem',
                            text: 'align left',
                            icon: 'align-left',
                            onAction: () => editor.execCommand('JustifyLeft')
                        },
                        {
                            type: 'menuitem',
                            text: 'align center',
                            icon: 'align-center',
                            onAction: () => editor.execCommand('JustifyCenter')
                        },
                        {
                            type: 'menuitem',
                            text: 'align right',
                            icon: 'align-right',
                            onAction: () => editor.execCommand('JustifyRight')
                        },
                        {
                            type: 'menuitem',
                            text: 'justify',
                            icon: 'align-justify',
                            onAction: () => editor.execCommand('JustifyFull')
                        },
                    ];
                    callback(items);
                }
            });

            editor.ui.registry.addMenuButton('lists', {
                tooltip: 'Lijsten',
                icon: 'unordered-list',
                fetch: (callback) => {
                    const items = [
                        {
                            type: 'menuitem',
                            text: 'bullet list',
                            icon: 'unordered-list',
                            onAction: () => editor.execCommand('InsertUnorderedList')
                        },
                        {
                            type: 'menuitem',
                            text: 'numbered list',
                            icon: 'ordered-list',
                            onAction: () => editor.execCommand('InsertOrderedList')
                        }
                    ];
                    callback(items);
                }
            });

        }
    });
});
