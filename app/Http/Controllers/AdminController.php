<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Cakes;
use App\Orders;
use Illuminate\Support\Facades\Hash;
use App\OrderCakes;
    use App\User;
    use App\Emirates;
    use App\Timeslots;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function home() {
        $orders = Orders::paginate(20);
      return view('admin.dashboard')->with('orders',$orders);

        /*<div class="container">
        @foreach ($users as $user)
        {{ $user->name }}
        @endforeach
        </div>

        {{ $users->links() }}*/
    }

    public function viewCake(Request $request) {

        $cake = Cakes::where('id',$request->id)->first();

        return view('admin.viewCake')->with('cake',$cake);

    }

    public function editCake(Request $request) {

        if (!isset($request->id)) {
            redirect('adminHome');
        }
        $id = $request->id;

        $this->validate($request, [
                        'is_shaped' => 'required',
                        'cake_id' => 'required',
                        'shaped_amount' => 'required',
                        'is_shaped_avail' => 'required',
                        'is_photo_avail' => 'required',
                        'name' => 'required',
                        'amount' => 'required',
                        'minimum_kg' => 'required'
                    ]);

        Cakes::where('id',$id)->update([
                                       'description' => $request['description'],
                                       'is_shaped' => $request['is_shaped'],
                                       'shaped_amount' => $request['shaped_amount'],
                                       'is_shaped_avail' => $request['is_shaped_avail'],
                                       'is_photo_avail' => $request['is_photo_avail'],
                                       'name' => $request['name'],
                                       'amount' => $request['amount'],
                                       'discount' => 0,
                                       'discount_type' => 0,
                                       'cake_type_id' => 1,
                                       'avail_from' => '10:00:00',
                                       'avail_to' => '21:00:00',
                                       'pic_count' => 1,
                                       'status' => 1,
                                       ]);

        $i = 0;
        foreach(Input::file("photos") as $file) {
            $i++;
            $extension = $file->getClientOriginalExtension();
            $destinationPath = 'img/cakes/';
            $fileName = str_replace(" ","_",strtolower($request['name']))."_".$id."_small_".$i.$extension;

            if($file->move($destinationPath, $fileName))
            {

            }
            else {
                return [
                'status' => 'error',
                'message' => 'image_upload',
                'errors' => 'photo upload failed'
                ];
            }

            $fileName = str_replace(" ","_",strtolower($request['name']))."_".$id."_large_".$i.$extension;

            if($file->move($destinationPath, $fileName))
            {

            }
            else {
                return [
                'status' => 'error',
                'message' => 'image_upload',
                'errors' => 'photo upload failed'
                ];
            }
        }

        redirect('cake-'.$id.'-view/');

    }

    public function addCakeForm(Request $request) {

            return view('admin.addCakeForm');


    }


    public function addCake(Request $request) {

        $this->validate($request, [
                        'is_shaped' => 'required',
                        'shaped_amount' => 'required',
                        'is_shaped_avail' => 'required',
                        'is_photo_avail' => 'required',
                        'name' => 'required',
                        'amount' => 'required',
                        'minimum_kg' => 'required'
                        ]);

        $cake = Cakes::create([
                    'description' => $request['description'],
                    'is_shaped' => $request['is_shaped'],
                    'shaped_amount' => $request['shaped_amount'],
                    'is_shaped_avail' => $request['is_shaped_avail'],
                    'is_photo_avail' => $request['is_photo_avail'],
                    'name' => $request['name'],
                    'amount' => $request['amount'],
                    'discount' => 0,
                    'discount_type' => 0,
                    'cake_type_id' => 1,
                    'avail_from' => '10:00:00',
                    'avail_to' => '21:00:00',
                    'pic_count' => 1,
                    'status' => 1,
                                       ]);
        $id = $cake['id'];

        $i = 0;
        foreach(Input::file("photos") as $file) {
            $i++;
            $extension = $file->getClientOriginalExtension();
            $destinationPath = 'img/cakes/';
            $fileName = str_replace(" ","_",strtolower($request['name']))."_".$id."_small_".$i.$extension;

            if($file->move($destinationPath, $fileName))
            {

            }
            else {
                return [
                'status' => 'error',
                'message' => 'image_upload',
                'errors' => 'photo upload failed'
                ];
            }

            $fileName = str_replace(" ","_",strtolower($request['name']))."_".$id."_large_".$i.$extension;

            if($file->move($destinationPath, $fileName))
            {

            }
            else {
                return [
                'status' => 'error',
                'message' => 'image_upload',
                'errors' => 'photo upload failed'
                ];
            }
        }

        redirect('cake-'.$id.'-view/');

    }

    public function viewOrder(Request $request) {

        $order = Orders::where('id',$request->id)->first();

        $cakes = OrderCakes::where('order_id',$order["id"])->get();
        $user = User::where('id',$order["user_id"])->first();
        $emirate = Emirates::where('id',$order["emirate_id"])->first();
        $timeslot = Timeslots::where('id',$order["timeslot_id"])->first();

        return view('admin.viewOrder')->with('order',$order)->with('cakes',$cakes)->with('user',$user)->with('emirate',$emirate)->with('timeslot',$timeslot);

    }


    public function viewUsers(Request $request) {

        $users = User::paginate(20);

        return view('admin.viewUsers')->with('users',$users);

    }


    public function viewCakes(Request $request) {

        $cakes = Cakes::paginate(20);

        return view('admin.viewCakes')->with('cakes',$cakes);

    }


}
