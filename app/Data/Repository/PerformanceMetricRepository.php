<?php

namespace App\Data\Repository;

use App\Domain\Repository\PerformanceMetricRepositoryInterface;
use App\Models\PerformanceMetric;

class PerformanceMetricRepository implements PerformanceMetricRepositoryInterface {

    public function getAllResults() {
        return PerformanceMetric::all();
    }

    public function addResult(array $performanceMetrics) {
        foreach($performanceMetrics as $performanceMetric) {
            $performanceMetric->save();
        }
    }
}
