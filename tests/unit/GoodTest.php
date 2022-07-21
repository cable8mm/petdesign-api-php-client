<?php

namespace EscCompany\PetdesignApiClient\Tests\Functional;

use Dotenv\Dotenv;
use EscCompany\PetdesignApiClient\API\Good;
use PHPUnit\Framework\TestCase;

class GoodTest extends TestCase
{
    protected $apiKey;

    protected function setUp(): void
    {
        $dotenv = Dotenv::createImmutable(__DIR__.'/../../');

        $dotenv->load();

        $this->apiKey = getenv('JUNGLE_BOOK_API_KEY');
    }

    public function test_get_config()
    {
        $this->assertNotNull(getenv('JUNGLE_BOOK_API_KEY'));
    }

    public function test_get_by_id()
    {
        $good = (new Good($this->apiKey))->find(3754);

        $this->assertIsArray($good);
    }

    public function test_exist_keys_by_find()
    {
        $good = (new Good($this->apiKey))->find(3754);

        $this->assertArrayHasKey('goodsNo', $good);
        $this->assertArrayHasKey('open', $good);
        $this->assertArrayHasKey('goodsNm', $good);
        $this->assertArrayHasKey('categoryNm', $good);
    }

    public function test_page()
    {
        $goods = (new Good($this->apiKey))->page(1)->get();

        $this->assertIsArray($goods);
    }

    public function test_goods()
    {
        $goods = (new Good($this->apiKey))->get();

        $this->assertIsArray($goods);
    }

    public function test_visible_parameter()
    {
        $visibleGoods = (new Good($this->apiKey))->show(true)->get();
        $this->assertIsArray($visibleGoods);

        $invisibleGoods = (new Good($this->apiKey))->show(false)->get();
        $this->assertIsArray($invisibleGoods);
    }
}
