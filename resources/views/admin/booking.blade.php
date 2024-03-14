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

                    <table class="table_deg">
                        <thead>
                            <th>Room_id</th>
                            <th>Customer Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Arrival Date</th>
                            <th>Leaving Date</th>
                            <th>Status</th>
                            <th>Room Title</th>
                            <th>Price</th>
                            <th>Image</th>
                        </thead>
                        <tbody>
                        @if ($bookings)
                            @foreach ($bookings as $booking)
                            <tr>
                                <td>{{$booking->id}} </td>
                                <td>{{$booking->name}} </td>
                                <td>{{$booking->email}} </td>
                                <td>{{$booking->phone}} </td>
                                <td>{{$booking->start_date}} </td>
                                <td>{{$booking->end_date}} </td>
                                <td>{{$booking->status}} </td>
                                <td>{{$booking->room->room_title}} </td>
                                <td>{{$booking->room->price}} </td>
                                <td>
                                    <img src="/room/{{$booking->room->image}}" alt="">
                                </td>
                            </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

      {{-- Admin body End --}}
      @include('admin.footer')
    </div>
    @include('admin.js')
  </body>
</html>
