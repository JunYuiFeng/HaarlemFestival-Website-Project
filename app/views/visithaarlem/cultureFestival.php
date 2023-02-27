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
            <h4 id="header">Festival</h4>
        </div>
        <img src="/img/CultureFestivalImg3.png" alt="VisitHaarlemCulture1" id="VisitHaarlemMuseumImg1">
        <div class="row">
            <div class="col-md-12">
                <div class="MuseumBoxDetailedPage">
                    <img src="/img/MuseumBox.png" alt="VisitHaarlemFood_Fries" class="boxImgDetailedPage">
                    <a href="/visithaarlem/museum" class="text-reset">
                        <img src="/img/mesumBoxV2.png" class="img-topDetailPage" alt="museumBoxV2">
                    </a>
                </div>
            </div>
            <div class="col-md-12">
                <div class="MuseumBoxDetailedPage" class="col-md-4">
                    <img src="/img/Theaterbox.png" alt="VisitHaarlemFood_Fries" class="boxImgDetailedPage">
                    <a href="/visithaarlem/theatre" class="text-reset">
                        <img src="/img/theaterboxV2.png" class="img-topDetailPage" alt="museumBoxV2" >
                    </a>
                </div>
            </div>
            <div class="col-md-12">
                <div class="MuseumBoxDetailedPage" class="col-md-4">
                    <img src="/img/Festivalbox.png" alt="VisitHaarlemFood_Haring" class="boxImgDetailedPage">
                    <a href="/visithaarlem/cultureFestival" class="text-reset">
                        <img src="/img/festivalBoxV2.png" class="img-topDetailPage" alt="museumBoxV2">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <h2>Festival</h2>
        <div class="row">
            <div class="col-6">
                <div class="card" id="museumCart">
                    <img src="/img/CultureFestival1Img.png" alt="CultureMuseumImg1">
                    <div class="card-body">
                        <h1>Verwey Museum Haarlem</h1>
                        <p>Haarlem’s most well known museum, Verwey showcases art and artifacts from Haarlem’s history.
                        <p><b>Address</b>: Groot Heiligland 47, 2011 EP Haarlem <br>
                            <b>Phone</b>:023 542 2427 <br>
                            <b>Website</b>: <a
                                href="https://museumhaarlem.nl/">https://ratatouillefoodandwine.nl</a><br>

                        </p>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card" id="museumCart">
                    <img src="/img/CultureFestival2Img.png" alt="CultureMuseumImg1">
                    <div class="card-body">
                        <h1>Windmill De Adriaan</h1>
                        <p>
                            This classical windmill was build 1773 and rebuild it in 2002 because it was eaten by
                            fire.
                        </p>
                        <p><b>Address</b>: Papentorenvest 1A, 2011 AV Haarlem <br>
                            <b>Phone</b>:023 545 0259<br>
                            <b>Website</b>: <a
                                href="https://www.molenadriaan.nl/nl/">https://www.molenadriaan.nl/nl/</a><br>

                        </p>
                    </div>
                </div>
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