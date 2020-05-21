<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Http\Requests\ContactsRequest;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    /**
     * contact一覧データの表示
     *
     * @param Request $request
     * @return Contact
     */
    public function index(Request $request)
    {
        $this->authorize('viewAny', Contact::class);

        return $request->user()->contacts;
    }

    /**
     * contactデータの表示
     *
     * @param Contact $contact
     * @return Contact
     */
    public function show(Contact $contact)
    {
        // リクエストのユーザーとContactに紐づくUserが紐づかない場合はステータスコード403を返す
        $this->authorize('view', $contact);

        return $contact;
    }

    /**
     * contactデータの登録処理
     *
     * @param ContactsRequest $request
     */
    public function store(ContactsRequest $request)
    {
        $this->authorize('create', Contact::class);

        $saveData = [
            'name'     => $request->name,
            'email'    => $request->email,
            'birthday' => $request->birthday,
            'company'  => $request->company,
        ];

        $request->user()->contacts()->create($saveData);
    }

    /**
     * contactデータの編集処理
     *
     * @param Contact $contact
     * @param ContactsRequest $request
     */
    public function update(Contact $contact, ContactsRequest $request)
    {
        // リクエストのユーザーとContactに紐づくUserが紐づかない場合はステータスコード403を返す
        $this->authorize('update', $contact);

        $updateData = [
            'name'     => $request->name,
            'email'    => $request->email,
            'birthday' => $request->birthday,
            'company'  => $request->company,
        ];

        $contact->update($updateData);
    }

    /**
     * ccontactデータの削除処理
     *
     * @param Contact $contact
     * @throws \Exception
     */
    public function destroy(Contact $contact)
    {
        // リクエストのユーザーとContactに紐づくUserが紐づかない場合はステータスコード403を返す
        $this->authorize('delete', $contact);

        $contact->delete();
    }
}
