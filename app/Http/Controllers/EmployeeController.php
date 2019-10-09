<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Designation;
// use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
// use Intervention\Image\Facades\Image;
use DB;
use Image;
use File;

class EmployeeController extends Controller
{
    public function empadd()
    {
        $desg =Designation::all();
        return view('employee.addemp',compact('desg'));
       
    }
    public function empinsert(Request $request)
    {
    


    $request->validate([
        'emp_name' => 'required',
        'presentaddress' => 'required',
        'permanentaddress' => 'required',
        // 'image' => 'required|mimes:jpeg,png,jpg,bmp',
        'phone' => 'required|numeric',
        'email' => 'required|email',
        'nid' => 'required|numeric',
        'deg_id' => 'required',
        'age' => 'required',
        'salary' => 'required',
        'education' => 'required',
        'marital_status' => 'required', 
         ]); 


//       $img = $request->file('image');
//       if(isset($img)){
// //                  
//             $imagename = uniqid().'.'.$img->getClientOriginalExtension();
//            //check directory
//             if(!Storage::disk('public')->exists('photo')){
//                 Storage::disk('public')->makeDirectory('photo');
//             }
// //            resize
//             $resizeimage = Image::make($img)->resize(200,200)->save($imagename);
//             Storage::disk('public')->put('photo/'.$imagename,$resizeimage);
//         }
//         else{
//             $imagename = 'default.png';
//         }

         $empinsert= Employee::insertGetId([
         'emp_name' => $request->emp_name,
         'presentaddress' => $request->presentaddress,
         'permanentaddress' => $request->permanentaddress,
         'image' =>$request->image,
         'phone' => $request->phone,
         'email' => $request->email,
         'nid' => $request->nid,
         'deg_id' => $request->deg_id,                
         'age' => $request->age,
         'salary' => $request->salary,
         'education' => $request->education,
         'marital_status' => $request->marital_status,
         'per_day' => $request->per_day ,

       ]);
            if($request->hasFile('image')) 
            {
            $photo=$request->image; 
            $filename=$empinsert.".".$photo->getClientOriginalExtension();
            Image::make($photo)->resize(200, 200)->save(base_path('public/images/employee/'.$filename));
            
             Employee::find($empinsert)->update([
                'image'=> $filename
              ]);
             }
            

        if ($empinsert) {
          $notification=array(
            'messege'=>'Employee Delete Successfully',
            'alert-type'=>'success'
             );
           return Redirect()->to('/list/employee')->with($notification);
         }
       else{
          $notification=array(
             'messege'=>'Failed!',
             'alert-type'=>'error'
             );
            return Redirect()->back()->with($notification);
            }
              
            




   
    }


    public function empview()
    {
         $employee=DB::table('employees')->join('designations','employees.deg_id','designations.id')->select('employees.*','designations.deg_name')->get();
        return view('employee.empview',compact('employee'));

    }

    public function empdelete($emp_id)
    {
         
         $deleteemp= Employee::find($emp_id)->delete();

        if ($deleteemp) {
          $notification=array(
            'messege'=>'Employee Delete Successfully',
            'alert-type'=>'success'
             );
           return Redirect()->to('/list/employee')->with($notification);
     }else{
         $notification=array(
            'messege'=>'Failed!',
            'alert-type'=>'error'
             );
           return Redirect()->back()->with($notification);
     }
    }

    public function empedit($emp_id)
    {
        
    }

}
