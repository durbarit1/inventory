<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function categoryinsert(Request $request)
    {

     $request->validate([
        'category_name' => 'required',

     ]);
      $catinsert= Category::insert([

         'category_name' => $request->category_name,

       ]);
     if ($catinsert) {
                      $notification=array(
                        'messege'=>'Category Added Successfully',
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function categoryview()
    {
     $categories=Category::all();

        return view('category.categoryview',compact('categories'));
    }


   public function deletecategory($category_id)
   {

     $deletecat= Category::find($category_id)->delete();
    if ($deletecat) {
          $notification=array(
            'messege'=>'Category Delete Successfully',
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

   public function editcategory($category_id)
   {
       $category=Category::findOrFail($category_id);
       return view('category.catedit',compact('category'));



   }
   public function editinsertcategory(Request $request)
   {
       $request->validate([
        'category_name' => 'required',

     ]);
      $catupdated=Category::find($request->category_id)->update([
           'category_name' => $request->category_name,

        ]);
     if ($catupdated) {
                      $notification=array(
                        'messege'=>'Category Updated Successfully',
                        'alert-type'=>'success'
                         );
                       return Redirect()->to('/list/category')->with($notification);
                 }else{
                     $notification=array(
                        'messege'=>'Failed!',
                        'alert-type'=>'error'
                         );
                       return Redirect()->back()->with($notification);
                 }
   }


}
