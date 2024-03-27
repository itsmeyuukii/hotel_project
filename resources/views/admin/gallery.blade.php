<!DOCTYPE html>
<html>
  <head>
    @include('admin.css');
  </head>
  <body>
    {{-- header --}}
    @include('admin.header')
    {{-- header end --}}
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      @include('admin.sidebar')
      <!-- Sidebar Navigation end-->

        <div class="page-content">
            <div class="page-header">
                <div class="container-fluid">

                    <h1>Gallery</h1>

                    <div class="row py-10">
                    @if ($galleries)
                    @foreach ($galleries as $image)

                    <div class="col-md-4 col-sm-4 py-2">
                        <div class="image-container">
                            <img class="p-1" width="300px" src="/gallery/{{$image->image}}" alt="">
                            <a onclick="return confirm('Are you sure you want to delete this image?')" href="{{url('delete-gallery',$image->id)}}" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                    @endforeach
                    @endif
                    </div>
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                        <button class="close" data-bs-dismiss="alert">&times</button>
                        {{session()->get('message')}}
                        </div>
                    @endif

                    <form action="{{url('upload-gallery')}}" method="Post" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <label for="image">Upload Image</label>
                            <input type="file" name="image">
                        </div>
                        <div>
                            <input class="btn btn-primary" type="submit" value="Add Image">
                        </div>
                    </form>
                </div>
            </div>
        </div>

      {{-- Admin body End --}}
      @include('admin.footer')
    </div>
    @include('admin.js')
  </body>
</html>
