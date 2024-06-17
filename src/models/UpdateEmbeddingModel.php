<?php

namespace Hbb\CmerKnowledgeBase\models;

/**
 * 修改知识库
 */
class UpdateEmbeddingModel extends CreateEmbeddingModel
{
    public string $uuid;

    public function __construct(string $index_name, string $text, string $uuid)
    {
        parent::__construct($index_name, $text);
        $this->uuid = $uuid;
    }
}
