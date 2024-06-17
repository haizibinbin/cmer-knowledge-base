<?php

namespace Hbb\CmerKnowledgeBase;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Exception\RequestException;
use Hbb\CmerKnowledgeBase\models\CreateEmbeddingModel;
use Hbb\CmerKnowledgeBase\models\DeleteEmbeddingModel;
use Hbb\CmerKnowledgeBase\models\FileDeleteModel;
use Hbb\CmerKnowledgeBase\models\FileUploadModel;
use Hbb\CmerKnowledgeBase\models\SelectEmbeddingEsModel;
use Hbb\CmerKnowledgeBase\models\SelectEmbeddingModel;
use Hbb\CmerKnowledgeBase\models\UpdateEmbeddingModel;

class CmerClient
{
    protected $headers = [];

    protected $host = 'https://api.cmer.com/v1/';

    /**
     * @var int 请求超时时间默认30秒
     */
    protected $timeout=30;

    public function __construct(string $apikey, int $timeout=30)
    {
        $this->headers['apikey'] = $apikey;
        $this->headers['X-CmerApi-Host'] = "KnowledgeBase.p.cmer.com";
        $this->timeout=$timeout;
    }


    /**
     * @param string $endpoint
     * @param string $method
     * @param array $body
     * @param array $query
     * @return Response
     * @throws \GuzzleHttp\Exception\GuzzleException
     * 发起请求
     */
    public function http(string $endpoint, string $method, array $body = [], array $query = []): Response
    {
        $client = new Client([
            'base_uri' => $this->host,
            'timeout' => $this->timeout,
            'verify' => false
        ]);
        # 组装headers
        $options = [
            'headers' => $this->headers,
        ];
        # query：路径参数
        if ($query)
            $options['query'] = $query;
        # body：请求体参数
        if ($body)
            $options['json'] = $body;

        try {
            return $client->request($method, $endpoint, $options);
        } catch (RequestException $exception) {
            return new Response(500, [], $exception->getMessage());
        }
    }

    /****************************************** 以下是所有路由 *****************************************/

    public function file_upload(FileUploadModel $model)
    {
        return $this->http("file/upload", 'POST', $model->toArray());
    }

    public function file_delete(FileDeleteModel $model)
    {
        return $this->http("file/delete", 'POST', $model->toArray());
    }

    public function crud_create(CreateEmbeddingModel $model)
    {
        return $this->http("crud/create", 'POST', $model->toArray());
    }

    public function crud_delete(DeleteEmbeddingModel $model)
    {
        return $this->http("crud/delete", 'POST', $model->toArray());
    }

    public function crud_update(UpdateEmbeddingModel $model)
    {
        return $this->http("crud/update", 'POST', $model->toArray());
    }

    /**
     * @param SelectEmbeddingEsModel $model
     * @return Response
     * @throws \GuzzleHttp\Exception\GuzzleException
     * 搜索ES
     */
    public function crud_select_es(SelectEmbeddingEsModel $model)
    {
        return $this->http("crud/select/es", 'POST', $model->toArray());
    }


    /**
     * @param SelectEmbeddingEsModel $model
     * @return Response
     * @throws \GuzzleHttp\Exception\GuzzleException
     * 搜索向量
     */
    public function crud_select_vector(SelectEmbeddingModel $model)
    {
        return $this->http("crud/select/vector", 'POST', $model->toArray());
    }


}
