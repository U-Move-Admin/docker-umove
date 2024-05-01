<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Investment;
use Session;
use File;
class InvestmentController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:investment-list|investment-create|investment-edit|investment-delete', ['only' => ['index','store']]);
         $this->middleware('permission:investment-create', ['only' => ['create','store']]);
         $this->middleware('permission:investment-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:investment-delete', ['only' => ['destroy']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.investments.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $session_id = Session::getId();
        $dirPath = public_path().'/img/imagetmp/'.$session_id.'/';
        if(is_dir($dirPath))
            File::deleteDirectory($dirPath);
            
        $dirFile = public_path().'/files/filetmp/'.$session_id.'/';
        if(is_dir($dirFile))
            File::deleteDirectory($dirFile);
        
        
        return view('admin.investments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return redirect()->route('investments.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.investments.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.investments.edit');
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
        return redirect()->route('investments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return redirect()->route('investments.index');
    }
}
