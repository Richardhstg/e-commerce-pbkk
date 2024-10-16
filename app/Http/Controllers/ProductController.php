<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Brick\Math\BigInteger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class ProductController extends Controller
{
    public function index()
    {
        $class = session('result');

        if (isset($class)) {
            $products = Product::where('name', $class)->get();
        } else {
            $products = Product::all();
        }
        return view('frontend.shop', compact('products'));
    }

    public function single(string $id)
    {
        $product = Product::findOrFail($id);
        return view('frontend.single-product', compact('product'));
    }

    public function detectImage()
    {
        $file_name = session('file_name');

        if (!$file_name) {
            return back()->with('error', 'File tidak ditemukan di session.');
        }

        $image_path = public_path('uploads/' . $file_name);

        if (!file_exists($image_path)) {
            return back()->with('error', 'File gambar tidak ditemukan di server.');
        }

        $image_path = str_replace('\\', '/', $image_path);

        $script_path = str_replace('\\', '/', app_path('tes.py'));

        $command = escapeshellcmd("python " . escapeshellarg($script_path) . " " . escapeshellarg($image_path));

        $output = shell_exec($command);

        $result = trim($output);

        if (!$result) {
            return back()->with('error', 'Tidak ada hasil dari script Python.');
        }

        return redirect()->route('shop')->with('result', $result);
    }

    public function store_photo(Request $request)
    {
        $filePath = public_path('uploads');

        if ($request->hasfile('nama')) {
            $file = $request->file('nama');
            $file_name = time() . $file->getClientOriginalName();

            $file->move($filePath, $file_name);
        }

        return redirect()->route('detect')->with('file_name', $file_name);
    }
}
