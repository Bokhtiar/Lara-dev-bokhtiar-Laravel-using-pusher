@extends('layouts.app')

@section('content')
    <form action="{{ url('blog/store') }}" method="POST" >
      @csrf
    <div class="row justify-content-center">
        
          <div class="col-md-8 col-lg-8">
            <div>
                <label for="">Title</label>
                <input type="title" placeholder="title" name="title" class="form-control">
            </div>
            <div class="">
                <label for="">Body</label>
                <textarea name="body" class="form-control" id="" cols="30" rows="10"></textarea>
            </div>
            <div class="text-center my-2">
              <input type="submit" class="btn btn-primary" value="Submit" name="" id="">
            </div>
        </div>
       
    </div>
  </form>
@endsection