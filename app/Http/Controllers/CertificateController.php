<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Certificate;

class CertificateController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function verify(Request $request)
    {
        $request->validate([
            'code_1'     => 'required|string',
            'code_2'     => 'required|string',
            'name'       => 'required|string',
            'birth_date' => 'required|date',
        ]);

        $code = trim($request->code_1) . '-' . trim($request->code_2);
        $name = trim($request->name);

        $certificate = Certificate::where('certificate_code', $code)
            ->whereRaw('LOWER(name) = ?', [strtolower($name)])
            ->where('birth_date', $request->birth_date)
            ->first();

        return view('result', compact('certificate'));
    }
}