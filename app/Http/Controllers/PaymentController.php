<?php

namespace App\Http\Controllers;

use App\Models\Tagihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    //
    public function index()
    {
        $data = Tagihan::select('*')->where('status', '=', 0)->get();
        return view('payment', ['data' => $data]);
    }

    public function createPayment()
    {
        // $data = DB::table('siswas')->join('tagihans', 'siswas.id', '=', 'tagihans.id_siswa')->get();

        $data = DB::table('siswas')->get();
        // dd($data);
        return view('createPayment', ['data' => $data]);
    }

    public function insertTagihans(Request $request)
    {
        $arr = [];
        foreach ($request->id_siswa as $data) {
            $arr[] = [
                'id_siswa' => $data,
                'bulan_bayar' => $request->bulan,
                'total' => $request->total,
                'order_id' => 0,
                'status' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ];
        }
        $return = Tagihan::insert($arr);
        if ($return) {
            return response()->json(['respon' => 'success']);
        } else {
            return response()->json('gagal');
        }
    }

    public function tagihan()
    {
        $data = Tagihan::select('*')->get();
        // dd($data);
        return view('tagihan', ['data' => $data]);
    }

    public function insertPembayaran(Request $request)
    {
        $id_transaksi = rand();
        foreach ($request->check as $data) {
            // $bayar[] = [
            //     'order_id' => $id_transaksi,
            //     'tagihan_id' => $data,
            //    'total_bayar' => $request->total,
            //     'status' => 1
            // ]; 
            DB::table('tagihans')->where('id', $data)->update(['order_id' => $id_transaksi]);
        }

        // DB::table('tagihan_bukus')->where('id', $data)->update(['order_id' => $id_transaksi]);

        \Midtrans\Config::$serverKey = 'SB-Mid-server-JpF4nsP97oaxhsFzCoagiVUG';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;
        $total = count($request->check) * $request->total;
        // $email = $request->email;
        // $no_phone = $request->no_phone;
        $data_siswa = Auth::user()->name;
        $params = array(
            'transaction_details' => array(
                'order_id' => $id_transaksi,
                'gross_amount' => intval($total),
            ),
            'customer_details' => array(
                'first_name' => $data_siswa,
                'last_name' => '',
                'email' => Auth::user()->email,
                'phone' => '',
            ),
        );
        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return response()->json(['snaptoken' => $snapToken]);
    }

    public function callBack(Request $request)
    {
        DB::table('tagihans')
            ->where('order_id', $request->order_id)
            ->update(['status' => 1]);
        return "Ada isi" . $request;
    }
}
