<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{  
    public function generatePDF()
    {
        $data = [
            'title' => __('API description') ,
            'date' => date('m/d/Y')
        ];
          
        $pdf = PDF::loadView('myPDF', $data);
    
        return $pdf->download(__('API description').'.pdf');
       // return view('myPDF');
    }
}
