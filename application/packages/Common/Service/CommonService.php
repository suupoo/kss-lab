<?php

namespace Packages\Common\Service;

use App\Facades\FileCheck;
use Illuminate\Support\Facades\Auth;
use Packages\Common\Infrastructure\Entities\File;

class CommonService
{
    /**
     * 渡されたエンティティのIDと紐づけてファイルをアップロードします。
     *
     * @param $entity
     * @param $file
     * @param array $options
     * @return File | false
     */
    public function fileUpload($entity, $file, $options = []){
        // アップロード先が指定されていない
        if( !array_key_exists('parDir', $options) )return false;

        // maxByteSize
        if( !array_key_exists('maxByteSize' , $options)
            && FileCheck::isLowerMaxSize( $options['maxByteSize'], $file->getSize() )
        )return false;

        // extensions
        if( !array_key_exists('extensions' , $options)
            && FileCheck::isExtension( $options['extensions'], $file->getExtension() )
        )return false;

        $size = $file->getSize();
        $path = $file->store($options['parDir'].'/'.$entity->id);

        $pFile = [
            File::PATH      => $path,
            File::SIZE      => $size,
            File::EXTENSION => $file->extension(),
            File::EDIT_USER => Auth::id(),
            File::ENABLE    => true,
        ];

        $entFile  = (new File())
            ->fill($pFile)
            ->save();

        return $entFile;
    }

}