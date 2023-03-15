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
            <div class="col-5 descriptionSection">
                <div class="row">
                    <div class="col">
                        <h1><b><?= $restaurant->getName() ?></b></h1>
                    </div>

                    <?php if ($restaurant->getHasMichelin() == true) : ?>
                        <div class="col">
                            <div class="float-end michelinLabel">
                                <span><img class="michelinLogo" src="/img/MichelineLogo.png" alt="MichelineLogo"></span>
                                <span>
                                    <p class="michelinText">Michelin</p>
                                </span>
                            </div>
                        </div>
                    <?php endif; ?>

                </div>
                <p class="restaurantDescription"><?= $restaurant->getDescription() ?></p>
                <button class="float-end" onclick="location.href='#restaurantReservationBox'"><b>Reserve</b></button>
            </div>
            <div class="col-7 colCoverImg">
                <img class="coverImg float-end" src="/img/<?= $restaurant->getCoverImg() ?>" alt="">
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
                        <h3><b>Cuisine:</b><br><?= $restaurant->getCuisine() ?> <br><br>
                            <b>Type:</b><br> <?= $restaurant->getFoodType() ?> <br><br>
                            <b>Rating:</b><br><?php for ($i = 0; $i < $restaurant->getRating(); $i++) {
                                                    echo '<span class="star">&#9733;</span>';
                                                } ?>
                        </h3>
                    </div>
                    <div class="row">
                        <h2><b>Prices</b></h2>
                        <ul>
                            <li>
                                <h3><?= '€' . number_format($restaurant->getPriceAboveAge12(), 2, '.', '') . ' per person' ?></h3>
                            </li>
                            <li>
                                <h3><?= '€' . number_format($restaurant->getPriceAge12AndUnder(), 2, '.', '') . ' for children under 12 years old' ?></h3>
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
                            <img class="icon" src="/img/RestaurantLocationIcon.svg" alt="RestaurantLocationIcon" width="75%">
                        </div>
                        <div style="display: inline-block;">
                            <p><?= $restaurant->getAddress() ?></p>
                        </div>
                    </div>
                    <div style="display: inline-block;">
                        <div style="display: inline-block;">
                            <img class="icon" src="/img/RestaurantPhoneIcon.svg" alt="RestaurantLocationIcon" width="75%">
                        </div>
                        <div style="display: inline-block;">
                            <p><?= $restaurant->getPhoneNumber() ?></p>
                        </div>
                    </div><br>

                    <div style="display: inline-block;">
                        <div style="display: inline-block;">
                            <img class="icon" src="/img/RestaurantWebIcon.svg" alt="RestaurantWebIcon" width="75%">
                        </div>
                        <div style="display: inline-block;">
                            <img class="icon" src="/img/RestaurantFacebookIcon.svg" alt="RestaurantFacebookIcon" width="75%">
                        </div>
                        <div style="display: inline-block;">
                            <img class="icon" src="/img/RestaurantTwitterIcon.svg" alt="RestaurantTwitterIcon" width="75%">
                        </div>
                        <div style="display: inline-block;">
                            <img src="/img/RestaurantEmailIcon.svg" alt="RestaurantEmailIcon" width="80%">
                        </div>
                    </div>

                    <img class="img-fluid restaurantMap" src="/img/RatatouilleMap.jpg" alt="RatatouilleMap">
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
                <div class="container" id="restaurantReservationBox">
                    <h2 class="d-flex justify-content-center"><b>Reservation</b></h2>

                    <div class="row">
                        <div class="col">
                            <h3><b>How many poeple?</b></h3>
                            <label for="quantity">Above 12 years:</label>
                            <input type="number" id="quantity" name="quantity">
                            <label for="quantity">12 years or under:</label>
                            <input type="number" id="quantity" name="quantity">

                            <h3><b>Available time:</b></h3>
                            <div>
                                <input type="checkbox" id="option1" name="options" value="option1">
                                <label for="option1"><?php foreach ($sessions as $session) {
                                                            if ($session->getName() == 'Session 1') {
                                                                echo $session->getName() . ' at ' . $session->getStartTime()->format('H:i') . ' - ' . $session->getEndTime()->format('H:i');
                                                            }
                                                        }
                                                        ?></label>
                            </div>
                            <div>
                                <input type="checkbox" class="btn-check" name="options" id="check1" autocomplete="off" checked>
                                <label class="btn-outline-primary" for="check1">Session 2 at 19:15 - 21:15</label>
                            </div>
                            <div>
                                <input type="checkbox" id="option3" name="options" value="option3">
                                <label for="option3">Session 3 at 21:30 - 23:30</label>
                            </div>
                        </div>
                        <div class="col ">
                            <h3><b>Choose a day:</b></h3>
                            <button type="button" class="btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off">
                                Saturday 28th July
                            </button>
                            <button type="button" class="btn btn-primary btn-xs" data-toggle="button" aria-pressed="false" autocomplete="off">
                                Saturday 28th July
                            </button>
                            <div>
                                <input type="checkbox" id="option2" name="options" value="option2">
                                <label for="option2">Saturday 28th July</label>
                            </div>
                            <div>
                                <input type="checkbox" id="option3" name="options" value="option3">
                                <label for="option3">Friday 29th July</label>
                            </div>
                            <div>
                                <input type="checkbox" id="option3" name="options" value="option3">
                                <label for="option3">Sunday, 30th July</label>
                            </div>
                            <div>
                                <input type="checkbox" id="option3" name="options" value="option3">
                                <label for="option3">Monday 31st July</label>
                            </div>
                        </div>
                    </div>

                    <textarea rows="5" cols="40" name="message" placeholder="Any special request or for example diets, allergies etc, can be written here..."></textarea>
                    <div class="text-center">
                        <p class="reservationExtraFeeText">**A fee of €10,- per person will be charged when a reservation is made on this site. This fee will be deducted from the final check on visiting the restaurant . ** </p>
                    </div>
                    <div class="d-flex justify-content-center"> <button class="addToCart"><b>Add to cart</b></button></div>
                </div>
            </div>
        </div>
    </div>

    <?php
    include __DIR__ . '/../footer.php';
    ?>
</body>

</html>