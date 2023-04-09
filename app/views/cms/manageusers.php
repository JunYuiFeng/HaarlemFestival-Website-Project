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
    <?php include_once("header.php"); ?>

    <div class="container">
        <h1 class="text-center my-4">Manage Users</h1>
        <div class="row">
            <input class="p-1 col-3" type="text" id="searchInput" placeholder="Search username...">
            <div class="col-7"></div>
            <button onclick="document.location.href='#createUserBtn'" class="col-2 btn btn-primary">Create User</button>
        </div>


        <p class="text-danger text-center my-3" id="outputMessage"><?= isset($outputMsg)? $outputMsg : "" ?></p>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id
                        <button name="action" onclick="sort('idASC')" value="sortIdASC">&#x25b4;</button>
                        <button name="action" onclick="sort('idDESC')" value="sortIdASC">&#x25b4;</button>
                    </th>

                    <th scope="col">Username
                        <button name="action" onclick="sort('usernameASC')" type="submit"
                            value="sortUsernameASC">&#x25b4;</button>
                        <button name="action" type="submit" onclick="sort('usernameDESC')"
                            value="sortUsernameDESC">&#x25be;</button>
                    </th>
                    <th scope="col">Email
                        <button name="action" type="submit" onclick="sort('emailASC')"
                            value="sortEmailASC">&#x25b4;</button>
                        <button name="action" type="submit" onclick="sort('emailDESC')" value="sortEmailDESC">&#x25be;
                        </button>
                    </th>
                    <th scope="col">
                        Registration Date
                    </th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody id="userTableBody">

            </tbody>
            <tbody>
                <form method="POST">
                    <td scope="row">
                    </td>
                    <td>
                        <input type="text" name="username" placeholder="username" class="pb-1">
                    </td>
                    <td>
                        <input type="text" name="email" placeholder="email" class="pb-1">
                    </td>
                    <td>
                        <input type="text" name="password" placeholder="password" class="pb-1">
                    </td>
                    <td>
                        <div>
                            <select name="userType" id="userType" class="px-2 py-1">
                                <option value="0">Admin</option>
                                <option value="1" selected>User</option>
                                <option value="2">Employee</option>
                            </select>
                        </div>
                    </td>
                    <td>
                        <button class="btn btn-primary" type="submit" name="action" value="create" id="createUserBtn">Create</button>
                    </td>
            </tbody>
            </form>

            </tbody>
        </table>
    </div>


    <?php
    include __DIR__ . '/../footer.php';
    ?>


    <script>
        const searchFilter = document.getElementById("searchFilter");
        const searchInput = document.getElementById("searchInput");
        const userTableBody = document.getElementById("userTableBody");

        function sort(itemToSort) {
            const sortDirection = itemToSort.toLowerCase().endsWith("asc") ? 1 : -1;
            const itemKey = itemToSort.toLowerCase().replace(/asc|desc/g, "").trim();

            fetch(`http://localhost/api/cms`)
                .then(result => result.json())
                .then(userResult => {
                    // Sort the results by the selected item and direction
                    userResult.sort((a, b) => {
                        if (a[itemKey] < b[itemKey]) {
                            return -sortDirection;
                        } else if (a[itemKey] > b[itemKey]) {
                            return sortDirection;
                        } else {
                            return 0;
                        }
                    });

                    // Clear existing table rows
                    userTableBody.innerHTML = "";

                    if (userResult) {
                        // Create new table rows for each sorted result
                        userResult.forEach(user => {
                            if (user.userType == 0) {
                                user.userType = "Admin";
                            } else if(user.userType == 1){
                                user.userType = "User";
                            } else if(user.userType == 2){
                                user.userType = "Employee";
                            }
                            const row = document.createElement("tr");
                            row.innerHTML = `
            <td id="userId">${user.id}</td>
            <td><input id="userName_${user.id}" value='${user.username}' ></td>
            <td><input  id="userEmail_${user.id}" value='${user.email}' ></td>
            <td><input id="userRegistrasionDate_${user.id}" value='${user.registrationDate}'></td>
            <td>
                            <select id="userType_${user.id}">
                                <option value="0" ${user.userType === "Admin" ? "selected" : ""}>Admin</option>
                                <option value="1" ${user.userType === "User" ? "selected" : ""}>User</option>
                                <option value="2" ${user.userType === "Employee" ? "selected" : ""}>Employee</option>
                            </select>
            <td><button class="btn btn-warning" id="update${user.id}" onclick="updateUser(${user.id})">Update</button</td>
            <td><button class="btn btn-danger" id="delete${user.id}" onclick="deleteUser(${user.id})">Delete</button></td>
          `;
                            userTableBody.appendChild(row);
                        });
                    }
                })
                .catch(error => console.log(error));
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
                            if (user.userType == 0) {
                                user.userType = "Admin";
                            } else if(user.userType == 1){
                                user.userType = "User";
                            } else if(user.userType == 2){
                                user.userType = "Employee";
                            }
                            const row = document.createElement("tr");
                            row.innerHTML = `
                    
                        <td id="userId">${user.id}</td>
                        <td><input id="userName_${user.id}" value='${user.username}' ></td>
                        <td><input  id="userEmail_${user.id}" value='${user.email}' ></td>
                        <td><input id="userRegistrasionDate_${user.registrationDate}" value='${user.registrationDate}'></td>
                        <td>
                            <select id="userType_${user.id}">
                                <option value="0" ${user.userType === "Admin" ? "selected" : ""}>Admin</option>
                                <option value="1" ${user.userType === "User" ? "selected" : ""}>User</option>
                                <option value-"2" ${user.userType === "Employee" ? "selected" : ""}>Employee</option>
                            </select>
                        </td>
                        <td><button class="btn btn-warning" id="update${user.id}" onclick="updateUser(${user.id})">Update</button></td>
                        <td><button class="btn btn-danger" onclick="deleteUser(${user.id})">Delete</button></td>`;
                            userTableBody.appendChild(row);
                        });
                    }
                })
                .catch(error => console.error(error))
        }
        searchInput.addEventListener("input", function(event) {
            const query = searchInput.value; // Get search query from input field
            fetchUsers(query);
        });

        // Trigger input event on page load
        const inputEvent = new Event('input');
        searchInput.dispatchEvent(inputEvent);

        function deleteUser(id) {

            if (!confirm('Are you sure you want to delete this user from the database?' + id)) {
                return;
            }
            fetch(`http://localhost/api/cms`, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    id: id,
                })
            })
                .then(response => {
                    if (response.ok) {
                        document.getElementById("outputMessage").innerText = "User id: " + id + " has been deleted.";
                        fetchUsers("");
                        document.getElementById('outputMessage').classList.replace("text-danger", "text-success");
                    } else {
                        document.getElementById("outputMessage").innerText = "Something went wrong";
                        document.getElementById('outputMessage').classList.replace("text-success", "text-danger");
                    }
                })
                .catch(error => {
                    console.error(error);
                });
        }

        function updateUser(id) {
            const username = document.getElementById("userName_" + id).value;
            const email = document.getElementById("userEmail_" + id).value;
            const type = document.getElementById("userType_" + id).value;

            var raw = JSON.stringify({
                "id": id,
                "username": username,
                "email": email,
                "type": type,
            });

            var requestOptions = {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: raw
            };

            fetch("http://127.0.0.1/api/cms", requestOptions)
                .then(response => {
                    if (response.ok) {
                        document.getElementById("outputMessage").innerText = "User " + username + " updated successfully.";
                        document.getElementById('outputMessage').classList.replace("text-danger", "text-success");

                    } else {
                        document.getElementById("outputMessage").innerText = "Something went wrong";
                        document.getElementById('outputMessage').classList.replace("text-success", "text-danger");
                    }
                })
                .catch(error => {
                    console.error(error);
                });
        }
    </script>

</body>

</html>