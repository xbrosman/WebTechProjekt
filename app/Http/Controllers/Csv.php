<?php

namespace App\Http\Controllers;

use App\Models\Logs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class Csv extends Controller
{

    public function createCsv(Request $request)
    {

        $fileName = 'export.csv';
        $logs = Logs::all();

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('user_id', 'input', 'updated_at');


        $callback = function() use($logs, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);
            $output = fgets($file);
            var_dump($output);
            echo("a");

            foreach ($logs as $log) {
                //$row['id']  = $log->title;
                $row['user_id']    = $log->user_id;
                $row['input']    = $log->input;
                $row['updated_at']  = $log->updated_at;

                fputcsv($file, array($row['user_id'], $row['input'], $row['updated_at']));
            }
            return fgets($file);
        };

        function str_putcsv($input, $delimiter = ',', $enclosure = '"')
        {
            // Open a memory "file" for read/write...
            $fp = fopen('php://temp', 'r+');
            // ... write the $input array to the "file" using fputcsv()...
            fputcsv($fp, $input, $delimiter, $enclosure);
            // ... rewind the "file" so we can read what we just wrote...
            rewind($fp);
            // ... read the entire line into a variable...
            $data = fread($fp, 1048576);
            // ... close the "file"...
            fclose($fp);
            // ... and return the $data to the caller, with the trailing newline from fgets() removed.
            return rtrim($data, "\n");
        }
        $csvString = '';
        $csvString .= str_putcsv($columns);
        foreach ($logs as $log) {
            //$row['id']  = $log->title;
            $row['user_id']    = $log->user_id;
            $row['input']    = $log->input;
            $row['updated_at']  = $log->updated_at;

            $csvString .= str_putcsv(array($row['user_id'], $row['input'], $row['updated_at']));
        }

        Storage::disk('public')->put("export.csv",$csvString);

        return response()->stream($callback, 200, $headers);
    }
    //
}
