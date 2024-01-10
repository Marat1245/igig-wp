(function () {
    tinymce.PluginManager.add('custom_button', function (editor, url) {
        editor.addButton('custom_button', {
            text: 'Выделить синим',
            icon: false,
            onclick: function () {
                // Получаем выделенный текст
                var selectedText = editor.selection.getContent({ format: 'text' });

                // Оборачиваем выделенный текст в тег <span>
                var wrappedText = '<span class="highlight">' + selectedText + '</span>';

                // Заменяем выделенный текст обернутым
                editor.selection.setContent(wrappedText);
            }
        });
    });
})();