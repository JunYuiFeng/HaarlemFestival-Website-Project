<!DOCTYPE html>
<html lang="en">

<head>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="/css/style.css" />
    </head>
</head>

<body>
    <?php
    include __DIR__ . '/../header.php';
    ?>

    <h1>Test</h1>
    <form method="get" action="search.php">
        <input type="text" name="query" placeholder="Search...">
        <button type="submit">Search</button>
    </form>

    <div class="container">
        <table class="table">
            <form method="POST">
                <tr>
                    <th scope="">Id <button name="action" type="submit" value="sortIdASC">&#x25b4;</button><button
                            name="action" type="submit" value="sortIdDESC">&#x25be;</th>

                    <th scope="">Username<button name="action" type="submit" value="sortUsernameASC">&#x25b4;</button><button
                            name="action" type="submit" value="sortUsernameDESC">&#x25be;</th>

                    <th scope="">Email<button name="action" type="submit" value="sortEmailASC">&#x25b4;</button><button
                            name="action" type="submit" value="sortEmailDESC">&#x25be;</th>

                    <th scope="">Password<button name="action" type="submit" id="submit"
                            value="sortpassword">&#x25b4;&#x25be;</button></th>
                            
                    <th scope="">Role<button name="action" type="submit" id="submit"
                            value="sortrole">&#x25b4;&#x25be;</button></th>
                </tr>
            </form>
            <?php foreach ($users as $user) { ?>
                <div class="">
                    <form method="POST">
                        <tr>
                            <td scope="row">
                                <input type="hidden" name="id" value="<?= $user->getId() ?>">
                                <?= $user->getId() ?>
                            </td>
                            <td>
                                <input type="text" name="username" placeholder=<?= $user->getUsername() ?>>
                            </td>
                            <td>
                                <input type="text" name="email" placeholder=<?= $user->getEmail() ?>>
                            </td>
                            <td>
                                <input type="text" name="password" placeholder=<?= $user->getPassword() ?>>
                            </td>
                            <td>
                                <div>
                                    <select name="userType" id="userType">
                                        <?php
                                        if ($user->getUserType() == 0) {
                                            ?>
                                            <option value="admin" selected>Admin</option>
                                            <option value="user">User</option>
                                        <?php } else { ?>

                                            <option value="admin">Admin</option>
                                            <option value="user" selected>User</option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </td>
                            <td>
                                <button type="submit" name="action" value="update">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    Update
                                </button>
                                <input type="submit" name="action" value="delete">
                            </td>
                        </tr>
                    </form>
                </div>
            <?php } ?>
            <form method="POST">
                <td scope="row">
                    <?= $user->getId() + 1 ?>
                </td>
                <td>
                    <input type="text" name="username">
                </td>
                <td>
                    <input type="text" name="email">
                </td>
                <td>
                    <input type="text" name="password">
                </td>
                <td>
                    <div>
                        <select name="userType" id="userType">
                            <?php if ($user->getUserType() == 0) { ?>
                                <option value="admin" selected>Admin</option>
                                <option value="user">User</option>
                            <?php } else { ?>
                                <option value="admin">Admin</option>
                                <option value="user" selected>User</option>
                            <?php } ?>
                        </select>
                    </div>

                </td>
                <td>
                    <input type="submit" value="create" name="action">
                </td>
            </form>
        </table>

    </div>
</body>

</html>