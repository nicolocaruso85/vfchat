<?php

namespace App\Models;

use App\Observers\GruppoObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Mpociot\Teamwork\TeamworkTeam;

#[ObservedBy([GruppoObserver::class])]
class Gruppo extends TeamworkTeam
{
}
