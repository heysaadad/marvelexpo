@extends('admin/layout')
@section('body-elem')

        <!-- Sale & Revenue Start -->
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-line fa-3x text-primary"></i>
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
                        <i class="fa fa-chart-bar fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">Total Sale</p>
                            <h6 class="mb-0">${{ ($ticket->total - $ticket->stock) * $ticket->price }}</h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-bar fa-3x text-primary"></i>
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
                    <a href="">Add New</a>
                </div>
                <div class="table-responsive">
                    <table id="ordertable" class="table text-start align-middle table-bordered table-hover mb-0">
                        <thead>
                            <tr class="text-dark">
                                <th scope="col">id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Invoice</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Trx Id</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->name }}</td>
                                <td>{{ $order->invoice }}</td>
                                <td>{{ $order->quantity }}</td>
                                <td>{{ $order->quantity*300 }}</td>
                                <td>{{ $order->trxid }}</td>
                                @if ($order->paid == 0)
                                <td><a class="btn btn-sm btn-danger" href="">Uncofirmed</a></td>
                                @else
                                <td><a class="btn btn-sm btn-success" href="">Confirmed</a></td>
                                @endif
                                
                            </tr>                            
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Recent Sales End -->

<script type="text/javascript">
    $('#search').on('keyup', function(
        $value = $(this).val();
        $.ajax({
            type: 'get',
            url: '{{URL::to('searchInvoice')}}',
            data: {'invoice':$value},

            success:function(data){
                alert(data);
            }
        })
    ))
</script>

@endsection
