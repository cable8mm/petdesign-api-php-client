<?php

namespace EscCompany\PetdesignApiClient\API;

use EscCompany\PetdesignApiClient\Contracts\Request;
use InvalidArgumentException;
use UnexpectedValueException;

class Good extends Request
{
    private $page = 1;
    private $visible = true;
    private $id;
    private $from;  // ?updateAfter=2019-09-01
    private $tag;

    public static $allowedTags = [
        '긴급소진', // 유통기한 임박 또는 악성재고 상품으로 분류되어 빠르게 소진 해야 할 상품
        '본사품절', // 유통본사 재고가 없는 상품으로 분류되어 발주 및 입고예정일을 확인 할 수 없는 상품
        '롱-리드',  // 재입고까지 최소 2주 이상 걸리는 리드타임이 긴 상품
        '단종',     // 단종된 상품
        '오프전용', // 오프라인에서만 판매/유통 할 수 있는 상품
        '단가인상', // 단가인상 예정인 상품
    ];

    protected function builder()
    {
        $this->query = 'goods/';

        if (!empty($this->id)) {
            $this->query .= $this->id;
            return $this;
        }

        // 태그로 조회
        if (!empty($this->tag)) {
            $this->query .= '!' . $this->tag;
        } else {
            // 전체상품 조회
            if ($this->visible === true) {
                $this->query .= 'all';
            }

            // 미진열상품 조회
            if ($this->visible === false) {
                $this->query .= 'close';
            }
        }

        // 조건 파라미터
        if (!empty($this->from)) {
            $this->query .= '?updateAfter=' . $this->from;
        }

        // 페이지
        if (empty($this->from)) {
            $this->query .= '/' . $this->page;
        }

        return $this;
    }

    public function find(int $id)
    {
        $this->id = $id;

        return $this->get('data', 0);
    }

    public function findOrFail(int $id)
    {
        $contents = $this->find($id);

        if (is_null($contents)) {
            throw new UnexpectedValueException('Invalid good id');
        }
    }

    public function page(int $page)
    {
        $this->page = $page;

        return $this;
    }

    public function show(bool $tf)
    {
        $this->visible = $tf;

        return $this;
    }

    public function tag(string $tag)
    {
        if (!in_array($tag, self::$allowedTags)) {
            throw new InvalidArgumentException(__METHOD__);
        }

        $this->tag = $tag;

        return $this;
    }

    /**
     * @param string $date Y-m-d
     * @return $this
     */
    public function from(string $date)
    {
        $this->from = $date;

        return $this;
    }
}
