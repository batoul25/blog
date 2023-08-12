<x-admin_master>
    @section('content')
        <h1>Create Post</h1>
        <form method="post" action="{{route('post.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control"  placeholder="Enter title" >
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="" class="form-control_file"  placeholder="Post Image" >
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <input type="text" name="category_id" class="form-control"  placeholder="Enter Category" >
            </div>
            <div class="form-group">
                <textarea name="content" id="coontent" cols="30" rows="10"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>

        </form>
    @endsection

</x-admin_master>
