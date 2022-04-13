<?php

namespace App\Http\Controllers;

use App\Models\repair_orders;
use App\Models\repairmans;
use App\Models\devices;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\If_;

class orderController extends Controller
{
    public function showOrders()
    {
        if (session('id_repairman') != null) {
            $statusData = repair_orders::select('*')
                ->where([
                    ['fk_repairmansid', '=', session('id_repairman')],
                    ['status', '<', '3'],
                ])
                ->get();
        } else if (session('id_repairman') == null && session('role') == 'user') {
            $statusData = repair_orders::select('*')
                ->where([
                    ['fk_usersid', '=', session('id_user')],
                ])
                ->get();

        } else if (session('role') == 'admin') {
            $statusData = repair_orders::all();
        }
        return view('/showOrders', ['statusData' => $statusData]);
    }

    public function showAddOrder($id) {
        $repairman = repairmans::where('repairmans_id', '=', $id)->first();
        $devices = devices::all();
        return view('/addOrder', ['repairman' => $repairman, 'devices' => $devices]);
    }

    public function addOrder() {
        /*request()->validate([
            'price' => 'required'
        ]);*/
        $order = new repair_orders();
        $order->timestamp = date("Y-m-d");
        $order->price = request('price');
        $order->status = request('status');
        $order->fk_usersid = session('id_user');
        $order->fk_devicesid = request('fk_devicesid');
        $order->fk_repairmansid = request('fk_repairmansid');
        $order->save();

        return redirect('/showOrders');
    }

    public function changeStatus($id, $status)
    {
        $statusData = repair_orders::where('repair_orders_id', $id);
        //status list: užsakytas, tvarkomas, atliktas, atmestas
        //status list:    1     ,       2  ,     3   ,     4
        switch ($status) {
            case 1:
                $statusData->update(['status' => 2]);
                break;
            case 2:
                $statusData->update(['status' => 3]);
                break;
            default:
                return redirect('/showOrders');
        }
        return redirect('/showOrders');
    }

    public function cancelOrder($id)
    {
        //checking if logged-in user owns the order
        $data = repair_orders::where('repair_orders_id', $id);
        if ($data->first()->fk_usersid == session('id_user')) {
            $data->update(['status' => 4]);
        }
        return redirect('/showOrders');
    }
}
