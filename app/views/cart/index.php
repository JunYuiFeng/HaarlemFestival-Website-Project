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
            </div>
        </div>

        <div class="col">
            <div class="container checkoutOrderSummarySection">
                <h1>Order Summary</h1>
                <hr>
                <?php foreach ($items as $item) {?>
                <div class="card mb-2">
                    <div class="card-body">
                        <div class="row d-flex align-items-center">
                            <div class="col-1">
                                <img src="/img/ReservationIcon.png" alt="">
                            </div>
                            <div class="col-4">
                                <h2><b>restaurant</b></h2>
                                <p><b>Comment:</b> Alergic to shelfish</p>
                                <p><b>People:</b> 4</p>
                            </div>
                            <div class="col-2">
                                <p>27 July</p>
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