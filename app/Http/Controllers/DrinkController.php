<?php

namespace App\Http\Controllers;

use App\Models\Drink;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Resources\Json\JsonResource;

class DrinkController extends Controller
{
    public function index(): Responsable {
        return new JsonResource(Drink::all());
    }
}
