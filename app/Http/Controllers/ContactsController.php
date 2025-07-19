<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactsController extends Controller
{
    public function buyercontact()
    {
        $buyerContacts = DB::table('buyer_contacts')->get();
        return view('Contacts/buyer-contacts', compact('buyerContacts'));
    }

    public function deleteBuyerContact($id)
    {
        $deleted = DB::table('buyer_contacts')->where('id', $id)->delete();
        return response()->json([
            'success' => $deleted ? true : false
        ]);
    }
}
