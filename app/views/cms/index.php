<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Sessions</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/style.css" />
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<body class="bg-dark">
    <?php include_once("header.php"); ?>

    <div class="py-3 px-5">
        <div class="row">
            <button class="btn btn-warning col-2" onclick="document.location.href='../myaccount/index'">Go back to website</button>

            <h1 class="col-8 text-center fw-bolder text-light ff-alata display-4">Dashboard</h1>
        </div>

        <div class="row w-100  mt-5">
            <div class="col-4 bg-light bg-gradient p-4 d-flex flex-column rounded ">
                <h4 class="text-dark text-center mb-4">Content Management System</h4>
                <button class="btn btn-primary mb-2" onclick="document.location.href='editpagecontent?webPage=Home'">Home page</button>
                <button class="btn btn-primary mb-2" onclick="document.location.href='editpagecontent?webPage=History'">History page</button>
                <button class="btn btn-primary mb-2" onclick="document.location.href='editpagecontent?webPage=Culture'">Culture page</button>
                <button class="btn btn-primary mb-2" onclick="document.location.href='editpagecontent?webPage=Food'">Food page</button>
                <button class="btn btn-primary mb-2" onclick="document.location.href='editpagecontent?webPage=Kids'">Kids page</button>
            </div>
            <div class="col-1"></div>
            <div class="col-4 bg-light bg-gradient p-4 d-flex flex-column rounded ">
                <h4 class="text-dark text-center mb-4">Manage Data</h4>
                <button class="btn btn-danger mb-2" onclick="document.location.href='manageusers'">Users</button>
                <button class="btn btn-danger mb-2" onclick="document.location.href='managerestaurants'">Restaurants</button>
                <button class="btn btn-danger mb-2" onclick="document.location.href='managesessions'">Sessions</button>
                <button class="btn btn-danger mb-2" onclick="document.location.href='managereservations'">Reservations</button>
                <button class="btn btn-danger mb-2" onclick="document.location.href='managedance'">Dance Event</button>
                <button class="btn btn-danger mb-2" onclick="document.location.href='manageorders'">Orders</button>
                <button class="btn btn-danger mb-2" onclick="document.location.href='manageapikeys'">API Keys</button>
            </div>
            <div class="col-1"></div>
            <div class="col-2 bg-light bg-gradient p-4 d-flex flex-column rounded ">
                <h4 class="text-dark text-center mb-4">Quick Links</h4>
                <a href="manageorders" class="mb-2">Export Orders To CSV</a>
                <a href="addrestaurant" class="mb-2">Add Restaurant</a>
            </div>
        </div>
    </div>

</body>

</html>