<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Calculation\Statistical\Distributions\F;
use Illuminate\Support\Facades\Log;
use Picqer\Barcode\BarcodeGeneratorPNG;
use SimpleSoftwareIO\QrCode\Generator;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class BarcodeController extends Controller
{
    public function index()
    {
        return view('barcode');
    }
    public function generateBarcode()
    {
                $data['qrcode'] = QrCode::generate('Welcome to Makitweb');

                QrCode::generate('Welcome to Makitweb', public_path('images/qrcode.svg') );
        
                return view('index',$data);
        // $generatorPNG = BarcodeGeneratorPNG();

        // if(request()->has('name') && request()->has('surname')) {
        //     $fullName = request('name').' '.request('surname');
        //     $code = "data:image/png;base64,".base64_encode(Generator::format('png')->generate('Make it'));
            
        //     return response()->json([
        //         "code" => $code,
        //         "status" => 'OK'
        //     ]);
        // } else {
        //     return response()->json([
        //         "status" => 'error'
        //     ]);
        // }
    }
}
