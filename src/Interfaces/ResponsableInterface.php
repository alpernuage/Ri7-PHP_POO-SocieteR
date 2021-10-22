<?php

declare(strict_types=1);

namespace App\Interfaces;

use App\Classes\Employe;

interface ResponsableInterface
{
  public function ajouterEmploye(Employe $employe);
  public function faireTravailler(TravailleurInterface $travailleur);
}
