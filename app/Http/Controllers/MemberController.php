<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\User;
use Illuminate\Http\UploadedFile;

class MemberController extends Controller
{
    public function insert(Request $req){
      
  
        // $req->validate([
        //     'name'=>'required|max:10',
        //     'email'=>'required|email',
        //     'dob'=>'required',
        //     'department'=>'required',
        //     'branch'=>'required',
        //     'url'=>'required|url',
        //     'skype'=>'required'

        //     ]);
//dd($_FILES);
         $imageName = time().'.'.$req->file('pro_img')->extension();  
         //dd($imageName);
        $imagepath= $req->file('pro_img')->move(public_path('css'), $imageName);

        //      $image = $req->file('pro_img');
        //  $imagename= time().'.'.$image->Extension();
         //$image->move(public_path('css'),$imagename);
 
        $data = new User([
            'role_id'=>$req->get('role_id'),
            'name'=> $req->get('name'),
            'email'=>$req->get('email'),
            'password'=>'123456789',
            'dob'=>$req->get('dob'),
            'department'=>$req->get('department'),
            'profile_img'=>$imageName,
            'url'=>$req->get('url'),
            'skill'=>$req->get('skill'),
            'location'=>$req->get('location'),
         ]);
         $data->save();
         return redirect('/admin/add-user')->with('success','user added successfully');
        
    }

    public function show(){
        $result = User::get();
        return view('backend/user/manage_user', compact('result'));
        
    }

    public function userProfile($id)
    {
        
        $userId=decrypt($id);
        $data = User::findOrfail($userId);
        return view('backend/user/user_profile',compact('data'));
    }

    public function deleteProfile($id)
    {
        $userId=decrypt($id);
            $result = User::findOrfail($userId);
            $result->delete();
            return redirect('admin/manage-user');
    }
    
    public function edituser($id){

        $userId=decrypt($id);
            $data = User::findOrfail($userId);
            return view('backend/user/edituser',compact('data'));

    }

    public function updateUser(Request $request){
        $data = User::find($request->id);
    //     $imageName = time().'.'.$request->file('pro_img')->extension();  
    //    $imagepath= $request->file('pro_img')->move(public_path('css'), $imageName);
       
        $data->name = $request->name;
        $data->email = $request->email;
        $data->department = $request->department;

        $data->profile_img = $imageName;

        $data->save();
        return redirect('admin/manage-user');

    }

    public function test(Request $request){
        dd($request);
    }
    
}
