<?php

namespace App\Http\Controllers;

use App\Models\Berkas;
use App\Models\OptionDinas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PhpOption\Option;

class OptionDinasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $berkas_id = $request->input('berkas_id');
        $user = User::with(['dinas'])->get();
        return view('optiondinas.create', compact('berkas_id' , 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'berkas_id' => 'required|exists:berkas,id',
            'user_id' => 'required|exists:users,id',
            'keterangan_dinas' => 'sometimes'
        ]);


        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $input = $request->all();
        OptionDinas::create($input);
        $berkas_id = $request->berkas_id;
        $berkas = Berkas::findOrFail($berkas_id);

        return redirect()->route('berkas.show', [$berkas->id])->with('status', 'Dinas Bersangkutan Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $optiondinas['optiondinas'] = OptionDinas::with(['berkas' , 'user'])->findOrFail($id);
        $optiondinas['user'] = User::all();
        return view('optiondinas.edit', $optiondinas);
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
        $optiondinas = OptionDinas::with(['berkas', 'user'])->findOrFail($id);
        $berkas_id = $optiondinas->berkas_id;
        $validator = Validator::make($request->all(), [
            'berkas_id' => 'sometimes|exists:berkas,id',
            'user_id' => 'sometimes|exists:users,id',
            'keterangan_dinas' => 'sometimes'
        ]);


        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $input = $request->all();
        $optiondinas->update($input);

        return redirect()->route('berkas.show', $berkas_id)->with('status', 'Dinas Bersangkutan Berhasil edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $optiondinas = OptionDinas::findOrFail($id);
        $optiondinas->delete();
        return redirect()->back()->with('status', 'Data Dinas Bersangkutan Berhasil delete');
    }
}
