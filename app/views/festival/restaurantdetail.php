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

        <form id="reservationForm">
            <div class="row">
                <div class="col-7">
                    <img class="img-fluid" src="/img/RatatouilleImg2.jpg" alt="">
                </div>

                <div class="col">
                    <div class="container" id="restaurantReservationBox">
                        <h2 class="d-flex justify-content-center"><b>Reservation</b></h2>

                        <div class="row">
                            <div class="col">
                                <h3><b>How many people?</b></h3>
                                <div class="form-group row reservationQuantityOfPoeple">
                                    <label for="amountAbove12" class="col-8 col-form-label">Above 12 years:</label>
                                    <div class="col-4">
                                        <input type="number" class="form-control" name="amountAbove12">
                                    </div>
                                </div>

                                <div class="form-group row reservationQuantityOfPoeple">
                                    <label for="amountUnderOr12" class="col-8 col-form-label">12 years or under:</label>
                                    <div class="col-4">
                                        <input type="number" class="form-control" name="amountUnderOr12">
                                    </div>
                                </div>

                                <h3><b>Available time:</b></h3>
                                <?php foreach ($sessions as $session) { ?>
                                    <input type="radio" id="session_<?= $session->getId() ?>" name="sessionId" value="<?= $session->getId() ?>">
                                    <label for="session_<?= $session->getId() ?>"><?= $session->getName() . ' at ' . $session->getStartTime()->format('H:i') . ' - ' . $session->getEndTime()->format('H:i') ?></label><br>
                                <?php } ?>
                            </div>

                            <div class="col ">
                                <h3><b>Choose a day:</b></h3>
                                <input type="radio" id="day_1" name="date" value="2022-07-27T00:00:00">
                                <label for="day_1">Thursday, 27th July</label><br>

                                <input type="radio" id="day_2" name="date" value="2022-07-28T00:00:00">
                                <label for="day_2">Friday, 28th July</label><br>

                                <input type="radio" id="day_3" name="date" value="2022-07-29T00:00:00">
                                <label for="day_3">Saturday, 29th July</label><br>

                                <input type="radio" id="day_4" name="date" value="2022-07-30T00:00:00">
                                <label for="day_4">Sunday, 30th July</label><br>

                                <input type="radio" id="day_5" name="date" value="2022-07-31T00:00:00">
                                <label for="day_5">Monday, 31st July</label>
                            </div>
                        </div>

                        <textarea name="comment" rows="5" cols="40" placeholder="Any special request or for example diets, allergies etc, can be written here..."></textarea><br>

                        <div class="text-center">
                            <p class="reservationExtraFeeText">**A fee of €10,- per person will be charged when a reservation is made on this site. This fee will be deducted from the final check on visiting the restaurant . ** </p>
                        </div>

                        <div class="d-flex justify-content-center"> <button id="addToCart"><b>Add to cart</b></button></div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <?php
    include __DIR__ . '/../footer.php';
    ?>
i
    <script>
        // document.getElementById("addToCart").addEventListener("click", function() {
        //     document.getElementById("reservationForm").submit();
        // });

        const restaurantId = <?= $restaurant->getId() ?>;

        document.querySelector("#addToCart").addEventListener("click", function(event) {
            event.preventDefault(); // prevent form from submitting

            const formData = new FormData(document.getElementById("reservationForm")); // get form data
            const reservationData = Object.fromEntries(formData.entries()); // convert form data to object

            reservationData.restaurantId = restaurantId;

            addToCart(reservationData);
        });


        function addToCart(reservationData) {
            fetch('http://localhost/api/cart/addToCart', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(reservationData)
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data)
                })
                .catch(error => {
                    console.error('Error adding item to cart:', error);
                });
        }
    </script>
</body>

</html>