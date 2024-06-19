<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Phpml\Clustering\KMeans;

class KMeansController extends Controller
{
    public function showUploadForm()
    {
        return view('upload');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        $file = $request->file('file');

        $data = Excel::toArray([], $file);

        // Asumsikan data berada di sheet pertama
        $data = $data[0];

        // Hilangkan header jika ada
        array_shift($data);

        // Konversi data ke tipe yang bisa digunakan untuk clustering
        $samples = [];
        foreach ($data as $row) {
            $samples[] = array_map('floatval', $row);
        }

        // Tentukan jumlah cluster tanpa menyediakan Euclidean
        $kmeans = new KMeans(3);
        $clusters = $kmeans->cluster($samples);

        // Menampilkan hasil clustering
        return view('result', compact('clusters'));
    }
}
