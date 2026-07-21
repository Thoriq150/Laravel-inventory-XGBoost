<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\TransaksiMasuk;
use App\Models\TransaksiKeluar;
use App\Models\DetailTransaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __invoke(Request $request)
    {
        
        $categories = Category::count();
        $suppliers = Supplier::count();
        $products = Product::count();
        $customers = User::count();

        $jumlahPrediksi = DB::table('prediksi_stok')->count();

       

        $transactions = TransaksiKeluar::sum('total_jumlah');

        $transaksiMasuk = TransaksiMasuk::count();

        $transactionThisMonth = DetailTransaksi::whereMonth(
            'created_at',
            date('m')
        )->sum('jumlah');

        

        $productsOutStock = Product::with('kategori')
            ->where('stok', '<=', 10)
            ->orderBy('stok', 'asc')
            ->paginate(5);

        /*
        |--------------------------------------------------------------------------
        | PREDIKSI STOK 30 HARI
        |--------------------------------------------------------------------------
        */

        $prediksi = DB::table('prediksi_stok')
            ->join('barang', 'barang.barang_id', '=', 'prediksi_stok.barang_id')
            ->select(
                'prediksi_stok.*',
                'barang.nama_barang',
                'barang.stok',
                DB::raw('(prediksi_stok.hasil_prediksi * 30) as prediksi_bulanan')
            )
            ->orderByDesc(DB::raw('(prediksi_stok.hasil_prediksi * 30)'))
            ->get();

        foreach ($prediksi as $item) {

            $item->batas_stok = $item->stok - $item->prediksi_bulanan;

            if ($item->stok < $item->prediksi_bulanan) {

                $item->status = 'Restock';

            } elseif ($item->stok <= ($item->prediksi_bulanan * 1.2)) {

                $item->status = 'Warning';

            } else {

                $item->status = 'Aman';
            }
        }

        

        $bestProduct = DB::table('detail_transaksi')
            ->selectRaw('
                barang.nama_barang as name,
                SUM(detail_transaksi.jumlah) as total
            ')
            ->join(
                'barang',
                'barang.barang_id',
                '=',
                'detail_transaksi.barang_id'
            )
            ->groupBy(
                'detail_transaksi.barang_id',
                'barang.nama_barang'
            )
            ->orderByDesc('total')
            ->limit(5)
            ->get();

        $label = [];
        $total = [];

        if ($bestProduct->count() > 0) {

            foreach ($bestProduct as $data) {

                $label[] = $data->name;
                $total[] = (int) $data->total;
            }

        } else {

            $label[] = 'Tidak Ada Data';
            $total[] = 0;
        }

        return view('admin.dashboard', compact(
            'categories',
            'suppliers',
            'products',
            'customers',
            'transactions',
            'transaksiMasuk',
            'transactionThisMonth',
            'productsOutStock',
            'label',
            'total',
            'jumlahPrediksi',
            'prediksi'
        ));
    }
}