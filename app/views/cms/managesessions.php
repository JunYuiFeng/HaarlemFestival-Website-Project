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
    <div class="px-5">
        <h1>Restaurant Sessions Overview</h1>

        <button class="btn btn-yellow-gradient my-4 py-3" onclick="location.href='manageSessions#addSession'">Add new session</button>

        <table class="table table-bordered table-striped table-hover">
            <?php if (sizeof($sessions) != 0) {
                $reflect = new ReflectionClass('Session');
                $props = $reflect->getProperties();
                echo '<thead>';
                echo '<th>Edit</th>';
                foreach ($props as $property) {
                    echo '<th>' . $property->getName() . '</th>';
                }
                echo '</thead>';
            ?>
            <?php
                $reflect = new ReflectionClass('Session');
                $props = $reflect->getProperties();
                foreach ($sessions as $session) {
                    echo '<tr>';
                    echo '<td class="d-flex flex-column"><a href="?edit=' . $session->getId() . '">Edit</a><a href="?delete=' . $session->getId() . '">Delete</a></td>';
                    foreach ($props as $propName) {
                        $property = $propName->getName();
                        $methodName = "get" . $property;
                        if (gettype($session->$methodName()) == "object") {
                            $time = $session->$methodName()->format('H:i');
                            echo '<td style="white-space: nowrap;">' .  $time . '</td>';
                        } else
                            echo '<td style="white-space: nowrap;">' . $session->$methodName() . '</td>';
                    }
                    echo '</tr>';
                }
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
            </div>
            <button class="btn btn-red-gradient my-2 py-3 col-6" name="addSession" value="yes" type="submit"><?php echo (isset($_GET['edit'])) ? "Save Session" : "Add Session"; ?></button>
            <p class="error-message"><?php echo isset($this->msg) ? $this->msg : '' ?></p>

        </form>
    </div>
            
    <script>
        function ScrollToAddSession(){
            console.log(document.querySelector("form"));
            window.scrollTo(0, document.body.scrollHeight);
        }
    </script>
</body>

</html>