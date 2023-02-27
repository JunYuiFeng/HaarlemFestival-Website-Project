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

    <div class="container">
        <div class="row foodPageTitle">
            <h1>Haarlem</h1><br>
            <h2>for food</h2>
        </div>

        <div class="row foodpageWelcomeSection">
            <img src="/img/VisitHaarlemFood1.jpg" alt="VisitHaarlemFood1">
            <div class="container foodPageMsgBox">
                    <p><b>In Haarlem food can be found anywhere: in the streets, in a corner, in a church or in a factory.
                        You can decide if you want to eat something simple, delicious and cheap or something extraordinary in a very fancy restaurant.
                        The food is so authentic that you can taste the flavour of the history and the culture make Haarlem so special and unique.</b> </p>
            </div>
        </div>

        <div class="row">
            <div class="col-6"></div>
            <div class="col-3">
                <img class="float-end" src="/img/VisitHaarlemFood_Fries.jpg" alt="VisitHaarlemFood_Fries" id="FoodIntroSubImage" width="80%">
            </div>
            <div class="col-3">
                <img class="float-end" src="/img/VisitHaarlemFood_Haring.jpg" alt="VisitHaarlemFood_Haring" id="FoodIntroSubImage" width="80%">
            </div>
        </div>
    </div>

    <div class="row foodPageParagraph1">
        <div class="container">
            <p>Haarlem is a Dutch city known for its rich history and vibrant culture.
                The city is home to a wide variety of restaurants and cafes, offering a range of cuisines, from traditional Dutch dishes to international favourites.
                One of the city's most popular dining destinations is the Grote Markt, or Great Market, where visitors can sample fresh local produce and try delicious food from a variety of vendors.
                Haarlem is also home to several Michelin-starred restaurants, offering fine dining experiences for those looking for something truly special.
                <br><br>
                Whether you're a foodie looking for the latest culinary trends or a local looking for a cozy spot to enjoy a meal, Haarlem has something for everyone.
            </p>
        </div>
    </div>

    <div class="container restaurantsSection">
        <h1>Restaurants</h1>
        <button class="btn default"><h3><b>Sort by</b>  <i class="fa-sharp fa-solid fa-chevron-down"></i></h3></button>
        <div class="row restaurant">
            <div class="col-6">
                <div class="card restaurantLeft">
                    <img src="/img/RatatouilleCoverImg.jpg" alt="RatatouilleCoverImg">
                    <div class="card-body">
                        <h2>Ratatouille</h2>
                        <p>This restaurant serves a mix of French and European cuisines.
                            The dishes and signature dishes are perfectly and freshly preprepared by chef Jozua Jaring.
                            It all started in 2013 and keep evolving until 2014 when they got awarded with a Michelin star.
                            In 2015 they move to a new location which is today’s Ratatouille with a better environment,
                            so the people can enjoy even more. Beside the amazing dishes, their wine makes it even better! </p>
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
                <div class="card restaurantRight">
                    <img src="/img/TroujoursCoverImg.jpg" alt="">
                    <div class="card-body">
                        <h2>Urban Frenchy Bistro Toujours</h2>
                        <p>This restaurant serves a mix of French and European cuisines.
                            The dishes and signature dishes are perfectly and freshly preprepared by chef Jozua Jaring.
                            It all started in 2013 and keep evolving until 2014 when they got awarded with a Michelin star.
                            In 2015 they move to a new location which is today’s Ratatouille with a better environment,
                            so the people can enjoy even more. Beside the amazing dishes, their wine makes it even better! </p>
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
                    <img src="/img/SpecktakelCoverImg.jpg" alt="">
                    <div class="card-body">
                        <h2>Specktakel</h2>
                        <p>This restaurant serves a mix of French and European cuisines.
                            The dishes and signature dishes are perfectly and freshly preprepared by chef Jozua Jaring.
                            It all started in 2013 and keep evolving until 2014 when they got awarded with a Michelin star.
                            In 2015 they move to a new location which is today’s Ratatouille with a better environment,
                            so the people can enjoy even more. Beside the amazing dishes, their wine makes it even better! </p>
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
                <div class="card restaurantRight">
                    <img src="/img/GrandCafeBrinkmanCoverImg.jpg" alt="">
                    <div class="card-body">
                        <h2>Grand Cafe Brinkman</h2>
                        <p>This restaurant serves a mix of French and European cuisines.
                            The dishes and signature dishes are perfectly and freshly preprepared by chef Jozua Jaring.
                            It all started in 2013 and keep evolving until 2014 when they got awarded with a Michelin star.
                            In 2015 they move to a new location which is today’s Ratatouille with a better environment,
                            so the people can enjoy even more. Beside the amazing dishes, their wine makes it even better! </p>
                        <p><b>Address</b>: Spaarne 96, 2011 CL Haarlem <br>
                            <b>Phone</b>: 023 542 7270 <br>
                            <b>Website</b>: <a href="https://ratatouillefoodandwine.nl">https://ratatouillefoodandwine.nl</a> <br>
                            <b>Price range</b>: €‎€‎€‎€‎<br>
                            <b>Opening hours</b>
                        </p>
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