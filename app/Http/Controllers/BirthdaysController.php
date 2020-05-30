<?php

namespace App\Http\Controllers;

use App\Http\Resources\Contact;
use Illuminate\Http\Request;

class BirthdaysController extends Controller
{
    /**
     * 現在月と一致する誕生月のcontact情報を表示
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $contacts = request()->user()->contacts()->birthdays()->get();

        return Contact::collection($contacts);
    }
}
