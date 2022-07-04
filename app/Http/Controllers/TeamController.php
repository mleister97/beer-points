<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Resources\Json\JsonResource;

class TeamController extends Controller
{
    public function index(): Responsable {
        return new JsonResource(Team::all());
    }
}
