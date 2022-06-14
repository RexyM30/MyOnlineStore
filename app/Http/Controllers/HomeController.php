<?php

namespace App\Http\Controllers;

use App\Models\MS_CART;
use App\Models\MS_CATEGORY;
use App\Models\MS_PRODUCT;
use App\Models\MsUserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function home(Request $request)
    {
        $nama = MsUserModel::where('ID', session()->get('IDUser'))->first();
        $MSCATEGORY = MS_CATEGORY::WHERE('status', 1)->get();
        $MS_PRODUCT = MS_PRODUCT::WHERE('status', 1)->get();

        
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
        // print_r($arrCart);
        // exit;

        return view('Home', compact('nama', 'MSCATEGORY', 'MS_PRODUCT', 'arrCart', 'M_totalharga', 'M_totalcheckout'));
    }

    public function detail(Request $request)
    {
        // print_r($request->all());
        // exit;
        $MS_DetailProduct = MS_PRODUCT::WHERE('status', 1)
            ->where('id', $request->id)
            ->first();

        $M_harga = sprintf('Rp. %s', number_format($MS_DetailProduct->harga));


        // print_r($MS_DetailProduct);
        // exit;

        return view('detail', compact('MS_DetailProduct', 'M_harga'));
    }
}
