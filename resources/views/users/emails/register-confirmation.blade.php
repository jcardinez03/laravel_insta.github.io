<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- BOOTSTRAP --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    {{-- FONT AWESOME --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <i class="fa-brands fa-google display-4"></i>

            <h2>Thank you for signing up.</h4>
            p.We'll keep you posted on the latest device, tips, product, updates, news, and special offers
        </div>

        <div class="row justify-content-center">
            <div class="col-6 bg-secondary">
                <h5 class="text-muted">STAY CONNECTED</h5>
                <i class="fa-brands fa-twitter display-6"></i>

                <hr>
                <p class="small text-muted">Google INC. 1600 Ampitheatre Parloway, Mountain View, CA, 9403</p>
                <p>This email was sent to {{ $email }} because you asked to receive information and related offers about Google devices.</p>
            </div>
        </div>
    </div>
</html>