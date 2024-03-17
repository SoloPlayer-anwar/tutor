<?php

namespace App\Exports;

use App\Models\regis;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ReportExport implements FromView , ShouldAutoSize
{
    private $tgl_awal;
    private $tgl_akhir;

    public function __construct($tgl_awal , $tgl_akhir)
    {
        $this->tgl_awal = $tgl_awal;
        $this->tgl_akhir = $tgl_akhir;
    }


    public function view(): View
    {
        return view('laporan.cetakExcel', [
            'cetak_excel' => regis::whereBetween('tanggal', [$this->tgl_awal , $this->tgl_akhir])->get()
        ]);
    }

}
