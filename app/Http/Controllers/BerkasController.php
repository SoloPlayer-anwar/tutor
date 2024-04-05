<?php

namespace App\Http\Controllers;

use App\Models\Berkas;
use App\Models\Izin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BerkasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filterKeyword = $request->get('keyword');
        $filterSurvey = $request->get('survey');

        $query = Berkas::with(['izin' , 'optiondinas' , 'optiondinas.user']);

        if ($filterKeyword) {
            $query->where("nik_bm", "LIKE", "%$filterKeyword%");
        }

        if ($filterSurvey) {
            $query->where("survey", $filterSurvey);
        }

        $berkas['berkas'] = $query->paginate(10);
        // dd($berkas['berkas']->toArray());

        return view('berkas.index', $berkas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $izin = Izin::all();
        return view('berkas.create', compact('izin'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'nik_bm' => 'required|string|max:255',
            'tgl_masuk' => 'required|string|max:255',
            'tgl_akhir' => 'required|string|max:255',
            'nama_bm' => 'required|string|max:255',
            'izin_id' => 'sometimes|exists:izins,id',
            'nama_usaha' => 'required|string|max:255',
            'alamat_usaha' => 'required',
            'telpon' => 'required|string|max:255',
            'survey' => 'required',

        ]);

        if($validate->failed())
        {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        $input = $request->all();
        Berkas::create($input);
        return redirect()->route('berkas.index')->with('status', 'Data Product Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $berkas['berkas'] = Berkas::with(['izin' , 'optiondinas', 'optiondinas.user'])->findOrFail($id);
        return view('berkas.show', $berkas);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
