<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TafsirController extends Controller
{
    public function search(Request $request) {
        $this->validate($request, [
            'surah2' => 'required|numeric|max:114|min:1'
        ]);
        $surah = $request->surah2;
        $listSurah = Http::get('https://equran.id/api/tafsir/'.$surah);
        $listSurah2 = Http::get('https://equran.id/api/surat/'.$surah);
        $audio = $listSurah2['audio'];
        $listSurah->json();
        return view('index', compact('listSurah', 'audio'));
    }
}
