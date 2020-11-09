<?php

namespace App\Http\Controllers;

use App\Zone;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ZoneController extends Controller
{
    //

    public function list() {
        return view('app.rooms.list', [
            'zones' => Zone::user()->get(),
        ]);
    }

    public function add(Request $request)
    {
        // Get post data
        $zoneName = htmlspecialchars($request->input('name'));
        $zoneDescription = htmlspecialchars($request->input('description'));
        $user = Auth::user();
        if ($zoneName){
            $zone = new Zone([
                'name' => $zoneName,
                'description' => $zoneDescription,
            ]);

            $user->zone()->save($zone);
            return redirect(route('zones_list'))->with('status', 'Room added!');
        }
        return redirect(route('zones_list'))->with('status', 'Rome name is not valid!');
    }
}
