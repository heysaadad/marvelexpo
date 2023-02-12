<?php
use Illuminate\Support\Facades\Auth;
namespace App\Http\Controllers;
use illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Ticket;
use Mail;

class MainController extends Controller
{
    function index(){
        session()->flush();
        return view('index');
    }

    function buy(Request $request){
        if ($request->method() == "GET") {
            $tickets = Ticket::all();
            return view('buy', compact('tickets'));
        }
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required',
            'dob' => 'required',
            'nid' => 'required',
            'quantity' => 'required|integer',
            'invoice' => 'string',
            'reffercode' => 'max:100'
            
        ]);

        $order = new Order;
        $invoice = "106969M";
        $order->invoice = $invoice;
        $order->name = $request->name;
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->nid = $request->nid;
        $order->dob = $request->dob;
        $order->quantity = $request->quantity;
        $order->reffercode = $request->reffercode;
        session()->put('order', $order);
        return view('pay');
    }

    function pay(Request $request){
        if ($request->method() == "GET"){
            return redirect('/buy');
        }

        $order = new Order;
        $order->invoice = $request->invoice;
        $order->name = $request->name;
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->nid = $request->nid;
        $order->dob = $request->dob;
        $order->quantity = $request->quantity;
        $order->trxid = $request->trxid;
        $order->trxno = $request->trxno;
        $order->reffercode = $request->reffercode;
        $order->save();
        $order->invoice = $request->invoice  .  $order->id;
        $order->save();
        $tickets = Ticket::all();
        foreach ($tickets as $ticket) {
            $ticket->stock = $ticket->stock - $request->quantity;
            $ticket->save();
        }
        $inv = array('inv' => $order->invoice);
        session()->flush();
        session()->put('order', $order);
        return redirect('success');
    }


    function success(){
        if (!session('order')){
            return redirect('/');
        }
        return view('success');
    }


    function adminIndex(Request $request){
        if($request->user()){
        $user = $request->user();
        $orders = Order::paginate(30);
        $tickets = Ticket::all();
        return view('admin/index', compact('orders', 'tickets', 'user'));    
        }
        else{
            return redirect('login');
        }
        
    }

    function searchInvoice(Request $request){
        if ($request->method() == "GET"){
            return redirect('/dashboard');
        }
        $invoice = $request->invoice;
        $tickets = Ticket::all();
        $orders = Order::where('invoice', $invoice)->orWhere('phone', $invoice)->orWhere('email',$invoice)->orWhere('trxid',$invoice)->orWhere('trxno',$invoice)->orWhere('reffercode',$invoice)->orWhere('phone',$invoice)->get();
        return view('admin/searched', compact('orders','tickets'));
    }

    function verifypayment(Request $request){
        $id = $request->id;
        $orders = Order::where('id', $id)->get();
        foreach ($orders as $order) {
            if ($order->paid == 0){
                $order->paid = 1;
            }
            else{
                $order->paid = 0;
            }
            $order->save();
        }

        return redirect()->back();
    }

    function cancelorder(Request $request){
        $id = $request->id;
        $orders = Order::where('id', $id)->get();
        $tickets = Ticket::where('id', 1)->get();
        foreach ($tickets as $ticket) {
            foreach ($orders as $order) {
                $ticket->stock = $ticket->stock + $order->quantity;
                $ticket->save();
                $order->delete(); 
            }
        }
        return redirect()->back()->with('success', 'Order Cancelled');
    }

    function logout(Request $request){
        $user = $request->user();
        Auth::logout();
        return redirect('/');
    }
    
    function t_c(Request $request){
        return view('terms');
    }

}
