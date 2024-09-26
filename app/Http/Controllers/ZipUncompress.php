<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ZipUncompress extends Controller
{
    public function descompactarZip($caminhoZip, $pastaDestino) {
        $zip = new \ZipArchive();
    
        if ($zip->open($caminhoZip) === TRUE) {
            $zip->extractTo($pastaDestino);
            $zip->close();

            redirect()->route('admin.products');
        }

        redirect()->route('admin.products');
    }
}
