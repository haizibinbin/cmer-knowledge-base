<?php

namespace Hbb\CmerKnowledgeBase\models;

class SelectEmbeddingEsModel extends BaseModel
{
    public string $index_name;
    public string $query;
    public int $page=1;
    public int $limit=10;
    /**
     * @var array $meta_filter
     * 扩展字段,自定义字段过滤
     */
    public array $meta_filter=[];

    public function __construct(string $index_name, string $query, int $page=1, int $limit=10, array $meta_filter=[])
    {
        $this->index_name = $index_name;
        $this->query = $query;
        $this->page = $page;
        $this->limit = $limit;
        $this->meta_filter = $meta_filter;
    }
}
