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

<body id="danceBody">

    <?php
    include __DIR__ . '/../header.php';
    ?>

    <img src="/img/DanceHomeLine.png" id="danceHomeLine">
    <div>
        <h3 class="danceHomeNameArtist" id="danceHomeNameArtist1">Nicky Romero</h3>
        <h3 class="danceHomeNameArtist" id="danceHomeNameArtist2">Hardwel</h3>
        <h3 class="danceHomeNameArtist" id="danceHomeNameArtist3">Martin Garrix</h3>
        <h3 class="danceHomeNameArtist" id="danceHomeNameArtist4">Armin van Buuren</h3>
        <h3 class="danceHomeNameArtist" id="danceHomeNameArtist5">Tiësto</h3>
        <h3 class="danceHomeNameArtist" id="danceHomeNameArtist6">Afrojack</h3>
        <img src="/img/DanceHomeimg1.png" alt="DanceHomeimg1" id="danceHomeimg1">
    </div>

    <div class="row" id="dancePersonalProrgam">
        <div class="col-6">
            Do you want to build your own personal program?
        </div>
        <div class="col-3">
            <span class="personalProgramArrow">
                <link href='https://unpkg.com/css.gg@2.0.0/icons/css/arrow-long-right.css' rel='stylesheet'>
            </span>
        </div>
        <div class="col-3">
            <button type="button" id="dancePersonalProgramButton">Build own personal prorgam</button>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-5 align-self-center" id="danceCard1">
            <div class="danceCardType1">
                <h3 class="danceHomeNameArtistCard" style="">
                    Martin Garrix
                </h3>
                <div class="row">
                    <div class="col-6">
                        <div class="">
                            <p>dance / electronic</p>
                            <br></br>
                            <p>animal</p>
                            <p>in the name of love</p>
                            <p>high on life</p>
                        </div>
                        <img src="/img/DanceDemoMartin1.png" class="danceDemoMartin1">
                    </div>
                    <div class="col-6 justify-content-center">
                        <img src="/img/DanceArtist1.png">
                        <div class="col-12">
                            <br></br>
                            <p class="danceCardLine">
                                0
                            </p>
                        </div>
                        <input type="button" onclick="location.href='dancedetailedpage1'" class="danceViewMore" value=" view more">

                    </div>
                </div>
            </div>
        </div>
        <div class="col-5 align-self-center" id="danceCard1">
            <div class="danceCardType1">
                <h3 class="danceHomeNameArtistCard" style="">
                    Martin Garrix
                </h3>
                <div class="row">
                    <div class="col-6">
                        <div class="">
                            <p>dance / electronic</p>
                            <br></br>
                            <p>animal</p>
                            <p>in the name of love</p>
                            <p>high on life</p>
                        </div>
                        <img src="/img/DanceDemoMartin1.png" class="danceDemoMartin1">
                    </div>
                    <div class="col-6">
                        <img src="/img/DanceArtist2.png">
                        <div class="col-12">
                            <br></br>
                            <p class="danceCardLine">
                                0
                            </p>
                        </div>
                        <p>
                            <button type="button" class="danceViewMore">view more</button>
                        </p>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="danceCardType2">
                <h4>
                    Hardwel
                </h4>
                <img src="/img/DanceArtist3.png">
                <p>
                    dance and house
                </p>
                <br>
                <p>Apollo</p>
                <p>Bella Ciao</p>
                <p>Spaceman</p>
            </div>
        </div>
        <div class="col-3">
            <div class="danceCardType2">
                <h4>
                    Hardwel
                </h4>
                <img src="/img/DanceArtist4.png">
                <p>
                    dance and house
                </p>
                <br>
                <p>Apollo</p>
                <p>Bella Ciao</p>
                <p>Spaceman</p>
            </div>
        </div>
        <div class="col-3">
            <div class="danceCardType2">
                <h4>
                    Hardwel
                </h4>
                <img src="/img/DanceArtist5.png">
                <p>
                    dance and house
                </p>
                <br>
                <p>Apollo</p>
                <p>Bella Ciao</p>
                <p>Spaceman</p>
            </div>
        </div>
        <div class="col-3">
            <div class="danceCardType2">
                <h4>
                    Hardwel
                </h4>
                <img src="/img/DanceArtist6.png">
                <p>
                    dance and house
                </p>
                <br>
                <p>Apollo</p>
                <p>Bella Ciao</p>
                <p>Spaceman</p>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">

        <div class="d-flex justify-content-around">
            <button type="button" id="danceAllAccessPass"> Buy ticket for all-access pass for Friday, Saturday, Sunday:
                €250,00</button>
        </div>
        <div class="col-4 d-flex justify-content-around">
            <button type="button" class="danceDailyAccessPass"> Buy all-access pass only for 1st day €125,00</button>
        </div>
        <div class="col-4 d-flex justify-content-around">
            <button type="button" class="danceDailyAccessPass"> Buy all-access pass only for 2nd day €150,00</button>
        </div>
        <div class="col-4 d-flex justify-content-around">
            <button type="button" class="danceDailyAccessPass"> Buy all-access pass only for 3rd day €150,00</button>
        </div>
    </div>
    <div>

    </div>
    <div class="container">
        <div class="danceTableContent">
            <h2>
                27 July
            </h2>
            <div id="danceTableContentDay1">

                <div class="col-10">
                    <table>
                        <tr>
                            <th>Day</th>
                            <th>Time</th>
                            <th>Venue</th>
                            <th>Artist</th>
                            <th>Ticket available</th>
                            <th>Price</th>
                        </tr>
                        <tr>
                            <td>Friday</td>
                            <td>20:00 - 02:00</td>
                            <td>Lichtfariek</td>
                            <td>Nicky Romero / Afrojack</td>
                            <td>>1500</td>
                            <td>&#8364; 75,00</td>
                        </tr>
                        <tr>
                            <td>Friday</td>
                            <td>20:00 - 02:00</td>
                            <td>Lichtfariek</td>
                            <td>Nicky Romero / Afrojack</td>
                            <td>>1500</td>
                            <td>&#8364; 75,00</td>
                        </tr>
                        <tr>
                            <td>Friday</td>
                            <td>20:00 - 02:00</td>

                            <td>Lichtfariek</td>
                            <td>Nicky Romero / Afrojack</td>
                            <td>>1500</td>
                            <td>&#8364; 75,00</td>
                        </tr>
                        <tr>
                            <td>Friday</td>
                            <td>20:00 - 02:00</td>
                            <td>Lichtfariek</td>
                            <td>Nicky Romero / Afrojack</td>
                            <td>>1500</td>
                            <td>&#8364; 75,00</td>
                        </tr>
                        <tr>
                            <td>Friday</td>
                            <td>20:00 - 02:00</td>
                            <td>Lichtfariek</td>
                            <td>Nicky Romero / Afrojack</td>
                            <td>>1500</td>
                            <td>&#8364; 75,00</td>
                        </tr>
                    </table>
                    <div class="row">
                        <div class="col-4">

                        </div>
                        <div class="col-4">
                            <button type="button" class="danceTableContentButton">Add to cart</button>
                        </div>
                        <div class="col-4">

                            <button type="button" class="danceTableContentButton">Buy all-access pass for 27th of
                                July &#8364; 125,00
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-cart" viewBox="0 0 16 16">
                                    <path
                                        d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="container">
        <div class="danceTableContent">
            <h2>
                27 July
            </h2>
            <div id="danceTableContentDay1">

                <div class="col-10">
                    <table>
                        <tr>
                            <th>Day</th>
                            <th>Time</th>
                            <th>Venue</th>
                            <th>Artist</th>
                            <th>Ticket available</th>
                            <th>Price</th>
                        </tr>
                        <tr>
                            <td>Friday</td>
                            <td>20:00 - 02:00</td>
                            <td>Lichtfariek</td>
                            <td>Nicky Romero / Afrojack</td>
                            <td>>1500</td>
                            <td>&#8364; 75,00</td>
                        </tr>
                        <tr>
                            <td>Friday</td>
                            <td>20:00 - 02:00</td>
                            <td>Lichtfariek</td>
                            <td>Nicky Romero / Afrojack</td>
                            <td>>1500</td>
                            <td>&#8364; 75,00</td>
                        </tr>
                        <tr>
                            <td>Friday</td>
                            <td>20:00 - 02:00</td>

                            <td>Lichtfariek</td>
                            <td>Nicky Romero / Afrojack</td>
                            <td>>1500</td>
                            <td>&#8364; 75,00</td>
                        </tr>
                        <tr>
                            <td>Friday</td>
                            <td>20:00 - 02:00</td>
                            <td>Lichtfariek</td>
                            <td>Nicky Romero / Afrojack</td>
                            <td>>1500</td>
                            <td>&#8364; 75,00</td>
                        </tr>
                        <tr>
                            <td>Friday</td>
                            <td>20:00 - 02:00</td>
                            <td>Lichtfariek</td>
                            <td>Nicky Romero / Afrojack</td>
                            <td>>1500</td>
                            <td>&#8364; 75,00</td>
                        </tr>
                    </table>
                    <div class="row">
                        <div class="col-4">

                        </div>
                        <div class="col-4">
                            <button type="button" class="danceTableContentButton">Add to cart</button>
                        </div>
                        <div class="col-4">

                            <button type="button" class="danceTableContentButton">Buy all-access pass for 27th of
                                July &#8364; 125,00
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-cart" viewBox="0 0 16 16">
                                    <path
                                        d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="container">
        <div class="danceTableContent">
            <h2>
                27 July
            </h2>
            <div id="danceTableContentDay1">

                <div class="col-10">
                    <table>
                        <tr>
                            <th>Day</th>
                            <th>Time</th>
                            <th>Venue</th>
                            <th>Artist</th>
                            <th>Ticket available</th>
                            <th>Price</th>
                        </tr>
                        <tr>
                            <td>Friday</td>
                            <td>20:00 - 02:00</td>
                            <td>Lichtfariek</td>
                            <td>Nicky Romero / Afrojack</td>
                            <td>>1500</td>
                            <td>&#8364; 75,00</td>
                        </tr>
                        <tr>
                            <td>Friday</td>
                            <td>20:00 - 02:00</td>
                            <td>Lichtfariek</td>
                            <td>Nicky Romero / Afrojack</td>
                            <td>>1500</td>
                            <td>&#8364; 75,00</td>
                        </tr>
                        <tr>
                            <td>Friday</td>
                            <td>20:00 - 02:00</td>

                            <td>Lichtfariek</td>
                            <td>Nicky Romero / Afrojack</td>
                            <td>>1500</td>
                            <td>&#8364; 75,00</td>
                        </tr>
                        <tr>
                            <td>Friday</td>
                            <td>20:00 - 02:00</td>
                            <td>Lichtfariek</td>
                            <td>Nicky Romero / Afrojack</td>
                            <td>>1500</td>
                            <td>&#8364; 75,00</td>
                        </tr>
                        <tr>
                            <td>Friday</td>
                            <td>20:00 - 02:00</td>
                            <td>Lichtfariek</td>
                            <td>Nicky Romero / Afrojack</td>
                            <td>>1500</td>
                            <td>&#8364; 75,00</td>
                        </tr>
                    </table>
                    <div class="row">
                        <div class="col-4">

                        </div>
                        <div class="col-4">
                            <button type="button" class="danceTableContentButton">Add to cart</button>
                        </div>
                        <div class="col-4">

                            <button type="button" class="danceTableContentButton">Buy all-access pass for 27th of
                                July &#8364; 125,00
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-cart" viewBox="0 0 16 16">
                                    <path
                                        d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div id="danceVanueCard">
            <div class="row">
                <div class="col-2">
                    <div class="danceVanueType1">
                        <div class="danceVanue">
                            <h4>
                                Club Stalker
                            </h4>
                            <lael>
                                Kromme Elleboogsteeg 20,2011 TS Haarlem
                            </lael>
                        </div>
                        <div>
                            <img src="/img/DanceVanueImg1.png" class="danceVanueImg">
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="danceVanueType2">
                        <div class="danceVanue">
                            <h4>
                                Club Stalker
                            </h4>
                            <lael>
                                Kromme Elleboogsteeg 20,2011 TS Haarlem
                            </lael>
                        </div>
                        <div>
                            <img src="/img/DanceVanueImg1.png" class="danceVanueImg">
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="danceVanueType1">
                        <div class="danceVanue">
                            <h4>
                                Club Stalker
                            </h4>
                            <lael>
                                Kromme Elleboogsteeg 20,2011 TS Haarlem
                            </lael>
                        </div>
                        <div>
                            <img src="/img/DanceVanueImg1.png" class="danceVanueImg">
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="danceVanueType2">
                        <div class="danceVanue">
                            <h4>
                                Club Stalker
                            </h4>
                            <lael>
                                Kromme Elleboogsteeg 20,2011 TS Haarlem
                            </lael>
                        </div>
                        <div>
                            <img src="/img/DanceVanueImg1.png" class="danceVanueImg">
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="danceVanueType1">
                        <div class="danceVanue">
                            <h4>
                                Club Stalker
                            </h4>
                            <lael>
                                Kromme Elleboogsteeg 20,2011 TS Haarlem
                            </lael>
                        </div>
                        <div>
                            <img src="/img/DanceVanueImg1.png" class="danceVanueImg">
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="danceVanueType2">
                        <div class="danceVanue">
                            <h4>
                                Club Stalker
                            </h4>
                            <lael>
                                Kromme Elleboogsteeg 20,2011 TS Haarlem
                            </lael>
                        </div>
                        <div>
                            <img src="/img/DanceVanueImg1.png" class="danceVanueImg">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>
    <br>


    <?php
    include __DIR__ . '/../footer.php';
    ?>

</body>

</html>