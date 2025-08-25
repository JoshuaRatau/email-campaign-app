<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\JsonResponse;

class ContactApiController extends Controller
{
    /**
     * Return all contacts (id, name, email, contact_list_id, timestamps).
     */
    public function index(): JsonResponse
    {
        return response()->json(Contact::all());
    }
}