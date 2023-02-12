<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta content="marvel expo, Marvel Expo, marvelexpo, MARVEL EXPO, marvel expo 2022, Marvel Expo 2022, Marvel Expo Ticket, marvel expo ticket, marvel expo 2022 ticket, Marvel Expo Ticket 2022" name="keywords">
    <title>Marvel Expo 2022</title>
    <link rel="stylesheet" href="public/css/app.css">
    <style>
        .countdown {
      color: #FFF;
      font-size: 36px;
      font-weight: 400;
        }
    </style>
    
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-VH6F2Y5N84"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-VH6F2Y5N84');
</script>
</head>

<body>
    <div class="wrapper run-animation" id="animate">
        <div class="logo">

            <span class="marvel">Marvel Expo</span>
            <span class="studios">2022</span>
            <br/>
           <!--<h2 style="color: white;">Oppsy, Online ticket registration is closed now!</h2>-->
            <a href="/buy"><button class="restart">Buy Ticket</button></a>
            <div class="countdown"></div>
        </div>
    </div>

    <div class="images"></div>



<script>
    // Setup End Date for Countdown (getTime == Time in Milleseconds)
let launchDate = new Date("June 20, 2022 00:00:00").getTime();

// Setup Timer to tick every 1 second
let timer = setInterval(tick, 1000);

function tick () {
  // Get current time
  let now = new Date().getTime();
  // Get the difference in time to get time left until reaches 0
  let t = launchDate - now;

  // Check if time is above 0
  if (t > 0) {
    // Setup Days, hours, seconds and minutes
    // Algorithm to calculate days...
    let days = Math.floor(t / (1000 * 60 * 60 * 24));
    // prefix any number below 10 with a "0" E.g. 1 = 01
    if (days < 10) { days = "0" + days; }
    
    // Algorithm to calculate hours
    let hours = Math.floor((t % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    if (hours < 10) { hours = "0" + hours; }

    // Algorithm to calculate minutes
    let mins = Math.floor((t % (1000 * 60 * 60)) / (1000 * 60));
    if (mins < 10) { mins = "0" + mins; }

    // Algorithm to calc seconds
    let secs = Math.floor((t % (1000 * 60)) / 1000);
    if (secs < 10) { secs = "0" + secs; }

    // Create Time String
    let time = `${days} Days ${hours} Hours ${mins} Mins ${secs} Seconds`;

    // Set time on document
    document.querySelector('.countdown').innerText = time;
  }
}
</script>
</body>

</html>
