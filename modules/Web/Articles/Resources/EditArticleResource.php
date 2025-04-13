<?php

namespace BasicDashboard\Web\Articles\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 *
 * An EditArticleResource is implement for sending data to edit page of article resource.
 * Generated By Manual
 * @author LinnLinn
 *
 */

class EditArticleResource extends JsonResource
{
    public function toArray($request): array
    {
        $this['thumbnail'] ??= '/Default/default_article_pic.jpg';
        return [
            "id" => customEncoder($this->id),
            "title" => $this->title,
            'description' => $this->description,
            'category' => $this->category_id,
            'keywords' => $this->keywords,
            'show_thumbnail' => $this->show_thumbnail,
            'subcategory' => $this->subcategory_id,
            'thumbnail' => retrievePublicFile($this->thumbnail),
            'type' => $this->type,
            'link' => retrievePublicFiles($this->link),
        ];
    }
}
