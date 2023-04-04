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
            <h1 class="mb-4">Order Summary</h1>
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
                                        <h2><b><?= $reservation['restaurant'] ?></b></h2>
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
                                        <img src="/img/TicketIcon.png" alt="">
                                    </div>
                                    <div class="col-3">
                                        <h2><b><?= $ticket['artist'] ?></b></h2>
                                        <p><b>Venue:</b> <?= $ticket['venue'] ?></p>
                                    </div>
                                    <div class="col-2" style="width: 12%;">
                                        <p>
                                            <?php
                                            $date = new DateTime($ticket['date']);
                                            echo $date->format('F jS');
                                            ?>
                                        </p>
                                    </div>
                                    <div class="col-2 d-flex me-4">
                                        <a class="btn btn-dark w-30" href="decreaseTicketQuantity?ticketId=<?= $ticket['id']; ?>">-</a>
                                        <input type="text" name="quantity" id="quantity-input<?= $ticket['id']; ?>" class="form-control" value="<?= $ticket['quantity'] ?>">
                                        <a class="btn btn-dark w-30" href="increaseTicketQuantity?ticketId=<?= $ticket['id']; ?>">+</a>
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

            <div class="d-flex justify-content-end mt-4">
                <a class="btn btn-primary btn-lg" href="<?php
                                                        if (!isset($_SESSION["logedin"])) {
                                                            echo 'javascript:void(0);" onclick="if (confirm(\'You need to create an account first to pay\')) {location.href=\'payment\';}"';
                                                        } else {
                                                            echo '/cart/payment';
                                                        }
                                                        ?>">Pay €<?= number_format($totalAmount, 2) ?></a>
            </div>
        </div>
    </div>
    <?php
    include __DIR__ . '/../footer.php';
    ?>

    <script>
        getCartAmount();

        const quantityInputs = document.querySelectorAll('input[name="quantity"]');
        quantityInputs.forEach(input => {
            input.addEventListener('input', (event) => {
                const newValue = event.target.value.replace(/[^\d]/g, ''); // remove non-numeric characters
                event.target.value = newValue;
            });
        });
    </script>
</body>

</html>