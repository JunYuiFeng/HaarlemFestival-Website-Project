<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <?php
    include __DIR__ . '/../header.php';
    ?>
    <section class="vh-100">
        <div class="container-fluid login">
            <div class="row">
                <div class="col-sm-3 px-0 d-none d-sm-block">
                    <button>
                        Upload Profile Picture
                    </button>
                </div>
                <div class="col-sm-5 text-black">
                    <div class="d-flex h-custom-2 px-5 ms-xl-4 pt-xl-0 mt-xl-n5" style="margin-top:3em;">

                        <form method="post" action="" style="width: 23rem;">
                            <h1 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">My Account!</h1>
                            <?php
                            if ($user->getId() == $_SESSION["logedin"]) { ?>
                                <h3 style="">Hello,
                                    <?= $user->getUsername();
                                    ?></h3>
                            <? } ?>
                            <input type="hidden" name="id" value=<?= $user->getId() ?>>
                            <div class="user-box">
                                <input type="text" name="username" value=<?= $user->getUsername() ?>>
                                <label>Username</label>
                            </div>
                            <div class="user-box">
                                <input type="text" name="email" value=<?= $user->getEmail() ?>>
                                <label>Email</label>
                            </div>
                            <div class="user-box">
                                <input type="text" name="oldPassword" value="">
                                <label>Old password</label>
                            </div>
                            <div class="user-box">
                                <input type="text" name="newPassword" value=>
                                <label>New password</label>
                            </div>
                            <div class="user-box">
                                <input type="text" name="confirmationNewPassword" value=>
                                <label>New password</label>
                            </div>

                            <p class="error-message">
                                <?php echo isset($msg) ? $msg : '' ?>
                            </p>

                            <button type="submit" name="update" value="update">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                Update
                            </button>
                            <button style="margin-left: 9em;">
                                <a href="logout" class="mt-5">Logout</a>
                            </button>
                        </form>
                    </div>

                </div>
                <div class="col-sm-4 px-0 d-none d-sm-block">
                    <img src="/img/MyAccountIndexImg.png" alt="profile pic" class="img-fluid" style="
  height: 90%;float :right;">
                </div>
            </div>

        </div>

    </section>
    <?php
    include __DIR__ . '/../footer.php';
    ?>
</body>

</html>