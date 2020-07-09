<?php
namespace App\Helpers;

use App\Jobs\EncryptFile;
use App\Jobs\MoveFileToS3;
use Illuminate\Support\Facades\File;

use Storage;

class UploadFile {
    public static function uploadLocal($file){
        $fileName = substr(md5($file->getClientOriginalName() . date("Y-m-d h:i:sa")), 15) . '.' . $file->getClientOriginalExtension();
        $file->move('upload', $fileName);
        $fileName = '/upload/' . $fileName;
        return $fileName;
    }

    public static function deleteLocal($url){
        return base_path().'/public'.$url;
    }

    // public static function uploadLocal($file){
    //     $image = $file;
    //     $extension = $image->getClientOriginalExtension();
    //     Storage::disk('public')->put($image->getFilename().'.'.$extension,  File::get($image));
    //     return '/uploads/'.$image->getFilename().'.'.time().$extension;
    // }

    public static function upload($file) {
        $url = 'https://s3.' . env('AWS_DEFAULT_REGION') . '.amazonaws.com/' . env('AWS_BUCKET') . '/';
        $fileName = substr(md5($file->getClientOriginalName() . date("Y-m-d h:i:sa")), 15) . '.' . $file->getClientOriginalExtension();
        Storage::disk('s3')->put($fileName, file_get_contents($file));
        return $url . $fileName;
    }
 
    public static function delete($imageName) {
        Storage::disk('s3')->delete($imageName);
    }

    public static function getAllFile(){
        $files =  Storage::disk('s3')->files();
        return $files;
    }
}
?>
