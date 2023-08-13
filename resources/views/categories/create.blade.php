<x-admin_master>
    @section('content')
        <h1>Create Post</h1>
        <form method="post" action="{{route('category.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Name</label>
                <input type="text" name="title" class="form-control"  placeholder="Enter Category Name" >
            </div>
            <button type="submit" class="btn btn-primary">Create Category</button>

        </form>
    @endsection

</x-admin_master>

