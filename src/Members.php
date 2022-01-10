<?php


namespace CherryLu\SeeYonOa;

use GuzzleHttp\Client;

/**
 * 组织模型管理
 *
 * @apiDoc http://open.seeyon.com/book/ctp/restjie-kou/zu-zhi-mo-xing-guan-li.html
 *
 * Interface Form
 * @package app\Support\SeeYon\src
 */
class Members extends BaseOA {

    /**
     * 导出人员信息
     * @apiDoc http://open.seeyon.com/book/ctp/restjie-kou/zu-zhi-mo-xing-shu-ju-guan-li.html#%E5%AF%BC%E5%87%BA%E4%BA%BA%E5%91%98%E4%BF%A1%E6%81%AF
     *
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function export() {
        return $this->client->get(
            $this->restUrl . '/data/members/' . env('SEE_YON_ACCOUNT_NAME')
        );
    }

    /**
     * 取得指定单位的所有人员
     * @apiDoc http://open.seeyon.com/book/ctp/restjie-kou/zu-zhi-mo-xing-guan-li.html#%E5%8F%96%E5%BE%97%E6%8C%87%E5%AE%9A%E5%8D%95%E4%BD%8D%E7%9A%84%E6%89%80%E6%9C%89%E4%BA%BA%E5%91%98%E4%B8%8D%E5%8C%85%E5%90%AB%E5%81%9C%E7%94%A8%E4%BA%BA%E5%91%98
     *
     * @param bool $withTrashed true:包含停用人员  false:不包含停用人员
     *
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function list(bool $withTrashed = false) {
        return $this->client->get(
            $this->restUrl . '/orgMembers/' . $withTrashed?'all/':'' . env('SEE_YON_ACCOUNT_ID')
        );
    }

}
