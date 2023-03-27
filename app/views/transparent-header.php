<nav class="navbar navbar-expand-lg navbar-dark" id="transparent-navbar">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="/img/HaarlemFestival-Logo.png" alt="HaarlemFestival-Logo" class="logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="nav navbar-nav ms-auto" id="navigation">
                <li class="nav-item">
                    <a class="nav-link" href="/"><b>Home</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/visithaarlem/history"><b>History</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/visithaarlem/culture"><b>Culture</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/visithaarlem/food"><b>Food</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/visithaarlem/kids"><b>Kids</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/festival/index"><b>Festival</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/visithaarlem/personalprogram"><b>Personal Program</b></a>
                </li>
                <li class="nav-item" id="cartIcon" onclick="toggleCart()">
                    <a class="nav-link">
                        <svg class="d-inline" xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" viewBox="0 0 576 512">
                            <path d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z" />
                        </svg>
                        <p class="d-inline" id="cartAmount">0</p>
                    </a>
                </li>
                <div class="cart-opened">
                    <img src="/img/CloseModalPanel.png" alt="closing icon" onclick="toggleCart()">
                    <h1 class="text-center">CART</h1>
                    <div class="items-scroll">
                        <!-- foreach this div.item and div.divider-gradient based on amount of items  -->
                        <div class="item">
                            <div class="col-6">
                                <h1>Caprera Openlunchttheater</h1>
                            </div>
                            <div class="col-2">
                                <p>28 July</p>
                            </div>
                            <div class="col-2">
                                <p>€110,00</p>
                            </div>
                        </div>
                        <div class="divider-gradient"></div>
                        <!-- foreach ends here -->
                    </div>
                    <div class="d-flex justify-content-end">
                        <div>
                            <!-- Calculate money -->
                            <p class="text-right">Service fee: €10,00</p>
                            <h2>Total: €320,00</h2>
                        </div>
                    </div>
                    <button class="btn btn-warning px-5 col-12" onclick="document.location.href='/cart/index'">CHECKOUT</button>
                </div>
                <li class="nav-item">
                    <a class="nav-link" href="/myaccount/login">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                        </svg>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script>
  function toggleCart(){
    document.getElementsByClassName("cart-opened")[0].classList.toggle("expand")
  }
</script>