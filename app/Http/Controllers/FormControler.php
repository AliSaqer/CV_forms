<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class FormControler extends Controller
{
    //form 1 backend
    public function form1() {

        return view('forms.form1');
    }

    public function form1_data(Request $request) {
        $name = $request('name');
        $age = $request('age');
        $email = $request('email');
        return "hello $name your age $age and your email $email";
    }

    //form 2 backend
    public function form2(){
        return view('forms.form2');
    }

    public function form2_data(Request $request){

        $request->validate([
            'name'=>'required|min:4|max:30|string',
            'email'=>'required|email|ends_with:@gmail.com',
            'phone'=>'required',
            'dob'=>'required|date|before:today',
            // 'age'=> 'required|numeric',
            'end'=> 'after:start',
            'gender'=> 'required',
            'education'=> 'required'
        ]);

        $name=$request->name;
        $phone=$request->phone;
        $dob=$request->dob;
        $date = Carbon::parse($dob);
        $yob = $date->year;
        $currentYear = Carbon::now()->year;
        $age=$currentYear-$yob;
        $email=$request->email;
        $start=$request->start;
        $end=$request->end;
        $gender=$request->gender;
        $education=$request->education;

        dd(request()->all());
        return view('forms.form2_data', compact('name' , 'phone' , 'dob' ,'age' ,'email','start','end','yob'));
    }
//form3 backend
public function form3()  {
    return view('forms.form3');
}
//this method is used to upload a file
public function form3data(Request $request){

    // $cv = $request->file('cv');
    //first easy method to giv file random name so we can avoid dublication
    // $fileName=rand().time().$request->file('cv')->getClientOriginalName();

    //method 2
    $ex=$request->file('cv')->getClientOriginalExtension();
    $name = strtolower(str_replace(' ' , '-', $request->name));
    $cvName=$name.'-'.date('y-m-d-h-i').'-cv.'.$ex;


    // we move the file from temp file to public so we can access it
    $request->file('cv')->move(public_path('uploads'),$cvName);
    dd($request->all());


    //method to upload file in files system (storage) put you have to use command
    //command is : php artisan storage:link
    //and this method give you a path to use show the photo and give you arandom name for the file if you dont use file name
//    $path =  $request->file('cv')->store('uploads','public');

//    return view('forms.viewPhoto', compact('path'));
}

public function email() {
    return view('forms.email');
}

public function emaildata(Request $request) {
    $request->validate([
        'name' => 'required|min:2',
        'email' => 'required|email',
        'phone' => 'required',
        'subject' => 'required',
        'message' => 'required'
    ]);

    dump($request->all());
}




}
