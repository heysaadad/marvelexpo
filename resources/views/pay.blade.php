<!doctype html>
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Pay | Marvel Expo</title>
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
                  @if (session('order'))
                  <h3 class="text-center text-danger">Order Details</h3>
                  {{-- <h5 class="text text-center">Invoice No: <span class="text text-danger">{{ session('order')->invoice }}</span></h5> --}}
                  <h5 class="text text-right">Name: {{ session('order')->name }}</h5>
                  @if(session('order')->reffercode != null)
                    <h5 class="text text-right">Reference Code: {{ session('order')->reffercode }}</h5>
                  @endif
                  <h5 class="text text-right">Quantity: {{ session('order')->quantity }}</h5>
                  <h5 class="">To Pay: {{ session('order')->quantity }}x300 BDT</h5>
                  <h5 class="">Transaction Charge: {{ session('order')->quantity * 10 }} BDT</h5>
                  <hr class="divider">
                  <h5 class="">Subtotal: {{ (session('order')->quantity*300) + (session('order')->quantity * 10) }}</h5>
                  Payment Proceedure: <br/>
                  1. Open your Bkash App or Nagad App. <br/>
                  2. Choose Send Money Option<br/>
                  3. Enter <span style="font-size:20px;" class="text text-danger">01857108193</span> as the reciever number<br/> 
                  4. Enter amount:  <span style="font-size:20px;" class="text text-danger">{{ (session('order')->quantity*300) + (session('order')->quantity * 10)}}</span><br/>
                  4. Enter Reference:  "expo22"<br/>
                  5. Enter your Bkash/Nagad pin and complete your payment<br/>
                  @endif
              </div>
              <div class="col-md-7 form-part">
                <div class="row"  style="margin-top: -20%;">
                  <div class="col-lg-8 col-md-11 login formcol mx-auto">
                       <h3>Please enter the following information from your bkash/nagad payment confirmation message.</h3><br/><p class="text text-danger">Example: Bkash-719V9TAT / Nagad-719V9TAT<br/>Example: Nagad-01712345678 / Bkash-01712345678</p>
                    <form action="/pay" method="post">
                        @csrf
                       <div class="form-floating mb-3">
                        <input type="text" name="trxid" class="form-control" id="floatingInput" placeholder="Bkash Trxid" required>
                        <label for="floatingInput">Bkash/Nagad Trxid</label>
                      </div>
                      <div class="form-floating mb-3">
                        <input type="text" name="trxno" class="form-control" id="floatingInput" placeholder="Bkash Number" required>
                        <label for="floatingInput">Bkash/Nagad Number</label>
                      </div>
                      <input type="hidden" name="name" value="{{ session('order')->name }}">
                      <input type="hidden" name="email" value="{{ session('order')->email }}">
                      <input type="hidden" name="phone" value="{{ session('order')->phone }}">
                      <input type="hidden" name="dob" value="{{ session('order')->dob }}">
                      <input type="hidden" name="nid" value="{{ session('order')->nid }}">
                      <input type="hidden" name="quantity" value="{{ session('order')->quantity }}">
                      <input type="hidden" name="invoice" value="{{ session('order')->invoice }}">
                      <input type="hidden" name="reffercode" value="{{ session('order')->reffercode }}">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                          <label class="form-check-label" for="invalidCheck">
                            Agree to <a href="/terms-and-conditions" target="_blank">terms and conditions</a>
                          </label>
                          <div class="invalid-feedback">
                            You must agree before submitting.
                          </div>
                        </div>
                      </div>
                      <div class="form-floating">
                       <button class="btn btn-primary">Confrim Order</button>
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