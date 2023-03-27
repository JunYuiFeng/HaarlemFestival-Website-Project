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
    
    <h1>Test</h1>
    <form method="get" action="search.php">
        <input type="text" name="query" placeholder="Search...">
        <button type="submit">Search</button>
    </form>
    <script>
        // Fetch users from API and create rows for each user in the table
        fetch(`http://localhost/api/cms`)
            .then(result => result.json())
            .then(users => {
                // Create new table rows for each search result
                users.forEach(user => {
                    const row = document.createElement("tr");
                    row.innerHTML = `
                    <td>${user.id}</td>
                    <td><input type="text" id="username" name="username" placeholder="${user.username}"value="${user.username}"></td>
                    <td><input type="text" id="email" name="email" placeholder="${user.email}" value="${user.email}"></td>
                    <td>
                        <select name="userType" id="userType">
                            <option value="1" ${user.userType === 1 ? "selected" : ""}>User</option>
                            <option value="0" ${user.userType === 0 ? "selected" : ""}>Admin</option>
                        </select>
                    </td>
                    <td>
                        <input type="hidden" id="id" name="id" value="${user.id}">
                        <input type="hidden" id="password" name="password" value="${user.password}">
                    </td>
                `;
                    // Create update button and set its click event handler
                    var buttonUpdate = document.createElement("button");
                    buttonUpdate.innerHTML = "Update";

                    id = document.getElementById("id");
                    username = document.getElementById("username");
                    email = document.getElementById("email");
                    password = document.getElementById("password");
                    userType = document.getElementById("userType");

                    if (userType == "admin") {
                        userType = 0;
                    } else {
                        userType = 1;
                    }
                    buttonUpdate.onclick = update(id, username, email, password, userType);
                    row.appendChild(buttonUpdate);

                    userTableBody.appendChild(row);
                });

            });

        // Define update function
        function update(id, username, email, password, userType) {

        }
    </script>
    <script>
        const searchFilter = document.getElementById("searchFilter");
        const searchInput = document.getElementById("searchInput");
        const userTableBody = document.getElementById("userTableBody");

        searchInput.addEventListener("input", function (event) { // add this line
            const query = searchInput.value; // Get search query from input field
            fetch(`http://localhost/api/cms?query=${query}`)
                .then(result => result.json())
                .then(userResult => {
                    // Clear existing table rows
                    userTableBody.innerHTML = "";
                    if (userResult) {
                        // Create new table rows for each search result
                        userResult.forEach(user => {
                            const row = document.createElement("tr");
                            row.innerHTML = `
                        <td>${user.id}</td>
                        <td><input type="text" name="username" value="${user.username}"></td>
                        <td><input type="text" name="email" value="${user.email}"></td>
                        <td>
                            <select name="userType" id="userType">
                                <option value="1" ${user.userType === 1 ? "selected" : ""}>User</option>
                                <option value="0" ${user.userType === 0 ? "selected" : ""}>Admin</option>
                            </select>
                        </td>
                        <td>
                        </td>
        `;

                            userTableBody.appendChild(row);
                        });
                    }
                })
                .catch(error => console.error(error))
        });
    </script>

<?php
include __DIR__ . '/../footer.php';
?>

</body>

</html>