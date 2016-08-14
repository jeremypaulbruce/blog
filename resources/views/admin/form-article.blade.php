@extends('layouts.app')


@section('content')

    <div class="col-sm-offset-2">

    @if (true === $isNewRecord)
        <h2>Create Article</h2>
    @else
        <h2>Edit Article</h2>
    @endif

    </div>

    @include('common.errors')

    <form action="{{ url('/admin/article/'.$article->id) }}" method="POST" class="form-horizontal">

        {{ csrf_field() }}

        <div class="form-group">
            <label for="article" class="col-sm-2 control-label">Title</label>
            <div class="col-sm-10">
                <input type="text" name="title" id="article-title" class="form-control" value="{{ $article->title }}">
            </div>
        </div>

        <div class="form-group">
            <label for="article" class="col-sm-2 control-label">Subtitle</label>
            <div class="col-sm-10">
                <input type="text" name="subtitle" id="article-subtitle" class="form-control" value="{{ $article->subtitle }}">
            </div>
        </div>

        <div class="form-group">
            <label for="article" class="col-sm-2 control-label">Content</label>
            <div class="col-sm-10">
                <textarea name="content" id="article-content" class="form-control">{{ $article->content }}</textarea>
            </div>
        </div>

        <!-- Add Task Button -->
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus"></i>
                    @if (true === $isNewRecord)
                        Add Article
                    @else
                        Update Article
                    @endif
                </button>
            </div>
        </div>

    </form>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#article-content').summernote({
                height:300
            });
        });
    </script>

@endsection