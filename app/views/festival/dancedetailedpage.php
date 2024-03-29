<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dance!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/style.css" />
</head>

<body id="danceDetailedPageBody">
    <?php
    include __DIR__ . '/../header.php';
    ?>

    <div class="container">
        <div class="row dancePageTitle">
            <h1>Haarlem</h1><br>
            <h2>for dance<br>
                festival</h2>
        </div>
    </div>
    <div>
        <img src="/img/<?= $artist->getDetailedPicture() ?>" alt="Dance Festival Image" class="img-fluid danceDetailedPageImage" style="posision: absolute; top:20px">
    </div>
    <div class="">
        <h1 class="detailedArtistName">
            <?= $artist->getName() ?>
        </h1>
    </div>

    <div class="row justify-content-center danceTopSongs">
        <div class="col-12">
            <h3>TOP SONGS</h3>
        </div>
        <div class="col-2">
            <label>
                <?= $artist->getFirstSong() ?>
            </label>
            <label>
                <?= $artist->getFirstSongSource() ?>
            </label>
        </div>
        <div class="col-2">
            <labe>
                <?= $artist->getSecondSong() ?>
            </labe>
            <label>
                <?= $artist->getSecondSongSource() ?>
            </label>
        </div>
        <div class="col-2">

            <labe>
                <?= $artist->getThirdSong() ?>
            </labe>
            <label>
                <?= $artist->getThirdSongSource() ?>
            </label>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-5 justify-content-center" id="">
            <div class="container">
                <div class="box">
                    <h2>career highlights for
                        <?= $artist->getName() ?>
                    </h2>
                </div>
                <div class="box">
                    <p>
                        <?= $artist->getCareer() ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-3 ">
            <img src="/img/<?= $artist->getIndexPicture() ?>">
        </div>
    </div>
    <?php
    include __DIR__ . '/../footer.php';
    ?>

    <script>
        function addTicketToCart(ticketId) {
            var quantity = document.getElementById("ticketAmount" + ticketId).value ? document.getElementById("ticketAmount" + ticketId).value : 1;
            fetch('/api/cart/addTicketToCart', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        ticketId: ticketId,
                        quantity: quantity
                    })
                })
                .then(() => <?php echo (isset($_SESSION['logedin'])) ? 'getCartAmount()' : 'getCartAmountAsVisitor()' ?>)
            displayModalPanel("TicketIcon.png", "Added to cart", true);
        }

        function addAllAccessTicketToCart(ticketId) {
            fetch('/api/cart/addTicketToCart', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        ticketId: ticketId,
                        quantity: 1
                    })
                })
                .then(() => <?php echo (isset($_SESSION['logedin'])) ? 'getCartAmount()' : 'getCartAmountAsVisitor()' ?>)
            displayModalPanel("AllAccessPassIcon.png", "Added to cart", true);
        }
    </script>

</body>

</html>