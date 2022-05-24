<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
<<<<<<< HEAD
use App\Mail\LogsMail;
=======
>>>>>>> 6bac106 (feat: save and download csv file)
=======
use App\Mail\LogsMail;
>>>>>>> 6cf050e (feat: sending mail to webtechprojekt2022@gmail.com)
use App\Models\Logs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
<<<<<<< HEAD
use Illuminate\Support\Facades\Config;

class Csv extends Controller
{
    public function createCsv(Request $request)
    {
        if(isset(Auth::user()->email)){
            $fileName = 'export.csv';
            $logs = Logs::all();

            $headers = array(
                "Content-type" => "text/csv",
                "Content-Disposition" => "attachment; filename=$fileName",
                "Pragma" => "no-cache",
                "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
                "Expires" => "0"
            );

            $columns = array('user_id', 'input', 'updated_at', 'response');


            $callback = function () use ($logs, $columns) {
                $file = fopen('php://output', 'w');
                fputcsv($file, $columns);
                $output = fgets($file);
                var_dump($output);
                echo("a");

                foreach ($logs as $log) {
                    //$row['id']  = $log->title;
                    $row['user_id'] = $log->user_id;
                    $row['input'] = $log->input;
                    $row['updated_at'] = $log->updated_at;
                    $row['response'] = $log->response;

                    fputcsv($file, array($row['user_id'], $row['input'], $row['updated_at'], $row['response']));
                }
                return fgets($file);
            };

            return response()->stream($callback, 200, $headers);
        }
        return view("login");
    }

    public function sendCsv(){

        if(isset(Auth::user()->email)) {
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

            $logs = Logs::all();

            $columns = array('user_id', 'input', 'updated_at', 'response');
            $csvString = '';
            $csvString .= str_putcsv($columns)."\n";
            foreach ($logs as $log) {
                //$row['id']  = $log->title;
                $row['user_id'] = $log->user_id;
                $row['input'] = $log->input;
                $row['updated_at'] = $log->updated_at;
                $row['response'] = $log->response;


                $csvString .= str_putcsv(array($row['user_id'], $row['input'], $row['updated_at'], $row['response']))."\n";
            }

            Storage::disk('local')->put('public/webtech_projekt_log.csv', $csvString);



            $myEmail = Config::get('mail.mail_to');
            Mail::to($myEmail)->send(new LogsMail());

            return view("successLogin")->with(["mailSuccess"=>"Odoslaný"]);
        } else
            return view("login");
=======

class Csv extends Controller
{
    public function createCsv(Request $request)
    {
        if(isset(Auth::user()->email)){
            $fileName = 'export.csv';
            $logs = Logs::all();

            $headers = array(
                "Content-type" => "text/csv",
                "Content-Disposition" => "attachment; filename=$fileName",
                "Pragma" => "no-cache",
                "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
                "Expires" => "0"
            );

            $columns = array('user_id', 'input', 'updated_at', 'response');


            $callback = function () use ($logs, $columns) {
                $file = fopen('php://output', 'w');
                fputcsv($file, $columns);
                $output = fgets($file);
                var_dump($output);
                echo("a");

                foreach ($logs as $log) {
                    //$row['id']  = $log->title;
                    $row['user_id'] = $log->user_id;
                    $row['input'] = $log->input;
                    $row['updated_at'] = $log->updated_at;
                    $row['response'] = $log->response;

                    fputcsv($file, array($row['user_id'], $row['input'], $row['updated_at'], $row['response']));
                }
                return fgets($file);
            };

            return response()->stream($callback, 200, $headers);
        }
        return view("login");
    }

    public function sendCsv(){

        if(isset(Auth::user()->email)) {
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

            $logs = Logs::all();

            $columns = array('user_id', 'input', 'updated_at', 'response');
            $csvString = '';
            $csvString .= str_putcsv($columns)."\n";
            foreach ($logs as $log) {
                //$row['id']  = $log->title;
                $row['user_id'] = $log->user_id;
                $row['input'] = $log->input;
                $row['updated_at'] = $log->updated_at;
                $row['response'] = $log->response;


                $csvString .= str_putcsv(array($row['user_id'], $row['input'], $row['updated_at'], $row['response']))."\n";
            }

            Storage::disk('local')->put('public/webtech_projekt_log.csv', $csvString);

            $myEmail = 'webtechprojekt2022@gmail.com';
            Mail::to($myEmail)->send(new LogsMail());

<<<<<<< HEAD
<<<<<<< HEAD
        return response()->stream($callback, 200, $headers);
>>>>>>> 6bac106 (feat: save and download csv file)
=======
            return view("successLogin");
=======
            return view("successLogin")->with(["mailSuccess"=>"Odoslaný"]);
>>>>>>> 68a05c0 (feat: mail components)
        } else
            return view("login");
>>>>>>> 6cf050e (feat: sending mail to webtechprojekt2022@gmail.com)
    }
    //
}
