<?php

namespace App\Http\Controllers;

use App\Services\GroupByOwnersService;
use Illuminate\Http\Request;

class ChallengeController extends Controller
{
    public function getGroups(Request $req, GroupByOwnersService $gboServe)
    {
        $data = $req->all();

        return response()->json($gboServe->groupByOwners($data));
    }
}
