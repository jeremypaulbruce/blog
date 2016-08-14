@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Notices</div>
                <div class="panel-body">
                    Welcome back {{ Auth::user()->name }}!
                </div>
            </div>
        </div>
    </div>

    {{--ARTICLES--}}
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Articles
                    <div class="nav navbar navbar-right">
                        <a class="btn btn-sm" href="/admin/article">
                            <i class="fa fa-plus"></i>
                            Add Article
                        </a>
                    </div>
                </div>
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

                        <div class="text-center">
                            No Articles at the moment. Get Publishing!
                        </div>
                        <hr>
                        <div class="text-center">
                            <a class="btn btn-default" href="/admin/article">
                                <i class="fa fa-plus"></i>
                                Add Article
                            </a>
                        </div>

                    @endif
                </div>
            </div>
        </div>
    </div>

    {{--USERS--}}
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Users
                    <div class="nav navbar navbar-right">
                        <a class="btn btn-sm" href="/admin/user">
                            <i class="fa fa-plus"></i>
                            Add User
                        </a>
                    </div>
                </div>
                <div class="panel-body">
                    @if (count($users) > 0)
                        <ul class="list-unstyled">

                            @foreach ($users as $index => $user)

                                @if ($index > 0)
                                    <hr>
                                @endif

                                @include('common.list-users')

                            @endforeach

                        </ul>
                    @else

                        <div class="text-center">
                            No Users! How did you get here?!
                        </div>
                        <hr>
                        <div class="text-center">
                            <a class="btn btn-default" href="/admin/user">
                                <i class="fa fa-plus"></i>
                                Add Users
                            </a>
                        </div>

                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection