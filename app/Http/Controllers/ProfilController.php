<?php

namespace App\Http\Controllers;

use App\Models\MS_ALAMAT;
use App\Models\MS_CART;
use App\Models\MsUserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfilController extends Controller
{
    public function index(Request $request)
    {
        $getTotalcheckout = MS_CART::where('user_id', session()->get('IDUser'))
            ->where('MS_CART.status', 1)
            ->leftjoin('MS_PRODUCT', 'MS_CART.produk_id', '=', 'MS_PRODUCT.id')
            ->select(DB::raw('count(user_id) as totalcheckout'))
            ->first();

        $M_totalcheckout = $getTotalcheckout->totalcheckout;

        $GetAlamat        = MS_ALAMAT::where('user_id', session()->get('IDUser'))
            ->where('status', 1)
            ->first();


        $GetUser = MsUserModel::where('ID', session()->get('IDUser'))->first();

        
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

        $getTotalcheckout = MS_CART::where('user_id', session()->get('IDUser'))
            ->where('MS_CART.status', 1)
            ->leftjoin('MS_PRODUCT', 'MS_CART.produk_id', '=', 'MS_PRODUCT.id')
            ->select(DB::raw('count(user_id) as totalcheckout'))
            ->first();

        $M_totalcheckout = $getTotalcheckout->totalcheckout;


        $M_totalharga = sprintf('Rp. %s', number_format($gettotalharga->totalharga));

        // print_r($M_totalharga);exit;

        foreach ($getCart as $dtCart) {

            $_PathFoto = $dtCart ? $dtCart->foto : '-';
            $_namabarang = $dtCart ? $dtCart->nama_produk : '-';
            $_hargabarang = $dtCart ?  sprintf('Rp. %s', number_format($dtCart->harga)) : '-';
            $_totalhargabarang = $dtCart ?  sprintf('Rp. %s', number_format($dtCart->totalharga)) : '-';
            $_totalitem = $dtCart ?  $dtCart->totalitem : '-';



            $arrCart[] = [
                $_namabarang, $_PathFoto,
                $_hargabarang,
                $_totalhargabarang, $_totalitem
            ];
        }

        return view('profile', compact('M_totalcheckout', 'GetUser', 'GetAlamat', 'arrCart', 'M_totalharga'));
    }
}
