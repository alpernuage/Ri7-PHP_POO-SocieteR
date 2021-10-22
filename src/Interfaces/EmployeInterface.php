<?php

declare(strict_types=1);

namespace App\Interfaces;

interface EmployeInterface
{
  public function __construct(string $nom, string $prenom, int $age, int $anciennete);
  public static function pourcentage(): float;
  public function presentation();
}
