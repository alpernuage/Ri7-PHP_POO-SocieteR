<?php

declare(strict_types=1);

namespace App\Classes;

use App\Interfaces\TravailleurInterface;
use App\Traits\AgeTrait;
use App\Traits\NomTrait;
use App\Traits\PrenomTrait;

class Stagiaire implements TravailleurInterface
{
  use NomTrait;
  use PrenomTrait;
  use AgeTrait;

  public function travailler()
  {
    echo "Je travaille en tant que stagiaire";
  }
}
