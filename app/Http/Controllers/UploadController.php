<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function store(Request $request)
    {
        if ($request->hasFile('courseFile')) {
            $file = $request->file('courseFile');
            $filename = $file->getClientOriginalName();
            $folder = uniqid() . '-' . now()->timestamp;
            $file->storeAs('avatars/tmp' . $folder, $filename);

            return $folder;
        }

        return '';
    }
}
