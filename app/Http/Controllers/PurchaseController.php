<?php

namespace App\Http\Controllers;

use App\Events\PointsAdded;
use App\Http\Requests\PurchaseRequest;
use App\Models\Drink;
use App\Models\Purchase;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Arr;
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

        $now = Carbon::now();
        $purchases = $request->validated()['purchases'];
        $team_id = $request->validated()['team_id'];
        $results = array();
        $drink_ids = Arr::pluck($purchases, 'drink_id');
        $drink_points = Drink::whereId($drink_ids)->get(['id', 'points']);
        $total_points = 0;

        foreach ($purchases as $value) {
            $points_per_drink = $drink_points->firstWhere('id', $value['drink_id'])['points'];
            $results[] = [
                'created_at' => $now,
                'updated_at' => $now,
                'team_id' => $team_id,
                'drink_id' => $value['drink_id'],
                'amount' => $value['amount']
                ];
            $total_points += $value['amount'] * $points_per_drink;
        }

        Purchase::insert($results);
        event(new PointsAdded($team_id, $total_points));
        return new JsonResponse('', 200);
    }
}
