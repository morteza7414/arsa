<?php

namespace App\Http\Controllers;

use App\Models\OrderStatus;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionsController extends Controller
{
    public function successful()
    {
        $user = auth()->user();
        $transactions = Transaction::where('user_id', $user->id)->where('status', Transaction::STATUS_SUCCESS)->paginate(5);
        return view('panel.transactions.mytransactions', compact('transactions'));
    }


    public function failed()
    {
        $user = auth()->user();
        $transactions = Transaction::where('user_id', $user->id)->where('status', Transaction::STATUS_FAILED)->paginate(5);
//        dd($transactions->toArray());
        return view('panel.transactions.failed', compact('transactions'));
    }

    public function invoice(Transaction $id)
    {

        $transaction = $id;
        if ($transaction->user_id == auth()->id() or auth()->user()->role == 'admin') {
            if ($transaction->status == 2) {
                $order = $transaction['invoice_details']->getDetails()['order'];
                $order_offcodes = DB::table('orders_offcodes')->where('order_id', '=', $order->id)->get();

//        dd($order_offcodes);
                return view('panel.transactions.invoice', compact('transaction', 'order_offcodes', 'order'));
            }else {
                abort('403', 'شما به این صفحه دسترسی ندارید');
            }
        } else {
            abort('403', 'شما به این صفحه دسترسی ندارید');
        }
    }

    public function failedInvoice(Request $request, $message)
    {
        $payment_id = $request->payment_id;
        return view('panel.transactions.failed_invoice', compact('message', 'payment_id'));
    }


    public function registered()
    {
        $orders = OrderStatus::where('status','1')->paginate(10);
        $status = 1;
        return view('panel.transactions.admin.transactions', compact('orders','status'));
    }

    public function confirmed()
    {
        $orders = OrderStatus::where('status','2')->paginate(10);
        $status = 2;
        return view('panel.transactions.storekeeper.transactions', compact('orders','status'));
    }

    public function preparing()
    {
        $orders = OrderStatus::where('status','3')->paginate(10);
        $status = 3;
        return view('panel.transactions.storekeeper.transactions', compact('orders','status'));
    }

    public function ready()
    {
        $orders = OrderStatus::where('status','4')->paginate(10);
        $status = 4;
        return view('panel.transactions.admin.transactions', compact('orders','status'));
    }

    public function sent()
    {
        $orders = OrderStatus::where('status','5')->orderBy('id','DESC')->paginate(10);
        $status = 5;
        return view('panel.transactions.admin.transactions', compact('orders','status'));
    }

    public function total()
    {
        $orders = OrderStatus::where('status','!=','6')->orderBy('id','DESC')->paginate(10);
        $status = 6;
        return view('panel.transactions.admin.transactions', compact('orders','status'));
    }

    public function editOrderStatus(OrderStatus $orderStatus,Request $request)
    {
        if (auth()->user()->can('update', $orderStatus)) {
            $orderStatus->update([
                'status' => $request->status,
            ]);
        }
        return back();
    }
}
