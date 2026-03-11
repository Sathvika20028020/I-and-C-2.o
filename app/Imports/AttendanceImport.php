<?php

namespace App\Imports;

use App\Models\Attendance;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;

class AttendanceImport implements ToModel, WithHeadingRow, WithCustomCsvSettings
{
    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ',',
            'enclosure' => '"',   // IMPORTANT
            'escape_character' => '\\',
            'input_encoding' => 'UTF-8',
        ];
    }
    public function model(array $row)
    {
      // dd($row);
        // Skip description rows like:
        // "Check-In Time: 2026-01-01 09:45:30"
        if (!isset($row['person_id']) || str_contains($row['person_id'], 'Check-In')) {
            return null;
        }
        $find = Attendance::where('person_id', trim($row['person_id'], "'"))
                            ->where('attendance_date', $row['date'])
                            ->first();
        if ($find) {
            return null;
        }

        // Handle "-" values
       $checkIn = !empty($row['check_in']) && $row['check_in'] !== '-'
            ? $row['check_in']
            : null;

        $checkOut = !empty($row['check_out']) && $row['check_out'] !== '-'
            ? $row['check_out']
            : null;


        return new Attendance([
            'person_id' => trim($row['person_id'], "'"),
            'name' => $row['name'],
            'department' => $row['department'],
            'attendance_date' => $row['date'],
            'shift' => $row['shift'],
            'timetable' => $row['timetable'],
            'status' => $row['attendance_status'],
            'check_in' => $checkIn,
            'check_out' => $checkOut,
            'late_minutes' => (int) filter_var($row['late'], FILTER_SANITIZE_NUMBER_INT),
            'early_leave_minutes' => (int) filter_var($row['early_leave'], FILTER_SANITIZE_NUMBER_INT),
            'attended_minutes' => (int) filter_var($row['attended'], FILTER_SANITIZE_NUMBER_INT),
        ]);
    }
}

