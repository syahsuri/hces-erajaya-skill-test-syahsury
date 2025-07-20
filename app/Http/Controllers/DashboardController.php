<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Company, Division,Employee, Level, Gender, EmployeePeriod};
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.index', [
            'title' => 'Dashboard',

            // Card Data
            'totalEmployees' => Employee::count(),
            'totalCompanies' => Company::count(),
            'totalDivisions' => Division::count(),
            'totalLevels' => Level::count(),

            // Chart Data
            'companies' => Company::all(),
            'divisions' => Division::all(),
            'levels' => Level::all(),
            'genders' => Gender::all(),
        ]);
    }

    public function EmployeeChart(Request $request)
    {
        $query = EmployeePeriod::query();

        if ($request->company_id) {
            $query->where('company_id', $request->company_id);
        }
        if ($request->division_id) {
            $query->where('division_id', $request->division_id);
        }
        if ($request->level_id) {
            $query->where('level_id', $request->level_id);
        }
        if ($request->gender_id) {
            $query->where('gender_id', $request->gender_id);
        }

        $data = $query
            ->select('period', DB::raw('count(*) as total'))
            ->groupBy('period')
            ->orderBy('period')
            ->get();

        return response()->json($data);
    }
}
