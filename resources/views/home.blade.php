<x-home_master>



@section('content')



        <!-- Blog Post -->
            @foreach($posts as $post)
        <div class="card mb-4">
            <div class="card-body">
                <h2 class="card-title">{{$post->title}}</h2>
                <p class="card-text">{{Str::limit($post->content,'30','.....')}}</p>
                <a href="#" class="btn btn-primary">Read More &rarr;</a>
            </div>
            <div class="card-footer text-muted">
                Posted on {{$post->created_at->diffForHumans()}}
                <a href="{{route('post' , $post->id)}}">Start Bootstrap</a>
            </div>
        </div>
           @endforeach
        <!-- Pagination -->
        <ul class="pagination justify-content-center mb-4">
            <li class="page-item">
                <a class="page-link" href="#">&larr; Older</a>
            </li>
            <li class="page-item disabled">
                <a class="page-link" href="#">Newer &rarr;</a>
            </li>
        </ul>
@endsection



</x-home_master>
