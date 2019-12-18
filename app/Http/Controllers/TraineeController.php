<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trainee;

class TraineeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */




     public function login()
     {
        $trainees = Trainee::all();
         return view ('trainees.login');
     
     }
     public function loginSubmit(Request $request){
         $inputs = $request->all();
         if(isset($inputs) && is_array($inputs)){
             $username = $inputs['username'];
             $password = $inputs['password'];

             //SERVER SIDE VALIDATION - START
             if(isset($username) && !empty($username) && isset($password) && !empty($password)){
                 $trainees = Trainee::where("username",$username)->where("password",$password)->first();
                 if(isset($trainees) && !empty($trainees)){
                     print "Welcome to Sport Center Websit".$trainees->firstname;
                 }else{ print "ERROR: wrong data!"; }
             }else{
                 print "ERROR: wrong date!";}
             }
             //SERVER SIDE VALIDATION - END

         }

    
     



    public function index()
    {
        $trainees = Trainee::paginate(25);
        return view('trainees.index', ['trainees' => $trainees]);

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $trainees = Trainee::findOrFail($id);
        return view('trainees.show', ['trainees' => $trainees]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        Trainee::find($id)->delete();
        return back();
    }
}
