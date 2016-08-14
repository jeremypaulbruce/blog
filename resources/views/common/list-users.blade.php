<li>
    <div class="row">

        <div class="col-sm-2 text-center pmv">
            <img src="http://lorempixel.com/64/64/people" class="img-circle">
        </div>
        <div class="col-sm-8">
            <h3>
                <a href="{{ url('admin/user/' . $user->id) }}">{{ $user->name }}</a>
            </h3>

            <div>
                <span>{{ $user->email }}</span>
                <span> &bull; </span>
                <small>{{ date('F d, Y', strtotime($user->created_at)) }}</small>
            </div>
        </div>

        <div class="col-sm-2 pmv">

            @if (Auth::user()->id !== $user->id)

            <form action="{{ url('admin/user/'.$user->id) }}" method="POST">

                {{ csrf_field() }}
                {{ method_field('DELETE') }}

                <button type="submit" id="delete-user-{{ $user->id }}" class="btn btn-danger">
                    <i class="fa fa-btn fa-trash"></i>Delete
                </button>
            </form>

            @endif

        </div>

    </div>
</li>