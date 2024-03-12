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
      {{-- Admin Body Start --}}
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

            <div class="div_center">
                <h1 class="fs-32 bold">Add Rooms</h1>
                <form action="{{url('add-room')}}" method="Post" enctype="multipart/form-data">

                    @csrf

                    <div class="div_deg">
                        <label for="title">Room Title</label>
                        <input type="text" name="title">
                    </div>
                    <div class="div_deg">
                        <label for="description">Description</label>
                        <textarea name="description" id="" cols="30" rows="10"></textarea>
                    </div>
                    <div>
                        <label for="">Price</label>
                        <input type="number" name="price">
                    </div>
                    <div class="div_deg">
                        <label for="type">Room Type</label>
                        <select name="type" id="">
                            <option value="regular">Regular</option>
                            <option value="premium">Premium</option>
                            <option value="deluxe">Deluxe</option>
                        </select>
                    </div>
                    <div class="div_deg">
                        <label for="wifi">Free Wifi</label>
                        <select name="wifi" id="">
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                    <div class="div_deg">
                        <label for="image">Upload Image</label>
                        <input type="file" name="image" id="">
                    </div>
                    <div class="div_deg">
                        <input class="btn btn-primary" type="submit" value="Add Room">
                    </div>
                </form>
            </div>

          </div>
        </div>
      </div>
      {{-- @include('admin.body') --}}
      {{-- Admin body End --}}
      @include('admin.footer')
    </div>
    @include('admin.js')
  </body>
</html>
