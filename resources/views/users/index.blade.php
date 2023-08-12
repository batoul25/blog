<x-admin_master>
    @if(\Illuminate\Support\Facades\Session::has('message'))
        <div class="alert alert-danger">{{\Illuminate\Support\Facades\Session::get('message')}}</div>
    @endif
    @section('content')
        <h1>Users</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Users</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="users-table" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Registered date</th>
                            <th>Delete</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->created_at->diffForHumans()}}</td>
                                <td>
                                    @can('view' , $user)

                                        <form method="post" action="{{route('user.destroy',$user->id)}}">
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
    @endsection

        @section('scripts')
        <!-- Page level plugins -->
            <script src="{{asset('vendor-admin/datatables/jquery.dataTables.min.js')}}"></script>
            <script src="{{asset('vendor-admin/datatables/dataTables.bootstrap4.min.js')}}"></script>

            <!-- Page level custom scripts -->
            <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
        @endsection

</x-admin_master>
