<?php

namespace App\Http\Controllers;

use App\Core\Entity\PerformanceTest;
use App\Http\Controllers\Interfaces\RatingControllerInterface;
use App\Models\PerformanceMetric;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RatingController extends Controller implements RatingControllerInterface
{
    public function addResult(Request $request): JsonResponse
    {
        $deviceBrand = $request->headers->get('X-DEVICE-BRAND');
        $deviceModel = $request->headers->get('X-DEVICE-MODEL');
        $modelId = 5;

        $test1 = new PerformanceTest();
        $test1->setTestId(23);
        $test1->setSteps(['stepId' => 'ID0', 'startTime' => '12', 'endTime' => '15']);
        $test1->setSteps(['stepId' => 'ID1', 'startTime' => '12', 'endTime' => '15']);

        $jsonData = $request->getContent();
        $tests = json_decode($jsonData);

        $performanceMetrics = [];
        foreach ($tests as $test) {
            $timeStep = 0;
            foreach ($test->testSteps as $step) {
                $timeStep += $step->endTime - $step->startTime;
            }
            $findTest = DB::table('performance_metrics')->where('model_id', $modelId)
                ->where('test_id', $test->testId)
                ->get();
            if (isset($findTest[0]->time)) {
                if ($timeStep < $findTest[0]->time) {
                    $performanceMetric = PerformanceMetric::find($findTest[0]->id);
                    $performanceMetric->time = $timeStep;
                    $performanceMetric->save();
                }
            } else {
                $performanceMetric = new PerformanceMetric();
                $performanceMetric->testId = $test->testId;
                $performanceMetric->modelId = $modelId;
                $performanceMetric->time = $timeStep;
                $performanceMetric->save();
            }
//            array_push($performanceMetrics, $performanceMetric);
        }
//        print_r($performanceMetrics);

        return response()->json([
            'message' => 'Performance metrics added'
        ], 200);
    }

    public function getRating(Request $request): JsonResponse
    {
//        Get rating table
        return response()->json([
            'message' => 'view rating'
        ], 200);
    }
}
