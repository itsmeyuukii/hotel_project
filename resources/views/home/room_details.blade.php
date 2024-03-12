<!DOCTYPE html>
<html lang="en">
   <head>
    <base href="/public">
    @include('home.css')

   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="theme/images/loading.gif" alt="#"/></div>
      </div>
      <!-- end loader -->

      {{-- header --}}
      <header>
        @include('home.header')
      </header>
      {{-- header end --}}

      <div  class="our_room">
        <div class="container">
           <div class="row">
              <div class="col-md-12">
                 <div class="titlepage">
                    <h2>Our Room</h2>
                    <p>Lorem Ipsum available, but the majority have suffered </p>
                 </div>
              </div>
           </div>
           <div class="row">

              <div class="col-md-8 col-sm-6">
                 <div id="serv_hover"  class="room">
                    <div style="padding: 20px" class="room_img">
                       <figure><img style="height:300px; width=800px" src="room/{{$roomData->image}}" alt="#"/></figure>
                    </div>
                    <div class="bed_room">
                       <h2>{{$roomData->room_title}} </h2>
                       <p>{{$roomData->description}} </p>

                       <h4 class="pt-5">Free Wifi: {{$roomData->wifi}} </h4>
                       <h4>Room Type: {{$roomData->room_type}} </h4>
                       <h4 class="font-weight-bold">Price    : {{$roomData->price}} </h4>
                    </div>
                 </div>
              </div>
              <div class="col-md-4">
                <div class="room_detail">
                    <h1 class="">Book Room</h1>

                    <div>
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                        <button type="button" class="close" data-bs-dismiss="alert">&times</button>
                        {{session()->get('message')}}
                        </div>
                    @endif
                    </div>
                    @if ($errors)
                    {{-- Add validation error here to make UI for client --}}
                    @foreach ($errors->all() as $errors)
                    <li style="color:red">
                        {{$errors}}
                    </li>
                    @endforeach

                    @endif
                    <form method="Post" action="{{url('add-booking',$roomData->id)}}">

                        @csrf
                    <div>
                        <label for="name">Name</label>
                        <input type="text" name="name" value="{{Auth::check() ? Auth::user()->name : ''}}">
                    </div>
                    <div>
                        <label for="email">Email</label>
                        <input type="text" name="email" value="{{Auth::check() ? Auth::user()->email : ''}}">
                    </div>
                    <div>
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" value="{{Auth::check() ? Auth::user()->phone : ''}}">
                    </div>
                    <div>
                        <label for="startDate">Start Date</label>
                        <input type="date" name="startDate" id="startDate">
                    </div>
                    <div>
                        <label for="endDate">End Date</label>
                        <input type="date" name="endDate" id="endDate">
                    </div>

                    <div class="pt-5">
                        <input type="submit" class="btn btn-success" value="Book Room">
                    </div>
                    </form>
                </div>
              </div>
           </div>
        </div>
     </div>

      <footer>
        @include('home.footer')
      </footer>
      <!-- end footer -->
      <!-- Javascript files-->
      @include('home.js')

      <script>
        $(function()){
            var dtToday = new Date();

            var month = dtToday.getMonth()+1;

            var day = dtToday.getDate();

            var year = dtToday.getFullYear();

            if(month<10)
            {
                month = '0' + month.toString();
            }
            if(day<10)
            {
                day = '0' + day.toString();
            }
            var maxDate = year + '-' + month + '-' + day;
            $('#startDate').attr('min', maxDate);
            $('#endDate').attr('min', maxDate);
        }
      </script>
   </body>
</html>
