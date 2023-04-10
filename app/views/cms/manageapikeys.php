<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage API Keys</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/style.css" />
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<body>
    <?php include_once("header.php"); ?>

    <div class="px-5">
        <h1 class="text-center py-2 fw-bolder text-dark ff-alata display-5">API Keys Overview</h1>
        <div class="d-flex align-items-center">
            <form action="" method="post" class="col-3">
                <button type="submit" name="createKey" class="btn btn-yellow-gradient my-4 py-3" onclick="location.href='manageSessions#addSession'">Create new API Key</button>
            </form>
            <p class="col-9 text-muted"><b>API endpoint: </b>http://127.0.0.1/api/externalsystem/orders?API_KEY=YOUR_API_KEY</p>
        </div>
        <table class="table table-bordered table-striped table-hover">
            <?php
            $reflect = new ReflectionClass('APIKey');
            $props = $reflect->getProperties();
            echo '<thead>';
            foreach ($props as $property) {
                echo '<th>' . $property->getName() . '</th>';
            }
            echo '<th>Action</th>';
            echo '</thead>';
            ?>
            <?php
            if (sizeof($apiKeys) != 0) {
                $reflect = new ReflectionClass('APIKey');
                $props = $reflect->getProperties();
                foreach ($apiKeys as $key) {
                    echo '<tr>';
                    foreach ($props as $propName) {
                        $property = $propName->getName();
                        $methodName = "get" . $property;
                        if (gettype($key->$methodName()) == "object") {
                            $time = $key->$methodName()->format('H:i');
                            echo '<td style="white-space: nowrap;">' .  $time . '</td>';
                        } else
                            echo '<td style="white-space: nowrap;">' . $key->$methodName() . '</td>';
                    }
                    echo '<td class="d-flex flex-column"><button class="btn btn-danger" onclick="document.location.href=`?delete=' . $key->getToken() . '`">Delete</button></td>';
                    echo '</tr>';
                }
            } else {
                echo "<h2>There are no any keys</h2>";
            }
            ?>
        </table>

    </div>

</body>

</html>