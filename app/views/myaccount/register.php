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
                <div class="col-sm-6 px-0 d-none d-sm-block">
                    <img src="/img/LoginImage2.jpeg" alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
                </div>
                <div class="col-sm-6 text-black">

                    <div class="d-flex align-items-center justify-content-center h-custom-2 px-5 ms-xl-4 pt-xl-0 mt-xl-n5">

                        <form method="post" action="" style="width: 23rem;">

                            <h1 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Register</h1>

                            <div class="user-box">
                                <input type="email" name="email" required>
                                <label>Email</label>
                            </div>

                            <div class="user-box">
                                <input type="text" name="username" required>
                                <label>Username</label>
                            </div>

                            <div class="user-box">
                                <input type="password" name="password" required>
                                <label>Password</label>
                            </div>

                            <div class="user-box">
                                <input type="text" name="captcha" required>
                                <label>Enter Captcha</label>
                            </div>

                            <p>
                                <img src="/captcha.php?rand=<?php echo rand(); ?>" id='captcha_image'>
                            </p>
                            <p>Can't read the image?
                                <a href='javascript: refreshCaptcha();'>click here</a>
                                to refresh
                            </p>





                            <button type="submit" name="register" class="red-outline-animated">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                Create an account!
                            </button>
                            <p class="error-message"><?php echo isset($this->msg) ? $this->msg : '' ?></p>

                            <p>Already have an account? <a href="login" class="link-info">Sign in here</a></p>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    include __DIR__ . '/../footer.php';
    ?>

    <script>
        //Refresh Captcha
        function refreshCaptcha() {
            var img = document.images['captcha_image'];
            img.src = img.src.substring(
                0, img.src.lastIndexOf("?")
            ) + "?rand=" + Math.random() * 1000;
        }
    </script>
</body>

</html>