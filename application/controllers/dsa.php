<?php

namespace App\Http\Controllers;

use App\Models\LsbuAsesorPenilaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\LsbuAsesorPenugasan;
use App\Models\LsbuRegistrasi;
use Illuminate\Support\Facades\Auth;

class LsbuAsesorPenugasanController extends Controller
{
  public function show($id_izin)
  {
    //cek id izin sesuai lsbu
    $lsbu_asesor_penugasan = LsbuAsesorPenugasan::where([
      'id_izin' => $id_izin,
      'id_lsbu' => Auth::user()->id_ls,
    ])->first();

    if (empty($lsbu_asesor_penugasan)) {
      return response()->json([
        'status' => 'errors',
        'id_izin' => $id_izin,
        'message' => "data tidak ditemukan",
      ], 404);
    }

    return response()->json([
      'status' => 'success',
      'data' => $lsbu_asesor_penugasan,
    ], 200);
  }


  public function store(Request $request, $id_izin)
  {
    $this->validate($request, [
      'nomor_surat_tugas' => 'required',
      'id_asesor_1' => 'required',
    ]);

    $lsbu_permohonan_perizinan = DB::table('lsbu_permohonan_perizinan')->where([
      'id_izin' => $id_izin,
      'id_lsbu' => Auth::user()->id_ls,
    ])->first();

    if (empty($lsbu_permohonan_perizinan)) {
      return response()->json([
        'status' => 'errors',
        'id_izin' => $id_izin,
        'message' => "id_izin tidak ditemukan",
      ], 404);
    }

    if ($lsbu_permohonan_perizinan->status != '31') {
      return response()->json([
        'status' => 'errors',
        'id_izin' => $id_izin,
        'message' => "tidak dapat mengirim penugasan, kode status saat ini {$lsbu_permohonan_perizinan->status}",
      ], 403);
    }

    $lsbu_registrasi = LsbuRegistrasi::where('id_izin', $id_izin)->first();
    $kualifikasi = $lsbu_registrasi->kualifikasi;

    $is_2_asesor = True;
    if ($kualifikasi == 'K' || $kualifikasi == 'Spesialis') {
      $is_2_asesor = False;
    }

    if ($is_2_asesor) {
      $this->validate($request, [
        'id_asesor_2' => 'required',
      ]);
      //asesor ga boleh sama
      if ($request['id_asesor_1'] == $request['id_asesor_2']) {
        return response()->json([
          'status' => 'errors',
          'message' => "id_asesor_1 & id_asesor_2 tidak boleh sama",
        ], 403);
      }
    }

    //cek asesor
    // $arr_cek_asesor = [];
    //butuh konfirmasi masa berlaku & status registrasi asesor

    //cek asesor 1 terdaftar di lsbu
    $asesor_1_lsbu = DB::table('ls_asesor')
      ->where('id_asesor', $request['id_asesor_1'])
      ->where('id_ls', Auth::user()->id_ls)
      ->where('jenis_ls', 'lsbu')
      ->first();

    if (empty($asesor_1_lsbu)) {
      return response()->json([
        'status' => 'errors',
        'id_izin' => $id_izin,
        'message' => "id_asesor_1 ({$request['id_asesor_1']}) tidak terdaftar",
      ], 403);
    };

    if ($is_2_asesor) {
      //cek asesor 2 terdaftar di lsbu
      $asesor_2_lsbu = DB::table('ls_asesor')
        ->where('id_asesor', $request['id_asesor_2'])
        ->where('id_ls', Auth::user()->id_ls)
        ->where('jenis_ls', 'lsbu')
        ->first();

      if (empty($asesor_2_lsbu)) {
        return response()->json([
          'status' => 'errors',
          'id_izin' => $id_izin,
          'message' => "id_asesor_2 ({$request['id_asesor_2']}) tidak terdaftar",
        ], 403);
      };
    }


    //cek apakah asesor 1 atau 2 sudah menilai, kalau sudah menilai tdk bs diubah
    $lsbu_asesor_penugasan = LsbuAsesorPenugasan::where('id_izin', $id_izin)->first();
    if (!empty($lsbu_asesor_penugasan)) {
      $asesor_1_penilaian = LsbuAsesorPenilaian::where(['id_izin' => $id_izin, 'id_asesor' => $lsbu_asesor_penugasan->id_asesor_1])->first();

      if ($is_2_asesor) {
        $asesor_2_penilaian = LsbuAsesorPenilaian::where(['id_izin' => $id_izin, 'id_asesor' => $lsbu_asesor_penugasan->id_asesor_2])->first();
      }

      if ($is_2_asesor) {
        if (!empty($asesor_1_penilaian) && !empty($asesor_2_penilaian)) {
          return response()->json([
            'status' => 'errors',
            'id_izin' => $id_izin,
            'message' => "tidak dapat merubah data penugasan karena sudah selesai penilaian asesor ({$asesor_1_penilaian->id_asesor} & {$asesor_2_penilaian->id_asesor})",
          ], 403);
        }
      }


      if ($is_2_asesor) {
        if (!empty($asesor_1_penilaian) && $request['id_asesor_1'] != $lsbu_asesor_penugasan->id_asesor_1) {
          return response()->json([
            'status' => 'errors',
            'id_izin' => $id_izin,
            'message' => "tidak dapat merubah id_asesor_1 ({$asesor_1_penilaian->id_asesor}) karena sudah melakukan penilaian",
          ], 403);
        }

        if (!empty($asesor_2_penilaian) && $request['id_asesor_2'] != $lsbu_asesor_penugasan->id_asesor_2) {
          return response()->json([
            'status' => 'errors',
            'id_izin' => $id_izin,
            'message' => "tidak dapat merubah id_asesor_2 ({$asesor_2_penilaian->id_asesor}) karena sudah melakukan penilaian",
          ], 403);
        }
      } else {
        if (!empty($asesor_1_penilaian)) {
          return response()->json([
            'status' => 'errors',
            'id_izin' => $id_izin,
            'message' => "tidak dapat merubah data penugasan karena sudah selesai penilaian asesor ({$asesor_1_penilaian->id_asesor})",
          ], 403);
        }
      }
    }

    $data['nomor_surat_tugas'] = $request['nomor_surat_tugas'];
    $data['id_asesor_1'] = $request['id_asesor_1'];

    if ($is_2_asesor) {
      $data['id_asesor_2'] = $request['id_asesor_2'];
    }

    $data['username'] = Auth::user()->username;
    $data['id_lsbu'] = Auth::user()->id_ls;

    $lsbu_asesor_penugasan = LsbuAsesorPenugasan::updateOrCreate(['id_izin' => $id_izin], $data);

    if ($lsbu_asesor_penugasan) {
      return response()->json([
        'status' => 'success',
        'id_izin' => $id_izin,
        'message' => "berhasil post penugasan aseesor",
      ], 200);
    } else {
      return response()->json([
        'status' => 'errors',
        'id_izin' => $id_izin,
        'message' => "gagal post penugasan aseesor",
      ], 400);
    }
  }
}
