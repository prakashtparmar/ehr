<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use PDF;

class PDFController extends Controller
{
    public function generatePDF($id, $template = 'mypdf')
    {
        $product = Product::findOrFail($id);

        // Check if template exists
        if (!view()->exists("products.$template")) {
            abort(404, 'PDF template not found.');
        }

        $pdf = PDF::loadView("products.$template", compact('product'))
                  ->setPaper('a4');

        $fileName = 'Employee-Health-Record-' . $product->EmployeeName . '.pdf';

        return $pdf->stream($fileName, ['Attachment' => false]);
    }
}
