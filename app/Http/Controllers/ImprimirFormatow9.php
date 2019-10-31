<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Codedge\Fpdf\Fpdf\Fpdf;
use App\Empresas;

class ImprimirFormatow9 extends Controller
{
    
    //put your code here
    static $Datos = '';

    //put your code here
    public function general($Id) {
        try {
            $Datos = new Empresas();
            $Datos = Empresas::find($Id);
            self::$Datos = $Datos;
            $pdf = new Fpdf('P', 'mm', 'letter');
            $pdf->AliasNbPages();
            $pdf->AddPage();
            $pdf->SetTitle("W9-" . $Datos->Identity);
            ImprimirFormatow9::Body($pdf);
            $pdf->Output("W9-" . $Datos->Identity . ".pdf", "D");
        } catch (Exception $e) {
            echo $e;
        }
    }

    public static function Body($pdf) {
        // Cargamos los datos.
        $Row = self::$Datos;
        $imagen = Storage::disk('public')->url('w9.jpg');
        $pdf->Image($imagen, 5, 5, 210);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Text(26, 40, strtoupper($Row->firs_name." ".$Row->mid_name." ".$Row->last_name));
        $pdf->SetFont('Arial', '', 10);
        $pdf->Text(27, 62, "X");
        $pdf->SetFont('Arial', '', 12);
        $pdf->Text(26, 94, strtoupper($Row->dir_home));
        $pdf->Text(26, 102, strtoupper($Row->city.", ".$Row->state.", ".$Row->zip_code));
        if($Row->opid =='Social Security Number'){
            $Part = substr($Row->social_security, 0,3);
            $Part = str_split($Part);
            $Ini = 150;
            foreach ($Part as $Part){
                $pdf->Text($Ini, 125,$Part);
                $Ini = $Ini+5;
            }
            $Part2 = substr($Row->social_security, 3,2);
            $Part2 = str_split($Part2);
            $Ini = 170;
            foreach ($Part2 as $Part2){
                $pdf->Text($Ini, 125,$Part2);
                $Ini = $Ini+5;
            }
            $Part2 = substr($Row->social_security,5,4);
            $Part2 = str_split($Part2);
            $Ini = 185;
            foreach ($Part2 as $Part2){
                $pdf->Text($Ini, 125,$Part2);
                $Ini = $Ini+5;
            }
        }
        $imFirma = Storage::disk('firmas')->getDriver()->getAdapter()->getPathPrefix();
        $pdf->Image($imFirma."/".$Row->firma, 50, 189, 25);
        $pdf->Text(150, 198, date_format(date_create($Row->fh_register),'Y-m-d'));
        $pdf->AddPage();
        $img1 = Storage::disk('public')->url('1.jpg');
        $pdf->Image($img1, 5, 5, 210);
        $pdf->AddPage();
        $img2 = Storage::disk('public')->url('2.jpg');
        $pdf->Image($img2, 5, 5, 210);
        $pdf->AddPage();
        $img3 = Storage::disk('public')->url('3.jpg');
        $pdf->Image($img3, 5, 5, 210);
        $pdf->AddPage();
        $img4 = Storage::disk('public')->url('4.jpg');
        $pdf->Image($img4, 5, 5, 210);
        $pdf->AddPage();
        $img5 = Storage::disk('public')->url('5.jpg');
        $pdf->Image($img5, 5, 5, 210);
    }

    public function Header() {
        
    }

    public function Footer() {
        
    }

}
