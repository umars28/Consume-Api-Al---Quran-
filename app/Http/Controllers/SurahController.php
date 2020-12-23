<?php

namespace App\Http\Controllers;

use App\Helpers\SurahHelper;
use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Http\Requests\SurahRequest;

class SurahController extends Controller
{
    // Menggunakan API dari Epidev
    // https://equran.id/api/surat
    public function index() {
        return view('index');
    }

    public function listSurah() {
        // Di class ada 2 property array dan array object sehingga bisa diakses dengan 2 cara
        // sedangkan di php hanya bisa diakses dengan satu cara apabila array maka hanya bisa diakses
        // dengan cara array dan jika object hanya bisa diakses dengan cara object
        // Cara PHP
        //   $listSurah = file_get_contents('https://equran.id/api/surat');
        //   $data = json_decode($listSurah); // hasilnya object kalau tidak diset true dan objecnya hnya berisi key value
        //     foreach($data as $surah) {
        //         echo $surah->nomor;
        //     }

        //     $data = json_decode($listSurah, true); // hasilnya array kalau diset true
        //     foreach($data as $surah) {
        //         echo $surah['nomor'];
        //     }
        $listAllSurah = SurahHelper::getAllSurah();
        SurahHelper::changeToJson($listAllSurah);
        return view('index', compact('listAllSurah'));
    }

    public function detailSurah($surah) {
        $listSurah = SurahHelper::getAllSurah();
        $detailSurah = SurahHelper::getSurahByNomor($surah);
        SurahHelper::changeToJson($listSurah);
        SurahHelper::changeToJson($detailSurah);
        return view('detail', compact('detailSurah', 'listSurah'));
    }

    public function search(SurahRequest $request) {
            $listSurah = SurahHelper::getSurahByNomor($request->surah);
            SurahHelper::changeToJson($listSurah);
            return view('index', compact('listSurah'));

    }
}
