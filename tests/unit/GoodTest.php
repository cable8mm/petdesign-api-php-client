<?php

namespace EscCompany\PetdesignApiClient\Tests\Functional;

use EscCompany\PetdesignApiClient\API\Good;
use Dotenv\Dotenv;
use PHPUnit\Framework\TestCase;

class GoodTest extends TestCase
{
    protected $apiKey;

    protected function setUp(): void
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
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

    public function test_get_allowed_tag()
    {
        $tags = Good::$allowedTags;

        $this->assertContains('긴급소진', $tags);
    }

    public function test_tag_goods()
    {
        $goods = (new Good($this->apiKey))->tag(Good::$allowedTags[0])->get();

        $this->assertIsArray($goods);
    }
}
