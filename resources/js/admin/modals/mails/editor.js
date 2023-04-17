import tinymce from 'tinymce';
import contentUiCss from 'tinymce/skins/ui/oxide/content.css?inline';
import contentCss from 'tinymce/skins/content/default/content.css?inline';
import 'tinymce/models/dom';
import 'tinymce/icons/default';
import 'tinymce/skins/ui/oxide/skin.css';
import 'tinymce/themes/silver';

const tinymceContainers = [
    '.tox-tinymce',
    '.tox-tinymce-aux',
    '.moxman-window',
    '.tam-assetmanager-root'
].join(', ');

export const initEditor = selector => {
    tinymce.init({
        add_form_submit_trigger: false,
        branding: false,
        content_css: false,
        content_style: contentUiCss.toString() + '\n' + contentCss.toString(),
        promotion: false,
        selector,
        skin: false,
    });

    $(document).on('focusin', e => {
        if ($(e.target).closest(tinymceContainers).length) {
            e.stopImmediatePropagation();
        }
    });
};

export const saveEditorContents = () => {
    tinymce.triggerSave();
};
