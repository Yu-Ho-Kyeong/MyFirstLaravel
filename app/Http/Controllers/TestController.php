<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\test;

class TestController extends Controller
{   

    private $test;
    public function __construct(test $test){
        $this->test = $test;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $tests = $this->test::all(['name','phone','email']);
        return response()->json($tests);    // JSON 형식으로 반환
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $this->validate($request,[
            'name' => 'required',
            'phone' => 'required'
        ]);
 
        $test = $this->test::create($request->post());
        return response()->json([
            'message'=>'test Created Successfully!!',
            'test'=>$test
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(test $test)
    {
        return response()->json($test);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $test = test::findOrFail($id);
        $test->fill($request->post())->save();
        return response()->json([
            'message'=>'test Updated Successfully!!',
            'test'=>$test
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, test $test)
    {
        $test->fill($request->post())->save();
        return response()->json([
            'message'=>'test Updated Successfully!!',
            'test'=>$test
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $test = test::findOrFail($id);
        $test->delete();
        return response()->json([
            'message'=>'test Deleted Successfully!!'
        ]);
    }
}
