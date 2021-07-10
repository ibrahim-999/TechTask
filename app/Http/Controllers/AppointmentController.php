<?php

namespace App\Http\Controllers;

use App\Models\Slot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function show()
    {
        $slots = Slot::with('doctor')->get();

        if (count($slots) < 1) {
            return response()->json([
                'success' => false,
                'message' => 'empty slots'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $slots
        ], 200);
    }
    public function book(Request $request)
    {
        $this->validate($request, [
            'slot_id' => 'required|numeric|exists:slots,id'
        ]);

        $patient = auth()->user();
        $appointment = $patient->appointments()->create([
            'slot_id' => $request->get('slot_id')
        ]);

        if($appointment == null) {
            return response()->json([
                'success' => false,
                'message' => 'error creating appointment'
            ], 400);
        }

        return response()->json([
            'success' => true,
            'data' => $appointment->load('slot.doctor')
        ], 200);
    }

}
