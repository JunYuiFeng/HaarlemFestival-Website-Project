<?php
require_once __DIR__ . '/../services/editPageService.php';
require_once __DIR__ . '/../services/restaurantsManagementService.php';

require_once __DIR__ . '/../services/userservice.php';

class CmsController
{
    private $content;
    private $restaurants;
    private $contentEditorService;
    private $restaurantManagementService;
    private $msg;
    private $userService;


    function __construct()
    {
        $this->contentEditorService = new EditPageService();
        $this->restaurantManagementService = new RestaurantsManagementService();
        $this->msg = "";
        $this->userService = new UserService();
    }

    public function usermanagement()
    {
        $users = $this->userService->getAll();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            echo "POST";
            switch ($_POST['action']) {
                case 'update':
                    echo "update";
                    $this->updateItem();
                    break;
                case 'delete':
                    $this->delete();
                    echo "delete";
                    break;
                case 'create':
                    $this->createUser();
                    break;
                case 'sortIdAsc':
                    sort($users);
                    break;
                case 'sortIdDESC':
                    rsort($users);
                    break;
                case 'sortUsernameASC':
                    $this->sortItem($users, "username", "ASC");
                    break;
                case 'sortUsernameDESC':
                    $users = $this->sortItem($users, "username", "DESC");
                    break;
                case 'sortEmailASC':
                    $this->sortItem($users, "email", "ASC");
                    break;
                case 'sortEmailDESC':
                    $users = $this->sortItem($users, "email", "DESC");
                    break;
                default:
                    break;
            }
        }

        require __DIR__ . '/../views/cms/usermanagement.php';
    }
    public function sortItem($users, $item, $sortType)
    {
        $items = array();
        foreach ($users as $user) {
            $method = 'get' . ucfirst($item); // Get the name of the getter method for the property being sorted
            array_push($items, $user->$method()); // Call the getter method on the user object to get the value of the property, and add it to the $items array
        }

        if ($sortType == "DESC") {
            array_multisort($items, SORT_DESC, $users); // Sort both the $items and $users arrays in descending order based on the values in the $items array
        } else { // Otherwise, sort in ascending order
            array_multisort($items, SORT_ASC, $users);
        }
        foreach($users as $user){
            echo $user->getEmail();
        }
        return $users;
    }
    public function delete()
    {
        $id = $_POST["id"];
        $this->userService->deleteUser($id);
    }
    public function updateItem()
    {
        // put to service
        try {
            if (empty($_POST['username']) || empty($_POST['email']) || empty($_POST['userType']) || empty($_POST['id'])) {
                $msg = "field empty, please fill in";
                echo "update failed";
                return;
            }

            $username = htmlspecialchars($_POST['username']);
            $email = htmlspecialchars($_POST['email']);
            $id = htmlspecialchars($_POST['id']);
            $userType = htmlspecialchars($_POST['userType']);
            if ($userType == "admin") {
                $userType = 0;
            } else {
                $userType = 1;
            }
            $this->userService->editUserAsAdmin($username, $email, $id, $userType);

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }


    public function createUser()
    {
        try {
            if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email']) || empty($_POST['userType'])) {
                $msg = "field empty, please fill in";
                echo $_POST['username'];
                echo $_POST['password'];
                echo $_POST['email'];
                echo $_POST['userType'];


                return;
            }
            $username = htmlspecialchars($_POST['username']);
            $password = password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT);

            $email = htmlspecialchars($_POST['email']);
            $userType = htmlspecialchars($_POST['userType']);
            if ($userType == "admin") {
                $userType = 0;
            } else {
                $userType = 1;
            }
            echo "controler";
            $this->userService->createUser($username, $email, $password, $userType);

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function editpagecontent()
    {
        if (isset($_GET["webPage"])) {
            $webPage = $_GET["webPage"];

            $this->content = $this->contentEditorService->getPageContent($webPage);
            if (isset($_POST['editor'])) {
                $editor_data = $_POST['editor'];
                $this->contentEditorService->setNewPageContent($webPage, $editor_data);
            }
            require __DIR__ . '/../views/cms/editpagecontent.php';
        } else {
            require __DIR__ . '/../views/notfound.php';
        }
    }
    public function restaurants()
    {
        $this->restaurants = $this->restaurantManagementService->getAll();
        if (isset($_GET["delete"])) {
            $id = $_GET['delete'];
            $this->restaurantManagementService->deleteRestaurant($id);
            header("location: restaurants");
        }
        require __DIR__ . '/../views/cms/restaurants.php';
    }
    public function addrestaurant()
    {
        if (isset($_POST["addrestaurant"])) {
            foreach ($_POST as $field) {
                if (empty($field))
                    $this->msg = "Please fill all the fields";
            }
            if ($this->msg == "") {
                $restaurant = new Restaurant();
                $coverImg = $_FILES['coverImg'];
                if ($coverImg && $coverImg['error'] == 0) {
                    $filename = $coverImg['name'];
                    $destination = __DIR__ . '/../public/img/' . $filename;
                    if (move_uploaded_file($coverImg['tmp_name'], $destination)) {
                        $restaurant->setCoverImg($filename);
                    }
                }
                $restaurant->setName($_POST['name']);
                $restaurant->setCuisine($_POST['cuisine']);
                $restaurant->setFoodType($_POST['foodType']);
                $restaurant->setSessionDuration($_POST['sessionDuration']);
                $restaurant->setPriceIndicator($_POST['priceIndicator']);
                $restaurant->setPriceAge12AndUnder($_POST['priceAge12AndUnder']);
                $restaurant->setRating($_POST['rating']);
                $restaurant->setHasMichelin(isset($_POST['hasMichelin']));
                $restaurant->setIsFestival(isset($_POST['isFestival']));
                $restaurant->setPriceAboveAge12($_POST['priceAboveAge12']);
                $restaurant->setPhoneNumber($_POST['phoneNumber']);
                $restaurant->setAddress($_POST['address']);
                $restaurant->setSeats($_POST['seats']);
                $restaurant->setWebsite($_POST['website']);
                $restaurant->setDescription($_POST['description']);

                if ($this->restaurantManagementService->insertRestaurant($restaurant)) {
                    header("location: restaurants");
                } else {
                    $this->msg = "Something went wrong. Please try again";
                }
            }
        }

        require __DIR__ . '/../views/cms/addrestaurant.php';
    }
}
