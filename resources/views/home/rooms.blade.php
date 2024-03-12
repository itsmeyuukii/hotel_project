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
        @foreach ($roomData as $room)
          <div class="col-md-4 col-sm-6">
             <div id="serv_hover"  class="room">
                <div class="room_img">
                   <figure><img src="room/{{$room->image}}" alt="#"/></figure>
                </div>
                <div class="bed_room">
                   <h3>{{$room->room_title}} </h3>
                   <p>{!! Str::limit($room->description, 100, '...') !!} </p>

                   <a class="btn btn-primary" href="{{url('room-details',$room->id)}}">Details</a>
                </div>
             </div>
          </div>
        @endforeach
       </div>
    </div>
 </div>
