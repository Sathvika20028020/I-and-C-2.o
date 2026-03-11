<?php

namespace App\Helpers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExportHelper
{
    public static function applyFilters(Request $request, $query)
    {
        if ($request->district) {
            $query->where('district_name', $request->district);
        }
        if ($request->gender) {
            $query->where('gender', $request->gender);
        }
        if ($request->social) {
            $query->where('social_category', $request->social);
        }
        if ($request->majoractivity) {
            $query->where('major_activity', $request->majoractivity);
        }

        return $query;
    }

    public static function convertToCsv(array $headers, array $rows)
    {
        $csv = implode(',', $headers) . "\n";
        foreach ($rows as $row) {
            $csv .= implode(',', array_map(fn($value) => "\"$value\"", $row)) . "\n";
        }
        return $csv;
    }
}
