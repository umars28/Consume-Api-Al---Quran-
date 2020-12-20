<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class SurahController extends Controller
{
    // Menggunakan API dari Epidev
    // https://equran.id/api/surat
    public function index() {
        return view('index');
    }

    public function search(Request $request) {
            $this->validate($request, [
                'surah' => 'required|numeric|max:114|min:1'
            ]);
            $surah = $request->surah;
            $listSurah = Http::get('https://equran.id/api/surat/'.$surah);
            $listSurah->json();
            return view('index', compact('listSurah'));

    }
}
