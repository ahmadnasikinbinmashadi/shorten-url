<?php

namespace Tests\Feature;

use App\Shorty;
use Illuminate\Support\Str;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ShortenTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
    * Test Shorten
    */
    public function testShortenCreatedSuccessfully()
    {
        $payload = [
            'url' => 'https://app.apiary.io/shortychallenge/editor',
            'shortcode' => Str::random(6)
        ];

        if (! isset($payload['shortcode']) || $payload['shortcode'] == '') {
            $payload['shortcode'] = str_random(6);
        }

        // Send post request and Assert it was successful
        $response = $this->json('POST', route('shorty.shorten'), $payload)
                        ->assertStatus(201)
                        ->assertJson([
                            'shortcode' => $payload['shortcode']
                        ]);
    }

    /**
    * Test RequireField
    */
    public function testRequireUrl()
    {
        // Send post request
        $response = $this->json('POST', route('shorty.shorten'))
                        ->assertStatus(422)
                        ->assertJson([
                            'error' => [
                                'url' => ['The url field is required.']
                            ]
                        ]);
    }

    /**
    * Test Open url header location shortcode could not found
    */
    public function testShortCodeNotFound()
    {
        $response = $this->json('GET', route('shorty.find-short-code'))
                        ->assertStatus(404)
                        ->assertJson(['error' => 'The shortcode cannot be found in the system']);
    }

    /**
    * Test Open url header location
    */
    public function testOpenUrlLocationSuccessfully()
    {
        $shorten = factory(Shorty::class)->create([
            'url' => 'https://app.apiary.io/shortychallenge/editor',
            'shortcode' => Str::random(6)
        ]);

        $payload = [
            'shortcode' => $shorten['shortcode']
        ];
        
        // Send get request and Assert it was successful
        $response = $this->json('GET', route('shorty.find-short-code'), $payload)
                        ->assertStatus(302)
                        ->assertJson(['location' => $shorten['url']]);
    }

    /**
    * Test show status shorten url shortcode could not found
    */
    public function testStatsShortCodeNotFound()
    {
        $response = $this->json('GET', route('shorty.stats'))
                        ->assertStatus(404)
                        ->assertJson(['error' => 'The shortcode cannot be found in the system']);
    }

    /**
    * Test show status shorten url
    */
    public function testShowStats()
    {
        $shorten = factory(Shorty::class)->create([
            'url' => 'https://app.apiary.io/shortychallenge/editor',
            'shortcode' => Str::random(6)
        ]);

        $payload = [
            'shortcode' => $shorten['shortcode']
        ];
         
        // Send get request and Assert it was successful
        $data['startDate'] = $shorten->created_at;
        if ($shorten->last_seen_date) {
            $data['lastSeenDate'] = $shorten->last_seen_date;
        }
        $data['redirectCount'] = ($shorten['redirect_count']) ? $shorten['redirect_count'] : 0;

        $response = $this->json('GET', route('shorty.stats'), $payload)
                        ->assertStatus(200)
                        ->assertJson($data)
                        ->assertJsonStructure([
                            '*' => ['id', 'shortcode', 'url', 'last_seen_date', 'redirect_count', 'created_at', 'updated_at']
                        ]);
    }
}


/*$user = factory(User::class)->create();
$token = $user->generateToken();
$headers = ['Authorization' => "Bearer $token"];
$payload = [
    'title' => 'Lorem',
    'body' => 'Ipsum',
];

$this->json('POST', '/api/articles', $payload, $headers)
    ->assertStatus(200)
    ->assertJson(['id' => 1, 'title' => 'Lorem', 'body' => 'Ipsum']);*/
