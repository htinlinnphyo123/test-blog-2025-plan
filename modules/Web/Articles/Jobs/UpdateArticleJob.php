<?php

namespace BasicDashboard\Web\Articles\Jobs;

use Illuminate\Support\Facades\Storage;

class UpdateArticleJob
{
    protected $disk = 'digitalocean';

    /**
     * Article type changed and all links deleted by Backend
     * @param mixed $modelLinks
     * @return array
     */
    public function typeChangedAndAllLinkDeleted($modelLinks): array
    {
        foreach($modelLinks as $link){
            Storage::disk($this->disk)->delete($link);
        }
        return [];
    }

    /**
     * If some links are deleted by user, then remove from db and digitalocean
     * @param array $orgMediaArray
     * @param array $deletedMediaArray
     * @return array
     */
    public function typeNotChangeAndSomeLinkDeleted(array $orgMediaArray,array $deletedMediaArray): array
    {
        $filteredArray = [];
        // \Log::info($orgMediaArray,$deletedMediaArray);
        foreach ($orgMediaArray as $index => $element) {
            if (! in_array($index, $deletedMediaArray)) {
                $filteredArray[] = $element;
            } else {
                //will be remove in digitalocean if the item is deleted
                Storage::disk($this->disk)->delete($element);
            }
        }
        return $filteredArray;
    }

    /**
     * If new thumbnail is uploaded , then delete the old one and updated the new one
     * @param array $request
     * @param string|null $originalThumbnail
     * @param string $path
     * @return string|null
     */
    public function updateThumbnail(array $request,string|null $originalThumbnail,string $path): string|null
    {
        if (isset($request['thumbnail']) && $originalThumbnail) {
            Storage::disk($this->disk)->delete($originalThumbnail);
        }
        return isset($request['thumbnail']) ? uploadImageToDigitalOcean($request['thumbnail'], $path) : $originalThumbnail;
    }

    public function newLinksAddAndGeneratePresignedUrlAndPath($linkCount, $path, $orgMediaArray)
    {
        $generatedArray = Storage::generatePresignedUrls($linkCount, $path);

        //DB
        $generatedPaths = array_column($generatedArray, 'path'); // that return from presignedURL  
        $dbPath      = count($generatedPaths) > 0 ? array_merge($orgMediaArray, $generatedPaths) : $orgMediaArray; //If new files are uploaded then merge with old files
        
        //Frontend
        $frontendUrl = array_column($generatedArray, 'url'); //to return to frontend
        return [
            'dbPath' => $dbPath, 
            'frontendUrl' => $frontendUrl
        ];
    }

}