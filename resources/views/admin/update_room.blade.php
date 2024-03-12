<!DOCTYPE html>
<html>
  <head>
    <base href="/public">
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
                <form action="{{url('edit_room', $roomData->id)}}" method="Post" enctype="multipart/form-data">

                    @csrf

                    <div class="div_deg">
                        <label for="title">Room Title</label>
                        <input type="text" name="title" value="{{ old('title', $roomData->room_title) }}">
                    </div>
                    <div class="div_deg">
                        <label for="description">Description</label>
                        <textarea name="description" id="" cols="30" rows="10">{{ old('title', $roomData->description) }}</textarea>
                    </div>
                    <div>
                        <label for="">Price</label>
                        <input type="number" name="price" value="{{ old('title', $roomData->price) }}">
                    </div>
                    <div class="div_deg">
                        <label for="type">Room Type</label>
                        <select name="type" id="">
                            @foreach(['regular', 'premium', 'deluxe'] as $type)
                                <option value="{{ $type }}" {{ old('type', $roomData->room_type) == $type ? 'selected' : '' }}>
                                    {{ ucfirst($type) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="div_deg">
                        <label for="wifi">Free Wifi</label>
                        <select name="wifi" id="">
                            @foreach (['yes', 'no'] as $wifi)
                            <option value="{{$wifi}}" {{old('wifi',$roomData->wifi) == $wifi ? 'selected': ''}}>
                                {{ucfirst($wifi)}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="">Current Image</label>
                        <img class="align-center" src="/room/{{$roomData->image}}" alt="image">
                    </div>
                    <div class="div_deg">
                        <label for="image">Upload Image</label>
                        <input type="file" name="image" id="">
                    </div>
                    <div class="div_deg">
                        <input class="btn btn-primary" type="submit" value="Update Room">
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
