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
    require_once __DIR__ . '/../../services/userservice.php';
    ?>

    <div class="container">
        <h1>Test</h1>
        <form id="searchFilter" class="mt-4 mb-4">
            <input class="p-1" type="text" id="searchInput" placeholder="Search...">
        </form>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id<button name="action" type="submit" value="sortIdASC">&#x25b4;</button><button
                            name="action" type="submit" value="sortIdDESC">&#x25be;</th>
                    <th scope="col">Username<button name="action" type="submit"
                            value="sortUsernameASC">&#x25b4;</button><button name="action" type="submit"
                            value="sortUsernameDESC">&#x25be;</th>
                    <th scope="col">Email<button name="action" type="submit"
                            value="sortEmailASC">&#x25b4;</button><button name="action" type="submit"
                            value="sortEmailDESC">&#x25be;</th>

                    <th scope="col">Password</th>
                    <th scope="col">Role</th>
                </tr>
            </thead>
            <tbody id="userTableBody">

            </tbody>
        </table>
    </div>

    <script>
        const searchFilter = document.getElementById("searchFilter");
        const searchInput = document.getElementById("searchInput");
        const userTableBody = document.getElementById("userTableBody");

        // const userId = document.getElementById("userId").value;
        // const userName = document.getElementById("userName").value;
        // const userEmail = document.getElementById("userEmail").value;

        function deleteRow(id) {
            document.getElementById(id).remove();
        }

        function fetchUsers(query) {
            fetch(`http://localhost/api/cms/searchfilter?query=${query}`)
                .then(result => result.json())
                .then(userResult => {

                    // Clear existing table rows
                    userTableBody.innerHTML = "";

                    if (userResult) {

                        // Create new table rows for each search result
                        userResult.forEach(user => {
                            const row = document.createElement("tr");
                            row.innerHTML = `
    <td id="userId">${user.id}</td>
    <td id="userName"><input type="text" placeholder="${user.username}"></td>
    <td id="userEmail"><input type="text" placeholder="${user.email}"></td>
    <td><input id="update" type="submit" value="Update" onclick="update(${user.id}, '${user.username}', '${user.email}')"></td>
    <td><button class="btn-danger" onclick="delete("")">delete</button></td>
`;

                            userTableBody.appendChild(row);
                        });
                    }
                })
                .catch(error => console.error(error))
        }

        searchInput.addEventListener("input", function (event) {
            const query = searchInput.value; // Get search query from input field
            fetchUsers(query);
        });

        // Trigger input event on page load
        const inputEvent = new Event('input');
        searchInput.dispatchEvent(inputEvent);
    </script>

    <<<<<<< HEAD <?php
    include __DIR__ . '/../footer.php';
    ?>

        =======

        <?php
        include __DIR__ . '/../footer.php';
        ?>
        >>>>>>> main
</body>

</html>

<!-- function update(userId, userName, userEmail) {

fetch(`http://localhost/api/cms/update`, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            userId: userId,
            username: userName,
            email: userEmail
        })
    })
    .then(response => {
        if (response.ok) {
            // Handle successful response
            console.log("User data updated successfully.");
        } else {
            // Handle error response
            console.error("Update request failed.");
        }
    })
    .catch(error => {
        // Handle network error
        console.error(error);
    });
} -->