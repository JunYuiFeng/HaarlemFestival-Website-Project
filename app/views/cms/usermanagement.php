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
    <?php
    include __DIR__ . '/../header.php';
    ?>

    <div class="container">
        <h1>Test</h1>
        <form id="searchFilter" class="mt-4 mb-4">
            <input class="p-1" type="text" id="searchInput" placeholder="Search...">
        </form>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
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

        fetch(`http://localhost/api/cms`)
            .then(result => result.json())
            .then(users => {

                // Create new table rows for each search result
                users.forEach(user => {
                    const row = document.createElement("tr");
                    row.innerHTML = `
                <td>${user.id}</td>
                <td><input type="text" placeholder="${user.username}"></td>
                <td><input type="text" placeholder="${user.email}"></td>
                <td><input type="text" placeholder="${user.password}"></td>
                <td><input type="text" placeholder="${user.userType}"></td>
                <td><input type="submit" value="Update"></td>
            `;
                    userTableBody.appendChild(row);
                });
            })

        searchInput.addEventListener("input", function(event) {

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
            <td><input type="text" placeholder="${user.username}"></td>
            <td><input type="text" placeholder="${user.email}"></td>
            <td><input type="text" placeholder="${user.password}"></td>
            <td><input type="text" placeholder="${user.userType}"></td>
            <td><input type="submit" value="Update"></td>
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