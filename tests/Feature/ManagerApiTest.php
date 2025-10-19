<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManagerApiTest extends TestCase
{
       public function test_create_manager()
{
    $response = $this->postJson('/api/managers', [
        'name' => 'John Doe',
        'email' => 'john@example.com',
        'phoneNumber' => '111111111',
        'password'=>'mmzmmm',
        'schoolId'=>'55'
    ]);

    $response->assertStatus(201);
}
}
