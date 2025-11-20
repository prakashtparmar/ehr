<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use PDF;

class PDFController extends Controller
{
    public function generatePDF($id)
    {
        $product = Product::findOrFail($id);

        // Load Blade file
        $pdf = PDF::loadView('products.myPDF', compact('product'))
                  ->setPaper('a4');

        $fileName = 'Employee-Health-Record-' . $product->EmployeeName . '.pdf';

        // OPEN IN NEW TAB + Browser shows Save button
        return $pdf->stream($fileName, ['Attachment' => false]);
    }
}
