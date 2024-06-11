<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $tickets = Ticket::with('operator', 'category')->paginate(6);

        return response()->json([
            'success' => true,
            'result'  => $tickets
        ]);
    }
}
