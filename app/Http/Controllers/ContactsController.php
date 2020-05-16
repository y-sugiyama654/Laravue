<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Http\Requests\ContactsRequest;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function store(ContactsRequest $request)
    {
        Contact::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'birthday' => $request->birthday,
            'company'  => $request->company,
        ]);
    }
}
