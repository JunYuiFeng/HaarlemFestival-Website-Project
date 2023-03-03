<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Festival Overview - Visit Haarlem</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <?php
    include __DIR__ . '/../transparent-header.php';
    ?>

    <video autoplay muted loop class="videoBackground">
        <source src="/img/HaarlemFestivalVideo.mp4" type="video/mp4">
    </video>
    <section class="welcomeSection festival container mb-5">
        <article>
            <h1>Welcome to <br>The Haarlem Festival</h1>
            <p>The sound of music fills the air,
                laughter and joy can be heard all around,
                and the smell of delicious food wafts through the crowds - it
                must be time for the festival! You never know what you might discover,
                and you're sure to have a great time. During this festival there will be three
                different event: a dance event called: Dance!; a food event called: Yummie!; and a history
                event called: A Stroll through History.
            </p>
        </article>
    </section>

    <div class="container d-flex flex-column gap-5">
        <section class="eventPromo">
            
            <div class="col-12 event">
                <a href="/festival/dance">
                <img src="/img/DanceFestival.png" alt="Dance Festival Image" class="img-fluid">
                <div class="eventName">
                <h1>Dance!</h1></a>
            </div>
            </div>
            <div class="col-12 description dance">
                <p>Whether you're a fan of house, techno, or hip-hop, we have something for everyone. So put on your dancing shoes and get ready to party like never before at this unforgettable clubbing experience!</p>
            </div>
        </section>
        <section class="eventPromo">
            <div class="col-12 event">
                <img src="/img/YummyFestival.png" alt="Yummy Festival Image" class="img-fluid">
                <div class="eventName">
                <h1 onclick="location.href='yummie'">Yummie!</h1>
            </div>
            </div>
            <div class="col-12 description yummy">
                <p>Welcome to this Yummie!, where 7 amazing restaurants offering a range of international cuisines will tickle your taste buds. In a every of sessions at different price points our chefs will take you on culinary adventure. Reserve now! Seats are limited.</p>
            </div>
        </section>
        <section class="eventPromo">
            
            <div class="col-12 event">
                <img src="/img/HistoryFestival.png" alt="History Festival Image" class="img-fluid">
                <div class="eventName">
                <h1>A stroll through History!</h1>
            </div>
            </div>
            <div class="col-12 description history">
                <p>Welcome to our "A Stroll Through History" tour! Over the next hour, we will take a journey through time and explore the rich history of our city. We will visit some of the oldest and most historic buildings in the area.</p>
            </div>
        </section>
    </div>

    <div class="container schedule">
        <h1>Schedule</h1>
        <div class="d-flex gap-1">
            <div class="day-block">
                <h2>Thursday 26th</h2>
                <div class="events">
                    <p>A stroll through
                        history
                        10.00-16.00</p>
                </div>
            </div>
            <div class="day-block">
                <h2>Friday 27th</h2>
                <div class="events">
                    <p>Dance! 20:00 - 02:00</p>
                    <p>Yummie! 16:30-23:30</p>
                    <p>A stroll through history 10.00-16.00</p>
                </div>
            </div>
            <div class="day-block">
                <h2>Saturday 28th</h2>
                <div class="events">
                    <p>Dance! 14:00 - 00:30</p>
                    <p>Yummie! 16:30-23:30</p>
                    <p>A stroll through history 10.00-16.00</p>
                </div>
            </div>
            <div class="day-block">
                <h2>Sunday 29th</h2>
                <div class="events">
                    <p>Dance! 14:00 - 23:00</p>
                    <p>Yummie! 16:30-23:30</p>
                    <p>A stroll through history 10.00-16.00</p>
                </div>
            </div>
            <div class="day-block">
                <h2>Monday 30th</h2>
                <div class="events">
                    <p>Yummie! 16:30-23:30</p>
                </div>
            </div>
            <div class="day-block">
                <h2>Tuesday 31st</h2>
                <div class="events">
                    <p>Yummie! 16:30-23:30</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container map">
        <h1>Map</h1>
        <section class="agenda">
            <div class="event-name">
                <span class="color-box yummy"></span>
                <p>Yummy!</p>
            </div>
            <div class="event-name">
                <span class="color-box dance"></span>
                <p>Dance!</p>
            </div>
            <div class="event-name">
                <span class="color-box history"></span>
                <p>A stroll through history!</p>
            </div>
        </section>
        <img src="/img/FestivalMap.png" alt="Festival Map with event locations">
    </div>
    <?php
    include __DIR__ . '/../footer.php';
    ?>
</body>

</html>