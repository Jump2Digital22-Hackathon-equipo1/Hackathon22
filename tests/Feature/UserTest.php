<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function test_user_login()
    {   
        $response = $this->post('/api/login', [
            'email' => 'user@admin.net',
            'password' => '123456',
        ]);  
        return $response->assertStatus(201);
    }

    /** 
    * @depends test_user_login
    */
    //Admin only
    public function test_user_can_not_get_analytics($response)
    {
       $token = $response['token'];
       $response = $this->withHeaders([
        'Authorization' => 'Bearer '. $token,
        'Accept' => 'application/json'
    ])->get('/api/index/analytics');
    $response->assertStatus(403);
    }

    /** 
    * @depends test_user_login
    */
       public function test_user_can_get_companys_listed_by_size($response)
       {
          $token = $response['token'];
          $response = $this->withHeaders([
           'Authorization' => 'Bearer '. $token,
           'Accept' => 'application/json'
       ])->get('/api/index/size/asc');
       $response->assertStatus(200);
       }

    /** 
    * @depends test_user_login
    */
       public function test_user_can_get_companys_listed_by_foundation($response)
       {
          $token = $response['token'];
          $response = $this->withHeaders([
           'Authorization' => 'Bearer '. $token,
           'Accept' => 'application/json'
       ])->get('/api/index/founded/asc');
       $response->assertStatus(200);
       }

    /** 
    * @depends test_user_login
    */
    public function test_user_logout($response)
    {
       $token = $response['token'];
       $response = $this->withHeaders([
        'Authorization' => 'Bearer '. $token,
        'Accept' => 'application/json'
    ])->post('/api/logout');
    $response->assertStatus(200);
    }
}
