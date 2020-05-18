<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Http\Requests\ContactsRequest;
use Illuminate\Http\Request;

class ContactsController extends Controller
{

    /**
     * contactデータの表示
     *
     * @param Contact $contact
     * @return Contact
     */
    public function show(Contact $contact)
    {
        return $contact;
    }

    /**
     * contactデータの登録処理
     *
     * @param ContactsRequest $request
     */
    public function store(ContactsRequest $request)
    {
        Contact::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'birthday' => $request->birthday,
            'company'  => $request->company,
        ]);
    }

    /**
     * contactデータの編集処理
     *
     * @param Contact $contact
     * @param ContactsRequest $request
     */
    public function update(Contact $contact, ContactsRequest $request)
    {
        $updateData = [
            'name'     => $request->name,
            'email'    => $request->email,
            'birthday' => $request->birthday,
            'company'  => $request->company,
        ];

        $contact->update($updateData);
    }
}
