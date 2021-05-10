<?php

namespace App\Domain\Repository;

use App\Models\PerformanceMetric;

interface PerformanceMetricRepositoryInterface {

    public function getAllResults();

    /**
     * @param PerformanceMetric[] $performanceMetrics
     * @return mixed
     */
    public function addResult(array $performanceMetrics);
}
