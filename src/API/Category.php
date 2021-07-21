<?php

namespace EscCompany\PetdesignApiClient\API;

use EscCompany\PetdesignApiClient\Contracts\Request;
use UnexpectedValueException;

class Category extends Request
{
    const catCode = '032';
    const dogCode = '031';

    /**
     * Category code.
     *
     * @var string
     * @example 032001001011 (고양이 > 사료 > 브랜드사료 > 로얄캐닌)
     */
    private $categoryCode;
    private static $childrenKey = 'children';

    protected function builder()
    {
        $this->query = 'category/';

        if (! empty($this->categoryCode)) {
            $this->query .= $this->categoryCode;

            return $this;
        }

        return $this;
    }

    public function byDog()
    {
        $this->categoryCode = self::dogCode;

        return $this;
    }

    public function byCat()
    {
        $this->categoryCode = self::catCode;

        return $this;
    }

    public function find(string $categoryCode)
    {
        $this->categoryCode = $categoryCode;

        $category = $this->get(null, 0);

        unset($category[self::$childrenKey]);

        return $category;
    }

    public function findOrFail(string $categoryCode)
    {
        $contents = $this->find($categoryCode);

        if (is_null($contents)) {
            throw new UnexpectedValueException('Invalid category code');
        }

        return $contents;
    }

    public static function flatten(?array $input, string $key = null)
    {
        $key = $key ?? self::$childrenKey;

        $output = [];

        foreach ($input as $object) {
            $children = isset($object[$key]) ? $object[$key] : [];

            $object[$key] = [];

            if (empty($object[$key])) {
                unset($object[$key]);
            }

            $output[] = $object;

            $children = self::flatten($children, $key);

            foreach ($children as $child) {
                $output[] = $child;
            }
        }

        return $output;
    }
}
