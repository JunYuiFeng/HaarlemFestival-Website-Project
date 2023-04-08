<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visit Haarlem HomePage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php
    include __DIR__ . '/../transparent-header.php';
    ?>

    <video autoplay muted loop class="videoBackground">
        <source src="/img/VisitHaarlemVideo.mp4" type="video/mp4">
    </video>

    <?= $this->content ?>
    <?php
    include __DIR__ . '/../footer.php';
    ?>

</body>

</html>
