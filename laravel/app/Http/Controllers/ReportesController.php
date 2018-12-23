<?php

namespace App\Http\Controllers;

use \App\Models\Reservaciones;
use Illuminate\Http\Request;
use App\Http\Requests;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class ReportesController extends Controller
{
    public function index()
    {
      return view('reportes.index');
    }

    public function crearRepor($res, $fecha)
    {
      $datos = Reservaciones::reportes($res, $fecha);
      $reportes = [];

       foreach ($datos as $key => $value) 
       {
         $obj = new \stdClass();
         $obj->reserva = $value->Id;
         $obj->hora = $value->Hora;
         $obj->fecha = $value->Fecha;
         $obj->id = $value->Numero;
         $obj->capacidad = $value->Capacidad;
         $obj->cuarto = $value->Cuarto;
         $obj->folio = $value->Folio;
         $obj->nombre = $value->Nombre;
         $obj->notas = $value->Comentarios;
         $obj->operador = $value->NombreOpe;
         $obj->fechareserva = $value->FechaReserva;

         array_push($reportes, $obj);
       }

       $salida = array('data' => $reportes);

       return json_encode($salida);
    }

    public function crearExcel($res, $fecha)
    {
      $spreadsheet = new Spreadsheet();
      $sheet = $spreadsheet->getActiveSheet();

      $sheet->getStyle("A:J")->getFont()->setName('Arial');
      $sheet->getStyle("A:J")->getFont()->setSize(10); 

      $styleArray = [
        'font' => [
            'bold' => true,
        ],
        'alignment' => [
            'horizontal' => Alignment::HORIZONTAL_CENTER,
        ],
        'borders' => [
            'allBorders' => [
                'borderStyle' => Border::BORDER_THIN,
            ],
        ],
        'fill' => [
            'fillType' => Fill::FILL_SOLID,
            'startColor' => [
                'argb' => 'FFFFFF00',
            ],
        ],
    ];

    $sheet->getStyle('A1:J1')->applyFromArray($styleArray);

      $sheet->getColumnDimension('A')->setWidth(15);
      $sheet->getColumnDimension('B')->setWidth(15);
      $sheet->getColumnDimension('C')->setWidth(15);
      $sheet->getColumnDimension('D')->setWidth(15);
      $sheet->getColumnDimension('E')->setWidth(15);
      $sheet->getColumnDimension('F')->setWidth(15);
      $sheet->getColumnDimension('G')->setWidth(15);
      $sheet->getColumnDimension('H')->setWidth(35);
      $sheet->getColumnDimension('I')->setWidth(60);
      $sheet->getColumnDimension('J')->setWidth(35);
      
      $sheet->setCellValue('A1', 'Confirmacion');
      $sheet->setCellValue('B1', 'Hora');
      $sheet->setCellValue('C1', 'Fecha');
      $sheet->setCellValue('D1', 'Mesa');
      $sheet->setCellValue('E1', 'Capacidad');
      $sheet->setCellValue('F1', 'Habitacion');
      $sheet->setCellValue('G1', '# Folio');
      $sheet->setCellValue('H1', 'Nombre');
      $sheet->setCellValue('I1', 'Notas');
      $sheet->setCellValue('J1', 'Operador');

      $datos = Reservaciones::reportes($res, $fecha);
      $i = 2;

      foreach ($datos as $value)
      {
        $sheet->setCellValue('A'.$i, $value->Id);
        $sheet->setCellValue('B'.$i, $value->Hora);
        $sheet->setCellValue('C'.$i, $value->Fecha);
        $sheet->getCell('D'.$i)->setValueExplicit($value->Numero, DataType::TYPE_STRING);
        $sheet->setCellValue('E'.$i, $value->Capacidad);
        $sheet->setCellValue('F'.$i, $value->Cuarto);
        $sheet->getCell('G'.$i)->setValueExplicit($value->Folio, DataType::TYPE_STRING);
        $sheet->setCellValue('H'.$i, $value->Nombre);
        $sheet->setCellValue('I'.$i, $value->Comentarios);
        $sheet->setCellValue('J'.$i, $value->NombreOpe);
        $i++;
      }

      $sheet->getStyle("A$i:J$i")->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('C0C0C0C0');
      
      $sheet->getStyle('A'.$i)->getFont()->setBold(true);
      $sheet->setCellValue('A'.$i, 'Total: ' . ($i - 2));
      $sheet->setTitle('Hoja1');

      $writer = new Xlsx($spreadsheet);
      header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
      header('Content-Disposition: attachment;filename="Reporte.xlsx"');
      header('Cache-Control: max-age=0');

      $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
      $writer->save('php://output');
    }
}
