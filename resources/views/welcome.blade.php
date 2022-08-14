@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ url('blog/create') }}">Blog Create</a>
        <a href="{{ url('todo/create') }}">todo</a>
        <div class="row">
            <div class="col-md-8">
                <h2>Todo list</h2>
                <todo></todo>
            </div>
        </div>


        <div class="row">
            <div class="col-md-8">
                <h2>Blog list</h2>
                <blog></blog>
            </div>
        </div>

        <br><br><br>
        
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h2>Register user Rank</h2>
                <leaderboard :current="{{ auth()->user() ? auth()->user()->id : 0 }}"></leaderboard>
            </div>
        </div>
    </div>
@endsection
{{-- window.Echo.private('chat')
  .listen('MessageSent', (e) => {
    this.messages.push({
      message: e.message.message,
      user: e.user
    });
  }); --}}