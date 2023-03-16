<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Restaurant</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/style.css" />
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container" id="addRestaurantPage">
        <h1 class="my-4">Add New Restaurant</h1>
        <form action="" method="post" class="d-flex flex-column col-6 px-0" enctype="multipart/form-data">

            <input class="my-1" type="text" name="name" placeholder="name">
            <input class="my-1" type="text" name="cuisine" placeholder="cuisine">
            <input class="my-1" type="text" name="foodType" placeholder="food type">
            <input class="my-1" type="number" step="0.1" name="sessionDuration" placeholder="session duration in hours">
            <input class="my-1" type="number" step="0.5" name="priceIndicator" placeholder="price indicator">
            <input class="my-1" type="number" step="0.01" name="priceAge12AndUnder" placeholder="price for age 12 and under">
            <input class="my-1" type="number" step="0.01" name="priceAboveAge12" placeholder="price for above age 12">
            <input class="my-1" type="number" step="0.1" name="rating" placeholder="rating">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="hasMichelin">
                <label class="form-check-label" for="flexSwitchCheckDefault">Michelin Star</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="isFestival">
                <label class="form-check-label" for="flexSwitchCheckDefault">Yummy Festival</label>
            </div>
            <input class="my-1" type="number" name="phoneNumber" placeholder="phone number">
            <input class="my-1" type="text" name="address" placeholder="address">
            <input class="my-1" type="number" name="seats" placeholder="seats">
            <input class="my-1" type="text" name="website" placeholder="website">
            <input class="my-1 px-0 border-0" type="file" name="coverImg" placeholder="cover image" accept="image/png, image/jpeg">
            <input class="my-1" type="text" name="description" placeholder="description">

            <button class="btn btn-red-gradient my-4" name="addrestaurant" value="yes" type="submit">Add new restaurant</button>
            <p class="error-message"><?php echo isset($this->msg) ? $this->msg : '' ?></p>
        </form>

    </div>
</body>

</html>