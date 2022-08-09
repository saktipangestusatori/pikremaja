<?php

namespace App\Http\Controllers\Remaja;

use App\Http\Controllers\Controller;
use App\Models\Information;
use App\Models\Pesan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KonselingRemajaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $items = Pesan::where('id_user',Auth::user()->id)->get();
        return view('pages.backend.remaja.konseling.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('pages.backend.remaja.konseling.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
            'topik' => 'required',
            'pesan' => 'required',
            'read' => 'required',
        ]);
        $data=$request->all();
        
         
        Pesan::create($data);
        
        return redirect()->route('konseling.index')->with('status', 'Berhasil Konseling');
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
         $item = Pesan::findOrFail($id);
        return view('pages.backend.remaja.konseling.edit', compact('item'));
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
          $request->validate([
            'topik' => 'required',
            'pesan' => 'required',
          
        ]);
         $data=$request->all();
          Pesan::findOrFail($id)->update($data);
        
        return redirect()->route('konseling.index')->with('status', 'Berhasil Mengubah Konseling');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pesan::findOrFail($id)->delete();
        return redirect()->route('konseling.index')->with('status', 'Berhasil Menghapus konseling');
    }
}
