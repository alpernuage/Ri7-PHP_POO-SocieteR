<?php

declare(strict_types=1);

namespace App\Traits;

trait AgeTrait
{
  private int $age;

  /**
   * Get the value of age
   */
  public function getAge(): int
  {
    return $this->age;
  }

  /**
   * Set the value of age
   *
   * @returnself
   */
  public function setAge(int $age): int
  {
    $this->age = $age;

    return $this;
  }
}
