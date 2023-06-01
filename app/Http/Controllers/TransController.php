<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use App\Models\Trans;
use App\Models\Akun;
use Illuminate\Support\Facades\DB;

class TransController extends Controller
{
    public function transaksi(Request $request)
    {
        try {
            $res['error'] = "";
            $akun = $request->from;
            if ($request->tipe == "ST") {
                if ($request->from['jml'] <= 0 || $request->from['jml'] % 50000 != 0) {
                    $res['error'] = "Setor tunai minimal kelipatan Rp. 50.000";
                    return response()->json($res);
                } else {
                    $akun = akun::where('userid', $request->from['userid'])->first();
                    if ($akun) {
                        $akun->saldo += $request->from['jml'];
                        $akun->save();
                        DB::table('trans')->insert([
                            'userid' => $akun->userid,
                            'tipe' => $request->tipe,
                            'jml' => $request->from['jml'],
                            'created_at' => \now(),
                            'updated_at' => \now()
                        ]);
                    } else {
                        $res['error'] = "Akun " . $request->from['userid'] . " tidak ditemukan.";
                        return response()->json($res);
                    }
                }
            } else  if ($request->tipe == "TT") {
                if (($request->from['jml'] * -1) <= 0) {
                    $res['error'] = "Jumlah harus lebih dari 0";
                    return response()->json($res);
                } else if (($request->from['jml'] * -1) % 50000 != 0) {
                    $res['error'] = "Hanya dapat tarik tunai dengan kelipatan Rp. 50.000";
                    return response()->json($res);
                } else {
                    $akun = akun::where('userid', $request->from['userid'])->first();
                    // return response()->json($akun);
                    if ($akun) {
                        if (($request->from['jml'] * -1) > $akun->saldo) {
                            $res['error'] = "Saldo anda tidak mencukupi.";
                            return response()->json($res);
                        } else {
                            $akun->saldo += $request->from['jml'];
                            $akun->save();
                            DB::table('trans')->insert([
                                'userid' => $akun->userid,
                                'tipe' => $request->tipe,
                                'jml' => $request->from['jml'],
                                'created_at' => \now(),
                                'updated_at' => \now()
                            ]);
                        }
                    } else {
                        $res['error'] = "Akun " . $request->userid . " tidak ditemukan.";
                        return response()->json($res);
                    }
                }
            } else {
                // update akun pengirim
                $akun = akun::where('userid', $request->from['userid'])->first();
                if ($akun) {
                    if ($request->to['jml'] > $akun->saldo) {
                        $res['error'] = "Saldo anda tidak mencukupi";
                        return response()->json($res);
                    }
                    $akun->saldo += $request->from['jml'];
                    $akun->save();
                    DB::table('trans')->insert([
                        'userid' => $akun->userid,
                        'tipe' => $request->tipe,
                        'jml' => $request->from['jml'],
                        'created_at' => \now(),
                        'updated_at' => \now()
                    ]);
                } else {
                    $res['error'] = "Akun " . $request->from['userid'] . " tidak ditemukan.";
                    return response()->json($res);
                }

                // update akun tujuan
                $akun = akun::where('userid', $request->to['userid'])->first();
                if ($akun) {
                    $akun->saldo += $request->to['jml'];
                    $akun->save();
                    DB::table('trans')->insert([
                        'userid' => $akun->userid,
                        'tipe' => $request->tipe,
                        'jml' => $request->to['jml'],
                        'created_at' => \now(),
                        'updated_at' => \now()
                    ]);
                } else {
                    $res['error'] = "Akun " . $request->to['userid'] . " tidak ditemukan.";
                    return response()->json($res);
                }
            }
            $res['msg'] = "Transaksi berhasil.";
            return response()->json($res);
        } catch (Exception $e) {
            $res['error'] = $e->getMessage();
            return response()->json($res);
        }
    }

    public function getListTransaksi($userid)
    {
        try {
            $res['error'] = "";
            $res['data'] = DB::table('trans')->orderBy('created_at', 'DESC')->where('userid', $userid)->get();
            return $res;
        } catch (Exception $e) {
            $res['error'] = $e->getMessage();
            return response()->json($res);
        }
    }
}
