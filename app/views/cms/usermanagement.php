<!DOCTYPE html>
<html lang="en">

<head>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="/css/style.css" />
    </head>
</head>

<body>
    <h1>Test</h1>
    <form method="get" action="search.php">
        <input type="text" name="query" placeholder="Search...">
        <button type="submit">Search</button>
    </form>

    <table class="table">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">Password</th>
            <th scope="col">Role</th>
        </tr>
        <?php foreach ($users as $user) { ?>
            <div class="col-4">
                <tr>
                    <td scope="row">
                        <?= $user->getId() ?>
                    </td>
                    <td>
                        <input type="text" placeholder=<?= $user->getUsername() ?>>
                    </td>
                    <td>
                        <input type="text" placeholder=<?= $user->getEmail() ?>>
                    </td>
                    <td>
                        <input type="text" placeholder=<?= $user->getPassword() ?>>
                    </td>
                    <td>
                        <input type="text" placeholder=<?= $user->getUserType() ?>>
                    </td>
                    <td>
                        <input type="submit" value="Update">
                    </td>
            </div>

        <?php } ?>
    </table>
</body>

</html>