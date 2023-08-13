<x-admin_master>
    @section('content')
        <h1>Categories</h1>
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
                            <th>Name</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->name}}</td>



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
        <!-- <script src="{{asset('js/demo/datatables-demo.js')}}"></script> -->
        @endsection
</x-admin_master>
