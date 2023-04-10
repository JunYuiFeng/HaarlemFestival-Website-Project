<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurants</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/style.css" />
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<body>
    <?php include_once("header.php"); ?>

    <div class="px-5">
        <h1 class="text-center">Restaurants Overview</h1>


        <button class="btn btn-yellow-gradient my-4 py-3" onclick="location.href = 'addrestaurant'">Add new restaurant</button>

        <table class="table-responsive table table-bordered table-striped table-hover">
            <?php if (sizeof($this->restaurants) != 0) {
                $reflect = new ReflectionClass('Restaurant');
                $props = $reflect->getProperties();
                echo '<thead>';
                echo '<th>Edit</th>';
                foreach ($props as $property) {
                    echo '<th>' . $property->getName() . '</th>';
                }
                echo '</thead>';
            ?>
            <?php
                $reflect = new ReflectionClass('Restaurant');
                $props = $reflect->getProperties();
                foreach ($this->restaurants as $restaurant) {
                    echo '<tr>';
                    echo '<td class="d-flex flex-column"><a href="addrestaurant?edit=' . $restaurant->getId() . '">Edit</a><a href="?delete=' . $restaurant->getId() . '">Delete</a></td>';
                    foreach ($props as $propName) {
                        $property = $propName->getName();
                        $methodName = "get" . $property;
                        echo '<td class="text-truncate" style="max-width: 300px">' . $restaurant->$methodName() . '</td>';
                    }
                    echo '</tr>';
                }
            } else {
                echo "<h2>There is no restaurants</h2>";
            }
            ?>
        </table>
    </div>

</body>

</html>