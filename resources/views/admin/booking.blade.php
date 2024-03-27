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
                    @if (session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-bs-dismiss="alert">&times</button>
                        {{session()->get('message')}}
                    </div>

                    @endif
                    <div class="table-container">
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
                                <th>Delete</th>
                                <th>Status Update</th>
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
                                    <td>
                                        @if ($booking->status === 'waiting')
                                            <span class="btn btn-warning">
                                                Waiting
                                            </span>
                                        @elseif($booking->status === 'approved')
                                            <span class="btn btn-success">
                                                Approved
                                            </span>
                                        @elseif($booking->status === 'rejected')
                                            <span class="btn btn-danger">
                                                Rejected
                                            </span>
                                        @endif
                                    </td>
                                    <td>{{$booking->room->room_title}} </td>
                                    <td>{{$booking->room->price}} </td>
                                    <td>
                                        <img src="/room/{{$booking->room->image}}" alt="">
                                    </td>
                                    <td>
                                        <a onclick="return confirm('Are you sure you want to delete this Booking?');" href="{{url('delete-booking',$booking->id)}}" class="btn btn-danger">Delete</a>
                                    </td>
                                    <td>
                                        <span class="py-1">
                                            <a href="{{url('approve-book',$booking->id)}}" class="btn btn-success">Approve</a>
                                        </span>

                                        <a href="{{url('reject-book',$booking->id)}}" class="btn btn-warning">Reject</a>
                                    </td>
                                </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
        </div>

      {{-- Admin body End --}}
      @include('admin.footer')
    </div>
    @include('admin.js')
    <script>

    </script>
  </body>
</html>
