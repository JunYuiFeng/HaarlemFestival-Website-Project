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

    <?= $this->content ?>


    <div class="container restaurantsSection">
        <h1>Restaurants</h1>
        <div class="row restaurant">
            <?php
            foreach ($restaurants as $index => $restaurant) {
                if ($index % 2 == 0) {
                    // Give the first restaurant the "restaurantLeft" class
                    $cardClass = "card restaurantLeft";
                } else {
                    // Give the second restaurant the "restaurantRight" class
                    $cardClass = "card restaurantRight";
                }
            ?>
                <div class="col-6">
                    <div class="<?= $cardClass ?>">
                        <img src="/img/<?= $restaurant->getCoverImg() ?>" alt="<?=$restaurant->getCoverImg()?>">
                        <div class="card-body">
                            <h2><?= $restaurant->getName() ?></h2>
                            <p><?= $restaurant->getDescription() ?> </p>
                            <p><b>Address</b>: <?= $restaurant->getAddress() ?> <br>
                                <b>Phone</b>: <?= $restaurant->getPhoneNumber() ?> <br>
                                <b>Website</b>: <a href="<?= $restaurant->getWebsite() ?>"><?= $restaurant->getWebsite() ?></a> <br>
                                <b>Price range</b>: <?php for ($i = 0; $i < $restaurant->getPriceIndicator(); $i++) {
                                                        echo '€';
                                                    } ?><br>
                            </p>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>

    </div>

    <?php
    include __DIR__ . '/../footer.php';
    ?>

</body>

</html>