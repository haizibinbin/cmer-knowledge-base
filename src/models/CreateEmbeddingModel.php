<?php

namespace Hbb\CmerKnowledgeBase\models;

/**
 * 新增知识库
 */
class CreateEmbeddingModel extends BaseModel
{
    /**
     * @var string 标签,关键词，可以为空
     */
    public string $tag="";

    public string $text;

    public string $index_name;

    public int $chunk_size=512;

    public string $prompt="";

    public array $meta=[];

    public function __construct(string $index_name, string $text)
    {
        $this->index_name = $index_name;
        $this->text = $text;
    }
}
