@extends('welcome')
@section('content')
<div class="row">
  <div class="col-lg-12 col-md-12 mx-auto">

    @foreach ($post as $row)
    <div class="post-preview">
      <a href="{{URL::to('view/post/'.$row->id)}}">
        <img src="{{URL::to($row->image)}}" style="width:600px; height:auto">
        <h2 class="post-title">
          {{$row->title}}
        </h2>
      </a>
      <p class="post-meta"><span class="post category {{$row->slug}}">{{$row->cat_name}}</span>

        {{$row->created_at}}</p>
    </div>
    <hr>
     @endforeach

  
    <!-- Pager -->
    <div class="clearfix">
      <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
    </div>

  </div>
</div>
@endsection
