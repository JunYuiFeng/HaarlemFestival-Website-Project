<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/css/style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Edit Reservation</title>
</head>

<body>
    <div class="container d-flex justify-content-center">
        <form action="updateReservation" method="POST">
            <h1 class="mt-5 mb-4 fw-bolder text-center text-dark ff-alata display-5">Edit Reservation</h1>
            <div class="d-flex">
                <div class="col-6">
                    <label for="">Choose a restaurant</label>
                    <select name="restaurant" id="restaurant" class="form-control">
                        <?php foreach ($restaurants as $restaurant) { ?>
                            <option value="<?= $restaurant->getId() ?>"><?= $restaurant->getName() ?></option>
                        <?php } ?>
                    </select><br>

                    <label for="">Choose Session</label>
                    <select name="session" id="session" class="form-control"></select><br>

                    <label for="">People above 12 years old</label>
                    <input type="number" name="amountAbove12" class="form-control" value="<?= $reservation->getAmountAbove12() ?>"><br>

                    <label for="">People under or 12 years old</label>
                    <input type="number" name="amountUnderOr12" class="form-control" value="<?= $reservation->getAmountUnderOr12() ?>"><br>

                </div>
                <div class="col-6">
                    <label for="">Date</label>
                    <input type="date" name="date" value="<?= $reservation->getDate() ?>" class="form-control"><br>

                    <label for="">Comments</label>
                    <input type="text" name="comment" value="<?= $reservation->getComments() ?>" class="form-control"><br>

                    <label for="">Choose status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="active">active</option>
                        <option value="unactive">unactive</option>
                    </select>
                    <input type="hidden" name="id" value="<?= $reservation->getId() ?>">
                </div>
            </div>
            <div class="d-flex justify-content-center ">
                <input type="submit" class="btn btn-primary mr-4" value="Update">

                <a href="managereservations" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
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

        // Trigger change event on page load
        const changeEvent = new Event('change');
        restaurantSelect.dispatchEvent(changeEvent);
    </script>
</body>

</html>