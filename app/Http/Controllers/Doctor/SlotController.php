<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Slot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SlotController extends Controller
{
    public function index()
    {
        $slots = Slot::all();
        return view('doctor.list_slots', compact('slots'));
    }
    public function addSlot()
    {
        return view('doctor.add_slot');
    }

    public function saveSlot( Request $request)
    {
        $doctor = Auth::guard('doctor')->user();

        $createdSlot = $doctor->slots()->create([
           'date' => $request->get('date'),
           'hour' => $request->get('hour'),
        ]);

        if ($createdSlot != null) {
            $message = 'Slot has been created successfully!';
            session()->flash('success_message',$message);
        }
        else {
            $message = 'Created slot failed';
            session()->flash('error_message',$message);
        }

        return redirect('/doctor/slots');
    }

    public function updateSlot($id)
    {
        $slot = Slot::findOrFail($id);
        return view('doctor.update_slot')->with(compact('slot'));
    }

    public function deleteSlot($id)
    {
        Slot::where('id',$id)->delete();
        $message = 'Slot has been deleted!';
        session()->flash('success_message',$message);
        return redirect()->back();
    }

    public function editSlot(Request $request,$id)
    {
        $updatedSlot = Slot::findOrFail($id);
        $updatedSlot->update($request->all());
        $message = 'Slot has been updated!';
        session()->flash('success_message',$message);
       return redirect('/doctor/slots');
    }
}
