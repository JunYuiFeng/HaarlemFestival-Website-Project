<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/style.css" />
</head>

<body>
    <?php
    include __DIR__ . '/../header.php';
    ?>

    <div class="container">
        <div class="row">
            <h1 id="header">Haarlem</h1><br>
            <h3 id="header">for culture</h3>
        </div>
        <img src="/img/CulturepageImg.png" alt="VisitHaarlemCulture1" id="VisitHaarlemCultureImg1">
        <div>
            <h4 id="cultureText1">
                What do you want to explore?
            </h4>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="MuseumBox" class="col-md-4">
                    <img src="/img/MuseumBox.png" alt="VisitHaarlemFood_Fries">
                    <img src="/img/mesumBoxV2.png" class="img-top" alt="museumBoxV2">
                </div>
            </div>
            <div class="col-md-4">
                <div class="MuseumBox" class="col-md-4">
                    <img src="/img/Theaterbox.png" alt="VisitHaarlemFood_Fries" class="CultureSubMenu">
                    <img src="/img/theaterboxV2.png" class="img-top" alt="museumBoxV2">
                </div>
            </div>
            <div class="col-md-4">
                <div class="MuseumBox" class="col-md-4">
                    <img src="/img/Festivalbox.png" alt="VisitHaarlemFood_Haring" class="CultureSubMenu">
                    <img src="/img/festivalBoxV2.png" class="img-top" alt="museumBoxV2">
                </div>
            </div>
        </div>

        <div class="row">
        </div>
    </div>
    <div id="Culturebody">
        <h2>Museum</h2>
        <div class="container" class="cardCulture" style="background: linear-gradient(96.95deg, #620011 12.24%, #2E0B1F 80.77%);
box-shadow: 0px 52px 54px 2px rgba(0, 0, 0, 0.11);color:white; line-height: 200%; ">
            <div class="row">
                <div class="col-md-6">
                    <img src="/img/CultureMuseumImg1.png" alt="CultureMuseumImg1">
                </div>
                <div class="col-md-6">
                    <h1>Verwey Museum Haarlem </h1>
                    <p>Haarlem’s most well known museum, Verwey showcases art and artifacts from Haarlem’s history.
                    </p>
                    <p><b>Address</b>: Spaarne 96, 2011 CL Haarlem <br>
                        <b>Phone</b>: 023 542 7270 <br>
                        <b>Website</b>: <a
                            href="https://ratatouillefoodandwine.nl">https://ratatouillefoodandwine.nl</a>
                        <br>
                        <b>Price range</b>: €‎€‎€‎€‎<br>
                        <b>Opening hours</b>
                    </p>
                </div>
            </div>
        </div>
        
        <button type="button" id="buttonViewMoreMuseum">View more museum</button>

        <div class="container" class="cardCulture" style="background: linear-gradient(96.95deg, #620011 12.24%, #2E0B1F 80.77%);
box-shadow: 0px 52px 54px 2px rgba(0, 0, 0, 0.11);transform: matrix(-1, 0, 0, 1, 0, 0); color:white; line-height: 200%;">
            <div class="row" style="transform: matrix(-1, 0, 0, 1, 0, 0);">
                <div class="col-md-6">
                    <h1>Verwey Museum Haarlem </h1>
                    <p style="">Haarlem’s most well known museum, Verwey showcases art and artifacts from Haarlem’s history.
                    </p>
                    <p><b>Address</b>: Spaarne 96, 2011 CL Haarlem <br>
                        <b>Phone</b>: 023 542 7270 <br>
                        <b>Website</b>: <a
                            href="https://ratatouillefoodandwine.nl">https://ratatouillefoodandwine.nl</a>
                        <br>
                        <b>Price range</b>: €‎€‎€‎€‎<br>
                        <b>Opening hours</b>
                    </p>
                </div>
                <div class="col-md-6">

                    <img src="/img/CultureMuseumImg1.png" alt="CultureMuseumImg1">
                </div>
            </div>
        </div>

    </div>
    <?php
    include __DIR__ . '/../footer.php';
    ?>
</body>

</html>