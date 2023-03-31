<?php
require_once __DIR__ . '/../services/restaurantservice.php';
require_once __DIR__ . '/../services/danceservice.php';
require_once __DIR__ . '/../services/sessionservice.php';
require_once __DIR__ . '/../services/reservationservice.php';
require_once __DIR__ . '/../services/artistservice.php';
require_once __DIR__ . '/../services/venueservice.php';
require_once __DIR__ . '/controller.php';

require  '../vendor/autoload.php';

use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
use Endroid\QrCode\Label\Alignment\LabelAlignmentCenter;
use Endroid\QrCode\Label\Font\NotoSans;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;
use Mpdf\Mpdf;

class FestivalController extends Controller
{
    private $restaurantService;
    private $danceService;
    private $sessionService;
    private $reservationService;
    private $artistService;
    private $venueService;
    protected $loggedInUser;

    function __construct()
    {
        parent::__construct();
        $this->danceService = new DanceService();
        $this->venueService = new VenueService();
        $this->artistService = new ArtistService();
        $this->restaurantService = new RestaurantService();
        $this->sessionService = new SessionService();
        $this->reservationService = new ReservationService();
    }

    public function index()
    {
        require __DIR__ . '/../views/festival/index.php';
    }

    public function dance()
    {
        $danecVanueType = "";
        $DanceCardType = 0;
        $dances = $this->danceService->getAll();
        $artists = $this->artistService->getAll();
        $venues = $this->venueService->getAll();
        $dancesByDate27Jul = $this->danceService->getAllByDate('27 Jul');
        $dancesByDate28Jul = $this->danceService->getAllByDate('28 Jul');
        $dancesByDate29Jul = $this->danceService->getAllByDate('29 Jul');
        require __DIR__ . '/../views/festival/dance.php';
    }

    public function dancedetailedpage1()
    {
        require __DIR__ . '/../views/festival/dancedetailedpage1.php';
    }

    public function dancedetailed2()
    {
        require __DIR__ . '/../views/festival/dancedetailedpage2.php';
    }

    public function yummie()
    {
        $restaurants = $this->restaurantService->getAll();
        require __DIR__ . '/../views/festival/yummie.php';
    }

    public function restaurantdetail()
    {
        $loggedInUser = $this->loggedInUser;

        $restaurant = null;

        if (isset($_GET['id'])) {
            $id = htmlspecialchars($_GET['id']);
            $restaurant = $this->restaurantService->getById($id);
            $sessions = $this->sessionService->getSessionsByRestaurantId($id);
        }

        // $loggedInUser = $this->userService->getById($_SESSION["logedin"]);
        //var_dump($loggedInUser);

        require __DIR__ . '/../views/festival/restaurantdetail.php';
    }

    public function ticket()
    {
        $result = Builder::create()
            ->writer(new PngWriter())
            ->writerOptions([])
            ->data("http://127.0.0.1/")
            ->encoding(new Encoding('UTF-8'))
            ->errorCorrectionLevel(new ErrorCorrectionLevelHigh())
            ->size(300)
            ->margin(10)
            ->roundBlockSizeMode(new RoundBlockSizeModeMargin())
            ->labelText('Ticket 1')
            ->labelFont(new NotoSans(20))
            ->labelAlignment(new LabelAlignmentCenter())
            ->validateResult(false)
            ->build();

        $dataUri = $result->getDataUri();
        $eventName = "SALAM";
        ob_start();
        require __DIR__ . '/../views/ticket.php';

        //$html = file_get_contents('../views/ticket.php');
        $html = ob_get_clean();
        // var_dump($html);

        // create an mPDF object
        $mpdf = new Mpdf();

        // convert the HTML to PDF
        $mpdf->WriteHTML($html);

        // output the PDF to the browser or save it to a file
        $mpdf->Output('output.pdf', 'D');
    }
}
