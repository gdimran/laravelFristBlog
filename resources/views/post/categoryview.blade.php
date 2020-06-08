@extends('welcome')

@section('content')
<div class="row">
     <div class="col-lg-8 col-md-10 mx-auto">
       <p>
         <a href="{{route('add.category')}}" class="btn btn-danger">Add category</a>
         <a href="{{route('all.category')}}" class="btn btn-info">All category</a>

       </p>
       <hr>

       <div>
          <ol>
              <li>Category Name: {{$cat->cat_name}}</li>
              <li>Category Slug: {{$cat->slug}}</li>
          </ol>

       </div>

     </div>
   </div>
@endsection
