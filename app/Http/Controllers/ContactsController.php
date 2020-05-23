<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Http\Requests\ContactsRequest;
use App\Http\Resources\Contact as ContactResource;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

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

        return ContactResource::collection( $request->user()->contacts);
    }

    /**
     * contactデータの表示
     *
     * @param Contact $contact
     * @return ContactResource
     */
    public function show(Contact $contact)
    {
        // リクエストのユーザーとContactに紐づくUserが紐づかない場合はステータスコード403を返す
        $this->authorize('view', $contact);

        return new ContactResource($contact);
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

        // createした後にContactモデルを返すので$contactに保存
        $contact = $request->user()->contacts()->create($saveData);

        // 保存したContactのAPIリソースとステータスコード201を返す
        return (new ContactResource($contact))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
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

        // 保存したContactのAPIリソースとステータスコード200を返す
        return (new ContactResource($contact))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
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

        // 削除後にステータスコード204を返す
        return response([], Response::HTTP_NO_CONTENT);
    }
}
