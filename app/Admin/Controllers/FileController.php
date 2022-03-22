<?php

namespace App\Admin\Controllers;

use Illuminate\Http\Request;


class FileController extends BaseController
{


    public function upload(Request $request)
    {

        $images = $request->file('upload');

        if(!$images->isValid()){
            return response('');
        }

//        $extension = $images->getClientOriginalExtension();
        $urls = '/upload'.DIRECTORY_SEPARATOR.$images->store('editor','admin');


        return response($urls);
    }



    public function getFileName($extension)
    {
        $shuffle = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        str_shuffle($shuffle);
        return substr($shuffle,1,11).time().'.'.$extension;
    }

}
