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
        if (request()->user()->isNot($contact->user)) {
            return response([], 403);
        }
        return $contact;
    }

    /**
     * contactデータの登録処理
     *
     * @param ContactsRequest $request
     */
    public function store(ContactsRequest $request)
    {
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
        if (request()->user()->isNot($contact->user)) {
            return response([], 403);
        }

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
        if (request()->user()->isNot($contact->user)) {
            return response([], 403);
        }
        $contact->delete();
    }
}
