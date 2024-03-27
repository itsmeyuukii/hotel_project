<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Booking;
use App\Models\Gallery;
use App\Models\contact;

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


        $startDate = $request->startDate;
        $endDate = $request->endDate;

        $isBooked = Booking::where('room_id', $id)
                            ->where('start_date', '<=', $endDate)
                            ->where('end_date', '>=', $startDate)->exists();//checked the ROOM IF already booked

        if($isBooked)
        {
            return redirect()->back()->with('message', 'Room is already booked, Please Try different date');
        }
        else
        {
            $bookData->start_date = $request->startDate;
            $bookData->end_date = $request->endDate;

            $bookData->save();

            return redirect()->back()->with('message', 'Room Booked Successfully');
        }
    }
    public function contact(Request $request)
    {
        $contactModel = new Contact();

        $contactModel->name = $request->name;
        $contactModel->email = $request->email;
        $contactModel->phone = $request->phone;
        $contactModel->message = $request->message;

        $contactModel->save();

        return redirect()->back()->with('message', 'Your message sent successfully');
    }
}
