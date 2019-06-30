<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Packages\Common\Infrastructure\Entities\File;
use Illuminate\Support\Facades\Storage;
use Packages\Ksslab\Forum\Domain\Entity\TableModels\Forum;

class FileController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param int $file_id
     * @return void
     */
    public function show(int $file_id)
    {
        $file = File::find($file_id);

        if($file){
            return Storage::download($file->path);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $file_id
     * @param $forum_id
     * @return void
     */
    public function destroy(int $file_id, $forum_id)
    {
        dd($forum_id);
    }
}
