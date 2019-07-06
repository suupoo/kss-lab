<?php
namespace App\Facades\Components;

class FileCheck
{
    /**
     * ファイルサイズが指定した最大サイズより小さいかどうか
     *
     * @param int $maxSize
     * @param int $fileSize
     * @return bool
     */
    public function isLowerMaxSize(int $maxSize, int $fileSize){
        return ($maxSize > $fileSize)
            ? true
            : false;
    }

    /**
     * ファイルが指定した拡張子かどうか
     *
     * @param array $extensions
     * @param string $fileExtension
     * @return bool
     */
    public function isExtension(array $extensions, string $fileExtension)
    {
        return in_array($fileExtension, $extensions )
            ? true
            : false;
    }

}