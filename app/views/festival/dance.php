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
        <?php $count = 1;
        foreach ($artists as $artist) {
            ?>
            <h1 class="danceHomeNameArtist" id="danceHomeNameArtist<?= $count ?>">
                <?= $artist->getArtist() ?>
            </h1>
            <?php
            $count++;
        } ?>

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

        <?php
        $count = 1;
        foreach ($artists as $artist) {
            if ($artist->getArtist() != "Martin Garrix" && $artist->getArtist() != "Afrojack") {
                continue;
            }
            ?>
            <div class="col-5 align-self-center" id="danceCard1">
                <div class="danceCardType1">
                    <h3 class="danceHomeNameArtistCard" style="">
                        <?= $artist->getArtist() ?>
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
                            <img src="/img/DanceArtist<?= $count ?>.png">
                            <div class="col-12">
                                <br></br>
                                <p class="danceCardLine">
                                    0
                                </p>
                            </div>
                            <input type="button" onclick="location.href='dancedetailedpage1'" class="danceViewMore"
                                value=" view more">

                        </div>
                    </div>
                </div>
            </div>
            <?php
            $count++;
        }
        $count = 3;
        foreach ($artists as $artist) {
            if ($artist->getArtist() == "Martin Garrix" || $artist->getArtist() == "Afrojack") {
                continue;
            } ?>
            <div class="col-3">
                <div class="danceCardType2">
                    <h4>
                        <?= $artist->getArtist() ?>
                    </h4>
                    <img src="/img/DanceArtist<?= $count ?>.png">
                    <p>
                        dance and house
                    </p>
                    <br>
                    <p>Apollo</p>
                    <p>Bella Ciao</p>
                    <p>Spaceman</p>
                </div>
            </div>
            <?
            $count++;
        } ?>


        <div class="row justify-content-center">

            <div class="d-flex justify-content-around">
                <button type="button" id="danceAllAccessPass"> Buy ticket for all-access pass for Friday, Saturday,
                    Sunday:
                    €250,00</button>
            </div>
            <div class="col-4 d-flex justify-content-around">
                <button type="button" class="danceDailyAccessPass"> Buy all-access pass only for 1st day
                    €125,00</button>
            </div>
            <div class="col-4 d-flex justify-content-around">
                <button type="button" class="danceDailyAccessPass"> Buy all-access pass only for 2nd day
                    €150,00</button>
            </div>
            <div class="col-4 d-flex justify-content-around">
                <button type="button" class="danceDailyAccessPass"> Buy all-access pass only for 3rd day
                    €150,00</button>
            </div>
        </div>
        <div>

        </div>
        <div class="container">
            <div class="danceTableContent">
                <h2>
                    27 Jul
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
                                <?php
                                foreach ($dancesByDate27Jul as $danceByDate27Jul) { ?>
                                    <td>
                                        <?= $danceByDate27Jul->getDay() ?>
                                    </td>
                                    <td>
                                        <?php
                                        $time = DateTime::createFromFormat('H:i:s.u', $danceByDate27Jul->getTime());
                                        echo $formatted_time = $time->format('H:i');
                                        ?>
                                    </td>
                                    <td>
                                        <?= $danceByDate27Jul->getVanue() ?>
                                    </td>
                                    <td>
                                        <?= $danceByDate27Jul->getArtist() ?>
                                    </td>
                                    <td>
                                        <?= $danceByDate27Jul->getAvaliableTickets() ?>
                                    </td>
                                    <td>&#8364;
                                        <?= $danceByDate27Jul->getPrice() ?>
                                    </td>
                                </tr>
                            <?php }
                                ?>
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
    </div>
    </div>
    </div>
    </div>
    <div class="container">
        <div id="danceVanueCard">
            <div class="row">
                <?php
                $count = 1;
                foreach ($vanues as $vanue) {
                    ?>
                    <div class="col-2">
                        <?php if ($count % 2 == 0) {
                            
                            $danceVanueType = "danceVanueType2";
                        }
                        else{
                        $danceVanueType = "danceVanueType1"; 
                        }?>

                        <div class="<?=$danceVanueType?>">
                            <div class="danceVanue">
                                <h4>
                                    <?=$vanue->getVanue(); ?>
                                </h4>
                                <lael>
                                </lael>
                            </div>
                            <div>
                                <img src="/img/DanceVanueImg<?=$count?>.png" class="danceVanueImg">
                            </div>
                        </div>
                    </div>
                    <?php
                    $count++;
                } ?>
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