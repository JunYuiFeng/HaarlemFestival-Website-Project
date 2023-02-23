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

    <div class="container">
        <div class="row foodPageTitle">
            <h1>Yummie!</h1><br>
            <h2>Food event</h2>
        </div>
    </div>

    <div class="row yummieWelcomeRow">
        <img src="/img/YummieWelcomeImg.jpg" alt="YummieWelcomeImg">
        <div class="container yummieWelcomeParagraph">
            <h1 class="d-flex justify-content-center">Welcome</h1><br>
            <p class="d-flex justify-content-center">Welcome to this Yummie! food event.
                This event would last 5 days, from the 27th of July till the 31st of July.
                During the event there will be 7 amazing restaurants that is participating.
                Each restaurant varying from different cuisine, type of food, amount of session per day,
                a duration of a session, rating stars, pricing, and amount of seats.
                That means during this event there will be a limited amount of seats per day so don’t forget to reserve your table!</p>
        </div>
    </div>

    <div class="container foodEvent">
        <div class="title">
            <h1 class="d-flex justify-content-center"><b>Food events</b></h1>
            <h3 class="d-flex justify-content-center"><b>27 July - 31 July </b></h3>
        </div>
        <div class="row personalProgramOffer">
            <div class="col-6"><p><b>Do you want to build your own personal program?</b></p></div>
            <div class="col-2"></div>
            <div class="col-4"><button><b>Build your own personal program</b></button></div>
        </div>

        <div class="row">
            <div class="col-6">
            <div class="card restaurantLeft">
                    <img src="/img/RatatouilleCoverImg.jpg" alt="">
                    <div class="card-body">
                        <h2>Ratatouille</h2>
                        <p><b>Address</b>: Spaarne 96, 2011 CL Haarlem <br>
                            <b>Phone</b>: 023 542 7270 <br>
                            <b>Website</b>: <a href="https://ratatouillefoodandwine.nl">https://ratatouillefoodandwine.nl</a> <br>
                            <b>Price range</b>: €‎€‎€‎€‎<br>
                            <b>Opening hours</b>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-6">
            <div class="card restaurantLeft">
                    <img src="/img/TroujoursCoverImg.jpg" alt="">
                    <div class="card-body">
                        <h2>Urban Frenchy Bistro Toujours</h2>
                        <p><b>Cuisine</b>: Spaarne 96, 2011 CL Haarlem <br>
                            <b>Type</b>: 023 542 7270 <br>
                            <b>Session duration</b>: <a href="https://ratatouillefoodandwine.nl">https://ratatouillefoodandwine.nl</a> <br>
                            <b>Price</b>: €‎€‎€‎€‎<br>
                            <b>Rating</b>: 
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>