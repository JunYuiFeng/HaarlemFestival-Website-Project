<?
include_once("../repositories/usersrepository.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/style.css" />
</head>

<body>
    <?php
    include __DIR__ . '/../header.php'; ?>

    <div class="container d-flex flex-column justify-content-between ">
        <h1>My Account!</h1>
        <?php
        foreach ($users as $user) {
            if ($user->getId() == $_SESSION["logedin"]) { ?>
                <h3>Hello user_id:
                    <?= $user->getUsername();
                    ?>
                </h3>
    </div>
    <div class="container d-flex flex-column justify-content-between ">
        <h3>Update your account</h3>
    </div>
    <div class="row" id="indexContent">
        <div class="col 2">
            porfile picture
        </div>
        <div class="col 4">
            <form action="" method="post" class="row" id="indexForm">
                <input type="hidden" name="id" value=<?= $user->getId() ?>>
                <td class="">
                    <label class="labels">Id</label>
                    <?= $user->getId() ?>
                </td>
                <td class="">
                    <label class="labels">Username</label>
                    <input type="text" name="username" placeholder=<?= $user->getUsername() ?>>
                </td>
                <td class="">
                    <label class="labels">Email</label>
                    <input type="text" name="email" placeholder=<?= $user->getEmail() ?>>
                </td>
                <td class="">
                    <label class="labels">Password</label>
                    <input type="text" name="password" placeholder=<?= $user->getPassword() ?>>
                </td>
                <td class="col 4" class="">
                    <button type="submit" name="update">Update</button>
                </td>

            </form>
        </div>
        <div class="col 4">

        </div>
    </div>
        <? } ?>
    <?php } ?>

    <?php
    include __DIR__ . '/../footer.php';
    ?>

</body>

</html>