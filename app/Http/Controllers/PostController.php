<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
  public function writePost(){
    $category=DB::table('categories')->get();
    return view('post.writePost',compact('category'));
  }
  public function storePost(Request $request){
    $validateData=$request->validate(
      [
        'title'=>'required|max:250',
        'details'=>'required',
        'image' => 'required | mimes:jpeg,jpg,png,PNG | max:1000',
      ]
    );

    $data=array();
    $data['title']=$request->title;
    $data['cat_id']=$request->cat_id;
    $data['details']=$request->details;
    $image=$request->file('image');
    if($image){
      $image_name=Str::random(5);
      $ext=strtolower($image->getClientOriginalExtension());
      $image_full_name=$image_name.'.'.$ext;
      $upload_path='public/frontend/postimage/';
      $image_url=$upload_path.$image_full_name;
      $success=$image->move($upload_path,$image_full_name);
      $data['image']=$image_url;
      DB::table('posts')->insert($data);
      $notification=array(
        'message'=>'Successfully Post Inserted',
        'alert-type'=>'success'
      );
      return Redirect()->route('all.post')->with($notification);
    }else{
      DB::table('posts')->insert($data);
      $notification=array(
        'message'=>'Successfully Post Inserted',
        'alert-type'=>'success'
      );
      return Redirect()->route('all.post')->with($notification);
    }
  }
  public function AllPost(){
    //$posts=DB::table('posts')->get();
    $posts=DB::table('posts')
    ->join('categories','posts.cat_id','categories.id')
    ->select('posts.*', 'categories.cat_name', 'categories.slug')
    ->get();
    return view('post.all_post',compact('posts'));
  }
  public function ViewPost($id){
    $posts=DB::table('posts')
    ->join('categories','posts.cat_id','categories.id')
    ->select('posts.*', 'categories.cat_name', 'categories.slug')
    ->where('posts.id',$id)
    ->first();
    return view('post.viewPost',compact('posts'));

  }
  public function DeletePost($id){
    $post=DB::table('posts')->where('id',$id)->first();
    $image=$post->image;
    $delete=DB::table('posts')->where('id',$id)->delete();
    if($delete){
        unlink($image);
        $notification=array(
          'message'=>'Successfully Post Deleted',
          'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }else
    {
      $notification=array(
        'message'=>'Successfully Post Inserted',
        'alert-type'=>'success'
      );
      return Redirect()->back()->with($notification);
    }
  }
  public function EditPost($id)
  {
    $category=DB::table('categories')->get();
    $post=DB::table('posts')->where('id',$id)->first();
    return view('post.editpost',compact('category','post'));
  }

  public function UpdatePost(Request $request, $id)
  {
    $validateData=$request->validate(
      [
        'title'=>'required|max:250',
        'details'=>'required',
        'image' => 'mimes:jpeg,jpg,png,PNG | max:1000',
      ]
    );

    $data=array();
    $data['title']=$request->title;
    $data['cat_id']=$request->cat_id;
    $data['details']=$request->details;
    $image=$request->file('image');
    if($image){
      $image_name=Str::random(5);
      $ext=strtolower($image->getClientOriginalExtension());
      $image_full_name=$image_name.'.'.$ext;
      $upload_path='public/frontend/postimage/';
      $image_url=$upload_path.$image_full_name;
      $success=$image->move($upload_path,$image_full_name);
      $data['image']=$image_url;
      unlink($request->old_image);
      DB::table('posts')->where('id',$id)->update($data);
      $notification=array(
        'message'=>'Successfully Post Updated',
        'alert-type'=>'success'
      );
      return Redirect()->route('all.post')->with($notification);
    }else{
      $data['image']=$request->old_image;
      DB::table('posts')->where('id',$id)->update($data);
      $notification=array(
        'message'=>'Successfully Post Updated',
        'alert-type'=>'success'
      );
      return Redirect()->route('all.post')->with($notification);
    }
  }




}
