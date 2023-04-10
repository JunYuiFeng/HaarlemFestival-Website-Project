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
    include __DIR__ . '/../header.php';
    ?>
    <section class="vh-100">
        <div class="container-fluid login">
            <div class="row">
                <div class="col-sm-6 text-black">

                    <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 pt-xl-0 mt-xl-n5">

                        <form method="post" action="" style="width: 23rem;">

                            <h1 class="fw-normal pb-3" style="letter-spacing: 1px;">Set new password</h1>
                            <!-- <p class="mb-5">Enter your email address and we'll send you a link to reset password</p> -->

                            <div class="user-box">
                                <input type="password" name="newPassword" required>
                                <label>password</label>
                            </div>
                            <div class="user-box">
                                <input type="password" name="newPasswordRepeat" required>
                                <label>repeat password</label>
                            </div>
                            <p class="error-message"><?php echo isset($this->msg) ? $this->msg : '' ?></p>

                            <button type="submit" name="changePass" class="red-outline-animated">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                Change
                            </button>
                        </form>

                    </div>

                </div>
                <div class="col-sm-6 px-0 d-none d-sm-block">
                    <img src="/img/ResetPasswordImage.jpeg" alt="Haarlem center picture" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
                </div>
            </div>
        </div>
    </section>
    <?php
    include __DIR__ . '/../footer.php';
    ?>
</body>

</html>