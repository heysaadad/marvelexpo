<!doctype html>
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Buy Ticket | Marvel Expo</title>
    <meta content="marvel expo, Marvel Expo, marvelexpo, MARVEL EXPO, marvel expo 2022, Marvel Expo 2022, Marvel Expo Ticket, marvel expo ticket, marvel expo 2022 ticket, Marvel Expo Ticket 2022" name="keywords">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="public/css/style.css">
  </head>

  <body>
    <div class="container-fluid form-container">
      <div class="container login-container">
          <div class="row">
              <div class="col-md-5 content-part">
                Rules <br/>
                1. Tickets can not be refund after purchase.<br/>
2.  There will be no entry without a valid ticket.<br/>
3. No metal, drugs or fire hazzard items allowed. If found it will be taken away.<br/>
4. Any kinds of rude behavior or harassment to Marvel Expo organizers, volunteers, perticipents and visitors may loss the validation of the ticket.<br/>
5. No outside food is allowed.<br/>

              </div>
                {{-- @if($errors->any())
                  {{ implode('', $errors->all('<div>:message</div>')) }}
                @endif --}}
              <div class="col-md-7 form-part">
                 {{-- style="color: white; background-image: url('http://nerdist.com/wp-content/uploads/2015/03/captain-america-iron-man-civil-war-1024x597.jpg');">
                 --}}
                 <div class="row"  style="margin-top: -20%;">
                  <div class="col-lg-8 col-md-11 login formcol mx-auto">
                       <h3>Pre-Register your Marvel Expo 2022 ticket</h3>
                    <form action="" method="post">
                        @csrf
                       <div class="form-floating mb-3">
                        <input type="text" name="name" class="form-control" id="floatingInput" placeholder="Your Name" required>
                        <label for="floatingInput">Name</label>
                      </div>
                      <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control" id="floatingInput" placeholder="Your Email" required>
                        <label for="floatingInput">Email</label>
                      </div>
                      <div class="form-floating mb-3">
                        <input type="text" name="phone" class="form-control" id="floatingInput" placeholder="Your Phone" required>
                        <label for="floatingInput">Phone</label>
                      </div>
                      <div class="form-floating mb-3">
                        <input type="text" name="nid" class="form-control" id="floatingInput" placeholder="NID / Birth Certificate NO" required>
                        <label for="floatingInput">NID / Birth Certificate</label>
                      </div>
                      <div class="form-floating mb-3">
                        <input type="date" name="dob" class="form-control" id="floatingInput" placeholder="Your Date Of Birth" required>
                        <label for="floatingInput">Date Of Birth</label>
                      </div>
                      <div class="form-floating mb-3">
                        <input type="number" min="1" max="10" name="quantity" class="form-control" id="floatingInput" placeholder="Ticket Quantity" required>
                        <label for="floatingInput">Ticket Quantity</label>
                      </div>
                      <div class="form-floating mb-3">
                        <input type="text" name="reffercode" class="form-control" value="" placeholder="Reffer Code (If you have any)">
                        <label for="floatingInput">Reference Code (If you have any)</label>
                      </div>
                      <input type="hidden" name="trxid" value="">
                      <input type="hidden" name="trxno" value="">
                      @foreach ($tickets as $ticket)
                        <h6 class="text text-danger">Ticket Price: {{ $ticket->price }}Tk Only</h6>
                      @endforeach
                      <div class="form-floating">
                       <button class="btn btn-primary">Order Now</button>
                      </div>
                    </form>
                  </div>
                </div>
                 
              </div>
          </div>
      </div>
    </div> 

  </body>
  </html