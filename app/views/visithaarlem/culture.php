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
    </div>
    <img src="/img/CulturepageImg.png" alt="VisitHaarlemCulture1" id="VisitHaarlemCultureImg1">
    <div class="container">
        <div>
            <h4 id="cultureText1">
                What do you want to explore?
            </h4>
        </div>
    </div>
    <!--change to cultureBox later-->
    <div class="row" >
        <div class="col-md-4">
            <div class="MuseumBox">
                <img src="/img/MuseumBox.png" class="boxImg">
                <a href="/visithaarlem/museum" class="text-reset">
                    <img src="/img/mesumBoxV2.png" class="img-top" alt="museumBoxV2" class="boxImg">
                </a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="MuseumBox">
                <img src="/img/Theaterbox.png" class="boxImg">
                <a href="/visithaarlem/theatre" class="text-reset">
                    <img src="/img/theaterboxV2.png" class="img-top" alt="museumBoxV2" class="boxImg">
                </a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="MuseumBox">
                <img src="/img/Festivalbox.png" class="boxImg">
                <a href="/visithaarlem/festivalCulture" class="text-reset">
                    <img src="/img/festivalBoxV2.png" class="img-top" alt="museumBoxV2" class="boxImg">
                </a>
            </div>
        </div>
    </div>

    <div class="cardCulture">
        <br></br>
        <h2 class="col-md-12">Museum</h2>
        <div class="cardCulture1">
            <div class="row">
                <div class="col-md-6">
                    <img src="/img/CultureMuseumImg1.png" alt="CultureMuseumImg1">
                </div>
                <div class="col-md-6">
                    <h1>Verwey Museum Haarlem </h1>
                    <p>Haarlem’s most well known museum, Verwey showcases art and artifacts from Haarlem’s history.
                    </p>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <button type="button" class="buttonViewMore">View more museum</button>

    <div class="cardCulture2">
        <div class="row" style="transform: matrix(-1, 0, 0, 1, 0, 0);">
            <div class="col-md-6">
                <h1>Verwey Museum Haarlem </h1>
                <p>This classical windmill was build 1773 and rebuild it in 2002 because it was eaten by
                    fire.
                </p>
            </div>
            <div class="col-md-6">
                <img src="/img/CultureMuseumImg2.png" alt="CultureMuseumImg2">
            </div>
        </div>
    </div>

    <div class="cardCulture">
        <br></br>
        <h2 class="col-md-12">Theatre</h2>
        <div class="cardCulture1">
            <div class="row">
                <div class="col-md-6">
                    <img src="/img/CultureTheaterImg1.png" alt="CultureTheaterImg1">
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
    </div>
    <button type="button" class="buttonViewMore">View more museum</button>

    <div class="cardCulture2">
        <div class="row" style="transform: matrix(-1, 0, 0, 1, 0, 0);">
            <div class="col-md-6">
                <h1>Verwey Museum Haarlem </h1>
                <p>This classical windmill was build 1773 and rebuild it in 2002 because it was eaten by
                    fire.
                </p>
            </div>
            <div class="col-md-6">
                <img src="/img/CultureTheaterImg2.png" alt="CultureMuseumImg1">
            </div>
        </div>
    </div>
    <div class="cardCulture">
        <br></br>
        <h2 class="col-md-12">Festival</h2>
        <div class="cardCulture1">
            <div class="row">
                <div class="col-md-6">
                    <img src="/img/CultureFestival1Img.png" alt="CultureFestival1Img">
                </div>
                <div class="col-md-6">
                    <h1>Verwey Museum Haarlem </h1>
                    <p>Haarlem’s most well known museum, Verwey showcases art and artifacts from Haarlem’s history.
                    </p>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <button type="button" class="buttonViewMore">View more museum</button>
    <div class="cardCulture2">
        <div class="row" style="transform: matrix(-1, 0, 0, 1, 0, 0);">
            <div class="col-md-6">
                <h1>Verwey Museum Haarlem </h1>
                <p>This classical windmill was build 1773 and rebuild it in 2002 because it was eaten by
                    fire.
                </p>
            </div>
            <div class="col-md-6">
                <img src="/img/CultureFestival2Img.png" alt="CultureFestival1Img">
            </div>
        </div>
    </div>



























    <br></br>
    <br></br>
    <br></br>
    <?php
    include __DIR__ . '/../footer.php';
    ?>
</body>

</html>