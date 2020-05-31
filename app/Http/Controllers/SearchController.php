<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Http\Resources\Contact as ContactResource;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * 検索条件から検索結果を返す
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $data = request()->validate([
            'searchTerm' => 'required'
        ]);

        $contact = Contact::search($data['searchTerm'])
            ->where('user_id', request()->user()->id)
            ->get();

        return ContactResource::collection($contact);
    }
}
