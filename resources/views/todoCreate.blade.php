@extends('layouts.app')
@section('content')


    <form action="{{ url('todo/store') }}" method="POST">
        @csrf
        <div>
            <label for="">title</label>
            <input type="text" class="form-control" name="title" id="">
        </div>
        <input type="submit" class="btn btn-success" name="" id="">
    </form>


@endsection