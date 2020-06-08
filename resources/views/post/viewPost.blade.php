@extends('welcome')

@section('content')
<div class="row">
     <div class="col-lg-12 col-md-12 mx-auto">
       <p>
         <a href="{{route('write.post')}}" class="btn btn-danger">Write post</a>
         <a href="{{route('all.post')}}" class="btn btn-info">All Post</a>

       </p>
       <hr>
     </div>
     <div class="col-lg-12">
       <div class="post-title">
         <h2>{{$posts->title}}</h2>
         <hr>
       </div>
       <div class="post-image">
         <img src="{{URL::to($posts->image)}}">
         <p class="{{$posts->slug}}">{{$posts->cat_name}}</p>
       </div>
       <div class="details">
         <p>{{$posts->details}}</p>
       </div>
     </div>

   </div>
@endsection
