<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Information;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Information::all();
        return view('pages.backend.admin.category.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.backend.admin.category.create');
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
            'nama' => 'required',
            'deskripsi' => 'required',
            'foto' => 'required',
        ]);
        $data=$request->all();
        
         if($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileName = 'foto_' . uniqid() . '_' . date("Ymd") . 
            '.'. $file->getClientOriginalExtension();
            $file->move('backend/images/foto/', $fileName);
            $data['foto'] = $fileName;
        }

        Information::create($data);
        
        return redirect()->route('category.index')->with('status', 'Berhasil Menambahkan Informasi Baru');
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
        $item = Information::findOrFail($id);
        return view('pages.backend.admin.category.edit', compact('item'));
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
            'nama' => 'required',
            'deskripsi' => 'required',
            'foto' => 'required',
        ]);
         
        $data=$request->all();
        
         if($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileName = 'foto_' . uniqid() . '_' . date("Ymd") . 
            '.'. $file->getClientOriginalExtension();
            $file->move('backend/images/foto/', $fileName);
            $data['foto'] = $fileName;
        }


        Information::findOrFail($id)->update($data);
        
        return redirect()->route('category.index')->with('status', 'Berhasil Mengubah Informasi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Information::findOrFail($id)->delete();
        return redirect()->route('category.index')->with('status', 'Berhasil Menghapus Informasi');
    }
}
