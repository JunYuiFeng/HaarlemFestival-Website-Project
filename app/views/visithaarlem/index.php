<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php
    include __DIR__ . '/../header.php';
    ?>

    <video autoplay muted loop class="videoBackground">
        <source src="/img/VisitHaarlemVideo.mp4" type="video/mp4">
    </video>
    <section class="welcomeSection">
        <article>
            <h1>WELCOME TO HAARLEM</h1>
            <p>Haarlem has a charming historic center, renowned museums, stores, restaurants,
                and the beach is nearby. Welcome to the multifaceted city. On the one hand, hip
                concept stores and secret streets from a bygone period. The historic church and
                waterfront terraces are on the opposite side. French celebrity chefs to Dutch Masters.
                Pop concert to antique market.
                So, how about a memorable day of fun? Visit Haarlem and you will be pleasantly delighted
                by the sights, shops, and charming squares, by the old and modern artists, the jovial mood,
                and the fascinating history.
                You can find everything in Haarlem.</p>
        </article>
        <img src="/img/VisitHaarlemImage.png" alt="3d moped illustration">
    </section>
    <section class="interestingSection">
        <figure class="text-center">
            <p>Interesting</p>
        </figure>
        <figure class="festivalPromo">
            <img src="/img/VisitHaarlemFestivalPromo.png" />
            <div>
                <h4>HAARLEM</h4>
                <p class="m-0">FESTIVAL 2023</p>
            </div>
            <button type="button" class="btn btn-warning">READ MORE</button>
        </figure>
        <figure class="visitHaarlemPromo">
            <figure>
                <img src="/img/KidsPagePromo.png" alt="">
                <h3>Haarlem for Kids</h3>
                <p>Have you ever seen 60,000 LEGO bricks in one space? That’s...</p>
                <button type="button" class="btn btn-primary">READ MORE</button>
            </figure>
            <figure>
                <img src="/img/FoodPagePromo.png" alt="">
                <h3>Top restaurants in Haarleem</h3>
                <p>Discover the best restaurants you MUST visit in Haarlem.</p>
                <button type="button" class="btn btn-primary">READ MORE</button>
            </figure>
        </figure>
    </section>
    <section class="mobileAppPromoSection">
        <figure class="informationColumn">
            <div class="display-flex">
                <img src="/img/DoctorWho.png" alt="">
                <p>Haarlem mobile app</p>
            </div>
            <h1>Interactive museum challenges</h1>
            <p>Solve several interesting problems to find out the secret of Professor Tyler!</p>
            <h2>Download the app</h2>
            <div class="display-flex">
                <img src="/img/AppStoreCTA.png" alt="">
                <img src="/img/GooglePlayCTA.png" alt="">
            </div>
            <p>Point your camera at the QR code for easy download</p>
            <img src="/img/QrCodeMobileApp.png" alt="">
        </figure>
        <figure class="mockupColumn">
            <img src="/img/MobileAppPromotion.png" alt="">
        </figure>
    </section>
</body>

</html>