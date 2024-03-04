<?php

namespace App\Http\Controllers;

use App\Models\Mentor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MentorController extends Controller
{



 public function index()
    {
        $mentors = Mentor::all();
        return response()->json([
            'status' => 'success',
            'data' => $mentors
        ]);
    }

    public function show($id)
    {
        $mentor = Mentor::find($id);
        if (!$mentor) {
            return response()->json([
                'status' => 'error',
                'message' => 'mentor not found'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $mentor
        ]);
    }

    public function create(Request $request)
    {
        // Atur aturan validasi untuk input
        $rules = [
            'name' => 'required|string',
            'profile' => 'required|url',
            'profession' => 'required|string',
            'email' => 'required|email|unique:mentors' // Menambahkan unique untuk memastikan email unik
        ];

        // Mendapatkan data dari request
        $data = $request->only(['name', 'profile', 'profession', 'email']);

        // Melakukan validasi menggunakan Validator
        $validator = Validator::make($data, $rules);

        // Jika validasi gagal, kembalikan response error
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()
            ], 400);
        }

        // Jika validasi berhasil, buat mentor baru
        $mentor = Mentor::create($data);

        // Kembalikan response sukses bersama dengan data mentor yang baru dibuat
        return response()->json(['status' => 'success', 'data' => $mentor], 201);
    }

        public function update(Request $request, $id)
    {
        // Atur aturan validasi untuk input
        $rules = [
            'name' => 'string',
            'profile' => 'url',
            'profession' => 'string',
            'email' => 'email|unique:mentors,email,'.$id
            // Menambahkan unique dengan mengecualikan mentor dengan ID yang sedang diperbarui
        ];

        // Dapatkan data dari request
        $data = $request->only(['name', 'profile', 'profession', 'email']);

        // Lakukan validasi menggunakan Validator
        $validator = Validator::make($data, $rules);

        // Jika validasi gagal, kembalikan response error
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()
            ], 400);
        }

        // Cari mentor berdasarkan ID
        $mentor = Mentor::find($id);

        // Jika mentor tidak ditemukan, kembalikan response error
        if (!$mentor) {
            return response()->json([
                'status' => 'error',
                'message' => 'Mentor not found'
            ], 404);
        }

        // Isi data mentor dengan data baru dari request
        $mentor->fill($data);

        // Simpan perubahan pada mentor
        $mentor->save();

        // Kembalikan response sukses bersama dengan data mentor yang telah diperbarui
        return response()->json([
            'status' => 'success',
            'data' => $mentor
        ]);


    }

    public function destroy($id)
    {
        $mentor = Mentor::find($id);

        if (!$mentor){
            return response()->json([
                'status' => 'error',
                'message' => 'mentor not found'
            ], 404);
        }

        $mentor->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'mentor deleted'
        ]);
    }
}

