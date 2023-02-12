@extends('admin/layout')
@section('body-elem')

<div class="container-xxl position-relative bg-white d-flex p-0">

    <!--<div id="spinner"-->
    <!--    class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">-->
    <!--    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">-->
    <!--        <span class="sr-only">Loading...</span>-->
    <!--    </div>-->
    <!--</div>-->

    <!-- Sidebar Start -->
    <div class="sidebar pe-4 pb-3">
        <nav class="navbar bg-light navbar-light">
            <a href="" class="navbar-brand mx-4 mb-3">
                <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>Marvel Expo</h3>
            </a>
            <div class="d-flex align-items-center ms-4 mb-4">
                <div class="position-relative">
                    <div
                        class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                    </div>
                </div>
                <div class="ms-3">
                    <h6 class="mb-0">{{ $user->name }}</h6>
                </div>
            </div>
            <div class="navbar-nav w-100">
                <li><a href="dashboard" class="nav-item nav-link active"><i
                        class="fa fa-tachometer-alt me-2"></i>Dashboard</a></li>
                {{-- <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                            class="fa fa-laptop me-2"></i>Elements</a>
                    <div class="dropdown-menu bg-transparent border-0">
                        <a href="button.html" class="dropdown-item">Buttons</a>
                        <a href="typography.html" class="dropdown-item">Typography</a>
                        <a href="element.html" class="dropdown-item">Other Elements</a>
                    </div>
                </div> --}}
                {{-- <a href="sendsms" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Send Sms</a> --}}
            </div>
        </nav>
    </div>
    <!-- Sidebar End -->


    <!-- Content Start -->
    <div class="content">
        <!-- Navbar Start -->
        <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
            <a href="" class="navbar-brand d-flex d-lg-none me-4">
                <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
            </a>
            <a href="#" class="sidebar-toggler flex-shrink-0">
                <i class="fa fa-bars"></i>
            </a>
            <form class="d-none d-md-flex ms-4" method="POST" action="search">
                @csrf
                <input class="form-control border-0" name="invoice" id="search" type="search" placeholder="Search">
                <input type="hidden" name="submit">
            </form>
            <div class="navbar-nav align-items-center ms-auto">
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <span class="d-none d-lg-inline-flex">{{ $user->name }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0" style="padding-left: 5px;">
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    </div>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </nav>
        <!-- Navbar End -->

        <!-- Sale & Revenue Start -->
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-bar fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">Tickets Sold</p>
                            @foreach ($tickets as $ticket)
                                <h6 class="mb-0">{{ $ticket->total - $ticket->stock}}</h6>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-line fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">Total Sale</p>
                            <h6 class="mb-0">৳ {{ ($ticket->total - $ticket->stock) * $ticket->price }}</h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-th fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">In Stock</p>
                            <h6 class="mb-0">{{ $ticket->stock }}</h6>
                        </div>
                    </div>
                </div>
        <!-- Sale & Revenue End -->

        <!-- Recent Sales Start -->
        <div class="container-fluid pt-4 px-4">
            <div class="bg-light text-center rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">Recent Orders</h6>
                </div>
                <div class="table-responsive">
                    <table id="ordertable" class="table text-start align-middle table-bordered table-hover mb-0">
                        <thead>
                            <tr class="text-dark">
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Invoice</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Trx Id</th>
                                <th scope="col">Status</th>
                                <th scope="col">Cancel</th>
                                <th scope="col">Send</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->name }}</td>
                                <td>{{ $order->phone }}</td>
                                <td>{{ $order->invoice }}</td>
                                <td>{{ $order->quantity }}</td>
                                <td>{{ $order->quantity*300 }}</td>
                                <td>{{ $order->trxid }}</td>
                                @if ($order->paid == 0)
                                <form action="verifypayment" method="post">
                                    <input type="hidden" name="id" value="{{ $order->id }}">
                                    @csrf
                                    <td><button type="submit" id="verifypaymentbtn" class="btn btn-sm btn-danger">Uncofirmed</button></td>
                                </form>
                                @else
                                <form action="verifypayment" method="post">
                                    <input type="hidden" name="id" value="{{ $order->id }}">
                                    @csrf
                                    <td><button type="submit" id="verifypaymentbtn" class="btn btn-sm btn-success">Confirmed</button></td>
                                </form>
                                @endif
                                <td>
                                    <form action="/cancelorder" method="post">
                                        <input type="hidden" name="id" value="{{ $order->id }}">
                                        @csrf
                                        <button type="submit" id="cancelorderbtn" class="btn btn-sm btn-danger">Cancel</button>
                                    </form>
                                </td>
                                @if ($order->blacklist == 0)
                                <td>
                                    <form action="https://marvelexpo.bsrs.xyz/mailsup/sms.php" method="post">
                                        <input type="hidden" name="name" value="{{ $order->name }}">
                                        <input type="hidden" name="invoice" value="{{ $order->invoice }}">
                                        <input type="hidden" name="phone" value="{{ $order->phone }}">
                                        <input type="hidden" name="ven" value="kjdsbvksjdbvkj5454,nvksjbdvjksbdvjsdbvj65465415ssjdbvskjbdh3tgfiusydgcbwhjebkjhbvkjhfbfzjhrbvsjrbgsekxjgfnxlkdfmvnkjdzfb">
                                        <button type="submit" id="sendSms" class="btn btn-sm btn-danger">Send Sms</button>
                                    </form>
                                </td>
                                @endif

                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex" style="margin-top: 2%;">
                        {!! $orders->links() !!}
                    </div>
                </div>
            </div>
        </div>
        <!-- Recent Sales End -->

@endsection
