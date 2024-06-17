<?php

namespace Hbb\CmerKnowledgeBase\models;

class DeleteEmbeddingModel extends BaseModel
{
    public string $index_name;

    public string $uuid;

    public function __construct(string $index_name, string $uuid)
    {
        $this->index_name = $index_name;
        $this->uuid = $uuid;
    }

}
