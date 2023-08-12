<x-admin_master>
    @section('content')
        <h1>Edit Post</h1>
        <form method="post" action="{{route('post.update',$post->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control"  placeholder="Enter title" value="{{$post->title}}">
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <div><img heigth = "100px" src="{{$post->images()->filename}}"></div>
                <input type="file" name="" class="form-control_file"  placeholder="Post Image" >
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <input type="text" name="category_id" class="form-control"  placeholder="Enter Category" value="{{$post->categories->name}}">
            </div>
            <div class="form-group">
                <textarea name="content" id="content" cols="30" rows="10">value="{{$post->content}}"</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>

        </form>
    @endsection

</x-admin_master>

