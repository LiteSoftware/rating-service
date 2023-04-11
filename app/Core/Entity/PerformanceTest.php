<?php

namespace App\Core\Entity;

use JsonSerializable;

class PerformanceTest implements JsonSerializable
{
    private int $testId;

    private array $steps;

    public function getTestId(): int
    {
        return $this->testId;
    }

    public function setTestId(int $testId): void
    {
        $this->testId = $testId;
    }

    public function getSteps(): array
    {
        return $this->steps;
    }

    public function setSteps(array $steps): void
    {
        $this->steps[] = $steps;
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}
