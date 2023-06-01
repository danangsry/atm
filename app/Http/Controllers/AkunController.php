<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Akun;
use Illuminate\Support\Facades\Hash;
use Exception;
use Psy\Readline\Hoa\Console;

class AkunController extends Controller
{
    public function login(Request $request)
    {
        try {
            $userid = $request->userid;
            $akun = akun::where('userid', $userid)->first();
            $res = [
                'msg' => '',
                'error' => '',
                'data' => null
            ];

            if ($akun) {
                if (Hash::check($request->password, $akun->password)) {
                    $res['msg'] = 'Selamat Datang ' . $akun->nama . '.';
                    $res['error'] = '';
                    $res['data'] = [
                        'id' => $akun->id,
                        'userid' => $akun->userid,
                        'nama' => $akun->nama
                    ];
                } else {
                    $res['error'] = 'PIN anda salah.';
                }
            } else {
                $res['error'] = 'Akun tidak ditemukan.';
            }
            return response()->json($res);
        } catch (Exception $e) {
            $res['error'] = $e->getMessage();
            return response()->json($res);
        }
    }

    public function getAkun($userid)
    {
        try {
            $res['error'] = "";
            $res['data'] = akun::where('userid', $userid)->first();
            return $res;
        } catch (Exception $e) {
            $res['error'] = $e->getMessage();
            return response()->json($res);
        }
    }
}
