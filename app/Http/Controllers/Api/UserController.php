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

    public function filter(Request $request)
    {
        $query = Ticket::with('operator', 'category');

        // Filtra per categoria se presente nella richiesta
        if ($request->filled('search')) {
            $query->where('titolo', 'like', '%' . $request->input('search') . '%');
        }

        // Filtra per categoria se presente nella richiesta
        if ($request->filled('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('name', $request->input('category'));
            });
        }
        // Filtra per operatore se presente nella richiesta
        if ($request->filled('operator')) {
            $query->whereHas('operator', function ($q) use ($request) {
                $q->where('name', $request->input('operator'));
            });
        }

        // Filtra per data se presente nella richiesta
        if ($request->filled('date')) {
            $query->whereDate('created_at', '>=', $request->input('date'));
        }

        $tickets = $query->paginate(6);

        foreach ($query as $ticket) {
            $ticket->created_at_formatted = Carbon::parse($ticket->created_at)->format('Y-m-d H:i');
        }

        return response()->json([
            'success' => true,
            'result'  => $tickets
        ]);
    }
}
