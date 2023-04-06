<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Invoice</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="/css/style.css" />
</head>

<body class="ps-5 pe-5 pt-5">
  <h1>invoice</h1>
  <h3>invoicenumber: <?= $invoiceNr ?></h3>
  <hr>

  <div class="d-flex justify-content-between mb-5">
    <div>
      <p><b>Billed to:</b><br>
        Haarlem Festival<br>
        haarlemfestival@sahibthecreator.com<br>
        Bijdorplaan 15, 2015 CE Haarlem<br>
        +31 6 12345678<br>
      </p>
    </div>
    <div>
      <p><b>Client:</b><br>
        <?= $clientName ?><br>
        <?= $clientEmail ?><br>
      </p>
    </div>
  </div>

  <div class="d-flex justify-content-between mb-5">
    <p><b>Invoice date:</b>&nbsp;<?= date("Y-m-d") ?></p>
    <p><b>Payment date:</b></p>
  </div>

  <h1 class="mb-3">Order Summary</h1>

  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Item</th>
        <th scope="col">Date</th>
        <th scope="col">Qnty</th>
        <th scope="col">Price</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $count = 1;
      foreach ($reservations as $reservation) {
      ?>
        <tr>
          <th scope="row"><?= $count++ ?></th>
          <td>
            <h4><?= $reservation->restaurant ?></h4><br>
            <p><b>Comment:</b><?= $reservation->comment ?></p><br>
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
        </tr>
      <?php } ?>

      <?php
      foreach ($tickets as $ticket) {
      ?>
        <tr>
          <th scope="row"><?= $count++ ?></th>
          <td> <?php if (!empty($ticket->artist) && !empty($ticket->venue)) { ?>
              <h2><b><?= $ticket->artist ?></b></h2>
              <p><b>Venue:</b> <?= $ticket->venue ?></p>
            <?php } else { ?>
              <h2><b><?= $ticket->session ?></b></h2>
            <?php } ?>
          </td>
          <td> <?php if ($ticket->session != 'All Access Pass') { ?>
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
        </tr>
      <?php } ?>

    </tbody>
  </table>

  <p class="d-flex justify-content-end"><b>Subtotal</b>&nbsp;€200</p>
  <p class="d-flex justify-content-end"><b>Reservation fee</b>&nbsp;€200</p>
  <p class="d-flex justify-content-end"><b>9% VAT</b>&nbsp;€19</p>
  <hr>
  <h4 class="d-flex justify-content-end"><b>Total</b>&nbsp;€200</h4>
</body>

</html>