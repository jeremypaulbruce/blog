@extends('layouts.app')

@section('content')

    <div class="container">

        <p><b>Welcome to Jeremy's Laravel Blog!</b></p>
        <p>Here you will find helpful, informative tips and tricks on topics such as spinning up a Laravel environment using Homestead and Vagrant,
            busting out that first App and whether or not I have any hope at all of getting a job at some awesome Laravel shop.</p>


        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel">
                    <div class="panel-body">

                        @if (count($articles) > 0)

                        <ul class="list-unstyled">

                            @foreach ($articles as $index => $article)

                                @if ($index > 0)
                                    <hr>
                                @endif

                                @include('common.list-articles')

                            @endforeach

                        </ul>

                        @else

                            <hr>

                            <h4>Gee it's looking a little bare!</h4>
                            <p>How about helping us out and adding a few Articles?</p>
                            <div>
                                @if (false === Auth::guest())
                                    <span><a href="{{ url('/admin/article') }}" class="btn btn-primary">Add Article</a></span>
                                @else
                                    <span><a href="{{ url('/login') }}" class="btn btn-default">Login</a></span>
                                    <span><b>&nbsp; OR  &nbsp;</b></span>
                                    <span><a href="{{ url('/register') }}" class="btn btn-default">Register</a></span>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection