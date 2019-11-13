<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Codedge\Fpdf\Fpdf\Fpdf;
use App\Empresas;

class ImprimirFormularioReg extends Controller {

    //put your code here
    static $Datos = '';

    //put your code here
    public  function formRegister($Id) {
        try {
            $Datos = new Empresas();
            $Datos = Empresas::find($Id);
            self::$Datos = $Datos;
            $pdf = new Fpdf('P', 'mm', 'letter');
            $pdf->AliasNbPages();
            $pdf->AddPage();
            $pdf->SetTitle("Registration-" . $Datos->Identity);
            ImprimirFormularioReg::Body($pdf);
            $pdf->Output("Registration Form" . $Datos->Identity . ".pdf", "D");
        } catch (Exception $e) {
            echo $e;
        }
    }

    public  function Body($pdf) {
        // Cargamos los datos.
        $Row = self::$Datos;
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Text(75, 10, strtoupper('Worker information Questionnaire ID:') . $Row->Id);
        $pdf->Rect(4, 12, 208, 29, '');
        //DATOS LADO DERECHO
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Text(5, 16, 'FULL NAME :');
        $pdf->SetFont('Arial', '', 10);
        $pdf->Text(52, 16, strtoupper($Row->firs_name . " " . $Row->last_name));

        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Text(5, 20, 'HOME ADDRESS:');
        $pdf->SetFont('Arial', '', 10);
        $pdf->Text(52, 20, strtoupper($Row->dir_home));

        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Text(5, 24, 'HOME ADDRESS 2:');
        $pdf->SetFont('Arial', '', 10);
        $pdf->Text(52, 24, strtoupper($Row->dir_home2));

        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Text(5, 28, 'CITY:');
        $pdf->SetFont('Arial', '', 10);
        $pdf->Text(52, 28, strtoupper($Row->city));

        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Text(5, 32, 'STATE:');
        $pdf->SetFont('Arial', '', 10);
        $pdf->Text(52, 32, strtoupper($Row->state));

        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Text(5, 36, 'ZIP CODE:');
        $pdf->SetFont('Arial', '', 10);
        $pdf->Text(52, 36, strtoupper($Row->zip_code));

        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Text(5, 40, 'EMERGENCY CONTACT:');
        $pdf->SetFont('Arial', '', 10);
        $pdf->Text(52, 40, strtoupper($Row->contact_emerg." ".$Row->contact_lastname));

        //DATOS LADO IZQUIERDO
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Text(103, 16, 'S. SECURITY / IDENTIFICATION:');
        $pdf->SetFont('Arial', '', 10);
        $pdf->Text(159, 16, strtoupper($Row->social_security));

        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Text(103, 20, 'EMAIL:');
        $pdf->SetFont('Arial', '', 10);
        $pdf->Text(159, 20, strtoupper($Row->email));

        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Text(103, 24, 'BIRTHDATE:');
        $pdf->SetFont('Arial', '', 10);
        $pdf->Text(159, 24, strtoupper($Row->fh_birth));


        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Text(103, 28, 'MARITAL STATUS:');
        $pdf->SetFont('Arial', '', 10);
        $pdf->Text(159, 28, strtoupper($Row->marital_status));

        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Text(103, 32, 'NUMBER OF DEPENDENTS:');
        $pdf->SetFont('Arial', '', 10);
        $pdf->Text(159, 32, strtoupper($Row->num_dep));

        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Text(103, 36, 'CELL PHONE NUMBER:');
        $pdf->SetFont('Arial', '', 10);
        $pdf->Text(159, 36, strtoupper($Row->tel));

        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Text(103, 40, 'TEL CONTACT EMERGENCY:');
        $pdf->SetFont('Arial', '', 10);
        $pdf->Text(159, 40, strtoupper($Row->phone_emerg));

        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Text(5, 50, 'Skill Certifications - I state that I currently have the following Certifications:');

        $Row = self::$Datos;


        $StringExp = '';
        $StrinAply = '';

        if ($Row->acustical == 1) {
            $StringExp .= '- Acoustical Ceiling Mechanic ';
        }
        if ($Row->layout) {
            $StringExp .= '- Layout / Blueprints ';
        }
        if ($Row->drywall_metal) {
            $StringExp .= '- Drywall Metal Framing Mechanic ';
        }
        if ($Row->drywall_hanger) {
            $StringExp .= '- Drywall Hanger ';
        }
        if ($Row->drywall_finisher) {
            $StringExp .= '- Drywall Finisher ';
        }

        if ($Row->general_lab) {
            $StrinAply .= '- General Laborer / Trabajador general ';
        }
        if ($Row->plastert) {
            $StrinAply .= '- Plaster Tradesman ';
        }
        if ($Row->concrete_form) {
            $StrinAply .= '- Concrete Forming ';
        }
        if ($Row->concrete_finish) {
            $StrinAply .= '- Concrete Finisher ';
        }
        if ($Row->safety_job) {
            $StrinAply .= '- Safety Jobsite ';
        }
        $pdf->SetFont('Arial', '', 10);
        $pdf->Text(5, 55, $StringExp . ".");
        if ($StrinAply != '') {
            $pdf->SetFont('Arial', 'B', 10);
            $pdf->Text(5, 60, "Apply as :");
            $pdf->SetFont('Arial', '', 10);
            $pdf->Text(5, 65, $StrinAply . ".");
        }

        $pdf->SetFont('Arial', '', 11);
        $pdf->Ln();
        $pdf->Text(5, 75, ' Are you legally eligible to work in the United States?');
        $pdf->Text(150, 75, 'YES');
        $pdf->Text(5, 79, ' Are you eligible to work on military bases in USA?');
        $pdf->Text(150, 79, $Row->work_in_militarbase == 1 ? 'YES' : 'NO');
        $pdf->Text(5, 83, ' Have you ever been involved in a lawsuit with any previous employer?');
        $pdf->Text(150, 83, $Row->involucred_demand == 1 ? 'YES' : 'NO');
        $pdf->Text(5, 87, ' Have you ever been involved in a Workers Compensation Claim?');
        $pdf->Text(150, 87, $Row->workers_compensation == 1 ? 'YES' : 'NO');
        $pdf->Text(5, 91, ' Are you willing to travel if there are qualified work positions in another city or state?');
        $pdf->Text(150, 91, $Row->qualified_work_positions == 1 ? 'YES' : 'NO');
        $imagen = Storage::disk('public')->getDriver()->getAdapter()->getPathPrefix()."/clause1.jpg"; //Storage::disk('public')->url('clause1.jpg');
        $pdf->Image($imagen, 5, 93, 210);
        $pdf->AddPage();
        $imagen2 = Storage::disk('public')->getDriver()->getAdapter()->getPathPrefix()."/clause2.jpg"; //Storage::disk('public')->url('clause2.jpg');
        $pdf->Image($imagen2, 5, 5, 210);

        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Text(8, 170, 'This agreement was signed on the date and time :  ' . $Row->fh_register);
        $pdf->SetFont('Arial', 'B', 11);
        $pdf->Text(8, 175, strtoupper($Row->firs_name));
        $pdf->SetFont('Arial', '', 11);
        $pdf->Text(8, 180, ' Printed Name of the Employee / Nombre del Empleado.');
        $imFirma = Storage::disk('firmas')->getDriver()->getAdapter()->getPathPrefix();
        $pdf->Image($imFirma."/".$Row->firma, 8, 190, 60);
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 11);
        $pdf->Text(8, 10, 'Copy Of Document');
        //$imgdoc1 = Storage::disk('images')->url($Row->doc_id1);
        $imgdoc1 = Storage::disk('images')->getDriver()->getAdapter()->getPathPrefix();
        $pdf->Image($imgdoc1."/".$Row->doc_id1, 5, 15, 210);
        $pdf->ln();
        $pdf->Text(8, $pdf->GetY()+100, 'Copy Of Social Security Card');
        //$imgdoc2 = Storage::disk('images')->url($Row->social_security);
        $imgdoc2 = Storage::disk('images')->getDriver()->getAdapter()->getPathPrefix();
        $pdf->Image($imgdoc2."/".$Row->doc_id2, 5, 105, 210);
    }

    function LoadData() {
        $Row = self::$Datos;
        $this->SetFont('Arial', 'B', 12);
        $this->Text(75, 10, strtoupper('Worker information Questionnaire ID:') . $Row->Id);
        $this->Rect(4, 12, 208, 29, '');
        //DATOS LADO DERECHO
        $this->SetFont('Arial', 'B', 10);
        $this->Text(5, 16, 'FULL NAME :');
        $this->SetFont('Arial', '', 10);
        $this->Text(52, 16, strtoupper($Row->firs_name . " " . $Row->last_name));

        $this->SetFont('Arial', 'B', 10);
        $this->Text(5, 20, 'HOME ADDRESS:');
        $this->SetFont('Arial', '', 10);
        $this->Text(52, 20, strtoupper($Row->dir_home));

        $this->SetFont('Arial', 'B', 10);
        $this->Text(5, 24, 'HOME ADDRESS 2:');
        $this->SetFont('Arial', '', 10);
        $this->Text(52, 24, strtoupper($Row->dir_home2));

        $this->SetFont('Arial', 'B', 10);
        $this->Text(5, 28, 'CITY:');
        $this->SetFont('Arial', '', 10);
        $this->Text(52, 28, strtoupper($Row->city));

        $this->SetFont('Arial', 'B', 10);
        $this->Text(5, 32, 'STATE:');
        $this->SetFont('Arial', '', 10);
        $this->Text(52, 32, strtoupper($Row->state));

        $this->SetFont('Arial', 'B', 10);
        $this->Text(5, 36, 'ZIP CODE:');
        $this->SetFont('Arial', '', 10);
        $this->Text(52, 36, strtoupper($Row->zip_code));

        $this->SetFont('Arial', 'B', 10);
        $this->Text(5, 40, 'EMERGENCY CONTACT:');
        $this->SetFont('Arial', '', 10);
        $this->Text(52, 40, strtoupper($Row->contact_emerg));

        //DATOS LADO IZQUIERDO
        $this->SetFont('Arial', 'B', 10);
        $this->Text(103, 16, 'S. SECURITY / IDENTIFICATION:');
        $this->SetFont('Arial', '', 10);
        $this->Text(159, 16, strtoupper($Row->Identity));

        $this->SetFont('Arial', 'B', 10);
        $this->Text(103, 20, 'EMAIL:');
        $this->SetFont('Arial', '', 10);
        $this->Text(159, 20, strtoupper($Row->email));

        $this->SetFont('Arial', 'B', 10);
        $this->Text(103, 24, 'BIRTHDATE:');
        $this->SetFont('Arial', '', 10);
        $this->Text(159, 24, strtoupper($Row->fh_birth));


        $this->SetFont('Arial', 'B', 10);
        $this->Text(103, 28, 'MARITAL STATUS:');
        $this->SetFont('Arial', '', 10);
        $this->Text(159, 28, strtoupper($Row->marital_status));

        $this->SetFont('Arial', 'B', 10);
        $this->Text(103, 32, 'NUMBER OF DEPENDENTS:');
        $this->SetFont('Arial', '', 10);
        $this->Text(159, 32, strtoupper($Row->num_dep));

        $this->SetFont('Arial', 'B', 10);
        $this->Text(103, 36, 'CELL PHONE NUMBER:');
        $this->SetFont('Arial', '', 10);
        $this->Text(159, 36, strtoupper($Row->tel));

        $this->SetFont('Arial', 'B', 10);
        $this->Text(103, 40, 'TEL CONTACT EMERGENCY:');
        $this->SetFont('Arial', '', 10);
        $this->Text(159, 40, strtoupper($Row->phone_emerg));

        $this->SetFont('Arial', 'B', 10);
        $this->Text(5, 50, 'Skill Certifications - I state that I currently have the following Certifications:');

        $Row = self::$Datos;


        $StringExp = '';
        $StrinAply = '';

        if ($Row->acustical == 1) {
            $StringExp .= '- Acoustical Ceiling Mechanic ';
        }
        if ($Row->layout) {
            $StringExp .= '- Layout / Blueprints ';
        }
        if ($Row->drywall_metal) {
            $StringExp .= '- Drywall Metal Framing Mechanic ';
        }
        if ($Row->drywall_hanger) {
            $StringExp .= '- Drywall Hanger ';
        }
        if ($Row->drywall_finisher) {
            $StringExp .= '- Drywall Finisher ';
        }

        if ($Row->general_lab) {
            $StrinAply .= '- General Laborer / Trabajador general ';
        }
        if ($Row->plastert) {
            $StrinAply .= '- Plaster Tradesman ';
        }
        if ($Row->concrete_form) {
            $StrinAply .= '- Concrete Forming ';
        }
        if ($Row->concrete_finish) {
            $StrinAply .= '- Concrete Finisher ';
        }
        if ($Row->safety_job) {
            $StrinAply .= '- Safety Jobsite ';
        }
        $this->SetFont('Arial', '', 10);
        $this->Text(5, 55, $StringExp . ".");
        if ($StrinAply != '') {
            $this->SetFont('Arial', 'B', 10);
            $this->Text(5, 60, "Apply as :");
            $this->SetFont('Arial', '', 10);
            $this->Text(5, 65, $StrinAply . ".");
        }

        $this->SetFont('Arial', '', 11);
        $this->Ln();
        $this->Text(5, 75, ' Are you legally eligible to work in the United States?');
        $this->Text(150, 75, 'YES');
        $this->Text(5, 79, ' Are you eligible to work on military bases in USA?');
        $this->Text(150, 79, $Row->work_in_militarbase == 1 ? 'YES' : 'NO');
        $this->Text(5, 83, ' Have you ever been involved in a lawsuit with any previous employer?');
        $this->Text(150, 83, $Row->involucred_demand == 1 ? 'YES' : 'NO');
        $this->Text(5, 87, ' Have you ever been involved in a Workers Compensation Claim?');
        $this->Text(150, 87, $Row->workers_compensation == 1 ? 'YES' : 'NO');
        $this->Text(5, 91, ' Are you willing to travel if there are qualified work positions in another city or state?');
        $this->Text(150, 91, $Row->qualified_work_positions == 1 ? 'YES' : 'NO');
        $this->Image('./protected/personal/imgpdf/clause1.jpg', 5, 93, 210);
        $this->AddPage();
        $this->Image('./protected/personal/imgpdf/clause2.jpg', 5, 5, 210);

        $this->SetFont('Arial', 'B', 10);
        $this->Text(8, 170, 'This agreement was signed on the date and time :  ' . $Row->fh_register);
        $this->SetFont('Arial', 'B', 11);
        $this->Text(8, 175, strtoupper($Row->firs_name));
        $this->SetFont('Arial', '', 11);
        $this->Text(8, 180, ' Printed Name of the Employee / Nombre del Empleado.');
        $this->Image(self::$Datos->firma, 8, 190, 60);
        $this->AddPage();
        $this->SetFont('Arial', 'B', 11);
        $this->Text(8, 10, 'Copy Of Document');
        $this->Image(self::$Datos->doc_id1, 5, 15, 210);
        $this->Text(8, 100, 'Copy Of Social Security Card');
        $this->Image(self::$Datos->social_security, 5, 105, 210);
    }

    public function Header() {
        
    }

    public function Footer() {
        
    }

}
