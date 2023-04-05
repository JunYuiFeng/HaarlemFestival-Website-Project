<?php
require_once __DIR__ . '/../../services/orderservice.php';
require_once __DIR__ . '/../../services/cartservice.php';
require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/controller.php';


class WebHookController extends Controller
{
    private $orderService;  
    private $cartService;

    function __construct()
    {
        parent::__construct();
        $this->orderService = new OrderService();
        $this->cartService = new CartService();
    }

    function index()
    {

        try {
            $mollie = new \Mollie\Api\MollieApiClient();
            $mollie->setApiKey('test_Ds3fz4U9vNKxzCfVvVHJT2sgW5ECD8');
            /*
             * Retrieve the payment's current state.
             */
            $payment = $mollie->payments->get($_POST["id"]);
            $orderId = $payment->metadata->order_id;
        
            /*
             * Update the order in the database.
             */
            $this->orderService->updateOrderStatus($orderId, $payment->status);
        
            if ($payment->isPaid() && ! $payment->hasRefunds() && ! $payment->hasChargebacks()) {
                $this->cartService->deleteCartItemsByUserId($payment->metadata->user_id);
                /*
                 * The payment is paid and isn't refunded or charged back.
                 * At this point you'd probably want to start the process of delivering the product to the customer.
                 */
            } elseif ($payment->isOpen()) {
                /*
                 * The payment is open.
                 */
            } elseif ($payment->isPending()) {
                /*
                 * The payment is pending.
                 */
            } elseif ($payment->isFailed()) {
                /*
                 * The payment has failed.
                 */
            } elseif ($payment->isExpired()) {
                /*
                 * The payment is expired.
                 */
            } elseif ($payment->isCanceled()) {
                /*
                 * The payment has been canceled.
                 */
            } elseif ($payment->hasRefunds()) {
                /*
                 * The payment has been (partially) refunded.
                 * The status of the payment is still "paid"
                 */
            } elseif ($payment->hasChargebacks()) {
                /*
                 * The payment has been (partially) charged back.
                 * The status of the payment is still "paid"
                 */
            }
        } catch (\Mollie\Api\Exceptions\ApiException $e) {
            echo "API call failed: " . htmlspecialchars($e->getMessage());
        }
    }
}
