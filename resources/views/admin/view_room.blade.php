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
                <h1 class="fs-32 bold">View Room</h1>
            </div>

            <table class="table_deg">
                <thead>
                    <th>Room Title</th>
                    <th>Room Type</th>
                    <th>Wifi</th>
                    <th>Description</th>
                    <th>Price Range</th>
                    <th>Image</th>
                    <th>Action</th>
                </thead>
                <tbody>
                @if ($roomData)
                    @foreach ($roomData as $item)
                    <tr>
                        <td>
                            {{$item->room_title}}
                        </td>
                        <td>
                            {{$item->room_type}}
                        </td>
                        <td>
                            {{$item->wifi}}
                        </td>
                        <td>
                            {!! Str::limit($item->description, 50, '...') !!}
                        </td>
                        <td>
                            ₱ {{number_format($item->price)}}
                        </td>
                        <td>
                            <img width="60" src="room/{{$item->image}}" alt="image">
                        </td>
                        <td>
                            <a onclick="return confirm('Are you sure to delete this ');" class="btn btn-danger" href="{{url('room-delete', $item->id)}}">Delete</a>
                            <a class="btn btn-warning" href="{{url('room-update', $item->id)}}">Update</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                @endif
            </table>

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
