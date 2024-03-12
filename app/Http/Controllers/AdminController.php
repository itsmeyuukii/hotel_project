<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Room;

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

                return view('home.index',compact('roomData'));
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

        return view('home.index',compact('roomData'));
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
}
