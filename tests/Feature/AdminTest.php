<?php

namespace Tests\Feature;

use Tests\TestCase;

class AdminTest extends TestCase
{
    public function test_create_user()
    {   
    $response = $this->post('/api/users', [
        'name' => 'User_1',
        'email' => 'user1@admin.net',
        'password' => '123456',
        'password_confirmation' => '123456',
        'role' => 'user',
    ]);  
    return $response->assertStatus(200);
    }

    public function test_admin_login()
    {   
        $response = $this->post('/api/login', [
            'email' => 'admin@admin.net',
            'password' => '123456',
        ]);  
        return $response->assertStatus(201);
    }

    /** 
    * @depends test_admin_login
    */
    //Admin only
    public function test_admin_can_get_analytics($response)
    {
       $token = $response['token'];
       $response = $this->withHeaders([
        'Authorization' => 'Bearer '. $token,
        'Accept' => 'application/json'
    ])->get('/api/index/analytics');
    $response->assertStatus(200);
    }

    /** 
    * @depends test_admin_login
    */
       public function test_admin_can_get_companys_listed_by_size($response)
       {
          $token = $response['token'];
          $response = $this->withHeaders([
           'Authorization' => 'Bearer '. $token,
           'Accept' => 'application/json'
       ])->get('/api/index/size/asc');
       $response->assertStatus(200);
       }

    /** 
    * @depends test_admin_login
    */
       public function test_admin_can_get_companys_listed_by_foundation($response)
       {
          $token = $response['token'];
          $response = $this->withHeaders([
           'Authorization' => 'Bearer '. $token,
           'Accept' => 'application/json'
       ])->get('/api/index/founded/asc');
       $response->assertStatus(200);
       }


    /** 
    * @depends test_admin_login
    */
    public function test_admin_can_delete_users($response)
    {
       $token = $response['token'];
       $response = $this->withHeaders([
        'Authorization' => 'Bearer '. $token,
        'Accept' => 'application/json',
        
    ])->post('/api/users/delete', ['email' => 'user1@admin.net']);
    $response->assertStatus(200);
    }


    /** 
    * @depends test_admin_login
    */
    public function test_admin_logout($response)
    {
       $token = $response['token'];
       $response = $this->withHeaders([
        'Authorization' => 'Bearer '. $token,
        'Accept' => 'application/json'
    ])->post('/api/logout');
    $response->assertStatus(200);
    }

}