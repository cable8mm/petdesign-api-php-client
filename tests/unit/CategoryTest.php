<?php

namespace EscCompany\PetdesignApiClient\Tests\Functional;

use Dotenv\Dotenv;
use EscCompany\PetdesignApiClient\API\Category;
use PHPUnit\Framework\TestCase;

class CategoryTest extends TestCase
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

    public function test_categories()
    {
        $categories = (new Category($this->apiKey))->get();

        $this->assertIsArray($categories);
    }

    public function test_categories_flatten_by_dog()
    {
        $categories = (new Category($this->apiKey))->byDog()->get();

        $flatCategories = Category::flatten($categories);

        $this->assertIsArray($flatCategories);
    }

    public function test_categories_flatten_by_cat()
    {
        $categories = (new Category($this->apiKey))->byCat()->get();

        $flatCategories = Category::flatten($categories);

        $this->assertIsArray($flatCategories);
    }

    public function test_find_category()
    {
        $category = (new Category($this->apiKey))->find(Category::dogCode);

        $this->assertIsArray($category);
    }

    public function test_find_dog_category()
    {
        $category = (new Category($this->apiKey))->find(Category::dogCode);

        $this->assertEquals('강아지', $category['categoryNm']);
    }

    public function test_find_cat_category()
    {
        $category = (new Category($this->apiKey))->find(Category::catCode);

        $this->assertEquals('고양이', $category['categoryNm']);
    }
}
