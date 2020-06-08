@extends('welcome')

@section('content')
<div class="row">
     <div class="col-lg-8 col-md-10 mx-auto">
       <p>
         <a href="{{route('add.category')}}" class="btn btn-danger">Add category</a>
         <a href="{{route('all.category')}}" class="btn btn-info">All category</a>
         <a href="{{route('all.post')}}" class="btn btn-info">All post</a>

       </p>
       <hr>
       @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
       <form action="{{url('update/post/'.$post->id)}}" method="post" enctype="multipart/form-data">
         @csrf
         <div class="control-group">
           <div class="form-group floating-label-form-group controls">
             <label>Post Title</label>
             <input type="text" class="form-control" placeholder="Post Title" name="title" value="{{$post->title}}"  id="title">
           </div>
         </div>
         <div class="form-group">
           <label for="category">Category</label>
           <select class="form-control" id="category" name="cat_id">
             @foreach($category as $row)
             <option value="{{$row->id}}" <?php if($row->id==$post->cat_id) echo "selected"; ?> >{{$row->cat_name}}</option>
             @endforeach
           </select>
         </div>

         <div class="control-group">
           <div class="form-group col-xs-12 floating-label-form-group controls">
             <label for="image">New Image</label>
             <input type="file" class="form-control" placeholder="Image" name="image" id="image">
              Current image:  <img src="{{URL::to($post->image)}}" style="height:50px; width:100px float:right">
              <input type="hidden" name="old_image" value="{{$post->image}}">
           </div>
         </div>
         <div class="control-group">
           <div class="form-group floating-label-form-group controls">
             <label>Post details</label>
             <textarea rows="5" class="form-control" placeholder="Post details" name="details" id="details" required >
              {{$post->details}}
             </textarea>
             <p class="help-block text-danger"></p>
           </div>
         </div>
         <br>
         <div id="success"></div>
         <div class="form-group">
           <button type="submit" class="btn btn-primary" id="sendMessageButton">Update</button>
         </div>
       </form>
     </div>
   </div>
@endsection
