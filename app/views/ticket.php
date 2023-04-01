<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/style.css" />
</head>

<body id="ticket">

    <div class="d-flex justify-content-center bg-warning bg-gradient p-1">
        <h1 class="text-dark fw-bolder">Haarlem Festival 2023</h1>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-6">
                <h4 class="mb-0"><b>EVENT</b><br><?= $event ?></h4>
                <br>
                <h4 class="mb-0"><b>LOCATION</b><br><?= $location ?></h4>
                <br>
                <h4 class="mb-0"><b>DATE AND TIME</b><br> <?= $date ?> </h4>
                <br>
            </div>
            <div class="col-3"></div>
            <div class="col-3">
                <img src="<?= $dataUri ?>" alt="" class="img-fluid">
            </div>
        </div>
        <br><br><br><br>
        <div class="d-flex justify-content-center p-1 mt-5">
            <p class="text-dark">www.haarlemfestival2023.nl</p>
        </div>
    </div>

</body>

</html>