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

<body>
    <?php include_once("header.php"); ?>

    <div class="px-5">
        <h1 class="text-center fw-bolder text-dark ff-alata display-5">Restaurant Sessions Overview</h1>

        <button class="btn btn-yellow-gradient my-4 py-3" onclick="location.href='manageSessions#addSession'">Add new session</button>

        <table class="table table-bordered table-striped table-hover">
            <thead>
                <th>Action</th>
                <th>Id</th>
                <th>Name</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Restaurant Id</th>
                <th>Restaurant Name</th>
                <th>Seats</th>
            </thead>
            <?php
            if (sizeof($sessionsData) != 0) {
                foreach ($sessionsData as $session) { ?>
                    <tr>
                        <td class="d-flex flex-column"><a href="?edit=<?= $session['id'] ?>#addSession">Edit</a><a href="?delete=<?= $session['id'] ?>">Delete</a></td>
                        <td style="white-space: nowrap;"><?= $session['id'] ?></td>
                        <td style="white-space: nowrap;"><?= $session['name'] ?></td>
                        <td style="white-space: nowrap;"><?= $session['startTime'] ?></td>
                        <td style="white-space: nowrap;"><?= $session['endTime'] ?></td>
                        <td style="white-space: nowrap;"><?= $session['restaurantId'] ?></td>
                        <td style="white-space: nowrap;"><?= $session['restaurantName'] ?></td>
                        <td style="white-space: nowrap;"><?= $session['seats'] ?></td>
                    </tr>
            <? }
            } else {
                echo "<h2>There are no any sessions</h2>";
            }
            ?>
        </table>

        <form id="addSession" action="" method="post" class="col-12 px-0 d-flex flex-column align-items-center" enctype="multipart/form-data">
            <div class="col-6">
                <div class="user-box">
                    <input type="text" name="name" required value="<?php echo (isset($editSession)) ? $editSession->getName() : ''; ?>">
                    <label>Session Name</label>
                </div>
                <div class="user-box">
                    <input type="text" name="startTime" required value="<?php echo (isset($editSession)) ? $editSession->getStartTime()->format('H:i') : ''; ?>">
                    <label>Start Time</label>
                </div>
                <div class="user-box">
                    <input type="text" name="endTime" required value="<?php echo (isset($editSession)) ? $editSession->getEndTime()->format('H:i') : ''; ?>">
                    <label>End Time</label>
                </div>
                <div class="user-box">
                    <input type="text" name="restaurantId" required value="<?php echo (isset($editSession)) ? $editSession->getRestaurantId() : ''; ?>">
                    <label>Restaurant Id</label>
                </div>
                <div class="user-box">
                    <input type="text" name="seats" required value="<?php echo (isset($editSession)) ? $editSession->getSeats() : ''; ?>">
                    <label>Amount of Seats</label>
                </div>
            </div>
            <button class="btn btn-red-gradient my-2 py-3 col-6" name="addSession" value="yes" type="submit"><?php echo (isset($_GET['edit'])) ? "Save Session" : "Add Session"; ?></button>
            <p class="error-message"><?php echo isset($this->msg) ? $this->msg : '' ?></p>

        </form>
    </div>

    <script>
        function ScrollToAddSession() {
            console.log(document.querySelector("form"));
            window.scrollTo(0, document.body.scrollHeight);
        }
    </script>
</body>

</html>