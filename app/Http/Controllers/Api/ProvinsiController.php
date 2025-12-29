<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Provinsi;
use Illuminate\Http\Request;

class ProvinsiController extends Controller
{
    // GET /api/provinsi
    public function index()
    {
        return response()->json([
            'success' => true,
            'data' => Provinsi::all()
        ]);
    }

    // GET /api/provinsi/{id}
    public function show($id)
    {
        $provinsi = Provinsi::find($id);

        if (!$provinsi) {
            return response()->json([
                'success' => false,
                'message' => 'Provinsi tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $provinsi
        ]);
    }

    // POST /api/provinsi
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:provinsis,kode',
            'nama' => 'required'
        ]);

        $provinsi = Provinsi::create($validated);

        return response()->json([
            'success' => true,
            'data' => $provinsi
        ], 201);
    }

    // PUT /api/provinsi/{id}
    public function update(Request $request, $id)
    {
        $provinsi = Provinsi::find($id);

        if (!$provinsi) {
            return response()->json([
                'success' => false,
                'message' => 'Provinsi tidak ditemukan'
            ], 404);
        }

        $validated = $request->validate([
            'kode' => 'required|unique:provinsis,kode,' . $provinsi->id,
            'nama' => 'required'
        ]);

        $provinsi->update($validated);

        return response()->json([
            'success' => true,
            'data' => $provinsi
        ]);
    }

    // DELETE /api/provinsi/{id}
    public function destroy($id)
    {
        $provinsi = Provinsi::find($id);

        if (!$provinsi) {
            return response()->json([
                'success' => false,
                'message' => 'Provinsi tidak ditemukan'
            ], 404);
        }

        $provinsi->delete();

        return response()->json([
            'success' => true,
            'message' => 'Provinsi berhasil dihapus'
        ]);
    }
}
