<?php
    namespace App\Helpers;

    use Illuminate\Support\Facades\Http;

    class SurahHelper{
        public static function getAllSurah() {
            $listAllSurah = Http::get('https://equran.id/api/surat');
            return $listAllSurah;
        }

        public static function getSurahByNomor(int $nomorSurah) {
            $getSurahByNomor = Http::get('https://equran.id/api/surat/'.$nomorSurah);
            return $getSurahByNomor;
        }

        public static function getTafsirByNomor(int $nomorTafsir) {
            $getTafsirByNomor = Http::get('https://equran.id/api/tafsir/'.$nomorTafsir);
            return $getTafsirByNomor;
        }

        public static function changeToJson($arg) {
            return $arg->json();
        }
    }
?>
