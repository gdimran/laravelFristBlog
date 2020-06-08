@extends('welcome')

@section('content')
<div class="row">
     <div class="col-lg-8 col-md-10 mx-auto">
       <p>
         <a href="{{route('all.category')}}" class="btn btn-info">All category</a>

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
       <form action="{{route('store.category')}}" method="post">
         @csrf
         <div class="control-group">
           <div class="form-group floating-label-form-group controls">
             <label>Category Name</label>
             <input type="text" class="form-control" placeholder="Category Name" name="cat_name"  id="category_name"  data-validation-required-message="Please enter your post title.">
           </div>
         </div>

         <div class="control-group">
           <div class="form-group floating-label-form-group controls">
             <label>Slug name</label>
             <input type="text" class="form-control" placeholder="Slug name" name="slug"  id="slug_name"  data-validation-required-message="Please enter your post title.">
           </div>
         </div>
         <br>
         <div id="success"></div>
         <div class="form-group">
           <button type="submit" class="btn btn-primary" id="sendMessageButton">Add</button>
         </div>
       </form>
     </div>
   </div>
@endsection
