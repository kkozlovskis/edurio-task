<?php

namespace Tests\Feature;

use App\Source;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class SourceTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @covers \App\Http\Controllers\SourceController::csv()
     *
     * @return void
     */
    public function testSourceControllerCsv()
    {
        $source = factory(Source::class)->create();

        $response = $this->get(route('source.csv'));

        $response->assertStatus(200);
        $content = $response->streamedContent();
        $this->assertStringContainsString(implode(",", $source->attributesToArray()), $content);
    }

    /**
     * @covers \App\Http\Controllers\SourceController::json()
     *
     * @return void
     */
    public function testSourceControllerJson()
    {
        $source = factory(Source::class)->create();

        $response = $this->get(route('source.json', ['page' => 1, 'page_size' => 5]));

        $response->assertStatus(200);
        $response->assertJsonFragment($source->attributesToArray());
    }
}
