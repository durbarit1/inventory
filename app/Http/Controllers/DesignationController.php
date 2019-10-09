<?php

namespace App\Http\Controllers;

use App\Designation;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    
    public function deginsert(Request $request)
    {
          $request->validate([
        'deg_name' => 'required',

     ]);
      $deginsert= Designation::insert([

         'deg_name' => $request->deg_name,

       ]);
     if ($deginsert) {
                      $notification=array(
                        'messege'=>'Designation Added Successfully',
                        'alert-type'=>'success'
                         );
                       return Redirect()->back()->with($notification);
                 }else{
                     $notification=array(
                        'messege'=>'Failed!',
                        'alert-type'=>'error'
                         );
                       return Redirect()->back()->with($notification);
                 }
             }

    public function degview()
    {
         $designation=Designation::all();
        return view('designation.degview',compact('designation'));
    }

   
    public function degdelete($deg_id)
    {
          $deletedeg= Designation::find($deg_id)->delete();

        if ($deletedeg) {
          $notification=array(
            'messege'=>'Designation Delete Successfully',
            'alert-type'=>'success'
             );
           return Redirect()->to('/list/designation')->with($notification);
     }else{
         $notification=array(
            'messege'=>'Failed!',
            'alert-type'=>'error'
             );
           return Redirect()->back()->with($notification);
     }
    }

   
    public function degedit($deg_id)
    {
        $degedit=Designation::findOrFail($deg_id);
       return view('designation.degedit',compact('degedit'));
    }

   
    public function degeditins(Request $request)
    {
         $request->validate([
        'deg_name' => 'required',

     ]);
      $degupdate=Designation::find($request->deg_id)->update([
           'deg_name' => $request->deg_name,

        ]);
       if ($degupdate) {
                      $notification=array(
                        'messege'=>'Designation Updated Successfully',
                        'alert-type'=>'success'
                         );
                       return Redirect()->to('/list/designation')->with($notification);
                 }else{
                     $notification=array(
                        'messege'=>'Failed!',
                        'alert-type'=>'error'
                         );
                       return Redirect()->back()->with($notification);
                 }
    }   
    
}
