<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use Illuminate\Http\JsonResponse;

class CampaignApiController extends Controller
{
    /**
     * Return all campaigns (id, title, body, contact_list_id, timestamps).
     */
    public function index(): JsonResponse
    {
        return response()->json(Campaign::all());
    }

    /**
     * Return campaigns **with** their linked contact list **and** the contacts inside that list.
     * Example JSON structure:
     * [
     *   {
     *     "id": 1,
     *     "title": "Summer Promo",
     *     "body": "50 % off ...",
     *     "contact_list": {
     *       "id": 3,
     *       "name": "VIP Customers",
     *       "contacts": [
     *         { "id": 7, "name": "Alice", "email": "alice@example.com" },
     *         ...
     *       ]
     *     }
     *   }
     * ]
     */
    public function withContacts(): JsonResponse
    {
        $campaigns = Campaign::with('contactList.contacts')
            ->get()
            ->makeHidden(['contact_list_id']); // hide duplicate FK

        return response()->json($campaigns);
    }
}
