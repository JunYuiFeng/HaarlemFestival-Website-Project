<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders - Haarlem Festival</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/style.css" />
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="../../js/manageorders.js"></script>
</head>

<body>
    <?php include_once("header.php"); ?>

    <div class="px-5">
        <h1 class="text-center">Orders Overview</h1>

        <button class="btn btn-primary" onclick="convertTableToCSV()">
            download CSV
        </button>
        <p id="statusMessage" class="text-danger mt-1"></p>
        <table class="table table-bordered table-striped table-hover mt-5">
            <?php if (sizeof($orders) != 0) {
                $reflect = new ReflectionClass('Order');
                $props = $reflect->getProperties();
                echo '<thead>';
                echo '<th>Edit</th>';
                foreach ($props as $property) {
                    echo '<th><input type="checkbox" checked=true"><a>' . $property->getName() . '</a></th>';
                }
                echo '</thead>';
            ?>
            <?php
                $reflect = new ReflectionClass('Order');
                $props = $reflect->getProperties();
                foreach ($orders as $order) {
                    echo '<tr>';
                    echo '<td class="d-flex flex-column"><a id="' . $order->getId() . '">Change status</a></td>';
                    foreach ($props as $propName) {
                        $property = $propName->getName();
                        $methodName = "get" . $property;
                        if (gettype($order->$methodName()) == "object") {
                            $time = $order->$methodName()->format('H:i');
                            echo '<td class="' . $property . '" style="white-space: nowrap;">' .  $time . '</td>';
                        } else
                            echo '<td class="' . $property . '" style="white-space: nowrap;">' . $order->$methodName() . '</td>';
                    }
                    echo '</tr>';
                }
            } else {
                echo "<h3>There is no any orders</h3>";
            }
            ?>
        </table>
    </div>
</body>

</html>