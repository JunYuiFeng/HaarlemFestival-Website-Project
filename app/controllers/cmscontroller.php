<?php
require_once __DIR__ . '/../services/editPageService.php';
require_once __DIR__ . '/../services/restaurantsmanagementservice.php';
require_once __DIR__ . '/../services/sessionservice.php';
require_once __DIR__ . '/../services/reservationservice.php';
require_once __DIR__ . '/../services/restaurantservice.php';
require_once __DIR__ . '/../services/orderservice.php';
require_once __DIR__ . '/../services/apikeyservice.php';
require_once __DIR__ . '/../services/danceservice.php';
require_once __DIR__ . '/../services/venueservice.php';
require_once __DIR__ . '/../services/artistservice.php';
require_once __DIR__ . '/controller.php';


class CmsController extends Controller
{
    private $content;
    private $restaurants;
    private $restaurantService;
    private $contentEditorService;
    private $restaurantManagementService;
    private $sessionService;
    private $reservationService;
    private $orderService;
    private $apiKeyService;
    private $msg;
    private $danceService;
    private $venueService;
    private $artistService;


    function __construct()
    {
        parent::__construct();
        $this->contentEditorService = new EditPageService();
        $this->restaurantManagementService = new RestaurantsManagementService();
        $this->restaurantService = new RestaurantService();
        $this->sessionService = new SessionService();
        $this->reservationService = new ReservationService();
        $this->orderService = new OrderService();
        $this->apiKeyService = new APIKeyService();
        $this->danceService = new DanceService();
        $this->venueService = new VenueService();
        $this->artistService = new ArtistService();
        $this->msg = "";
    }

    public function usermanagement()
    {
        $users = $this->userService->getAll();
        require __DIR__ . '/../views/cms/usermanagement.php';
    }
    public function manageDance()
    {
        $venues = $this->venueService->getAll();
        $tickets = $this->danceService->getAll();
        $artists = $this->artistService->getAll();
        $days = $this->danceService->getAllDate();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            switch ($_POST['action']) {
                case 'deleteVenue':
                    $this->venueService->removeVenue($_POST['venueId']);
                    $venues = $this->venueService->getAll();
                    break;
                case 'updateVenue':
                    if ((empty($_POST['venueId']) || empty($_POST['venueName']) || empty($_POST['venueAddress']) || empty($_POST['venueImage'])))
                        return;
                    $this->venueService->editVenue($_POST['venueId'], $_POST['venueName'], $_POST['venueAddress'], $_POST['venueImage']);
                    $venues = $this->venueService->getAll();
                    break;
                case 'addVenue':
                    if ((empty($_POST['venueName']) || empty($_POST['venueAddress']) || empty($_POST['venueImage'])))
                        return;
                    $this->venueService->addVenue($_POST['venueName'], $_POST['venueAddress'], $_POST['venueImage']);
                    $venues = $this->venueService->getAll();
                    break;
                case 'deleteArtist':
                    $this->artistService->removeArtist($_POST['artistId']);
                    $artists = $this->artistService->getAll();
                    break;
                case 'updateArtist':
                    if ((empty($_POST['artistId']) || empty($_POST['artistName']) || empty($_POST['artistStyle']) || empty($_POST['artistFirstSong']) || empty($_POST['artistSecondSong']) || empty($_POST['artistThirdSong']) || empty($_POST['artistIndexPicture']) || empty($_POST['artistFirstSourceSong']) || empty($_POST['artistSecondSourceSong']) || empty($_POST['artistThirdSourceSong']) || empty($_POST['artistDetailedPicture']) || empty($_POST['artistCareer']))) {
                        break;
                    }
                    $this->artistService->updateArtist($_POST['artistId'], $_POST['artistName'], $_POST['artistStyle'], $_POST['artistFirstSong'], $_POST['artistSecondSong'], $_POST['artistThirdSong'], $_POST['artistIndexPicture'], $_POST['artistFirstSourceSong'], $_POST['artistSecondSourceSong'], $_POST['artistThirdSourceSong'], $_POST['artistDetailedPicture'], $_POST['artistCareer']);

                    $artists = $this->artistService->getAll();
                    break;
                case 'addArtist':
                    if ((empty($_POST['artistName']) || empty($_POST['artistStyle']) || empty($_POST['artistFirstSong']) || empty($_POST['artistSecondSong']) || empty($_POST['artistThirdSong']) || empty($_POST['artistIndexPicture']) || empty($_POST['artistFirstSourceSong']) || empty($_POST['artistSecondSourceSong']) || empty($_POST['artistThirdSourceSong']) || empty($_POST['artistDetailedPicture']) || empty($_POST['artistCareer']))) {
                        break;
                    }
                    $this->artistService->addArtist($_POST['artistName'], $_POST['artistStyle'], $_POST['artistFirstSong'], $_POST['artistSecondSong'], $_POST['artistThirdSong'], $_POST['artistIndexPicture'], $_POST['artistFirstSourceSong'], $_POST['artistSecondSourceSong'], $_POST['artistThirdSourceSong'], $_POST['artistDetailedPicture'], $_POST['artistCareer']);
                    $artists = $this->artistService->getAll();
                    break;
                case 'deleteTicket':
                    $this->danceService->removeTicket($_POST['ticketId']);
                    $tickets = $this->danceService->getAll();
                    break;
                case 'updateTicket':
                    if ((empty($_POST['ticketTime']) || empty($_POST['ticketVenue']) || empty($_POST['ticketArtist1']) || empty($_POST['ticketAvaliable']) || empty($_POST['ticketPrice']))) {
                        break;
                    }
                    $date = date('Y-m-d', strtotime($_POST['ticketDate']));
                    $time = date('H:i:s', strtotime($_POST['ticketTime']));
                    $artistId = $this->artistService->getArtistIdByName($_POST['ticketArtist1']);
                    $venueId = $this->venueService->getVenueIdByName($_POST['ticketVenue']);

                    $this->danceService->updateDance($_POST['ticketId'],$date, $time, $venueId, $artistId, $_POST['ticketAvaliable'], $_POST['ticketPrice']);
                    $tickets = $this->danceService->getAll();
                    break;
                case 'addTicket':
                    if ((empty($_POST['ticketDate']) || empty($_POST['ticketTime']) || empty($_POST['ticketVenue']) || empty($_POST['ticketArtist1']) || empty($_POST['ticketAvaliable']) || empty($_POST['ticketPrice']))) {
                        break;
                    }
                    $date = date('Y-m-d', strtotime($_POST['ticketDate']));
                    $time = date('H:i:s', strtotime($_POST['ticketTime']));
                    $artistId = $this->artistService->getArtistIdByName($_POST['ticketArtist1']);
                    $venueId = $this->venueService->getVenueIdByName($_POST['ticketVenue']);

                    $this->danceService->addDance($date, $time, $venueId, $artistId, $_POST['ticketAvaliable'], $_POST['ticketPrice']);
                    $tickets = $this->danceService->getAll();
                    break;
                default:
                    break;
            }
        }

        require __DIR__ . '/../views/cms/manageDance.php';
    }


    public function editpagecontent()
    {
        if (isset($_GET["webPage"])) {
            $webPage = $_GET["webPage"];
            if (isset($_POST['editor'])) {
                $editor_data = $_POST['editor'];
                $this->contentEditorService->setNewPageContent($webPage, $editor_data);
            }
            $this->content = $this->contentEditorService->getPageContent($webPage);

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
        if (isset($_GET["edit"])) {
            $restaurant = $this->restaurantManagementService->getById($_GET["edit"]);
        }
        if (isset($_POST["addrestaurant"])) {
            foreach ($_POST as $field) {
                if (empty($field))
                    $this->msg = "Please fill all the fields";
            }
            if ($this->msg == "") {
                $restaurant = (!isset($_GET["edit"])) ? new Restaurant() : $restaurant;
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
                        $restaurant->setCoverImg($this->restaurantManagementService->getById($_GET["edit"])->getCoverImg());
                    } else
                        $this->msg = "Please upload a cover image";
                }
            }
            if ($this->msg == "") {
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

                if (isset($_GET["edit"])) {
                    if ($this->restaurantManagementService->updateRestaurant($restaurant, $_GET["edit"])) {
                        header("location: restaurants");
                    } else
                        $this->msg = "Something went wrong. Please try again";
                } else {
                    if ($this->restaurantManagementService->insertRestaurant($restaurant)) {
                        header("location: restaurants");
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
            $editSession = $this->sessionService->getById($_GET["edit"]);
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
            $id = $_GET['delete'];
            $this->sessionService->delete($id);
            header("location: managesessions");
        }
        $sessions = $this->sessionService->getAll();
        require __DIR__ . '/../views/cms/managesessions.php';
    }

    public function managereservations()
    {
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
        $apiKeys = $this->apiKeyService->getAll();
        require __DIR__ . '/../views/cms/manageapikeys.php';
    }
}