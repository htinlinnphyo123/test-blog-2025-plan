<?php

namespace BasicDashboard\Web\Pages\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 *
 * An EditPageResource is implement for sending data to edit page of article resource.
 * Generated By Manual
 * @author LinnLinn
 *
 */

class EditPageResource extends JsonResource
{
    public function toArray($request):array
    {
        $this['thumbnail'] ??= '/Default/default_article_pic.jpg';
        return [
            "id" =>customEncoder($this->id),
            "title"=>$this->title,
            'title_other' => $this->title_other,
            "slug" => $this->slug,
            'description' => $this->description,
            'description_other'=>$this->description_other,
            'thumbnail' => retrievePublicFile($this->thumbnail),
            'createdBy' => $this->createdBy->name,
            'writtenBy' => $this->writtenBy->id,
            'is_published'=>$this->is_published,
            'is_banner'=>$this->is_banner,
            'is_highlighed'=>$this->is_highlighed,
            'date'=> $this->date ? date('m/d/Y', strtotime($this->date)) : null,
            'type' => $this->type,
            'link' => retrievePublicFiles($this->link),
        ];
    }
}
