<?php



?>
<form method="get">

    <textarea id="code" name="sql"><?= sql::_()->getMainQuery()?></textarea>

    <script>
        window.onload = function () {
            var mime = 'text/x-mariadb';

            if (window.location.href.indexOf('mime=') > -1) {
                mime = window.location.href.substr(window.location.href.indexOf('mime=') + 5);
            }
            window.editor = CodeMirror.fromTextArea(document.getElementById('code'), {
                mode: mime,
                indentWithTabs: true,
                smartIndent: true,
                lineNumbers: true,
                matchBrackets: true,
                autofocus: true,
                extraKeys: {"Ctrl-Space": "autocomplete"},
                hintOptions: {tables: {
                        users: {name: null, score: null, birthDate: null},
                        countries: {name: null, population: null, size: null}
                    }}
            });
        };
    </script>
    <input type="submit" value="GO" class="btn btn-default" />

</form>

