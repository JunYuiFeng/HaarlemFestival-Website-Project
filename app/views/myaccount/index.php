<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
</head>

<body>
    <?php
    include __DIR__ . '/../header.php';
    ?>
    <div class="container-fluid myaccount">
        <div class="row">
            <div class="col-3 mt-3">
                <h1 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">My Account!</h1>
                <div class="col-8">

                    <h3 class="text-center">Hello, <?= $user->getUsername(); ?></h3>

                    <img style="object-fit:cover;width:230px;height:230px" class="rounded-circle img-fluid" alt="profile picture" src="/img/profile-pictures/<?= $user->getProfilePicture() ?>" />
                    <div class="text-center mt-2 ">
                        <p class="mb-0 fw-bold">Username</p>
                        <p><?= $user->getUsername() ?></p>
                        <p class="mb-0 fw-bold">Email</p>
                        <p><?= $user->getEmail() ?></p>
                        <p class="mb-0 fw-bold">Registration Date</p>
                        <p><?= $user->getRegistrationDate() ?></p>
                    </div>
                    <button class="btn btn-danger mt-4 w-100" onclick="document.location.href = 'logout'">
                        Logout
                    </button>
                </div>
            </div>
            <div class="col-6 mt-5 d-flex justify-content-center">
                <div class="col-6 d-flex flex-column align-items-center gap-5">
                    <p class="text-success">
                        <?php echo isset($msg) ? $msg : '' ?>
                    </p>
                    <?php
                    if (isset($_SESSION['employee'])) {
                    ?>
                        <button class="btn btn-primary w-100" onclick="toggleScanning()">Scan Tickets</button>
                        <div class="hidden mt-3 w-100" id="reader"></div>
                        <p id="ticketStatus" class="text-success fw-bolder fs-1"></p>
                        <button class="btn btn-danger hidden" id="ticketStatusUpdateBtn" onclick="markTicketAsScanned()">Mark Ticket as Scanned</button>
                    <?php } ?>
                    <button class="btn btn-success w-100" onclick="toggleUsernameForm()">Change Email or Username</button>
                    <form method="post" action="" class="hidden w-100" id="editUsernameForm">

                        <input type="hidden" name="id" value=<?= $user->getId() ?>>
                        <div class="user-box">
                            <input type="text" name="username" value=<?= $user->getUsername() ?>>
                            <label>Username</label>
                        </div>
                        <div class="user-box">
                            <input type="text" name="email" value=<?= $user->getEmail() ?>>
                            <label>Email</label>
                        </div>

                        <button class="red-outline-animated mt-0" type="submit" name="updateUsername" value="update">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            Update
                        </button>
                    </form>

                    <button class="btn btn-success w-100" onclick="togglePasswordForm()">Change Password</button>
                    <form method="post" action="" class="hidden w-100" id="editPasswordForm">

                        <input type="hidden" name="id" value=<?= $user->getId() ?>>
                        <div class="user-box">
                            <input type="text" name="oldPassword" value="">
                            <label>Old password</label>
                        </div>
                        <div class="user-box">
                            <input type="text" name="newPassword" value=>
                            <label>New password</label>
                        </div>
                        <div class="user-box">
                            <input type="text" name="confirmNewPassword" value=>
                            <label>New password</label>
                        </div>

                        <button class="red-outline-animated mt-0" name="updatePassword" value="update">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            Update
                        </button>
                    </form>
                    <form method="post" name="imageUpload" action="" enctype="multipart/form-data" class="w-100" id="imageUploadForm">
                        <button type="button" class="btn btn-secondary w-100" id="change-profile-picture">Change Profile Picture</button>
                    </form>
                </div>
            </div>
            <div class="col-3">
                <img src="/img/MyAccountIndexImg.png" alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
            </div>

        </div>

    </div>
    <?php
    include __DIR__ . '/../footer.php';
    ?>

    <script>
        let ticketToken = "";

        document.getElementById('change-profile-picture').addEventListener('click', function() {
            var input = document.createElement('input');
            input.name = 'profile_picture';
            input.type = 'file';
            input.accept = 'image/*';
            input.style.width = '0px';
            input.onchange = function() {
                if (input.files.length > 0)
                    document.getElementById("imageUploadForm").submit(); // automatically submit the form after selecting a file
            };
            document.getElementById("imageUploadForm").appendChild(input);
            input.click();
        });


        function toggleUsernameForm() {
            if (!document.getElementById("editPasswordForm").classList.contains("hidden"))
                togglePasswordForm();
            document.getElementById("editUsernameForm").classList.toggle("hidden");
        }

        function togglePasswordForm() {
            if (!document.getElementById("editUsernameForm").classList.contains("hidden"))
                toggleUsernameForm();
            document.getElementById("editPasswordForm").classList.toggle("hidden");
        }


        function toggleScanning() {
            if (document.getElementById("reader").classList.contains("hidden"))
                html5QrcodeScanner.render(onScanSuccess);
            else
                html5QrcodeScanner.clear();
            hideUpdateTicketStatusBtn();
            document.getElementById("ticketStatus").innerText = "";
            document.getElementById("reader").classList.toggle("hidden");
        }

        function hideUpdateTicketStatusBtn() {
            document.getElementById("ticketStatusUpdateBtn").classList.add("hidden");
        }

        function showUpdateTicketStatusBtn() {
            document.getElementById("ticketStatusUpdateBtn").classList.remove("hidden");
        }

        function validateTicket(token) {
            fetch(`/api/ticket/validate?token=${token}`, {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json'
                    }
                })
                .then(r => r.json())
                .then(response => {
                    document.getElementById("ticketStatus").innerText = response;
                    if (response != "Ticket is valid!") {
                        document.getElementById('ticketStatus').classList.replace("text-success", "text-danger");
                    } else {
                        document.getElementById('ticketStatus').classList.replace("text-danger", "text-success");
                        ticketToken = token;
                        showUpdateTicketStatusBtn();
                    }
                })
                .catch(error => {
                    console.error(error);
                });
        }

        function markTicketAsScanned() {
            fetch(`/api/ticket/updatestatus?token=${ticketToken}`, {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json'
                    }
                })
                .then(r => r.json())
                .then(response => {
                    if (response) {
                        document.getElementById("ticketStatus").innerText = "Ticket has been marked as scanned!";
                        document.getElementById('ticketStatus').classList.replace("text-danger", "text-success");
                        hideUpdateTicketStatusBtn();
                    } else {
                        document.getElementById("ticketStatus").innerText = "Something went wrong";
                        document.getElementById('ticketStatus').classList.replace("text-success", "text-danger");
                    }
                })
                .catch(error => {
                    console.error(error);
                });
        }


        function onScanSuccess(decodedText, decodedResult) {
            validateTicket(decodedText);
            html5QrcodeScanner.clear();
        }

        var html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", {
                fps: 10,
                qrbox: 250
            }
        );
    </script>
</body>

</html>