<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Packages\Common\Infrastructure\Entities\File;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param string $encId 暗号化されたID
     * @return void
     */
    public function show(string $encId)
    {
        $id = Crypt::decryptString($encId);
        $file = File::find($id);

        if($file){
            return Storage::download($file->path);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $encId, int $forum_id)
    {
        $id = Crypt::decryptString($encId);
        $file = File::find($id)->delete();
    }
}
