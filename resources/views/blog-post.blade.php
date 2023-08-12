<x-home_master>

    @section('content')



        <!-- Title -->
            <h1 class="mt-4">{{$post->title}}</h1>

            <!-- Author -->
            <p class="lead">
                by
                <a href="#">{{$post->users->name}}</a>
            </p>

            <hr>

            <!-- Date/Time -->
            <p>Posted on {{$post->created_at->diffForHumans()}}</p>

            <hr>

            <!-- Preview Image -->
            <img class="img-fluid rounded" src="{{$post->images->filename}}" alt="">

            <hr>

            <!-- Post Content -->
            <p class="lead"> {{$post->content}}</p>



    @endsection

</x-home_master>
