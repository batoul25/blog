<x-admin_master>
    @section('content')
        <h1>All Posts</h1>
            @if(\Illuminate\Support\Facades\Session::has('message'))
               <div class="alert alert-danger">{{\Illuminate\Support\Facades\Session::get('message')}}</div>
                @elseif(\Illuminate\Support\Facades\Session::has('post-created-message'))
                    <div class="alert alert-success">{{\Illuminate\Support\Facades\Session::get('post-created-message')}}</div>
                @elseif(\Illuminate\Support\Facades\Session::has('post-updated-message'))
                     <div class="alert alert-success">{{\Illuminate\Support\Facades\Session::get('post-updated-message')}}</div>
        @endif
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Posts</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Owner</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Tag</th>
                            <th>Image</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                         <tbody>
                            @foreach($posts as $post)
                            <tr>
                                <td>{{$post->id}}</td>
                                <td>{{$post->users()->name}}</td>
                                <td><a href="{{route('post.edit',$post->id)}}">{{$post->title}}</a></td>
                                <td>{{$post->categories()->name}}</td>
                                <td>{{$post->tags()->name}}</td>
                                <td>
                                    <img height="40px" src="{{$post->images()->filename}}">
                                </td>
                                <td>{{$post->created_at->diffForHumans()}}</td>
                                <td>{{$post->updated_at->diffForHumans()}}</td>
                                <td>
                                    @can('view' , $post)

                                    <form method="post" action="{{route('post.destroy',$post->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type= "submit" class="btn btn-danger">Delete</button>
                                    </form>

                                    @endcan
                                </td>

                            </tr>
                            @endforeach
                         </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{$posts->links()}}
    @endsection

    @section('scripts')
        <!-- Page level plugins -->
            <script src="{{asset('vendor-admin/datatables/jquery.dataTables.min.js')}}"></script>
            <script src="{{asset('vendor-admin/datatables/dataTables.bootstrap4.min.js')}}"></script>

            <!-- Page level custom scripts -->
           <!-- <script src="{{asset('js/demo/datatables-demo.js')}}"></script> -->
        @endsection
</x-admin_master>
