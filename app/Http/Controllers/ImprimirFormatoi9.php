<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Codedge\Fpdf\Fpdf\Fpdf;
use App\Empresas;

class ImprimirFormatoi9 extends Controller {

    //put your code here
    static $Datos = '';

    //put your code here
    public  function general($Id) {
        try {
            $Datos = new Empresas();
            $Datos = Empresas::find($Id);
            self::$Datos = $Datos;
            $pdf = new Fpdf('P', 'mm', 'letter');
            $pdf->AliasNbPages();
            $pdf->AddPage();
            $pdf->SetTitle("i9-" . $Datos->social_security);
            ImprimirFormatoi9::Body($pdf);
            $pdf->Output("i9-" . $Datos->social_security . ".pdf", "D");
        } catch (Exception $e) {
            echo $e;
        }
    }

    public static function Body($pdf) {
        // Cargamos los datos.
        $Row = self::$Datos;
        $imagen = Storage::disk('public')->url('1i.jpg');
        $pdf->Image($imagen, 5, 5, 210);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Text(19, 75, strtoupper($Row->last_name));
        $pdf->Text(80, 75, strtoupper($Row->firs_name));
        $pdf->Text(135, 75, strtoupper(substr($Row->mid_name, 0, 1)));
        $pdf->Text(19, 85, strtoupper($Row->dir_home));
        $pdf->Text(110, 85, strtoupper($Row->city));
        $pdf->Text(162, 85, strtoupper(substr($Row->state, 0, 2)));
        $pdf->Text(175, 85, strtoupper($Row->zip_code));
        $pdf->Text(19, 97, strtoupper($Row->fh_birth));
        if ($Row->opid == 'Social Security Number') {
            $Part = substr($Row->social_security, 0, 3);
            $Part = str_split($Part);
            $Ini = 58;
            foreach ($Part as $Part) {
                $pdf->Text($Ini, 97, $Part);
                $Ini = $Ini + 3.3;
            }
            $Part2 = substr($Row->social_security, 3, 2);
            $Part2 = str_split($Part2);
            $Ini = 72;
            foreach ($Part2 as $Part2) {
                $pdf->Text($Ini, 97, $Part2);
                $Ini = $Ini + 3.3;
            }
            $Part2 = substr($Row->social_security, 5, 4);
            $Part2 = str_split($Part2);
            $Ini = 82.8;
            foreach ($Part2 as $Part2) {
                $pdf->Text($Ini, 97, $Part2);
                $Ini = $Ini + 3.3;
            }
        }
        $pdf->Text(100, 97, $Row->email);
        $Tel1 = substr($Row->tel, 0, 3);
        $Tel2 = substr($Row->tel, 3, 3);
        $Tel3 = substr($Row->tel, 6, 8);
        if ($Tel1 != '' && $Tel2 != '' && $Tel3 != '') {
            $pdf->Text(160, 97, "+1 (" . $Tel1 . ") " . $Tel2 . " - " . $Tel3);
        }
        if ($Row->op_resident == 'A citizen of the United States') {
            $pdf->Text(19, 120, 'X');
        }
        if ($Row->op_resident == 'A noncitizen national of the United States') {
            $pdf->Text(19, 126, 'X');
        }
        if ($Row->op_resident == 'A lawful permanent resident') {
            $pdf->Text(19, 131, 'X');
        }
        if ($Row->op_resident == 'An alien authorized to work') {
            $pdf->Text(19, 137, 'X');
        }
        $imFirma = Storage::disk('firmas')->getDriver()->getAdapter()->getPathPrefix();
        $pdf->Image($imFirma."/".$Row->firma, 60, 180, 30);
        $pdf->AddPage();
        $imagen2 = Storage::disk('public')->url('2i.jpg');
        $pdf->Image($imagen2, 5, 5, 210);
        $pdf->AddPage();
        $imagen3 = Storage::disk('public')->url('3i.jpg');
        $pdf->Image($imagen3, 5, 5, 210);
    }

    public function Header() {
        
    }

    public function Footer() {
        
    }

}
