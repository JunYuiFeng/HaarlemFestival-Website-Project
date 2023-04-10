<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/style.css" />
</head>

<body>
    <?php
    include __DIR__ . '/../header.php';
    ?>
    <div class="checkoutOrderSummarySection p-5">
        <div class="container" style="width: 80%">
            <div class="d-flex align-items-center gap-4 mb-4">
                <h1>Order Summary</h1>
                <?php if (isset($cartId)) { ?>
                    <button class="btn btn-success" onclick="copyCartLink()">Share your cart <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-link" viewBox="0 0 16 16">
                            <path d="M6.354 5.5H4a3 3 0 0 0 0 6h3a3 3 0 0 0 2.83-4H9c-.086 0-.17.01-.25.031A2 2 0 0 1 7 10.5H4a2 2 0 1 1 0-4h1.535c.218-.376.495-.714.82-1z" />
                            <path d="M9 5.5a3 3 0 0 0-2.83 4h1.098A2 2 0 0 1 9 6.5h3a2 2 0 1 1 0 4h-1.535a4.02 4.02 0 0 1-.82 1H12a3 3 0 1 0 0-6H9z" />
                        </svg></button>
                    <input type="text" hidden id="cartLink" value="https://haarlemfestival.sahibthecreator.com/cart/index?share=<?= $cartId ?>">
                <?php } ?>
                <?php if (isset($_GET['share'])) { ?>
                    <button onclick="document.location.href='?saveCart=<?= $_GET['share'] ?>'" class="btn btn-danger">Save shared items to my cart</button>
                <?php } ?>

            </div>
            <hr>

            <div style="height: 400px; overflow: auto;">
                <?php if (!empty($ticketData) || !empty($reservationData)) { ?>
                    <?php foreach ($reservationData as $reservation) { ?>
                        <div class="card mb-2">
                            <div class="card-body">
                                <div class="row d-flex align-items-center">
                                    <div class="col-1">
                                        <img src="/img/ReservationIcon.png" alt="">
                                    </div>
                                    <div class="col-3">
                                        <a class="text-reset text-decoration-none" href="../festival/restaurantdetail?id=<?= $reservation['restaurantId'] ?>">
                                            <h2><b><?= $reservation['restaurant'] ?></b></h2>
                                        </a>
                                        <p><b>Comment:</b> <?= $reservation['comment'] ?></p>
                                        <p><b>People:</b> <?= $reservation['amountAbove12'] + $reservation['amountUnderOr12'] ?></p>
                                    </div>
                                    <div class="col-2" style="width: 12%;">
                                        <p>
                                            <?php
                                            $date = new DateTime($reservation['date']);
                                            echo $date->format('F jS');
                                            ?>
                                        </p>
                                        <p><?= $reservation['session'] ?></p>
                                    </div>
                                    <div class="col-2 d-flex me-4">
                                    </div>
                                    <div class="col-2">
                                        <p><b>€<?= number_format($reservation['price'], 2); ?></b></p>
                                    </div>
                                    <div class="col-2">
                                        <a class="btn btn-danger" href="removeReservation?id=<?= $reservation['id']; ?>">Remove</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <?php foreach ($ticketData as $ticket) { ?>
                        <div class="card mb-2">
                            <div class="card-body">
                                <div class="row d-flex align-items-center">
                                    <div class="col-1">
                                        <?php if (!empty($ticket['artist']) && !empty($ticket['venue'])) { ?>
                                            <img src="/img/TicketIcon.png" alt="TicketIcon">
                                        <?php } else { ?>
                                            <?php if ($ticket['session'] == 'All Access Pass') { ?>
                                                <img src="/img/AllAccessPassIcon.png" alt="AllAccessPassIcon">
                                            <?php } else { ?>
                                                <img src="/img/DayPassIcon.png" alt="">
                                            <?php } ?>
                                        <?php } ?>
                                    </div>
                                    <div class="col-3">
                                        <?php if (!empty($ticket['artist']) && !empty($ticket['venue'])) { ?>
                                            <a class="text-reset text-decoration-none" href="../festival/dance#tickets">
                                                <h2><b><?= $ticket['artist'] ?></b></h2>
                                            </a>
                                            <p><b>Venue:</b> <?= $ticket['venue'] ?></p>
                                        <?php } else { ?>
                                            <a class="text-reset text-decoration-none" href="../festival/dance#tickets">
                                                <h2><b><?= $ticket['session'] ?></b></h2>
                                            </a>
                                        <?php } ?>
                                    </div>
                                    <div class="col-2" style="width: 12%;">
                                        <?php if ($ticket['session'] != 'All Access Pass') { ?>
                                            <p>
                                                <?php
                                                $date = new DateTime($ticket['date']);
                                                echo $date->format('F jS');
                                                ?>
                                            </p>
                                        <?php } ?>
                                    </div>
                                    <div class="col-2 d-flex me-4">
                                        <a class="btn btn-dark w-30 " href="decreaseTicketQuantity?ticketId=<?= $ticket['id']; ?>">-</a>
                                        <input type="text" name="quantity" id="quantity-input<?= $ticket['id']; ?>" class="form-control " value="<?= $ticket['quantity'] ?>">
                                        <a class="btn btn-dark w-30 " href="increaseTicketQuantity?ticketId=<?= $ticket['id']; ?>">+</a>
                                    </div>
                                    <div class="col-2">
                                        <p><b>€<?= $ticket['price'] ?></b></p>
                                    </div>
                                    <div class="col-1">
                                        <a class="btn btn-danger" href="removeTicket?id=<?= $ticket['id']; ?>">Remove</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php } else { ?>
                    <p>There are no items in your cart.</p>
                <?php } ?>
            </div>
            <hr>

            <div class="d-flex justify-content-between checkTotal">
                <p>SubTotal</p>
                <p>€<?= number_format($subTotal, 2) ?></p>
            </div>

            <div class="d-flex justify-content-between">
                <p>Reservation fee (€10.00 per person)</p>
                <p>€<?= number_format($reservationFee, 2) ?></p>
            </div>

            <div class="d-flex justify-content-between">
                <p>9% VAT</p>
                <p>€<?= number_format($VATAmount, 2) ?></p>
            </div>
            <hr>

            <div class="d-flex justify-content-between">
                <h2>Total</h2>
                <h2>€<?= number_format($totalAmount, 2) ?></h2>
            </div>

            <?php if (!empty($ticketData) || !empty($reservationData)) { ?>
                <div class="d-flex justify-content-end mt-4">
                    <a class="btn btn-primary btn-lg" href="<?php
                                                            if (!isset($_SESSION["logedin"])) {
                                                                echo 'javascript:void(0);" onclick="if (confirm(\'You need to create an account first to pay\')) {location.href=\'payment\';}"';
                                                            } else {
                                                                echo '/cart/payment';
                                                            }
                                                            ?>">Pay €<?= number_format($totalAmount, 2) ?></a>
                </div>
            <?php } ?>

        </div>
    </div>
    <?php
    include __DIR__ . '/../footer.php';
    ?>

    <script>
        const quantityInputs = document.querySelectorAll('input[name="quantity"]');
        quantityInputs.forEach(input => {
            input.addEventListener('input', (event) => {
                const newValue = event.target.value.replace(/[^\d]/g, ''); // remove non-numeric characters
                event.target.value = newValue;
            });
        });

        function copyCartLink() {
            const link = document.getElementById("cartLink");
            const textToCopy = link.value;

            navigator.clipboard.writeText(textToCopy)
                .then(() => {
                    alert("Cart link was copied: " + textToCopy);
                })
                .catch((err) => {
                    console.error("Failed to copy text: ", err);
                });
        }
    </script>
</body>

</html>