<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/style.css" />
</head>

<body style="padding: 20px;">
    <h1>Invoice</h1>
    <h3>Invoice Number: <?= $invoiceNr ?></h3>
    <hr>

    <table style="border-collapse: collapse; width: 100%;">
        <tr>
            <td style="width: 50%;">
                <p><b>Billed to:</b><br>
                    Haarlem Festival<br>
                    haarlemfestival@sahibthecreator.com<br>
                    Bijdorplaan 15, 2015 CE Haarlem<br>
                    +31 6 12345678<br>
                </p>
            </td>
            <td style="width: 50%;">
                <p><b>Client:</b><br>
                    <?= $customerName ?><br>
                    <?= $customerEmail ?><br>
                </p>
            </td>
        </tr>
    </table>

    <table style="border-collapse: collapse; width: 100%;">
        <tr>
            <td style="width: 50%;">
                <p><b>Invoice date:</b>&nbsp;<?= date("Y-m-d") ?></p>
            </td>
            <td style="width: 50%;">
                <p><b>Payment date:</b>&nbsp;<?= date("Y-m-d") ?></p>
            </td>
        </tr>
    </table>

    <h1 style="margin-bottom: 20px;">Order Summary</h1>

    <table style="border-collapse: collapse; width: 100%;">
        <thead>
            <tr>
                <td><b>#</b></td>
                <td><b>Item</b></td>
                <td><b>Date</b></td>
                <td><b>Qnty</b></td>
                <td><b>Price</b></td>
            </tr>
        </thead>
        <tbody>
            <?php
            $count = 1;
            foreach ($reservations as $reservation) {
            ?>
                <tr>
                    <td>&nbsp;<?= $count++ ?></td>
                    <td>
                        <h3><?= $reservation->restaurant ?></h3>
                        <p><b>Comment:</b><?= $reservation->comment ?></p>
                        <p><b>People:</b><?= $reservation->amountAbove12 + $reservation->amountUnderOr12 ?></p>
                    </td>
                    <td>
                        <p>
                            <?php
                            $date = new DateTime($reservation->date);
                            echo $date->format('F jS');
                            ?>
                        </p>
                    </td>
                    <td>1</td>
                    <td>€<?= $reservation->price ?></td>
                </tr><br>
            <?php } ?>

            <?php
            foreach ($tickets as $ticket) {
            ?>
                <tr>
                    <td>&nbsp;<?= $count++ ?></td>
                    <td>
                        <?php if (!empty($ticket->artist) && !empty($ticket->venue)) { ?>
                            <h3><b><?= $ticket->artist ?></b></h3>
                            <p><b>Venue:</b> <?= $ticket->venue ?></p>
                        <?php } else { ?>
                            <h3><b><?= $ticket->session ?></b></h3>
                        <?php } ?>
                    </td>
                    <td>
                        <?php if ($ticket->session != 'All Access Pass') { ?>
                            <p>
                                <?php
                                $date = new DateTime($ticket->date);
                                echo $date->format('F jS');
                                ?>
                            </p>
                        <?php } ?>
                    </td>
                    <td><?= $ticket->quantity ?></td>
                    <td>€<?= $ticket->price ?></td>
                </tr><br>
            <?php } ?>

        </tbody>
    </table>

    <table style="width: 100%; margin-top: 10%">
        <tr>
            <td></td>
            <td style="text-align: right"><b>Subtotal</b></td>
            <td style="text-align: right">&nbsp;€<?= number_format($subTotal, 2) ?></td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: right"><b>Reservation fee</b></td>
            <td style="text-align: right">&nbsp;€<?= number_format($reservationFee, 2) ?></td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: right"><b>9% VAT</b></td>
            <td style="text-align: right">&nbsp;€<?= number_format($VATAmount, 2) ?></td>
        </tr>
        <tr>
            <td colspan="3">
                <hr>
            </td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: right"><b>Total</b></td>
            <td style="text-align: right">&nbsp;€<?= number_format($totalAmount, 2) ?></td>
        </tr>
    </table>

</body>

</html>