<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders - Haarlem Festival</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/style.css" />
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="../../js/manageorders.js?s" defer></script>
</head>

<body>
    <?php include_once("header.php"); ?>

    <div class="px-5">
        <h1 class="text-center fw-bolder text-dark ff-alata display-5">Orders Overview</h1>

        <button class="btn btn-primary" onclick="convertTableToCSV()">
            download CSV
        </button>
        <p id="statusMessage" class="text-danger mt-1"></p>
        <table class="table table-bordered table-striped table-hover mt-5">
            <thead>
                <th><input type="checkbox" checked=true>Order Id</th>
                <th><input type="checkbox" checked=true>Customer Username</th>
                <th><input type="checkbox" checked=true>Customer Email</th>
                <th><input type="checkbox" checked=true>Order Items</th>
                <th><input type="checkbox" checked=true>Order Date</th>
                <th><input type="checkbox" checked=true>Invoice Number</th>
                <th><input type="checkbox" checked=true>Order Status</th>
                <th><input type="checkbox" checked=true>Total Amount</th>
            </thead>
            <?php
            foreach ($orders as $order) {
            ?>
                <tr>
                    <td>
                        <p><?= $order['orderId'] ?></p>
                    </td>
                    <td>
                        <p><?= $order['customerUsername'] ?></p>
                    </td>
                    <td>
                        <p><?= $order['customerEmail'] ?></p>
                    </td>
                    <td>
                        <p><?= $order['orderItems'] ?></p>
                    </td>
                    <td>
                        <p><?= $order['orderDate'] ?></p>
                    </td>
                    <td>
                        <p><?= $order['invoiceNumber'] ?></p>
                        <button class="btn btn-success" onclick="downloadInvoice('<?= $order['invoiceNumber'] ?>')">Download Invoice</button>

                    </td>
                    <td>
                        <p><?= $order['orderStatus'] ?></p>
                        <div class="btn-group">
                            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Change
                            </button>
                            <div class="dropdown-menu" id="<?= $order['orderId'] ?>">
                                <a class="dropdown-item" type="button">Open</a>
                                <a class="dropdown-item" type="button">Pending</a>
                                <a class="dropdown-item" type="button">Failed</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" type="button">Paid</a>
                            </div>
                        </div>
                    </td>
                    <td>
                        <p><?= $order['totalAmount'] ?></p>
                    </td>
                </tr>

            <?php } ?>
        </table>
    </div>
</body>

</html>