<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Codedge\Fpdf\Fpdf\Fpdf;
use App\Empresas;

class ImprimirDocumentos extends Controller {
    
    static $Datos = '';
    //put your code here
    public function generalW4($Id='') {
        try {
            $Datos = new Empresas();
            $Datos = Empresas::find($Id);
            self::$Datos = $Datos;
            $pdf = new Fpdf('P', 'mm', 'letter');
            $pdf->AliasNbPages();
            $pdf->AddPage();
            $pdf->SetTitle("W4". $Datos->social_security);
            ImprimirDocumentos::Body($pdf);
            $pdf->Output("W4-" . $Datos->social_security . ".pdf", "D");
        } catch (Exception $e) {
            echo $e;
        }
    }

    public function Body($pdf) {
        // Cargamos los datos.
        $imagen = Storage::disk('public')->getDriver()->getAdapter()->getPathPrefix();
        $pdf->Image($imagen."/0001.jpg", 8, 1, 200);
        //PRimer rectangulo primera fila
        $pdf->Rect(8, 190, 70, 10, '');
        $pdf->Rect(78, 190, 70, 10, '');
        $pdf->Rect(148, 190, 60, 10, '');
        $pdf->SetFont('Arial', '', 7);
        $pdf->Text(10, 193, "1 Your first name and middle initial");
        if ((self::$Datos) != '') {
            $pdf->SetFont('Arial', 'B', 9);
            $pdf->Text(10, 197, strtoupper(self::$Datos->firs_name));
            $pdf->SetFont('Arial', '', 7);
        }
        $pdf->Text(80, 193, "Last name");
        if ((self::$Datos) != '') {
            $pdf->SetFont('Arial', 'B', 9);
            $pdf->Text(80, 197, strtoupper(self::$Datos->last_name));
            $pdf->SetFont('Arial', '', 7);
        }
        $pdf->Text(150, 193, "2 Your social security number");
        if ((self::$Datos) != '') {
            $pdf->SetFont('Arial', 'B', 9);
            $pdf->Text(150, 197, strtoupper(self::$Datos->Identity));
            $pdf->SetFont('Arial', '', 7);
        }
        $pdf->line($pdf->GetX(), $pdf->GetY() - 4, $pdf->GetX(), $pdf->GetY() + 6);

        //Caja de check 1
        $pdf->SetFont('Arial', '', 7);
        $pdf->Text(109, 203, "3");
        $pdf->Rect(111, 201, 4, 4, '');
        if ((self::$Datos) != '' && self::$Datos->marital_status == 'Single') {
            $pdf->SetFont('Arial', 'B', 9);
            $pdf->Text(112, 204, 'X');
            $pdf->SetFont('Arial', '', 7);
        }

        //Caja de check 2
        $pdf->SetFont('Arial', '', 7);
        $pdf->Text(116, 203, "Single");
        $pdf->Rect(125, 201, 4, 4, '');
        if ((self::$Datos) != '' && self::$Datos->marital_status == 'Married') {
            $pdf->SetFont('Arial', 'B', 9);
            $pdf->Text(126, 204, 'X');
            $pdf->SetFont('Arial', '', 7);
        }

        //Caja de check 3
        $pdf->SetFont('Arial', '', 7);
        $pdf->Text(130, 203, "Married");
        $pdf->Rect(140, 201, 4, 4, '');
        $pdf->Text(145, 203, "Married, but withhold at higher Single rate.");
        $pdf->Text(109, 208, "Note: If married filing separately, check “Married, but withhold at higher Single rate.”");

        //SEgundo Restangulo segunda fila
        $pdf->Rect(8, 200, 100, 10, '');
        $pdf->Text(10, 203, "Home address (number and street or rural route)");
        if ((self::$Datos) != '') {
            $pdf->SetFont('Arial', 'B', 9);
            $pdf->Text(10, 207, strtoupper(self::$Datos->dir_home));
            $pdf->SetFont('Arial', '', 7);
        }
        $pdf->Rect(108, 200, 100, 10, '');

        //Tercer Rectangulo.
        $pdf->Rect(8, 210, 100, 10, '');
        $pdf->Text(10, 213, "City or town, state, and ZIP code");
        if ((self::$Datos) != '') {
            $pdf->SetFont('Arial', 'B', 9);
            $pdf->Text(10, 217, strtoupper(self::$Datos->zip_code));
            $pdf->SetFont('Arial', '', 7);
        }
        $pdf->Rect(108, 210, 100, 10, '');
        $pdf->Text(109, 213, "4 If your last name differs from that shown on your social security card, check here. ");
        $pdf->Text(109, 216, "You must call 800-772-1213 for a replacement card. >");
        $pdf->Rect(180, 215, 4, 4, '');
        $imagen2 = Storage::disk('public')->url('parte2.jpg');
        $pdf->Image($imagen2, 8, 220, 200);
        $pdf->SetFont('Arial', '', 7);
        $pdf->Text(8, 250, "Under penalties of perjury, I declare that I have examined this certificate and, to the best of my knowledge and belief, it is true, correct, and complete.");
        $pdf->SetFont('Arial', 'B', 7);
        $pdf->Text(8, 255, "Employee’s signature");
        $pdf->SetFont('Arial', '', 7);
        $pdf->Text(8, 259, "(This form is not valid unless you sign it.)");
        if ((self::$Datos) != '') {
            //$imFirma = Storage::disk('firmas')->url(self::$Datos->firma);
            $imFirma = Storage::disk('firmas')->getDriver()->getAdapter()->getPathPrefix();
            $pdf->Image($imFirma."/".self::$Datos->firma, 45, 250, 25);
        }
        $pdf->SetFont('Arial', 'B', 7);
        $pdf->Text(150, 259, "Date >");
        $pdf->SetFont('Arial', '', 7);
        if ((self::$Datos) != '') {
            $pdf->SetFont('Arial', 'B', 9);
            $pdf->Text(165, 259, strtoupper(self::$Datos->fh_register));
            $pdf->SetFont('Arial', '', 7);
        }
        $Imagen3 = Storage::disk('images')->url('parte3.jpg');
        $pdf->Image($Imagen3, 8, 260, 200);
        $pdf->AddPage();
        $Imagen4 = Storage::disk('images')->url('0002.jpg');
        $pdf->Image($Imagen4, 8, 1, 200);
        $pdf->AddPage();
        $Imagen5 = Storage::disk('images')->url('0003.jpg');
        $pdf->Image($Imagen5, 8, 1, 200);
        $pdf->AddPage();
        $Imagen6 = Storage::disk('images')->url('0004.jpg');
        $pdf->Image($Imagen6, 8, 1, 200);
    }

    public function Header() {
        
    }

    public function Footer() {
        
    }

}
