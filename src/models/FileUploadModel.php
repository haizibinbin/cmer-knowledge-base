<?php

namespace Hbb\CmerKnowledgeBase\models;

/**
 * 通过文件导入知识库
 */
class FileUploadModel extends FileDeleteModel
{
    /**
     * @var string $callback
     * 导入完成后的回调通知URL
     */
    public string $callback;

    /**
     * @var string $prompt
     * 文本总结提示语
     */
    public string $prompt="";

    /**
     * @var int $chunk_size
     * 文件切片大小,默认 512 token
     */
    public int $chunk_size=512;

    /**
     * @var string $model
     * 模型名称
     */
    public string $model="text-embedding-3-small";


    public function __construct(string $index_name, string $key, string $callback)
    {
        $this->index_name = $index_name;
        $this->key = $key;
        $this->callback = $callback;
    }

}
