<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use App\Models\ComplaintCalculation;
use App\Models\PublicService;

class GrafikAduanContrller extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $q = request()->query->get('year');
            $chart = ComplaintCalculation::with([])
                ->where('year', '=', $q)
                ->first();
            $dataChart = [0, 0, 0];
            if (!$chart) {
                return response()->json([
                    'status' => 200,
                    'message' => 'success',
                    'data' => $dataChart
                ], 200);
            }
            $total = $chart->total;
            $process = $chart->process;
            $finish = $chart->finish;
            $unprocessed = $total - ($process + $finish);
            $dataChart = [
                $unprocessed, $process, $finish
            ];
            return response()->json([
                'status' => 200,
                'message' => 'success',
                'data' => $dataChart
            ], 200);
        }
        $complaintCalculations = ComplaintCalculation::with([])
            ->orderBy('year', 'DESC')->get();
        $years = $complaintCalculations->pluck('year');
        return view('grafikAduan', [
            'data' => $complaintCalculations,
            'years' => $years
        ]);
    }
}
