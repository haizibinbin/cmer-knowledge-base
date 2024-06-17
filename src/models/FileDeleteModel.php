<?php

namespace Hbb\CmerKnowledgeBase\models;

/**
 * 删除文件关联的知识库
 */
class FileDeleteModel extends BaseModel
{
    /**
     * @var string $index_name
     * 索引名称
     */
    public string $index_name;

    /**
     * @var string $key
     * 对象存储上的文件路径
     */
    public string $key;
}
