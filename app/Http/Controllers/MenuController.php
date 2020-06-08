<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class MenuController extends Controller
{
  public function index()
  {
    $post=DB::table('posts')->join('categories', 'posts.cat_id','categories.id')
    ->select('posts.*', 'categories.cat_name', 'categories.slug')
    ->get();
    return view('pages.index', compact('post'));
  }
    public function about(){
      return view('pages.about');
    }

    public function contact(){
      return view('pages.contact');
    }
    public function blog(){
      return view('pages.blog');
    }
    public function AddCategory(){
      return view('post.add_category');
    }
    public function StoreCategory(Request $request){
      $validateData=$request->validate(
        [
          'cat_name'=>'required|unique:categories|max:25|min:3',
          'slug'=>'required|unique:categories|max:25|min:3',
        ]
      );
      $data=array();
      $data['cat_name']=$request->cat_name;
      $data['slug']=$request->slug;
      $category=DB::table('categories')->insert($data);

      if($category){
        $notification=array(
          'message'=>'Successfully Category Inserted',
          'alert-type'=>'success'
        );
        return Redirect()->route('all.category')->with($notification);
      }else {
        $notification=array(
          'message'=>'something Went worng',
          'alert-type'=>'error'
        );
        return Redirect()->back()->with($notification);
      }
    }

    public function AllCategory()
    {
      $category=DB::table('categories')->get();
      return view('post.all_category',compact('category'));
    }

    public function ViewCategory($id){
      $category=DB::table('categories')->where('id',$id)->first();
      return view('post.categoryview')->with('cat',$category);
    }
    public function DeleteCategory($id){
      $delete=DB::table('categories')->where('id',$id)->delete();
      $notification=array(
        'message'=>'Successfully Category Deleted',
        'alert-type'=>'success'
      );
      return Redirect()->back()->with($notification);
    }
    public function EditCategory($id)
    {
      $category=DB::table('categories')->where('id',$id)->first();
      return view('post.editcategory',compact('category'));
    }

    public function UpdateCategory(Request $request, $id)
    {
      $validateData=$request->validate(
        [
          'cat_name'=>'required|max:25|min:3',
          'slug'=>'required|max:25|min:3',
        ]
      );
      $data=array();
      $data['cat_name']=$request->cat_name;
      $data['slug']=$request->slug;
      $category=DB::table('categories')->where('id',$id)->update($data);

      if($category){
        $notification=array(
          'message'=>'Successfully Category Updated',
          'alert-type'=>'success'
        );
        return Redirect()->route('all.category')->with($notification);
      }else {
        $notification=array(
          'message'=>'something Went worng',
          'alert-type'=>'error'
        );
        return Redirect()->back()->with($notification);
      }
    }

}
