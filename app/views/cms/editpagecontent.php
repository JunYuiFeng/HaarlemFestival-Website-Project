<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>CKEditor 5 – Classic editor</title>
    <script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h2>Content Managing System</h2>


    <form method="post" action="" id="editor-form" name="form">
        <div class="btn btn-danger px-4" onclick="submit()">Save</div>
        <textarea name="editor" id="editor">
        <?= $this->content; ?>
        </textarea>
    </form>



    <script>
        CKEDITOR.replace('editor');
        CKEDITOR.config.allowedContent = true;
        CKEDITOR.config.height = 680;
        CKEDITOR.addCss('.cke_editable img { max-width: 100% !important; height: auto !important; }');

        function submit() {
            var data = CKEDITOR.instances.editor.getData();
            document.getElementById("editor-form").submit();
        }
    </script>
</body>

</html>