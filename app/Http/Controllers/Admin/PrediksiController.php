<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PrediksiController extends Controller
{
    public function index()
    {
        $prediksi = DB::table('prediksi_stok')
            ->join('barang', 'barang.barang_id', '=', 'prediksi_stok.barang_id')
            ->select(
                'prediksi_stok.*',
                'barang.nama_barang',
                'barang.stok'
            )
            ->orderBy('barang.nama_barang')
            ->paginate(10);

        $allPrediksi = DB::table('prediksi_stok')
            ->join('barang', 'barang.barang_id', '=', 'prediksi_stok.barang_id')
            ->select(
                'prediksi_stok.*',
                'barang.nama_barang',
                'barang.stok'
            )
            ->orderBy('barang.nama_barang')
            ->get();

        $aman = 0;
        $warning = 0;
        $restock = 0;

        $labelChart = [];
        $stokChart = [];
        $prediksiChart = [];

        foreach ($allPrediksi as $item) {

            $prediksiBulanan = $item->hasil_prediksi * 30;

            if ($item->stok < $prediksiBulanan) {

                $restock++;

            } elseif ($item->stok <= ($prediksiBulanan * 1.2)) {

                $warning++;

            } else {

                $aman++;
            }

            $labelChart[] = $item->nama_barang;
            $stokChart[] = (int)$item->stok;
            $prediksiChart[] = (int)$prediksiBulanan;
        }

        foreach ($prediksi as $item) {

            $item->prediksi_bulanan = $item->hasil_prediksi * 30;

            $item->batas_stok = $item->stok - $item->prediksi_bulanan;

            if ($item->stok < $item->prediksi_bulanan) {

                $item->status = 'Restock';

            } elseif ($item->stok <= ($item->prediksi_bulanan * 1.2)) {

                $item->status = 'Warning';

            } else {

                $item->status = 'Aman';
            }
        }

        $totalBarang = $allPrediksi->count();

        return view(
            'admin.prediksi.index',
            compact(
                'prediksi',
                'aman',
                'warning',
                'restock',
                'totalBarang',
                'labelChart',
                'stokChart',
                'prediksiChart'
            )
        );
    }

    public function generate()
    {
        try {

            $pythonFile = base_path('ai/python_predict.py');

            $command = escapeshellcmd("python \"$pythonFile\"");

            shell_exec($command . " 2>&1");

            return redirect()
                ->route('admin.prediksi')
                ->with('success', 'Prediksi berhasil diperbarui.');

        } catch (\Exception $e) {

            Log::error($e->getMessage());

            return back()->with('error', 'Gagal menjalankan prediksi.');
        }
    }
}