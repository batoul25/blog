<x-admin_master>
    @section('content')
        <h1>Create  Category</h1>
        <form method="PATCH" action="{{route('category.update', $categories->id)}}" >
            @csrf
            <div class="form-group">
                <label for="title">Name</label>
                <input type="text" name="title" class="form-control"  placeholder="Enter Category Name" >
            </div>
            <button type="submit" class="btn btn-primary">Update</button>

        </form>

        <h1>Delete Category</h1>
        <form method="delete" action="{{route('category.destroy', $categories->id)}}" enctype="multipart/form-data">
            @csrf


            <button type="submit" class="btn btn-danger">Delete</button>

        </form>
    @endsection

</x-admin_master>


