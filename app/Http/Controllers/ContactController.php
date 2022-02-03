<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReceivedContact;
use Illuminate\Support\Facades\DB;
use Validator;
use Response;

class ContactController extends Controller
{
    
    public function contact(Request $request) {
        $rules = [
            'name' => ['required', 'min:2'],
            'lastname' => ['required','min:2'],
            'phone' => ['max: 15'],
            'email' => ['required', 'email'],
            'title' => ['required', 'min: 5', 'max: 30'],
            'message' => ['required', 'min: 10'],
        ];
        $messages = [
            'name.required' => 'Ime je obavezno.',
            'name.min' => 'Ime je prekratko.',

            'lastname.required' => 'Prezime je obavezno.',
            'lastname.min' => 'Prezime je prekratko.',

            'phone.max' => 'Predug telefonski broj.',

            'email.required' => 'Email je obavezan.',
            'email.email' => 'Email je neispravan.',

            'title.required' => 'Naslov je obavezan.',
            'title.min' => 'Naslov je prekratak.',
            'title.max' => 'Naslov je predug.',

            'message.required' => 'Poruka je obavezna.',
            'message.min' => 'Poruka mora sadržavati minimalno 30 znakova.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }


        receivedContact::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'message' => $request->message,
            'phone' => $request->phone,
            'title' => $request->title,
        ]);

        return redirect()->route("home");
    }

    public function getContact() {
        return view("contact");
    }

    public function getAllTickets() {
        $unprocessedTickets = receivedContact::where('processed', '=', 0)->get();
        $processedTickets = receivedContact::where('processed', '=', 1)->where('trashed', '=', 0)->get();
        return view("tickets")->with(['unprocessedTickets' => $unprocessedTickets, 'processedTickets' => $processedTickets]);
    }

    public function setTicketSolved(Request $request, $id) {    
        DB::table('received_contacts')->where('id', $id)->update(['processed' => 1]);
        return redirect()->route("getAllTickets");
    }

    public function setTicketTrashed(Request $request, $id) {    
        DB::table('received_contacts')->where('id', $id)->update(['trashed' => 1, 'processed' => 1]);
        return redirect()->route("getAllTickets");
    }

    public function getTicketInfo($id) {
        if (DB::table('received_contacts')->where('id', $id)->exists()) {
            $ticket = DB::table('received_contacts')->where('id', $id)->first();
            return view("ticket-view")->with("ticket", $ticket);
        } else {
            return view("not-found");
        }
    }

}
