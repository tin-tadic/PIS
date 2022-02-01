<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReceivedContact;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    
    public function contact(Request $request) {
        $request->validate([
            'name' => ['required', 'string', 'min:2'],
            'lastname' => ['required', 'string', 'min:2'],
            'email' => ['required', 'email'],
            'message' => ['required', 'min: 10'],
            'phone' => ['max: 15'],
            'title' => ['required', 'min: 5', 'max: 30'],
        ]);

        receivedContact::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'message' => $request->message,
            'phone' => $request->phone,
            'title' => $request->title,
        ]);
    }

    public function getContact() {
        return view("contact");
    }

    public function getAllTickets() {
        $allTickets = receivedContact::all();
        return view("tickets")->with('tickets', $allTickets);
    }

    public function setTicketSolved(Request $request, $id) {    
        DB::table('received_contacts')->where('id', $id)->update(['processed' => 1]);
    }

    public function setTicketTrashed(Request $request, $id) {    
        DB::table('received_contacts')->where('id', $id)->update(['trashed' => 1]);
    }

    public function getTicketInfo($id) {
        if (DB::table('received_contacts')->where('id', $id)->exists()) {
            $ticket = DB::table('received_contacts')->where('id', $id)->get();
            return view("ticket-view")->with("ticket", $ticket);
        } else {
            dd("nema");
        }
    }

}
