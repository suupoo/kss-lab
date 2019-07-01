<?php

namespace App\Http\Controllers;

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
     * @param int $file
     * @param int $forum
     * @return void
     */
    public function destroy(int $forum, int $file)
    {
        $entFile = File::find($file);
        $entForum  = Forum::find($forum);

        if($entForum && $entFile){
            $entForum->files()
                ->detach($file);
            $entFile->delete();
        }
        return redirect('forum/'.$entFile->id);
    }
}
