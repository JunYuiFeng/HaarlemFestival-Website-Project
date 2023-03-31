<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page not found</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/style.css" />
</head>

<body id="ticket">

    <div class="d-flex justify-content-center bg-warning bg-gradient p-1">
        <h2 class="text-dark fw-bolder">Haarlem Festival 2023</h2>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-6">
                <h4 class="mb-0"><b>EVENT</b></h4>
                <h4 class="mb-5"><?= $eventName ?> </h4>

                <h4 class="mb-0"><b>LOCATION</b></h4>
                <h4 class="mb-5">87 venue street</h4>

                <h4 class="mb-0"><b>DATE AND TIME</b></h4>
                <h4>Aug 9, 2023 at 23:00 </h4>

            </div>
            <div class="col-3"></div>
            <div class="col-3">
                <img src="<?= $dataUri ?>" alt="" class="img-fluid">
            </div>
        </div>

        <div class="d-flex justify-content-center p-1 mt-5">
            <p class="text-dark">www.haarlemfestival2023.nl</p>
        </div>
    </div>




    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <script>
        var element = document.getElementById('ticket');
        const formData = new FormData();

        html2pdf().from(element).outputPdf().then(function(pdf) {
            const newpdf = btoa(pdf);
            console.log(newpdf)
            formData.append("file", newpdf);
            fetch('/api/cart/sendTicket', {
                    method: 'POST',
                    body: newpdf
                })
                .then(result => {
                    console.log(result.json())
                })
                .catch(error => console.log(error));
        });
    </script> -->
</body>

</html>