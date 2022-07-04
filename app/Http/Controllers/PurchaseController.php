<?php

namespace App\Http\Controllers;

use App\Http\Requests\PurchaseRequest;
use App\Models\Drink;
use App\Models\Purchase;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class PurchaseController extends Controller
{

    public function __construct()
    {
        $this->middleware('authorized');
    }

    public function index(): JsonResponse {
        $points = DB::table('purchases')
            ->select('purchases.team_id')
            ->selectRaw('sum(purchases.amount * drinks.points) as sum')
            ->join('drinks', 'drinks.id', 'purchases.drink_id')
            ->groupBy('purchases.team_id')
            ->get();

        return new JsonResponse(['points' => $points], 200);
    }

    public function store(PurchaseRequest $request): JsonResponse
    {
        Purchase::insert($request->validated()['purchases']);
        return new JsonResponse('', 200);
    }
}
