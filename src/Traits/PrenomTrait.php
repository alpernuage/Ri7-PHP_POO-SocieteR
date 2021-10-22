<?php

declare(strict_types=1);

namespace App\Traits;

trait PrenomTrait
{
  private string $prenom;

  /**
   * Get the value of prenom
   */
  public function getPrenom(): string
  {
    return $this->prenom;
  }

  /**
   * Set the value of prenom
   *
   * @returnself
   */
  public function setPrenom(string $prenom): string
  {
    $this->prenom = $prenom;

    return $this;
  }
}
