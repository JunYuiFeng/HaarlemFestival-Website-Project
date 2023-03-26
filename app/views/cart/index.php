<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/style.css" />
</head>

<body>
    <?php
    include __DIR__ . '/../header.php';
    ?>

    <div class="row">
        <div class="col"></div>

        
        <div class="col">
           <div class="container checkoutOrderSummarySection">
            <h1>Order Summary</h1>
            <div class="card rounded-3">
                <div class="card-body">
                <div class="row d-flex justify-content-between align-items-center"> 
                    <div class="col-2">
                        <img src="/img/ReservationIcon.png" alt="">
                    </div>
                    <div class="col-3">
                        <p>Ratatouille Restaurant</p>
                        <p><b>Comment:</b> Alergic to shelfish</p>
                        <p><b>People:</b>4</p>
                    </div>
                    <div class="col-3">
                        <p>20/12/2021</p>
                        <p><b>Time:</b> 20:00</p>
                    </div>
                    <div class="col-2 d-flex">
                        <input type="number" class="form-control">
                    </div>
                    <div class="col-2">
                        <h3>€ 50</h3>
                    </div>
                </div>
                </div>
            </div>

            <div class="card rounded-3">
                <div class="card-body">
                <div class="row d-flex justify-content-between align-items-center"> 
                    <div class="col-2">
                        <img src="/img/ReservationIcon.png" alt="">
                    </div>
                    <div class="col-3">
                        <p>Ratatouille Restaurant</p>
                        <p><b>Comment:</b> Alergic to shelfish</p>
                        <p><b>People:</b>4</p>
                    </div>
                    <div class="col-3">
                        <p>20/12/2021</p>
                        <p><b>Time:</b> 20:00</p>
                    </div>
                    <div class="col-2 d-flex">
                        <input type="number" class="form-control">
                    </div>
                    <div class="col-2">
                        <h3>€ 50</h3>
                    </div>
                </div>
                </div>
            </div>

           </div>
        </div>
    </div>
    <?php
    include __DIR__ . '/../footer.php';
    ?>
</body>

</html>