<?php

namespace App\Http\Controllers;

use App\Helpers\SurahHelper;
use App\Http\Requests\TafsirRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TafsirController extends Controller
{
    public function search(TafsirRequest $request) {
        $surah = $request->surah2;
        $listSurah = SurahHelper::getTafsirByNomor($surah);
        $listSurah2 = SurahHelper::getSurahByNomor($surah);
        $audio = $listSurah2['audio'];
        SurahHelper::changeToJson($listSurah);
        return view('index', compact('listSurah', 'audio'));
    }
}
