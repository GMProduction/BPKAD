<?php


namespace App\Http\Controllers;


use App\Helper\CustomController;
use App\Models\Category;
use App\Models\InformationCategory;
use App\Models\PublicAgencyInformation;
use Carbon\Carbon;

class InformationController extends CustomController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function periodic_information()
    {
        $data = Category::all();
        return view('info-berkala')->with(['data' => $data]);
    }

    public function periodic_information_by_slug($slug)
    {
        $category = Category::where('slug', '=', $slug)->firstOrFail();
        if ($category->id === 1) {
            $data = PublicAgencyInformation::all();
            return view('informasi')->with(['data' => $data, 'category' => $category]);
        }
        $current_year = (int)Carbon::now()->format('Y');
        $arr_year = [$current_year, ($current_year - 1), ($current_year - 2), ($current_year - 3)];
        $data = InformationCategory::with(['details' => function ($q) use ($arr_year) {
            return $q->whereIn('year', $arr_year);
        }])->where('category_id', '=', $category->id)
            ->get();
        $results = [];
        foreach ($data as $item) {
            $details = $item->details;
            $tmp['name'] = $item->name;
            $tmp_year = [];
            foreach ($arr_year as $year) {
                $document = $details->firstWhere('year', $year);
                $tmp_document = '-';
                if ($document) {
                    $tmp_year[$year] = ['document' => $document->target, 'type' => $document->type];
                    //                    $tmp_document = $document->type === 0 ? '<a href="' . $document->target . '" target="_blank">Link</a>' : '<a href="' . $document->target . '" target="_blank">Dokumen</a>';
                } else {
                    $tmp_year[$year] = ['document' => '-', 'type' => '-'];
                }
            }
            $tmp['year'] = $tmp_year;
            array_push($results, $tmp);
        }
        //        dd($results);
        return view('informasi-by-year')->with(['data' => $data, 'category' => $category, 'arr_year' => $arr_year, 'results' => $results]);
    }

    public function serta_merta_information()
    {
        $current_year = (int)Carbon::now()->format('Y');
        $arr_year = [$current_year, ($current_year - 1), ($current_year - 2), ($current_year - 3)];
        $data = InformationCategory::with(['details' => function ($q) use ($arr_year) {
            return $q->whereIn('year', $arr_year);
        }, 'category'])->whereHas('category', function ($q) {
            return $q->where('slug', '=', 'informasi-serta-merta');
        })
            ->get();
        $results = [];
        foreach ($data as $item) {
            $details = $item->details;
            $tmp['name'] = $item->name;
            $tmp_year = [];
            foreach ($arr_year as $year) {
                $document = $details->firstWhere('year', $year);
                if ($document) {
                    $tmp_year[$year] = ['document' => $document->target, 'type' => $document->type];
                } else {
                    $tmp_year[$year] = ['document' => '-', 'type' => '-'];
                }
            }
            $tmp['year'] = $tmp_year;
            array_push($results, $tmp);
        }
        return view('informasi-serta-merta')->with(['data' => $data, 'arr_year' => $arr_year, 'results' => $results]);
    }

    public function setiap_saat_information()
    {
        $current_year = (int)Carbon::now()->format('Y');
        $arr_year = [$current_year, ($current_year - 1), ($current_year - 2), ($current_year - 3)];
        $data = InformationCategory::with(['details' => function ($q) use ($arr_year) {
            return $q->whereIn('year', $arr_year);
        }, 'category'])->whereHas('category', function ($q) {
            return $q->where('slug', '=', 'informasi-setiap-saat');
        })
            ->get();
        $results = [];
        foreach ($data as $item) {
            $details = $item->details;
            $tmp['name'] = $item->name;
            $tmp_year = [];
            foreach ($arr_year as $year) {
                $document = $details->firstWhere('year', $year);
                if ($document) {
                    $tmp_year[$year] = ['document' => $document->target, 'type' => $document->type];
                } else {
                    $tmp_year[$year] = ['document' => '-', 'type' => '-'];
                }
            }
            $tmp['year'] = $tmp_year;
            array_push($results, $tmp);
        }
        return view('informasi-setiap-saat')->with(['data' => $data, 'arr_year' => $arr_year, 'results' => $results]);
    }

    public function dikecualikan_information()
    {
        $current_year = (int)Carbon::now()->format('Y');
        $arr_year = [$current_year, ($current_year - 1), ($current_year - 2), ($current_year - 3)];
        $data = InformationCategory::with(['details' => function ($q) use ($arr_year) {
            return $q->whereIn('year', $arr_year);
        }, 'category'])->whereHas('category', function ($q) {
            return $q->where('slug', '=', 'informasi-di-kecualikan');
        })
            ->get();
        $results = [];
        foreach ($data as $item) {
            $details = $item->details;
            $tmp['name'] = $item->name;
            $tmp_year = [];
            foreach ($arr_year as $year) {
                $document = $details->firstWhere('year', $year);
                if ($document) {
                    $tmp_year[$year] = ['document' => $document->target, 'type' => $document->type];
                } else {
                    $tmp_year[$year] = ['document' => '-', 'type' => '-'];
                }
            }
            $tmp['year'] = $tmp_year;
            array_push($results, $tmp);
        }
        return view('informasi-di-kecualikan')->with(['data' => $data, 'arr_year' => $arr_year, 'results' => $results]);
    }

    public function dasarhukumPPID()
    {
        return view('dasarhukumppid');
    }
}
