<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Reservations</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/style.css" />
</head>

<body>
    <?php include_once("header.php"); ?>

    <div class="container">
        <h1 class="mb-5 d-flex justify-content-center fw-bolder text-dark ff-alata display-5">Reservation Overview</h1>
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>id</th>
                    <th>restaurant</th>
                    <th>session</th>
                    <th>people above 12 years old</th>
                    <th>people under or 12 years old</th>
                    <th>date</th>
                    <th>comments</th>
                    <th>status</th>
                    <th colspan="2">manage</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <form action="" method="POST" onsubmit="return validateForm()">
                        <td></td>
                        <td>
                            <select name="restaurant" id="restaurant" class="form-control">
                                <option value="0">Choose a restaurant</option>
                                <?php foreach ($restaurants as $restaurant) { ?>
                                    <option value="<?= $restaurant->getId() ?>"><?= $restaurant->getName() ?></option>
                                <?php } ?>
                            </select>
                        </td>
                        <td><select name="session" id="session" class="form-control"></select></td>
                        <td><input type="number" name="amountAbove12" class="form-control"></td>
                        <td><input type="number" name="amountUnderOr12" class="form-control"></td>
                        <td><input type="date" name="date" class="form-control"></td>
                        </td>
                        <td> <input type="text" name="comment" class="form-control"></td>
                        <td>
                            <select name="status" id="status" class="form-control">>
                                <option value="0">Choose a status</option>
                                <option value="active">active</option>
                                <option value="unactive">unactive</option>
                            </select>
                        </td>
                        <td colspan="2"> <input type="submit" class="btn btn-primary w-100" value="Add"></td>
                    </form>
                </tr>
                <?php foreach ($reservationData as $reservation) { ?>
                    <tr>
                        <td><?php echo $reservation['id']; ?></td>
                        <td><?php echo $reservation['restaurant']; ?></td>
                        <td><?php echo $reservation['session']; ?></td>
                        <td><?php echo $reservation['amountAbove12']; ?></td>
                        <td><?php echo $reservation['amountUnderOr12']; ?></td>
                        <td><?php echo $reservation['date']; ?></td>
                        <td><?php echo $reservation['comments']; ?></td>
                        <td><?php echo $reservation['status']; ?></td>
                        <?php if ($reservation['status'] == 'active') { ?>
                            <td><a href="managereservations?deactivateid= <?= $reservation['id'] ?>" class="btn btn-danger btn-sm">deactivate</a></td>
                        <?php } else { ?>
                            <td><a href="managereservations?activateid= <?= $reservation['id'] ?>" class="btn btn-success btn-sm">activate</a></td>
                        <?php } ?>
                        <td><a href="editReservation?id=<?= $reservation['id'] ?>" class="btn btn-primary btn-sm">edit</a></td>

                    </tr>
                <?php } ?>
            </tbody>
        </table>

    </div>

    <script>
        const restaurantSelect = document.getElementById('restaurant');
        restaurantSelect.addEventListener('change', () => {
            const selectedRestaurantId = restaurantSelect.value;
            if (selectedRestaurantId !== '0') {
                fetch(`/api/cms/getSessionsBySelectedRestaurant`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            restaurantId: selectedRestaurantId
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        const sessionSelect = document.getElementById('session');
                        sessionSelect.innerHTML = '';
                        const defaultOption = document.createElement('option');
                        defaultOption.value = '0';
                        defaultOption.text = 'Choose a session';
                        sessionSelect.add(defaultOption);
                        data.forEach(session => {
                            const option = document.createElement('option');
                            option.value = session.id;
                            option.text = session.name;
                            sessionSelect.add(option);
                        });
                    })
                    .catch(error => console.error(error));

            }
        });
    </script>

</body>

</html>