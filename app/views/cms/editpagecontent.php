<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Content Managing System</title>
    <script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <?php include_once("header.php"); ?>

    <div class="container">
        <h1 class="text-center">Content Managing System</h1>


        <button class="btn btn-warning px-5 my-4 py-3" id="previewBtn" onclick="previewContent(this)">Preview</button>
        <button class="btn btn-danger px-5 my-4 py-3" onclick="saveContent()">Save</button>


        <form method="post" action="" id="editor-form" name="form">
            <textarea name="editor" id="editor">
        <?= $this->content; ?>
        </textarea>
        </form>
    </div>
    <div id="preview">
        <h3 class="text-center font-weight-bold">Preview</h3>

        <?php
        include __DIR__ . '/../header.php';
        ?>
        <span id="contentPlaceholder"></span>
        <?php
        include __DIR__ . '/../footer.php';
        ?>
    </div>


    <script>
        document.getElementById("preview").hidden = true;
        CKEDITOR.replace('editor');
        CKEDITOR.config.allowedContent = true;
        CKEDITOR.config.height = 680;
        CKEDITOR.config.disallowedContent = 'img';
        CKEDITOR.addCss('.cke_editable img { max-width: 100% !important; height: auto !important; }');

        function previewContent(btn) {
            btn.textContent = (btn.textContent == "Continue editing") ? "Preview" : "Continue editing";
            var data = CKEDITOR.instances.editor.getData();
            document.getElementById("contentPlaceholder").innerHTML = data;
            document.getElementById("editor-form").toggleAttribute("hidden")
            document.getElementById("preview").toggleAttribute("hidden")
        }

        function saveContent() {
            var data = CKEDITOR.instances.editor.getData();
            document.getElementById("editor-form").submit();
        }
    </script>
</body>

</html>