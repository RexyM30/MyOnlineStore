<?php

namespace App\Http\Controllers;

use App\Models\DT_SEQUENCE;
use App\Models\DT_TRANSACTION;
use App\Models\MS_ALAMAT;
use App\Models\MS_CART;
use App\Models\MS_CATEGORY;
use App\Models\MS_PRODUCT;
use App\Models\MS_SEQUENCE;
use App\Models\MsUserModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Stevebauman\Location\Facades\Location;


class WishlistController extends Controller
{
    public function index(Request $request)
    {
        $nama = MsUserModel::where('ID', session()->get('IDUser'))->first();

        
        $arrCart = [];
        $getCart = MS_CART::where('user_id', session()->get('IDUser'))
            ->where('MS_CART.status', 1)

            ->leftjoin('MS_PRODUCT', 'MS_CART.produk_id', '=', 'MS_PRODUCT.id')
            // 
            ->select('MS_PRODUCT.nama_produk', 'MS_PRODUCT.foto', 'MS_CART.produk_id', 'MS_CART.user_id', 'MS_PRODUCT.harga', DB::raw('sum(harga) AS Totalharga'), DB::raw('count(produk_id) AS Totalitem'))
            ->groupby('MS_PRODUCT.nama_produk', 'MS_PRODUCT.foto', 'MS_CART.produk_id', 'MS_CART.user_id', 'MS_PRODUCT.harga')
            ->get();

        $gettotalharga = MS_CART::where('user_id', session()->get('IDUser'))
            ->where('MS_CART.status', 1)
            ->leftjoin('MS_PRODUCT', 'MS_CART.produk_id', '=', 'MS_PRODUCT.id')
            ->select(DB::raw('sum(harga) AS Totalharga'))
            ->first();

        $totalharga = $gettotalharga->totalharga;

        $M_totalharga = sprintf('Rp. %s', number_format($gettotalharga->totalharga));

        $getTotalcheckout = MS_CART::where('user_id', session()->get('IDUser'))
            ->where('MS_CART.status', 1)
            ->leftjoin('MS_PRODUCT', 'MS_CART.produk_id', '=', 'MS_PRODUCT.id')
            ->select(DB::raw('count(user_id) as totalcheckout'))
            ->first();

        $M_totalcheckout = $getTotalcheckout->totalcheckout;
        $M_totaldibayar = $gettotalharga->totalharga + 10000;
        $Totaldibayar  = sprintf('Rp. %s', number_format($gettotalharga->totalharga + 10000));

        // print_r($getCart);exit;

        foreach ($getCart as $dtCart) {

            $_PathFoto = $dtCart ? $dtCart->foto : '-';
            $_namabarang = $dtCart ? $dtCart->nama_produk : '-';
            $_hargabarang = $dtCart ?  sprintf('Rp. %s', number_format($dtCart->harga)) : '-';

            $_totalhargabarang = $dtCart ?  sprintf('Rp. %s', number_format($dtCart->totalharga)) : '-';
            $_totalitem = $dtCart ?  $dtCart->totalitem : '-';



            $arrCart[] = [
                $_namabarang, $_PathFoto,
                $_hargabarang,
                $_totalhargabarang, $_totalitem, $dtCart->produk_id, $dtCart->harga
            ];
        }


        $GetAlamat        = MS_ALAMAT::where('user_id', session()->get('IDUser'))
            ->where('status', 1)
            ->first();

        // print_r($arrCart);
        // exit;
        // $ip = $request->ip();
        // $ip = '192.168.20.53';
        // $location = Location::get($ip);

        // // $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];

        // print_r($ip);
        // exit;



        return view('Whislist', compact('nama', 'arrCart', 'M_totalharga', 'M_totalcheckout', 'Totaldibayar', 'M_totaldibayar', 'totalharga','GetAlamat'));
    }

    public function insertcart(Request $request)
    {
        $now            = Carbon::now('Asia/Jakarta');


        // print_r($GetMSdata);
        // exit;

        DB::connection('pgsql')->beginTransaction();
        try {
            for ($i = 0; $i < $request->jumlah; $i++) {
                MS_CART::create([
                    'produk_id'                     =>  $request->id,
                    'user_id'                       =>  session()->get('IDUser'),
                    'status'                        =>  1,
                    'created_at'                    =>  $now,
                    'updated_at'                    =>  $now
                ]);
            }

            DB::connection('pgsql')->commit();

            return response()->json([
                'status' => TRUE,
                'message' => 'Barang berhasil disimpan',
                'reload_page' => TRUE
            ]);
        } catch (\PDOException $th) {
            Log::error('Gagal Menyimpan Data Cart', array(
                'ex' => $th->getMessage()
            ));

            // DB::connection('pgsql')->rollBack();
            return response()->json([
                'status' => FALSE,
                'message' => 'Gagal menyimpan data. Cobalah kembali beberapa saat lagi'
            ]);
        }
    }

    public function UpdateCart(Request $request)
    {
        // print_r($request->all());
        // exit;
        DB::connection('pgsql')->beginTransaction();
        try {
            MS_CART::where('user_id', session()->get('IDUser'))->delete();

            DB::connection('pgsql')->commit();
        } catch (\PDOException $th) {
            Log::error('Gagal Hapus Data Cart', array(
                'ex' => $th->getMessage()
            ));

            DB::connection('pgsql')->rollBack();
            return response()->json([
                'status' => FALSE,
                'message' => 'Gagal menyimpan data. Cobalah kembali beberapa saat lagi'
            ]);
        }

        $now            = Carbon::now('Asia/Jakarta');

        $ID = $request->ID;
        $jumlah = $request->jumlah;
        $arr = [];

        DB::connection('pgsql')->beginTransaction();
        try {

            for ($i = 0; $i < count($ID); $i++) {
                $_ID = $ID[$i];
                $_Jumlah = $jumlah[$i];
                $_Z   = [];

                for ($z = 0; $z < $_Jumlah; $z++) {
                    // print_r($_ID);
                    // array_push($_Z, $_ID);


                    MS_CART::create([
                        'produk_id'                  =>  $_ID,
                        'user_id'                    =>  session()->get('IDUser'),
                        'created_at'                 =>  $now,
                        'updated_at'                 =>  $now
                    ]);
                }
                // array_push($arr, $_Z);

                // exit;
            }
            DB::connection('pgsql')->commit();

            return response()->json([
                'status' => TRUE,
                'message' => 'Barang berhasil disimpan'
            ]);
        } catch (\PDOException $th) {
            Log::error('Gagal Update Data Cart', array(
                'ex' => $th->getMessage()
            ));

            DB::connection('pgsql')->rollBack();
            return response()->json([
                'status' => FALSE,
                'message' => 'Gagal menyimpan data. Cobalah kembali beberapa saat lagi'
            ]);
        }
    }

    public function Order(Request $request)
    {
        // print_r($request->all());
        // exit;

        $ID                         = $request->ID;
        $jumlah                     = $request->jumlah;

        $now                        = Carbon::now('Asia/Jakarta');
        $Bulan                      = date('m', strtotime($now));
        $Tahun                      = date('y', strtotime($now));






        DB::connection('pgsql')->beginTransaction();

        try {
            DT_SEQUENCE::firstOrCreate(
                [
                    'Type'                    =>  'MyOnlineStore',
                    'Month'                   =>  $Bulan,
                    'Year'                    =>  $Tahun,
                ],
                [
                    'NextSequence'            => 1
                ]
            )->increment('NextSequence');

            $GetSequenceNumber = DT_SEQUENCE::where('Type', 'MyOnlineStore')
                ->where('Month', $Bulan)
                ->where('Year', $Tahun)->first();

            $FormatInvoice               = sprintf('%s%s%s%s%s', 'MyOnlineStore', '_', $Bulan, $Tahun, $GetSequenceNumber->NextSequence);

            //insert data transaksi
            $datatransaksi = DT_TRANSACTION::create([
                'user_id'                  =>  session()->get('IDUser'),
                'no_invoice'               =>  $FormatInvoice,
                'status_transaction'       =>  1,
                'status_pembayaran'        =>  0,
                'status_pengiriman'        =>  0,
                'no_resi'                  =>  'Resiku00',
                'ekspedisi'                =>  'Eksepedisiku',
                'subtotal'                 =>  $request->totalharga,
                'ongkir'                   =>  $request->ongkir,
                'diskon'                   =>  0,
                'total'                    =>  $request->Totaldibayar,
                'created_at'               =>  $now,
                'updated_at'               =>  $now
            ]);

            //update no_invoice ke tabel cart
            MS_CART::where('user_id', session()->get('IDUser'))
                ->update([
                    'status' =>  0,
                    'refid_order' =>  $datatransaksi->no_invoice
                ]);

            //update stok barang
            for ($i = 0; $i < count($ID); $i++) {
                $_Jumlah = $jumlah[$i];
                $_ID     = $ID[$i];

                // array_push($_Z, $_Jumlah);

                $getmasterProduk = MS_PRODUCT::WHERE('status', 1)
                    ->where('id', $_ID)
                    ->first();

                $qty = $getmasterProduk->qty - $_Jumlah;

                // print_r($jumlah);exit;

                MS_PRODUCT::where('id', $_ID)
                    ->update([
                        'qty' =>  $qty
                    ]);
            }


            DB::connection('pgsql')->commit();

            return response()->json([
                'status' => TRUE,
                'message' => 'Transaksi Berhasil'
            ]);
        } catch (\PDOException $ex) {

            Log::error('Gagal untuk Order', array(
                'ex' => $ex->getMessage()
            ));

            DB::connection('pgsql')->rollBack();

            return response()->json([
                'status' => false,
                'message' => 'Gagal Untuk Order. Cobalah beberapa saat lagi'
            ]);
        }
        //DT_TRANSACTIONDETAIL::
    }
}
