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
        require __DIR__ . '/../views/cms/usermanagement.php';
    }
    public function create()
    {
        require __DIR__ . '/../views/cms/create.php';
    }
    public function delete()
    {
        $id = $_GET["id"];
        $this->userService->delete($id);
        header("location: index");
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
