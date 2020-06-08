@extends('welcome')

@section('content')
<div class="row">
     <div class="col-lg-8 col-md-10 mx-auto">
       <p>

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
       <form action="{{route('store.post')}}" method="post" enctype="multipart/form-data">
         @csrf
         <div class="control-group">
           <div class="form-group floating-label-form-group controls">
             <label>Post Title</label>
             <input type="text" class="form-control" placeholder="Post Title" name="title"  id="title" required >
           </div>
         </div>
         <div class="form-group">
           <label for="category">Category</label>
           <select class="form-control" id="category" name="cat_id">
             @foreach($category as $row)
             <option value="{{$row->id}}">{{$row->cat_name}}</option>
             @endforeach
           </select>
         </div>

         <div class="control-group">
           <div class="form-group col-xs-12 floating-label-form-group controls">
             <label>Post Image</label>
             <input type="file" class="form-control" placeholder="Image" name="image" id="image" required">
           </div>
         </div>
         <div class="control-group">
           <div class="form-group floating-label-form-group controls">
             <label>Post details</label>
             <textarea rows="5" class="form-control" placeholder="Post details" name="details" id="details" required ></textarea>
             <p class="help-block text-danger"></p>
           </div>
         </div>
         <br>
         <div id="success"></div>
         <div class="form-group">
           <button type="submit" class="btn btn-primary" id="sendMessageButton">Publish</button>
         </div>
       </form>
     </div>
   </div>
@endsection
