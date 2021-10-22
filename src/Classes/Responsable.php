<?php

declare(strict_types=1);

namespace App\Classes;

use App\Interfaces\ResponsableInterface;
use App\Interfaces\TravailleurInterface;
use App\Classes\Employe;

class Responsable extends Employe implements ResponsableInterface
{
  public const NB_EMPLOYE_MAX = 8;

  private array $equipe = [];

  public function getEquipe(): array
  {
    return $this->equipe;
  }

  public function setEquipe(array $equipe): self
  {
    $this->equipe = $equipe;

    return $this;
  }

  public function ajouterEmploye(Employe $employe)
  {
    if (!in_array($employe, $this->equipe, true)) {
      $this->equipe[] = $employe;
    }
  }

  public function faireTravailler(TravailleurInterface $travailleur)
  {
    return $travailleur->travailler();
  }
}
