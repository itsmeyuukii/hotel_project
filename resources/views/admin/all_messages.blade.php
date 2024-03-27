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
                            <th>Id</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Message</th>
                            <th>Date</th>
                            <th>Send Mail</th>
                            <th>Delete</th>
                        </thead>
                        <tbody>
                        @if ($contacts)
                            @foreach ($contacts as $contact)
                            <tr>
                                <td>{{$contact->id}} </td>
                                <td>{{$contact->name}} </td>
                                <td>{{$contact->email}} </td>
                                <td>{{$contact->phone}} </td>
                                <td>{{$contact->message}} </td>
                                <td>{{$contact->created_at}} </td>
                                <td>
                                    <a class="btn btn-success" href="{{url('send-email',$contact->id)}}">Send Mail</a>
                                </td>
                                <td>
                                    <a onclick="return confirm('Are you sure you want to delete this Message?');" href="{{url('delete-message',$contact->id)}}" class="btn btn-danger">Delete</a>
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
  </body>
</html>
