<?php

namespace App\Http\Controllers;

use App\Exports\ReportExport;
use App\Models\regis;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filterKeywords = $request->get('keyword');
        $data['currentPage'] = 'user.index';

        $query = regis::query();

        if($filterKeywords) {
            $query->where('nama', 'like', '%' . $filterKeywords . '%');
        }

        $data['user'] = $query->latest()->paginate(10);
        return view('user.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['pendaftar'] = regis::findOrFail($id);
        return view('user.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['pendaftar'] = regis::findOrFail($id);
        return view('user.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = regis::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'nama' => 'sometimes|string|max:255',
            'alamat' => 'sometimes',
            'pendidikan' => 'sometimes|string|max:255',
            'umur' => 'sometimes|string|max:255',
            'pekerjaan' => 'sometimes|string|max:255',
            'phone' => 'sometimes|string|max:255',
            'tanggal' => 'sometimes|string|max:255',
            'photo' => 'sometimes|mimes:png,jpg|max:2048',
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $existingData = regis::where('phone', $request->phone)->where('id', '!=' , $id)->first();

        if($existingData) {
            return redirect()->back()->with('failed' , 'No Handphone ini milik orang lain');
        }

        $input = $request->all();

        if($request->hasFile('photo')) {

            if($request->file('photo')->isValid()) {
                Storage::disk('upload')->delete($data->photo);
                $photo = $request->file('photo');
                $extensions = $photo->getClientOriginalExtension();
                $photoUpload = "photo/".date('YmdHis').".".$extensions;
                $photoPath = env('UPLOAD_PATH'). "/photo";
                $request->file('photo')->move($photoPath , $photoUpload);
                $input['photo'] = $photoUpload;
            }
        }

        $data->update($input);
        return redirect()->route('user.index')->with('status', 'Data Pendaftar Berhasil di edit');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = regis::findOrFail($id);
        $input = Storage::disk('upload')->delete($data->photo);
        $data->delete($input);
        return redirect()->back()->with('status', 'Data Berhasil di delete');
    }

    public function btnLaporan()
    {
        return view('laporan.index');
    }

    public function cetakPdf($tgl_awal , $tgl_akhir)
    {

        $cetakPdf = regis::whereBetween('tanggal', [$tgl_awal, $tgl_akhir])->get();
        $pdf = Pdf::loadView('laporan.cetakLaporan' , compact('cetakPdf'));
        $pdf->setPaper('f4');
        return $pdf->stream();
    }


    public function cetak_excel($tgl_awal , $tgl_akhir)
    {
        $cetak_excel['cetak_excel'] = regis::whereBetween('tanggal', [$tgl_awal , $tgl_akhir])->get();
        return Excel::download(new ReportExport($tgl_awal , $tgl_akhir), 'laporan.xlsx');
    }
}
