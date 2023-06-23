<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class LocalTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use DatabaseMigrations;
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->artisan('db:seed'); //seed database
    }
    public function test_connection(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200); //check if status is connected to the server
    }
    
    public function test_get_local_minimum_8_local(): void
    {
        
        $response = $this->get('/api/v1/local')->json()['data'];

        $this->assertTrue(count($response) > 8); // minimum of 8 for a paginated local response
    }

    
    public function test_get_local_specific(): void
    {
        
        $response = $this->get('/api/v1/local/1')->json()['data']['id'];

        $this->assertTrue($response == 1); // minimum of 8 for a paginated local response
    }
    
    public function test_post_local(): void
    {
        $data = [
            "name" => "Joao",
            "city" => "Itajai",
            "state" => "Santa Catarina",
            "slug" => "postman"
        ];
        $response = $this->call('POST','/api/v1/local',$data)->json()['data']['name'];
        $this->assertTrue($response == "Joao"); // minimum of 8 for a paginated local response
    }

    public function test_patch_local(): void
    {
        $data = [
            "name" => "Joe"
        ];
        $this->call('PATCH','/api/v1/local/1',$data);

        $response = $this->call('GET','/api/v1/local/1')->json()['data']['name'];
        $this->assertTrue($response == "Joe"); // minimum of 8 for a paginated local response
    }

    public function test_delete_local(): void
    {
        $this->call('DELETE','/api/v1/local/5');
        $response=$this->call('GET','/api/v1/local/5');
        $response->assertStatus(404);
    }

    
    public function test_get_local_filter(): void
    {
        
        $data = [
            "name" => "Abigail"
        ];
        $this->call('PATCH','/api/v1/local/10',$data);
        $response=$this->call('GET','/api/v1/local?name[eq]=Abigail')->json()['data'][0]['name'];
        $this->assertTrue($response=="Abigail");
    }
}
