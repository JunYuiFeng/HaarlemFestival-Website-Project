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
    <?php include_once("header.php"); ?>

    <div class="container d-flex flex-column justify-content-center align-items-center" id="addRestaurantPage">
        <h1 class="text-center my-4"><?php echo (isset($_GET['edit'])) ? "Edit Restaurant" : "Add New Restaurant"; ?></h1>
        <form action="" method="post" class="col-12 px-0 d-flex flex-column align-items-center" enctype="multipart/form-data">
            <div class="d-flex justify-content-center">
                <div class="col-6">
                    <div class="user-box">
                        <input type="text" name="name" required value="<?php echo (isset($restaurant)) ? $restaurant->getName() : ''; ?>">
                        <label>Restaurant Name</label>
                    </div>
                    <div class="user-box">
                        <input type="text" name="cuisine" required value="<?php echo (isset($restaurant)) ? $restaurant->getCuisine() : ''; ?>">
                        <label>Cuisine</label>
                    </div>
                    <div class="user-box">
                        <input type="text" name="foodType" required value="<?php echo (isset($restaurant)) ? $restaurant->getFoodType() : ''; ?>">
                        <label>Food Type</label>
                    </div>
                    <div class="user-box">
                        <input type="number" step="0.1" name="sessionDuration" required value="<?php echo (isset($restaurant)) ? $restaurant->getSessionDuration() : ''; ?>">
                        <label>Session Duration</label>
                    </div>
                    <div class="user-box">
                        <input type="number" step="1" name="priceIndicator" required value="<?php echo (isset($restaurant)) ? $restaurant->getPriceIndicator() : ''; ?>">
                        <label>Price Indicator</label>
                    </div>
                    <div class="user-box">
                        <input type="number" step="0.01" name="priceAge12AndUnder" required value="<?php echo (isset($restaurant)) ? $restaurant->getPriceAge12AndUnder() : ''; ?>">
                        <label>Price for age 12 and under</label>
                    </div>
                    <div class="user-box">
                        <input type="number" step="0.01" name="priceAboveAge12" required value="<?php echo (isset($restaurant)) ? $restaurant->getPriceAboveAge12() : ''; ?>">
                        <label>Price for above age 12</label>
                    </div>
                    <div class="user-box">
                        <input type="number" step="0.1" name="rating" required value="<?php echo (isset($restaurant)) ? $restaurant->getRating() : ''; ?>">
                        <label>Rating</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="user-box">
                        <input type="number" name="phoneNumber" required value="<?php echo (isset($restaurant)) ? $restaurant->getPhoneNumber() : ''; ?>">
                        <label>Phone Number</label>
                    </div>
                    <div class="user-box">
                        <input type="text" name="address" required value="<?php echo (isset($restaurant)) ? $restaurant->getAddress() : ''; ?>">
                        <label>Address</label>
                    </div>
                    <div class="user-box">
                        <input type="text" name="website" required value="<?php echo (isset($restaurant)) ? $restaurant->getWebsite() : ''; ?>">
                        <label>Website</label>
                    </div>
                    <input class="mb-4 px-0 border-0" type="file" name="coverImg" placeholder="cover image" accept="image/png, image/jpeg">
                    <div class="user-box">
                        <input type="text" name="description" required value="<?php echo (isset($restaurant)) ? $restaurant->getDescription() : ''; ?>">
                        <label>Description</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="hasMichelin" <?php echo (isset($restaurant) && $restaurant->getHasMichelin()) ? "checked" : ''; ?>>
                        <label class="form-check-label" for="flexSwitchCheckDefault">Michelin Star</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="isFestival" <?php echo (isset($restaurant) && $restaurant->getIsFestival()) ?  "checked" : ''; ?>>
                        <label class="form-check-label" for="flexSwitchCheckDefault">Yummy Festival</label>
                    </div>
                </div>
            </div>
            <button class="btn btn-red-gradient my-2 py-3 col-6" name="addrestaurant" value="yes" type="submit"><?php echo (isset($_GET['edit'])) ? "Save Restaurant" : "Add Restaurant"; ?></button>
            <p class="error-message"><?php echo isset($this->msg) ? $this->msg : '' ?></p>

        </form>

    </div>
</body>

</html>