<?php

namespace App\Http\Controllers;

use App\Brand; 
use Illuminate\Http\Request;

class BrandController extends Controller
{

    public function brandinsert(Request $request)
    {
       $request->validate([
        'brand_name' => 'required',

     ]);
      $brandinsert= Brand::insert([

         'brand_name' => $request->brand_name,

       ]);
     if ($brandinsert) {
                      $notification=array(
                        'messege'=>'Brand Added Successfully',
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

    public function brandview()
    {
        $brands=Brand::all();
        return view('brand.brandview',compact('brands'));
    }

    public function branddelete($brand_id)
    {
        $deletebrand= Brand::find($brand_id)->delete();

        if ($deletebrand) {
          $notification=array(
            'messege'=>'Brand Delete Successfully',
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
    public function editbrand($brand_id)
    {


      $brand=Brand::findOrFail($brand_id);
       return view('brand.brandedit',compact('brand'));
    }
     public function editinsbrand(Request $request)
    {
       $request->validate([
        'brand_name' => 'required',

     ]);
      $brandupdate=Brand::find($request->brand_id)->update([
           'brand_name' => $request->brand_name,

        ]);
       if ($brandupdate) {
                      $notification=array(
                        'messege'=>'Brand Updated Successfully',
                        'alert-type'=>'success'
                         );
                       return Redirect()->to('/list/brand')->with($notification);
                 }else{
                     $notification=array(
                        'messege'=>'Failed!',
                        'alert-type'=>'error'
                         );
                       return Redirect()->back()->with($notification);
                 }

    }






}
