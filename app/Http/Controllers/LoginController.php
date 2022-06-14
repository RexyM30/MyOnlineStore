<?php

namespace App\Http\Controllers;

use App\Models\MsUserModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{

    public function index(Request $request)
    {
        return view('login');
    }

    public function login_proccess(Request $request)
    {
        $response_data = [
            'status' => FALSE,
            'message' => '',
            'reload_page' => TRUE
        ];

        // $password = Crypt::encryptString($request->password);
        // // $password = 'eyJpdiI6Imw3ZVZVcEJxYzNuaTZ4ZVpkb29TMUE9PSIsInZhbHVlIjoiWXhVUjlVaklBVk1YUHNSYmVPTVk2UT09IiwibWFjIjoiOTdmMzNjOGZlMDdlOTM5ZGU3MWQyNDk1ZjYwMTM3ZTc1NjlmMjFjMDY0OWJkNDk1YmI4NjlhMTAyODE5OTU2YyIsInRhZyI6IiJ9';
        // $password  = 'eyJpdiI6IjFpTnRTMC9heVJ2dmRBbHl5UU01Z3c9PSIsInZhbHVlIjoiWXJxUlgwbWNnWjV3bTNScHlQcUhaZz09IiwibWFjIjoiYTRhYmM4NWE2YWQxYTEwMmVlOTdlYjcxZGQ0OGEzMzRhOWE2ZjhhMGM1MDQyNzRkOWI1YWZmZTQwMTMzMDVmZSIsInRhZyI6IiJ9';
        // $DecryptId = Crypt::decryptString($password);
        // // print_r($password,$passwordno);exit;

        $check_user = MsUserModel::where('email', $request->username)->where('password', $request->password)->where('statusaktif', '1')->first();

        // print_r($check_user);
        // exit;

        if (!$check_user) {
            $response_data['message'] = 'Username Tidak terdaftar';
            $response_data['reload_page'] = TRUE;
        } else {
            $create_user_session = $this->_create_session($check_user->ID);
            if (!$create_user_session) {
                $response_data['message'] = 'Terjadi kesalahan saat login. Mohon coba beberapa saat lagi';
                $response_data['reload_page'] = TRUE;
            } else {
                $response_data['status'] = TRUE;
                $response_data['message'] = 'User berhasil login ke sistem';
                $response_data['dashboard_url'] = url('Home');
            }
        }

        return response()->json($response_data);
    }

    private function _create_session($id)
    {
        $user = MSUserModel::where('ID', $id)->where('statusaktif', '1')->first();

        if ($user) {

            session([
                "IDUser"        => $user->ID,
                "hasLogin"      => TRUE,
            ]);
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function register(Request $request)
    {
        return view('register');
    }

    public function insertregister(Request $request)
    {
        $now            = Carbon::now('Asia/Jakarta');
        $Encryptpassword        = Crypt::encryptString($request->password);

        DB::connection('pgsql')->beginTransaction();
        try {
            MsUserModel::create([
                'namadepan'                     =>  $request->namadepan,
                'namatengah'                    =>  $request->namatengah,
                'namabelakang'                  =>  $request->namabelakang,
                'email'                         =>  $request->email,
                'password'                      =>  $request->password,
                'statusaktif'                   =>  1,
                'created_at'                    =>  $now,
                'updated_at'                    =>  $now
            ]);
            DB::connection('pgsql')->commit();

            return response()->json([
                'status' => TRUE,
                'message' => 'Register berhasil disimpan'
            ]);
        } catch (\PDOException $th) {
            Log::error('Gagal Menyimpan Data Register', array(
                'ex' => $th->getMessage()
            ));

            DB::connection('pgsql')->rollBack();
            return response()->json([
                'status' => FALSE,
                'message' => 'Gagal menyimpan data. Cobalah kembali beberapa saat lagi'
            ]);
        }
    }
}
