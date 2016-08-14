<li>
    <div class="row">
        <div class="col-sm-10">
            <h3>
                <a href="{{ url((($isAdmin) ? '/admin' : '') . '/article/' . $article->id) }}">{{ $article->title }}</a>
                <small>{{ $article->subtitle }}</small>
            </h3>

            <div>
                <span class="text-center">
                    <img src="http://lorempixel.com/16/16/people" class="img-circle">
                </span>
                <span>{{ $article->user->name }}</span>
                <span> &bull; </span>
                <small>{{ date('F d, Y', strtotime($article->created_at)) }}</small>
            </div>
        </div>

    @if (true === $isAdmin)
        <div class="col-sm-2 pmv">
            <form action="{{ url('admin/article/'.$article->id) }}" method="POST">

                {{ csrf_field() }}
                {{ method_field('DELETE') }}

                <button type="submit" id="delete-article-{{ $article->id }}" class="btn btn-danger">
                    <i class="fa fa-btn fa-trash"></i>Delete
                </button>
            </form>
        </div>
    @endif

    </div>
</li>