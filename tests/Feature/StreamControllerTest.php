<?php

namespace Tests\Feature;

use App\Models\ActiveStream;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class StreamControllerTest extends TestCase
{
    use DatabaseTransactions;
    use DatabaseMigrations;

    public function testUnauthorized()
    {
        $this->wantsJson()->get('/api/streams')
            ->assertUnauthorized();
    }

    public function testUserCanGetStreams()
    {
        Sanctum::actingAs($user = User::factory()->create());
        ActiveStream::factory(10)->create();
        $response = $this->wantsJson()->get('/api/streams')
            ->assertSuccessful();

        $data = $response->json();
        $this->assertEquals(10, count($data['data']));
    }

    public function testUserCanGetTopGames()
    {
        Sanctum::actingAs($user = User::factory()->create());
        ActiveStream::factory(20)->create();
        $response = $this->wantsJson()->get('/api/top-games')
            ->assertSuccessful();

        $streams = ActiveStream::select('viewers_count', 'game_name', 'id')
            ->orderBy('viewers_count', 'desc')
            ->paginate(10);

        $data = $response->json();
        $this->assertEquals(10, count($data['data']));
        $this->assertEquals($streams[0]->viewers_count, count($data['data'][0]['viewers_count']));
        $this->assertEquals($streams[$streams->count() - 1]->viewers_count, $data['data'][count($data['data']) - 1]['viewers_count']);
    }
}
