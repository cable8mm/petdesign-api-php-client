<?php

namespace EscCompany\PetdesignApiClient\API;

use EscCompany\PetdesignApiClient\Contracts\Request;
use UnexpectedValueException;

class Good extends Request
{
    private $page = 1;
    private $visible = true;
    private $id;
    private $from;  // ?updateAfter=2019-09-01
    private $tag;

    protected function builder()
    {
        $this->query = 'goods/';

        if (!empty($this->id)) {
            $this->query .= $this->id;
            return $this;
        }

        // 전체상품 조회
        if ($this->visible === true) {
            $this->query .= 'all';
        }

        // 미진열상품 조회
        if ($this->visible === false) {
            $this->query .= 'close';
        }

        // 조건 파라미터
        if (!empty($this->from)) {
            $this->query .= '?updateAfter='.$this->from;
        }

        // 페이지
        if (empty($this->from)) {
            $this->query .= '/'.$this->page;
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

        return $contents;
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
