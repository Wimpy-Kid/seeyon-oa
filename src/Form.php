<?php


namespace SeeYon;

use GuzzleHttp\Client;

/**
 * 业务生成器服务管理
 *
 * @apiDoc http://open.seeyon.com/book/ctp/restjie-kou/ye-wu-sheng-cheng-qi-fu-wu-guan-li.html
 *
 * Interface Form
 * @package app\Support\SeeYon\src
 */
class Form extends BaseOA {

    /**
     * 导出无流程表单数据接口
     *
     * @param string $formCode 表单编号
     * @param string $fromTime 开始时间
     * @param string $toTime 截止时间
     *
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    function export(string $formCode, string $fromTime, string $toTime) {
        return $this->client->get(
            $this->restUrl . '/form/export/' . $formCode,
            [
                'query' => [
                    'beginDateTime' => $fromTime,
                    'endDateTime' => $toTime,
                ],
            ]
        );
    }

    /**
     * 发起无流程表单接口实现
     *
     * @param string $formCode 表单编号
     * @param string $loginName 发起者登录名
     * @param string $data 	无流程表单XML的String串
     *
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    function import(string $formCode, string $loginName, string $data) {
        return $this->client->post(
            $this->restUrl . '/form/import' . $formCode,
            [
                'form_params' => [
                    'loginName' => $loginName,
                    'dataXml' => $data,
                ]
            ]
        );
    }

    /**
     * 更新无流程表单数据接口实现(Since:V6.0SP1)
     *
     * @param string|int $moduleId 	主表ID
     * @param string $formCode 表单编号
     * @param string $loginName 发起者登录名
     * @param string $data 无流程表单XML的String串
     *
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    function update($moduleId, string $formCode, string $loginName, string $data) {
        return $this->client->put(
            $this->restUrl . '/form/update',
            [
                'body' => [
                    'moduleId' => $moduleId,
                    'templateCode' => $formCode,
                    'loginName' => $loginName,
                    'dataXml' => $data,
                ],
            ]
        );
    }

}
