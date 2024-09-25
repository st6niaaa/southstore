<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ZipUncompress extends Controller
{
    public static function descompactarZip($caminhoZip, $pastaDestino) {
        $zip = new \ZipArchive();
    
        if ($zip->open($caminhoZip) === TRUE) {
            $zip->extractTo($pastaDestino);
            $zip->close();
            echo "Arquivos descompactados com sucesso em: $pastaDestino";
        } else {
            echo "Erro ao abrir o arquivo zip.";
        }
    }
}
