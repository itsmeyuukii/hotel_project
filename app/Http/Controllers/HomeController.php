<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Room;

use App\Models\Booking;

class HomeController extends Controller
{
    public function room_details($id)
    {
        $roomData = Room::find($id);

        return view ('home.room_details',compact('roomData'));
    }

    public function add_booking(Request $request, $id)
    {
        $request->validate([

            'startDate' => 'required|date',
            'endDate' => 'date|after:startDate',// need to place start date

        ]);
        $bookData = new Booking;

        $bookData->room_id = $id;

        $bookData->name = $request->name;
        $bookData->email = $request->email;
        $bookData->phone = $request->phone;
        $bookData->start_date = $request->startDate;
        $bookData->end_date = $request->endDate;

        $bookData->save();

        return redirect()->back()->with('message', 'Room Booked Successfully');
    }
}
