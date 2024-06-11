<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $tickets = Ticket::with('operator', 'category')->paginate(6);
        foreach ($tickets as $ticket) {
            $ticket->created_at_formatted = Carbon::parse($ticket->created_at)->format('Y-m-d H:i');
        }

        return response()->json([
            'success' => true,
            'result'  => $tickets
        ]);
    }
}
