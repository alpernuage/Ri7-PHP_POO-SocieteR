<?php

declare(strict_types=1);

namespace App\Traits;

trait NomTrait
{
  private string $nom;

  /**
   * Get the value of nom
   */
  public function getNom(): string
  {
    return $this->nom;
  }

  /**
   * Set the value of nom
   *
   * @returnself
   */
  public function setNom(string $nom): string
  {
    $this->nom = $nom;

    return $this;
  }
}
