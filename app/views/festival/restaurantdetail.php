<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yummie!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/style.css" />
</head>

<body>
    <?php
    include __DIR__ . '/../header.php';
    ?>
    <div class="container restaurantDetailPageContainer">
        <div class="row">
            <div class="col descriptionSection">
                <div class="row">
                    <div class="col">
                        <h1><b><?= $restaurant->getName() ?></b></h1>
                    </div>
                    <div class="col">
                        <div class="row float-end michelineLabel">
                            <div class="col">
                                <img class="michelinLogo" src="/img/MichelineLogo.png" alt="MichelineLogo">
                            </div>
                            <div class="col">
                                <p class="michelinText">Michelin</p>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="restaurantDescription">This restaurant serves a mix of French and European cuisines.
                    The dishes and signature dishes are perfectly and freshly preprepared by chef Jozua Jaring.
                    It all started in 2013 and keep evolving until 2014 when they got awarded with a Michelin star.
                    In 2015 they move to a new location which is today’s Ratatouille with a better environment,
                    so the people can enjoy even more. Beside the amazing dishes, their wine makes it even better!
                </p>
                <button class="float-end"><b>Reserve</b></button>
            </div>
            <div class="col">
                <img src="/img/RatatouilleCoverImg.jpg" alt="">
            </div>
        </div>

        <div class="row mt-4">
            <div class="col">
                <img class="img-fluid" src="/img/RatatouilleImg1.jpg" alt="RatatouilleImg1">
            </div>
            <div class="col">
                <div class="container restaurantRow2Box">
                    <div class="row">
                        <h2><b>Details</b></h2>
                        <h3><b>Cuisine:</b><br>French and European <br><br>
                            <b>Type:</b><br>Fish and Seafood <br><br>
                            <b>Rating:</b><br>4
                        </h3>
                    </div>
                    <div class="row">
                        <h2><b>Prices</b></h2>
                        <ul>
                            <li>
                                <h3>45 per person</h3>
                            </li>
                            <li>
                                <h3>22,50 for children under 12 years old</h3>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="container restaurantRow2Box">
                    <h2><b>Contact and location</b></h2>
                    <div style="display: inline-block;">
                        <div style="display: inline-block;">
                            <img src="/img/RestaurantLocationIcon.png" alt="RestaurantLocationIcon">
                        </div>
                        <div style="display: inline-block;">
                            <p>Spaarne 96, 2011 CL Haarlem</p>
                        </div>
                    </div>
                    <div style="display: inline-block;">
                        <div style="display: inline-block;">
                            <img src="/img/RestaurantPhoneIcon.png" alt="RestaurantLocationIcon">
                        </div>
                        <div style="display: inline-block;">
                            <p>023 542 7270</p>
                        </div>
                    </div>

                    <div style="display: inline-block;">
                        <div style="display: inline-block;">
                            <img src="/img/RestaurantWebIcon.png" alt="RestaurantWebIcon">
                        </div>
                        <div style="display: inline-block;">
                            <img src="/img/RestaurantFacebookIcon.png" alt="RestaurantFacebookIcon">
                        </div>
                        <div style="display: inline-block;">
                            <img src="/img/RestaurantTwitterIcon.png" alt="RestaurantTwitterIcon">
                        </div>
                        <div style="display: inline-block;">
                            <img src="/img/RestaurantEmailIcon.png" alt="RestaurantEmailIcon">
                        </div>
                    </div>

                    <img class="img-fluid" src="/img/RatatouilleMap.jpg" alt="RatatouilleMap">
                </div>
            </div>
        </div>

        <div class="row personalProgramOffer">
            <div class="col-6">
                <p><b>Do you want to build your own personal program?</b></p>
            </div>
            <div class="col-2"></div>
            <div class="col-4"><button><b>Build your own personal program</b></button></div>
        </div>

        <div class="row">
            <div class="col-7">
                <img class="img-fluid" src="/img/RatatouilleImg2.jpg" alt="">
            </div>
            <div class="col">
                <div class="container restaurantReservationBox">
                    <h2><b>Reservation</b></h2>

                </div>
            </div>
        </div>
    </div>

    <?php
    include __DIR__ . '/../footer.php';
    ?>
</body>

</html>