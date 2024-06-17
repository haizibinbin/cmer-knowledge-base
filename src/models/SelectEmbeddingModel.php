<?php

namespace Hbb\CmerKnowledgeBase\models;

class SelectEmbeddingModel extends BaseModel
{
    public string $index_name;

    public string $query;

    public int $top_k=30;

    public array $meta_filter=[];

    public bool $rerank=false;

    public function __construct(string $index_name, string $query, int $top_k=30, array $meta_filter=[], bool $rerank=false)
    {
        $this->index_name = $index_name;
        $this->query = $query;
        $this->top_k = $top_k;
        $this->meta_filter = $meta_filter;
        $this->rerank = $rerank;
    }

}
