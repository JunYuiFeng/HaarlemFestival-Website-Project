<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/style.css" />
</head>

<body>
    <?php
    include __DIR__ . '/../header.php';
    ?>

    <div class="row">
        <div class="col">
            <div class="container checkPaymentSection">
                <h1>Payment</h1>
                <hr>
                <p>Pay With:</p>
                <input type="radio" id="card" name="cardType">
                <label for="card">Card</label>
                <input type="radio" id="ideal" name="cardType">
                <label for="ideal">Ideal</label><br><br>

                <label for="">Card Number</label>
                <input type="text" class="form-control" placeholder="1234 5678 9101 1121"><br>

                <label for="">Expiration Date</label>
                <input type="text" class="form-control" placeholder="MM/YY"><br>

                <button class="btn btn-primary"> Pay 300</button>
            </div>
        </div>

        <div class="col">
            <div class="container checkoutOrderSummarySection">
                <h1>Order Summary</h1>
                <hr>
                <?php foreach ($items as $item) { ?>
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="row d-flex align-items-center">
                                <div class="col-1">
                                    <img src="/img/ReservationIcon.png" alt="">
                                </div>
                                <div class="col-4">
                                    <h2><b><?= $this->restaurantService->getById($item->getRestaurantId())->getName() ?></b></h2>
                                    <p><b>Comment:</b> <?= $item->getComments() ?></p>
                                    <p><b>People:</b> <?= $item->getAmountAbove12() + $item->getAmountUnderOr12() ?></p>
                                </div>
                                <div class="col-2">
                                    <p>
                                        <?php
                                        $date = new DateTime($item->getDate());
                                        echo $date->format('F jS');
                                        ?>
                                    </p>
                                    <p>Session2</p>
                                </div>
                                <div class="col-3 d-flex" style="width: 23.5%">
                                    <button class="btn btn-dark w-30">-</button>
                                    <input type="text" name="quantity" id="quantity-input" class="form-control">
                                    <button class="btn btn-dark w-30">+</button>
                                </div>
                                <div class="col-2">
                                    <p><b>€110,00</b></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <hr>

                <div class="d-flex justify-content-between checkTotal">
                    <p>Total</p>
                    <p class="amount">€300</p>
                </div>

            </div>
        </div>
    </div>
    <?php
    include __DIR__ . '/../footer.php';
    ?>
    <script>
        getCartAmount();

        const quantityInput = document.getElementById('quantity-input');
        quantityInput.addEventListener('input', (event) => {
            const newValue = event.target.value.replace(/[^\d]/g, ''); // remove non-numeric characters
            event.target.value = newValue;
        });

        function getCartAmount() {
            fetch('/api/cart/getCartAmount')
                .then(response => response.json())
                .then(data => {
                    cartAmount.innerHTML = data;
                })
                .catch(error => {
                    console.error('Error getting amount:', error);
                });
        }
    </script>
</body>

</html>