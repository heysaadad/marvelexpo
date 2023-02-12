<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Marvel Expo 2022</title>
    <meta content="marvel expo, Marvel Expo, marvelexpo, MARVEL EXPO, marvel expo 2022, Marvel Expo 2022, Marvel Expo Ticket, marvel expo ticket, marvel expo 2022 ticket, Marvel Expo Ticket 2022" name="keywords">
    <link rel="stylesheet" href="public/css/app.css">
</head>

<body>
    <div class="wrapper run-animation" id="animate">
        <div class="logo">

            <span class="marvel">Marvel Expo</span>
            <span class="studios">2022</span>
            <br/>

            <h3 style="color: white;">Congratulations {{ session('order')->name }}, your order with invoice no <b style="color: yellow;">{{ session('order')->invoice }}</b> is recieved. <br/>
            You wil get confirmation sms within 12 hours.<br/>
            Please write down your invoice number somewhere safe, it will be used to verify your purchase.
            </h3>

            <a href="/" style="color: white;"><h3>Avengers, Assemble</h3></a>
        </div>
    </div>

    <div class="images"></div>
</body>

</html>
