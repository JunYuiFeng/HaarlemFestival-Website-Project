<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Dance</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/style.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

    <body class="">
        <div class="px-6">
            <h1 class="text-center py-2">Dance Overview</h1>
            <table class="table table-bordered table-striped table-hover">
                <h3>Venue</h3>
                <thead>
                    <tr>
                        <th style="width: 10%;">Id</th>
                        <th style="width: 10%;">Venue Name</th>
                        <th style="width: 10%;">Location</th>
                        <th style="width: 10%;">Image</th>
                        <th style="width: 10%;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($venues as $venue) { ?>
                        <form method="POST">
                            <tr>
                                <td>
                                    <?= $venue->getId() ?>
                                    <input type="hidden" name="venueId" value="<?= $venue->getId() ?>">
                                </td>
                                <td>
                                    <input type="text" class="form-control venue-name" name="venueName"
                                        value="<?= $venue->getVenueName() ?>">

                                </td>
                                <td class="address">
                                    <input type="text" class="form-control address" value="<?= $venue->getAddress() ?>"
                                        name="venueAddress">
                                </td>
                                <td>
                                    <input type="text" value="<?= $venue->getImage() ?>" name="venueImage">
                                    <img src="/img/<?= $venue->getImage() ?>" alt="Venue Image" class="img-fluid"
                                        style="height: 100px">
                                <td>
                                    <button type="submit" class="btn btn-primary edit-btn" name="action"
                                        action="updateVenue" value="update">Update</button>
                                    <button type="submit" class="btn btn-danger delete-btn" name="action"
                                        value="deleteVenue" action="delete">Delete</button>
                                </td>
                            </tr>
                        </form>
                    <?php } ?>
                    <form method="POST">
                        <td>
                            <input type="hidden" name="venueId" value="">
                        </td>
                        <td>
                            <input type="text" class="form-control venue-name" name="venueName" value="">

                        </td>
                        <td class="address" style=" width: 45%;">
                            <input type="text" class="form-control address" value="" name="venueAddress">
                        </td>
                        <td>
                            <input type="text" value="" name="venueImage">
                        </td>
                        <td>
                            <button type="submit" class="btn btn-success" name="action" action="add"
                                value="addVenue">Add</button>
                        </td>
                    </form>
                </tbody>

            </table>

            <table class="table table-bordered table-striped table-hover">
                <h3>
                    Artist
                </h3>
                <tr>
                    <th>Id</th>
                    <th>Name <br> Style</th>
                    <th>first song <br> second <br> third</th>
                    <th>Index Picture</th>
                    <th> First Source Song <br> Second <br> Third <br> (Copy embed Spotify)</th>
                    <th>Detailed Picture</th>
                    <th>Carrer</th>
                    <th>Action</th>
                </tr>
                <?php
                foreach ($artists as $artist) { ?>
                    <form method="POST">
                        <tr>
                            <td>
                                <?= $artist->getId() ?>
                                <input type="hidden" name="artistId" value="<?= $artist->getId() ?>">
                            </td>
                            <td>
                                <input type="text" name="artistName" value="<?= $artist->getName() ?>">
                                <input type="text" name="artistStyle" value="<?= $artist->getStyle() ?>">
                            </td>
                            <td>
                                <input type="text" name="artistFirstSong" value="<?= $artist->getFirstSong() ?>">
                                <input type="text" name="artistSecondSong" value="<?= $artist->getSecondSong() ?>">
                                <input type="text" name="artistThirdSong" value="<?= $artist->getThirdSong() ?>">
                            </td>
                            <td>
                                <input type="text" name="artistIndexPicture" value="<?= $artist->getIndexPicture() ?>">
                            </td>
                            <td>
                                <input type='text' name='artistFirstSourceSong'
                                    value='<?= $artist->getFirstSongSource() ?>'>
                                <input type='text' name='artistSecondSourceSong'
                                    value='<?= $artist->getSecondSongSource() ?>'>
                                <input type='text' name='artistThirdSourceSong'
                                    value='<?= $artist->getThirdSongSource() ?>'>
                            </td>
                            <td>
                                <input type="text" name="artistDetailedPicture"
                                    value="<?= $artist->getDetailedPicture() ?>">
                                <input type="file" name="artistDetailedPicture" value="<?= $artist->getDetailedPicture() ?>">
                            </td>
                            <td>
                                <input type="text" name="artistCareer" value="<?= $artist->getCareer() ?>"maxlength="4500">
                            </td>
                            <td>
                                <button type="submit" class="btn btn-primary edit-btn" name="action" action="update"
                                    value="updateArtist">Update</button>
                                <button type="submit" class="btn btn-danger delete-btn" name="action" value="deleteArtist"
                                    action="deleteArtist">Delete</button>
                            </td>
                        </tr>
                    </form>
                <? } ?>
                <form method="POST">
                    <tr>
                        <td>
                            <input type="hidden" name="artistId" value="">
                        </td>
                        <td>
                            <input type="text" name="artistName" value="">
                            <input type="text" name="artistStyle" value="">
                        </td>
                        <td>
                            <input type="text" name="artistFirstSong" value="">
                            <input type="text" name="artistSecondSong" value="">
                            <input type="text" name="artistThirdSong" value="">
                        </td>
                        <td>
                            <input type="text" name="artistIndexPicture" value="">
                        </td>
                        <td>
                            <input type='text' name='artistFirstSourceSong' value=''>
                            <input type='text' name='artistSecondSourceSong' value=''>
                            <input type='text' name='artistThirdSourceSong' value=''>
                        </td>
                        <td>
                            <input type="text" name="artistDetailedPicture" value="">
                        </td>
                        <td>
                            <input type="text" name="artistCareer" value="">
                        </td>
                        <td>
                            <button type="submit" class="btn btn-success" name="action" action="add"
                                value="addArtist">Add</button>
                        </td>
                    </tr>

                </form>
            </table>

            <?php foreach ($days as $day) { ?>
                <h5>
                    <?= $day->getDate() ?>
                </h5>
                <table class="table table-bordered table-striped table-hover">
                    <tr>
                        <th>Id</th>
                        <th>Day</th>
                        <th>Time</th>
                        <th>Venue</th>
                        <th>Artist</th>
                        <th>Ticket available</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    foreach ($tickets as $ticket) {
                        ?>
                        <?php
                        if ($ticket->getDate() == $day->getDate()) { ?>
                            <form method="POST" name="table<?= $day->getDate() ?>">
                                <tr>
                                    <td>
                                        <input type="hidden" value="<?= $ticket->getId() ?>" name="ticketId">
                                        <?= $ticket->getId() ?>
                                    </td>
                                    <td>                                        
                                        <input type="text" name="ticketDate" value="<?= $day->getDate() ?>">
                                    </td>
                                    <td>
                                        <input type="text" value="<?= $ticket->getTime() ?>" name="ticketTime">
                                    </td>
                                    <td>
                                        <select name="ticketVenue">
                                            <?php foreach ($venues as $venue): ?>
                                                <option value="<?= $venue->getVenueName() ?>"
                                                    <?= $venue->getVenueName() === $ticket->getVenue() ? 'selected' : '' ?>>
                                                    <?= $venue->getVenueName() ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </td>
                                    <td>
                                        <?php 
                                            $checkedArtistName = explode(',', $ticket->getArtist());                                             
                                            for ($i = 0; $i < count($checkedArtistName); $i++): ?>
                                                <select name="ticketArtist<?=$i+1?>">                      
                                                    <?php 
                                                    foreach ($artists as $artist): ?>
                                                        <option value="<?= $artist->getName() ?>" <?= $artist->getName() === $checkedArtistName[$i] ? 'selected' : '' ?>>
                                                            <?= $artist->getName() ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            <?php endfor; ?>

                                        <select name="ticketArtist<?= count($checkedArtistName)+1?>">
                                            <option value="">Select an artist</option>
                                            <?php foreach ($artists as $artist): ?>
                                                <option value="<?= $artist->getName() ?>">
                                                    <?= $artist->getName() ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="number" name="ticketAvaliable" size="4" value=<?= $ticket->getAvaliableTickets() ?>>
                                    </td>
                                    <td>&#8364;
                                        <input type="number" name="ticketPrice" size="4" value= <?= $ticket->getPrice() ?> size="4">
                                    </td>
                                    <td>
                                        <button type="submit" class="btn btn-primary edit-btn" name="action" action="update"
                                            value="updateTicket">Update</button>
                                        <button type="submit" class="btn btn-danger delete-btn" name="action" value="deleteTicket"
                                            action="deleteTicket">Delete</button>
                                    </td>
                                </tr>
                            </form>
                        <?php } ?>
                    <?php } ?>
                </table>
            <?php }
            ?>          
            
            <table class="table table-bordered table-striped table-hover">
                    <tr>
                        <th>Id</th>
                        <th>Day</th>
                        <th>Time</th>
                        <th>Venue</th>
                        <th>Artist</th>
                        <th>Ticket available</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                    <form method="POST" name="table">
                        <tr>
                            <td>
                                <input type="hidden" value=" " name="ticketId">
                            </td>
                            <td>                                        
                                <input type="text" name="ticketDate" value="">
                            </td>
                            <td>
                                <input type="text" value="" name="ticketTime">
                            </td>
                            <td>
                                <select name="ticketVenue">
                                    <?php foreach ($venues as $venue): ?>
                                        <option value="<?= $venue->getVenueName() ?>"
                                            <?= $venue->getVenueName() === $ticket->getVenue() ? 'selected' : '' ?>>
                                            <?= $venue->getVenueName() ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                            <td>              
                                <select name="ticketArtist1">
                                <?php 
                                    foreach ($artists as $artist): ?>
                                    <option value="<?= $artist->getName() ?>" >
                                        <?= $artist->getName() ?>
                                            </option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                            <td>
                                <input type="number" name="ticketAvaliable" size="4" >
                            </td>
                            <td>&#8364;
                                <input type="number" name="ticketPrice" size="4" >
                            </td>
                            <td>
                                <button type="submit" class="btn btn-success" name="action" action="add"
                                    value="addTicket">Add</button>
                            </td>
                        </tr>
                    </form>
                </table>
        </div>
    </body>

</html>