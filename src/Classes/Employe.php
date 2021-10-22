<?php

declare(strict_types=1);

namespace App\Classes;

// require_once 'Exceptions/RException.php';

use App\Interfaces\EmployeInterface;
use App\Interfaces\TravailleurInterface;
use App\Traits\AgeTrait;
use App\Traits\NomTrait;
use App\Traits\PrenomTrait;
use App\Exceptions\RException;

class Employe implements EmployeInterface, TravailleurInterface
{
  use NomTrait;
  use PrenomTrait;
  use AgeTrait;

  public const NB_EMPLOYE_MAX = 10;

  private static int $nbEmploye = 0;
  private int $anciennete;

  public function __construct(string $nom, string $prenom, int $age, int $anciennete)
  {
    $this->nom = $nom;
    $this->prenom = $prenom;
    $this->setAge($age);
    $this->setAnciennete($anciennete);
    self::incrementEmploye();
  }

  /**
   * Set the value of anciennete
   *
   * @returnself
   */
  public function setAnciennete(int $anciennete): self
  {
    if ($anciennete <= 40) {
      $this->anciennete = $anciennete;
    } else {
      $this->anciennete = 40;
    }
    return $this;
  }

  public function whoIam()
  {
    // return static::NB_EMPLOYE_MAX;
    return self::class;
  }

  public function setAge(int $age): self
  {
    if ($age >= 18 && $age <= 65) {
      echo "age OK <br>";
      $this->age = $age;
      return $this;
    } else {
      throw new RException("L'age n'est pas adapté", 1);
    }
  }

  private static function incrementEmploye()
  {
    if (self::$nbEmploye < self::NB_EMPLOYE_MAX) {
      self::$nbEmploye++;
    }
  }

  public static function pourcentage(): float
  {
    return 100 * self::$nbEmploye / self::NB_EMPLOYE_MAX;
  }

  public function presentation()
  {
    echo "Mon nom est {$this->nom}, mon prenom est {$this->prenom},
        j'ai {$this->age} ans
        je travail depuis {$this->anciennete} ans.\n\r";
  }

  public function travailler()
  {
    echo "Je travaille en tant qu'employé";
  }
}
