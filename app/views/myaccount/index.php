<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/style.css" />
</head>

<body>
    <?php
    include __DIR__ . '/../header.php';
    ?>
    <div class="container d-flex flex-column justify-content-between ">
        <h1>My Account!</h1>
        <h3>Hello user_id: <?= $_SESSION["logedin"] ?></h3>
        <a href="logout" class="mt-5">Logout</a>
    </div>



    <?php
    include __DIR__ . '/../footer.php';
    ?>

</body>

</html>