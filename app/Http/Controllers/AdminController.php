<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Room;
use App\Models\Booking;
use App\Models\Gallery;
use App\Models\Contact;

class AdminController extends Controller
{

    public function __construct()
    {

    }
    public function index()
    {
        if(Auth::id())
        {
            $usertype = Auth()->user()->usertype;

            if($usertype == 'user')
            {
                $roomData = Room::all();

                $galleries = Gallery::all();

                return view('home.index',compact('roomData', 'galleries'));
            }
            else if($usertype == 'admin')
            {
                return view ('admin.index');
            }
            else
            {
                return redirect()->back();
            }

        }
    }
    public function home()
    {
        $roomData = Room::all();

        $galleries = Gallery::all();

        return view('home.index',compact('roomData','galleries'));
    }

    public function create_room()
    {
        return view ('admin.create_room');
    }

    public function add_room(Request $request)
    {
        $roomModel = new Room();

        $roomModel->room_title = $request->title;
        $roomModel->description = $request->description;
        $roomModel->price = $request->price;
        $roomModel->wifi = $request->wifi;
        $roomModel->room_type = $request->type;

        $image = $request->image;
        if($image)
        {
            $imagename=time().'.'.$image->getClientOriginalExtension();

            $request->image->move('room', $imagename);

            $roomModel->image = $imagename;
        }

        $roomModel->save();

        return redirect()->back();
    }

    public function view_room()
    {
        $roomData = Room::all();
        return view('admin.view_room', compact('roomData'));
    }

    public function delete_room($id)
    {
        $data = Room::find($id);

        $data->delete();

        return redirect()->back();
    }

    public function update_room($id)
    {
        $roomData = Room::find($id);

        return view ('admin.update_room', compact('roomData'));
    }

    public function edit_room(Request $request, $id)
    {
        $roomModel = Room::find($id);
        $roomModel->room_title = $request->title;
        $roomModel->description = $request->description;
        $roomModel->price = $request->price;
        $roomModel->wifi = $request->wifi;
        $roomModel->room_type = $request->type;

        $image=$request->image;

        if($image)
        {
            $imagename=time().'.'.$image->getClientOriginalExtension();

            $request->image->move('room', $imagename);

            $roomModel->image = $imagename;
        }

        $roomModel->save();

        return redirect()->back();
    }
    public function bookings()
    {
        $bookings = Booking::all();


        return view('admin.booking', compact('bookings'));
    }
    public function delete_booking($id)
    {
        $booking = Booking::find($id);

        $booking->delete();

        return redirect()->back()->with('message', 'Deleted Successfully');
    }
    public function approve_book($id)
    {
        $booking = Booking::find($id);

        $booking->status = 'approved'; //change the status from waiting to approved

        $booking->save();

        return redirect()->back()->with('message', 'Booking Approved!');
    }
    public function reject_book($id)
    {
        $booking = Booking::find($id);

        $booking->status = 'rejected';

        $booking->save();

        return redirect()->back()->with('message', 'Booking Rejected');
    }

    public function view_gallery()
    {
        $galleries = Gallery::all();

        return view('admin.gallery', compact('galleries'));
    }

    public function upload_gallery(Request $request)
    {
        $galleries = new Gallery;

        $image = $request->image ;

        if($image)
        {
            $imagename = time(). '.' .$image->getClientOriginalExtension();

            $request->image->move('gallery', $imagename);

            $galleries->image = $imagename;

            $galleries->save();

            return redirect()->back()->with('message', 'Uploaded Successfully');
        }
    }
    public function delete_gallery($id)
    {
        $gallery = Gallery::find($id);

        $gallery->delete();

        return redirect()->back()->with('message', 'Delete Image Successfully');
    }
    public function all_messages()
    {
        $contacts = Contact::all();

        return view('admin.all_messages', compact('contacts'));
    }
    public function send_email($id)
    {
        $email = Contact::find($id);

        return view('admin.send_email', compact('email'));
    }
}
