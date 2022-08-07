<?php

namespace App\Services;

class FileService
{
    public function upload($file, $path = '')
    {
        if ($file) {
            $fileName = time().'_'.uniqid().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads'.str_start($path, '/')), $fileName);

            return 'uploads'.str_start($path, '/').'/'.$fileName;
        }

        return null;
    }
}
