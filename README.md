# Cmer-knowledge-base PHP SDK

> 此包包含知识库相关的CURD操作，以及文件导入知识库  
> 文档地址：https://apihub.cmer.com/docs/knowledge-base.html  

## 安装

```shell
composer require hbb/cmer-knowledge-base
```

## 使用

```php
<?php

require_once 'vendor/autoload.php';

$apikey="xxxxxxxxxx";  # 授权码
$cmer = new \Hbb\CmerKnowledgeBase\CmerClient($apikey);

# 知识库索引
$index_name = "hbb-gpts";

# 新增知识库
$model = new \Hbb\CmerKnowledgeBase\models\CreateEmbeddingModel($index_name, "Q：你是谁？\n A：我是一个聊天机器人。");
$model->tag = "chatbot";
# 扩展字段
$model->meta = [
    "cate" => "退款"
];
$response = $cmer->crud_create($model);
print_r($response->getBody()->getContents());

# 通过ES召回知识库
$model = new \Hbb\CmerKnowledgeBase\models\SelectEmbeddingEsModel($index_name, "你是谁");
$response = $cmer->crud_select_es($model);
$esdoc = json_decode($response->getBody()->getContents(), true);
print_r($esdoc);

# 通过向量召回知识库
$model = new \Hbb\CmerKnowledgeBase\models\SelectEmbeddingModel($index_name, "你是谁");
$response = $cmer->crud_select_vector($model);
$doc = json_decode($response->getBody()->getContents(), true);
print_r($doc);


# 修改知识库
$model = new \Hbb\CmerKnowledgeBase\models\UpdateEmbeddingModel($index_name, "Q：你是谁？\n A：我是一个聊天机器人。你呢？", $doc[0]["uuid"]);
$model->tag = '测试';
$model->meta = [
    "cate" => "退款测试"
];
$response = $cmer->crud_update($model);
print_r($response->getBody()->getContents());
```

