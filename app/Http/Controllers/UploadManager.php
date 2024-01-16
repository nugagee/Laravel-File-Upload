<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class UploadManager extends Controller
{
    public function upload()
    {
        return view('upload');
    }

    public function uploadPost(Request $request)
    {
        $file = $request->file("file");
        echo 'File Name: ' . $file->getClientOriginalName();
        echo '<br>';
        echo 'File Extension: ' . $file->getClientOriginalExtension();
        echo '<br>';
        echo 'File Real Path: ' . $file->getRealPath();
        echo '<br>';
        echo 'File Size: ' . $file->getSize();
        echo '<br>';
        echo 'File Mime Type: ' . $file->getMimeType();
        echo '<br>';

        // THE VARIABLE NAME MUST BE THE SAME WITH THE FOLDER NAME IN THE PUBLIC FOLDER
        $destinationPath = "uploads";
        if ($file->move($destinationPath, $file->getClientOriginalName())) {
            echo "File Upload Success";
        } else {
            echo "Failed to upload file";
        }

    }
}
