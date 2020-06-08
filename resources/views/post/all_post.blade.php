@extends('welcome')

@section('content')
<div class="row">
     <div class="col-lg-12 col-md-112 mx-auto">
       <p>
         <a href="{{route('write.post')}}" class="btn btn-danger">Write post</a>
       </p>
       <hr>

       <table class="table table-responsive">
          <tr>
            <th>Sl</th>
            <th>Category</th>
            <th>Title</th>
            <th>Image</th>
            <th>Action</th>
          </tr>
          @foreach($posts as $post)

          <tr>
            <td>{{$post->id}}</td>
            <td class="{{$post->slug}}">{{$post->cat_name}}</td>
            <td>{{$post->title}}</td>
            <td><img src="{{URL::to($post->image)}}" style="width:150px; height:auto"></td>
            <td>
                <a href="{{URL::to('edit/post/'.$post->id)}}" class="btn btn-sm btn-info">Edit</a>
                <a href="{{URL::to('view/post/'.$post->id)}}" class="btn btn-sm btn-success">view</a>
                <a href="{{URL::to('delete/post/'.$post->id)}}" id="delete" class="btn btn-sm btn-danger">Delete</a>
            </td>
          </tr>
          @endforeach
       </table>


     </div>
   </div>
@endsection
