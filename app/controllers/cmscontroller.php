<?php
require_once __DIR__ . '/../services/editPageService.php';
require_once __DIR__ . '/../services/sessionservice.php';
require_once __DIR__ . '/../services/reservationservice.php';
require_once __DIR__ . '/../services/restaurantservice.php';
require_once __DIR__ . '/../services/orderservice.php';
require_once __DIR__ . '/../services/apikeyservice.php';
require_once __DIR__ . '/controller.php';


class CmsController extends Controller
{
    private $content;
    private $restaurants;
    private $restaurantService;
    private $contentEditorService;
    private $sessionService;
    private $reservationService;
    private $orderService;
    private $apiKeyService;
    private $msg;


    function __construct()
    {
        parent::__construct();
        $this->contentEditorService = new EditPageService();
        $this->restaurantService = new RestaurantService();
        $this->sessionService = new SessionService();
        $this->reservationService = new ReservationService();
        $this->orderService = new OrderService();
        $this->apiKeyService = new APIKeyService();
        $this->msg = "";
    }

    public function index()
    {
        require __DIR__ . '/../views/cms/index.php';
    }

    public function manageusers()
    {
        $users = $this->userService->getAll();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            switch ($_POST['action']) {
                case 'create':
                    $this->createUser();
                    $users = $this->userService->getAll();
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

        require __DIR__ . '/../views/cms/manageusers.php';
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
        foreach ($users as $user) {
            echo $user->getEmail();
        }
        return $users;
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
            $this->userService->createUser($username, $email, $password, $userType);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function editpagecontent()
    {
        if (isset($_GET["webPage"])) {
            $webPage = htmlspecialchars($_GET["webPage"]);
            if (isset($_POST['editor'])) {
                $editor_data = htmlspecialchars($_POST['editor']);
                $this->contentEditorService->setNewPageContent($webPage, $editor_data);
            }
            $this->content = $this->contentEditorService->getPageContent($webPage);

            require __DIR__ . '/../views/cms/editpagecontent.php';
        } else {
            require __DIR__ . '/../views/notfound.php';
        }
    }

    public function managerestaurants()
    {
        $this->restaurants = $this->restaurantService->getAll();
        if (isset($_GET["delete"])) {
            $id = htmlspecialchars($_GET['delete']);
            $this->restaurantService->deleteRestaurant($id);
            header("location: managerestaurants");
        }
        require __DIR__ . '/../views/cms/managerestaurants.php';
    }

    public function addrestaurant()
    {
        if (isset($_GET["edit"])) {
            $restaurant = $this->restaurantService->getById(htmlspecialchars($_GET["edit"]));
        }
        if (isset($_POST["addrestaurant"])) {
            foreach ($_POST as $field) {
                if (empty($field))
                    $this->msg = "Please fill all the fields";
            }
            if ($this->msg == "") {
                $restaurant = (!isset(($_GET["edit"]))) ? new Restaurant() : $restaurant;
                if (isset($_FILES['coverImg']) && $_FILES['coverImg']['name'] != "") {
                    $coverImg = $_FILES['coverImg'];
                    if ($coverImg && $coverImg['error'] == 0) {
                        $filename = $coverImg['name'];
                        $destination = __DIR__ . '/../public/img/' . $filename;
                        if (move_uploaded_file($coverImg['tmp_name'], $destination)) {
                            $restaurant->setCoverImg($filename);
                        } else {
                            $this->msg = "Image couldn't upload. Please try again";
                        }
                    } else {
                        $this->msg = "Image couldn't upload. Please try again";
                    }
                } else {
                    if (isset($_GET["edit"])) {
                        $this->msg = "";
                        $restaurant->setCoverImg($this->restaurantService->getById(htmlspecialchars($_GET["edit"]))->getCoverImg());
                    } else
                        $this->msg = "Please upload a cover image";
                }
            }
            if ($this->msg == "") {
                $restaurant->setName(htmlspecialchars($_POST['name']));
                $restaurant->setCuisine(htmlspecialchars($_POST['cuisine']));
                $restaurant->setFoodType(htmlspecialchars($_POST['foodType']));
                $restaurant->setSessionDuration(htmlspecialchars($_POST['sessionDuration']));
                $restaurant->setPriceIndicator(htmlspecialchars($_POST['priceIndicator']));
                $restaurant->setPriceAge12AndUnder(htmlspecialchars($_POST['priceAge12AndUnder']));
                $restaurant->setRating(htmlspecialchars($_POST['rating']));
                $restaurant->setHasMichelin(isset($_POST['hasMichelin']));
                $restaurant->setIsFestival(isset($_POST['isFestival']));
                $restaurant->setPriceAboveAge12(htmlspecialchars($_POST['priceAboveAge12']));
                $restaurant->setPhoneNumber(htmlspecialchars($_POST['phoneNumber']));
                $restaurant->setAddress(htmlspecialchars($_POST['address']));
                $restaurant->setWebsite(htmlspecialchars($_POST['website']));
                $restaurant->setDescription(htmlspecialchars($_POST['description']));

                if (isset($_GET["edit"])) {
                    if ($this->restaurantService->updateRestaurant($restaurant, htmlspecialchars($_GET["edit"]))) {
                        header("location: managerestaurants");
                    } else
                        $this->msg = "Something went wrong. Please try again";
                } else {
                    if ($this->restaurantService->insertRestaurant($restaurant)) {
                        header("location: managerestaurants");
                    } else
                        $this->msg = "Something went wrong. Please try again";
                }
            }
        }

        require __DIR__ . '/../views/cms/addrestaurant.php';
    }

    public function managesessions()
    {
        if (isset($_GET["edit"])) {
            $editSession = $this->sessionService->getById(htmlspecialchars($_GET["edit"]));
        }

        if (isset($_POST["addSession"])) {
            foreach ($_POST as $field) {
                if (empty($field))
                    $this->msg = "Please fill all the fields";
            }
            if ($this->msg == "") {
                $session = (isset($_GET["edit"])) ? $editSession : new Session(); // checking if user edits session or creates new one
                $session->setName($_POST["name"]);
                $session->setStartTime($_POST["startTime"]);
                $session->setSeats($_POST["seats"]);
                $session->setEndTime($_POST["endTime"]);
                $session->setRestaurantId($_POST["restaurantId"]);
                if (isset($_GET["edit"])) {
                    if ($this->sessionService->update($session)) {
                        header("location: managesessions");
                    } else
                        $this->msg = "Something went wrong. Please try again";
                } else {
                    if ($this->sessionService->insert($session)) {
                        header("location: managesessions");
                    } else
                        $this->msg = "Something went wrong. Please try again";
                }
            }
        }

        if (isset($_GET["delete"])) {
            $id = htmlspecialchars($_GET['delete']);
            $this->sessionService->delete($id);
            header("location: managesessions");
        }

        $sessions = $this->sessionService->getAll();
        $sessionsData = array();
        foreach ($sessions as $session) {
            $restaurant = $this->restaurantService->getById($session->getRestaurantId());
            $data = array(
                "id" => $session->getId(),
                "name" => $session->getName(),
                "startTime" => $session->getStartTime()->format('H:i'),
                "endTime" => $session->getEndTime()->format('H:i'),
                "restaurantId" => $session->getRestaurantId(),
                "restaurantName" => $restaurant->getName(),
                "seats" => $session->getSeats()
            );
            array_push($sessionsData, $data);
        }
        require __DIR__ . '/../views/cms/managesessions.php';
    }

    public function managereservations()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $reservation = new Reservation();
            $reservation->setRestaurantId(htmlspecialchars($_POST['restaurant']));
            $reservation->setDate(htmlspecialchars($_POST['date']));
            $reservation->setAmountAbove12(htmlspecialchars($_POST['amountAbove12']));
            $reservation->setAmountUnderOr12(htmlspecialchars($_POST['amountUnderOr12']));
            $reservation->setSessionId(htmlspecialchars($_POST['session']));
            $reservation->setStatus(htmlspecialchars($_POST['status']));
            $reservation->setComments(htmlspecialchars($_POST['comment']));

            $this->reservationService->insertReservation($reservation);
        }

        if (isset($_GET["deactivateid"])) {
            $id = htmlspecialchars($_GET['deactivateid']);
            $this->reservationService->updateStatus($id, 'unactive');

            header("location: managereservations");
        }

        if (isset($_GET["activateid"])) {
            $id = htmlspecialchars($_GET['activateid']);
            $this->reservationService->updateStatus($id, 'active');

            header("location: managereservations");
        }

        $restaurants = $this->restaurantService->getAll();

        $reservationData = array();

        foreach ($this->reservationService->getAll() as $reservation) {
            $reservationData[] = array(
                "id" => $reservation->getId(),
                "date" => $reservation->getDate(),
                "amountAbove12" => $reservation->getAmountAbove12(),
                "amountUnderOr12" => $reservation->getAmountUnderOr12(),
                "comments" => $reservation->getComments(),
                "status" => $reservation->getStatus(),
                "session" => $this->sessionService->getById($reservation->getSessionId())->getName(),
                "restaurant" => $this->restaurantService->getById($reservation->getRestaurantId())->getName()
            );
        }
        require __DIR__ . '/../views/cms/managereservations.php';
    }

    public function manageorders()
    {
        $orders = $this->orderService->getAll();
        require __DIR__ . '/../views/cms/manageorders.php';
    }

    public function manageapikeys()
    {
        if (isset($_POST['createKey'])) {
            $this->apiKeyService->create();
        }
        if (isset($_GET["delete"])) {
            $token = htmlspecialchars($_GET['delete']);
            $apiKey = new ApiKey();
            $apiKey->setToken($token);
            $this->apiKeyService->delete($apiKey);
            header("location: manageapikeys");
        }
        $apiKeys = $this->apiKeyService->getAll();
        require __DIR__ . '/../views/cms/manageapikeys.php';
    }
}
