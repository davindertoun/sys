<?php

namespace App\Http\Controllers;
use App\Models\Student;

use Illuminate\Http\Request;

class TestController extends Controller
{
   // public function index()
   // { 
   // return view('test',compact('abc'));
   // }
   // public function index()
   // {
   // 	return view('test');
   // }
   public function save(Request $request){
   	$request->validate([
            'name'=>'required|alpha|min:2|max:20',
            'email'=>'required|email',
            'mobile_no'=>'required|numeric|digits:10|starts_with:9,8,7,6',
            'department'=>'required',
            'branch'=>'required',
            'url'=>'required|url',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
    $image= time().'.'.$request->file('image')->extension();
    $imagepath=$request->file('image')->move(public_path('img'),$image);
        $data = new Student([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'mobile_no' => $request->get('mobile_no'),
            'department' => $request->get('department'),
            'branch' => $request->get('branch'),
            'url'=>$request->get('url'),
            'image'=>$imagepath,

        ]);
         $data->save();
   	// $input=$request->all();
   	// Student::create($input);
   	return redirect()->back()->with(['success'=>'Form submit Successfully']);
   }

 public function show()
{
    $result = Student::get();
    return view('student_data',compact('result'));
}
public function delete($id){
  $userid =decrypt($id);
  $result = Student::findOrfail($userid);
  $result->delete();
  return redirect('student-data');
}

public function edit($id)
{
  $userid =decrypt($id);
  $data= Student::findOrfail($userid);
  return view('edit',compact('data'));
}
public function update(Request $req)
{
  $req->validate([
            'name'=>'required|alpha|min:2|max:20',
            'email'=>'required|email',
            'mobile_no'=>'required|digits:10|starts_with: 6,7,8,9',
            'department'=>'required',
            'branch'=>'required',
            'url'=>'required|url',
        ]);
  $data = Student::findOrfail($req->id);
  $data->name =$req->name; 
  $data->email =$req->email;
  $data->mobile_no =$req->mobile_no;
  $data->department =$req->department;
  $data->branch =$req->branch;
  $data->url=$req->url;
  $data->save();
  return redirect('student-data');
}
public function view($id)
{
  $userid =decrypt($id);
  $data= Student::findOrfail($userid);
  return view('view',compact('data'));
}
public function userlogin(Request $req)
{
  $data =$req->input('username');
  $req->session()->put('username',$data);
  return redirect('profile');
}
public function student_data(){
  dd('cool');
  return view('student_data');
}
}
// function getData(){
//   return Student::all();
// }
// function search($name){
//   return Student::where("name","like","%".$name."%")->get();
// }
