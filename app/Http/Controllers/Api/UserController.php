<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Operator;
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

        $categories = Category::all();
        $operators = Operator::all();

        return response()->json([
            'success' => true,
            'result'  => $tickets,
            'categories' => $categories,
            'operators' => $operators,
        ]);
    }
}
