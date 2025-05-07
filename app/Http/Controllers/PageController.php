<?php

namespace App\Http\Controllers;

use App\Models\Katalog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    private static $validCredentials = [
        'email' => 'utspweb@gmail.com',
        'password' => '123',
        'name' => 'Steven'
    ];

    public static function getCredentials()
    {
        return self::$validCredentials;
    }

    public function login()
    {
        if (Session::get('authenticated')) {
            return redirect()->route('dashboard');
        }
        return view('auth.login');
    }

    public function dashboard()
    {
        if (!Session::get('authenticated')) {
            return redirect()->route('login')->with('error', 'Please login first');
        }
        return view('dashboard');
    }

    public function authenticate(Request $request)
    {
        $credentials = self::$validCredentials;

        if ($request->email === $credentials['email'] &&
            $request->password === $credentials['password']) {

            $request->session()->put([
                'authenticated' => true,
                'user_email' => $credentials['email'],
                'user_name' => $credentials['name']
            ]);

            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'email' => 'Invalid credentials',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('login')->with('success', 'You have been logged out');
    }

    public function katalog()
    {
        $katalog = Katalog::get();
        return view('pengelolaan', compact('katalog'));
    }
    // ['posts'=> [
    //     [
    //         'Gambar' => 'arabica.jpeg',
    //         'Stok' => '10',
    //         'Jenis Kopi' => 'Arabica Jember',
    //         'kualitas' => 'Grade A - 500gr',
    //         'Harga' => 'Rp 100.000'
    //     ],
    //     [
    //         'Gambar' => 'robusta.jpg',
    //         'Stok' => '12',
    //         'Jenis Kopi' => 'Robusta Bondowoso',
    //         'kualitas' => 'Grade 1 - 200gr',
    //         'Harga' => 'Rp 250.000'
    //     ],
    //     [
    //         'Gambar' => 'liberika.jpg',
    //         'Stok' => '3',
    //         'Jenis Kopi' => 'Liberika Pasuruan',
    //         'kualitas' => 'Special Edition - 400gr',
    //         'Harga' => 'Rp 650.000'
    //     ]
    // ]]);
    public function tambahdata()
    {
        return view('tambah');
    }

    public function submit(Request $request)
    {
        $request->validate([
            'jenis_kopi' => 'required|string|max:255',
            'kualitas' => 'required|string|max:255',
            'stok' => 'required|integer|min:0',
            'harga' => 'required|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('gambar')) {
            $imagePath = $request->file('gambar')->store('kopi', 'public');

            $imageName = basename($imagePath);
        } else {
            return redirect()->back()->with('error', 'Gambar wajib diupload');
        }

        $katalog = new Katalog();
        $katalog->jenis_kopi = $request->jenis_kopi;
        $katalog->kualitas = $request->kualitas;
        $katalog->stok = $request->stok;
        $katalog->harga = $request->harga;
        $katalog->gambar = $imageName;
        $katalog->save();

        return redirect()->route('pengelolaan')->with('success', 'Data berhasil ditambahkan');
    }

    public function profile()
    {
        return view('profile');
    }
    public function editdata($id)
    {
        $katalog = Katalog::find($id);
        return view('edit', compact('katalog'));
    }
    public function updatedata(Request $request, $id)
    {
        if ($request->hasFile('gambar')) {

            $imagePath = $request->file('gambar')->store('kopi', 'public');

            $imageName = basename($imagePath);
        } else {
            return redirect()->back()->with('error', 'Gambar wajib diupload');
        }

        $katalog = Katalog::find($id);
        $katalog->jenis_kopi = $request->jenis_kopi;
        $katalog->kualitas = $request->kualitas;
        $katalog->stok = $request->stok;
        $katalog->harga = $request->harga;
        $katalog->gambar = $imageName;
        $katalog->update();

        return redirect()->route('pengelolaan')->with('success', 'Data berhasil ditambahkan');
    }
    public function deletedata($id)
    {
        $katalog = Katalog::find($id);
        $katalog->delete();
        return redirect()->route('pengelolaan')->with('success', 'Data berhasil dihapus');
    }
}

