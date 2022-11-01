<?php

namespace Tests\Feature;

use Tests\TestCase;

class AuthTest extends TestCase
{
    public function test_login_with_wrong_credentials()
    {   
        $response = $this->post('/api/login', [
            'email' => 'admin@admin.net',
            'password' => '1234567',
        ]);  
        return $response->assertStatus(401);
    }

    public function test_can_not_create_multiple_admins()
        {   
        $response = $this->post('/api/users', [
            'name' => 'Admin_1',
            'email' => 'admin1@admin.net',
            'password' => '123456',
            'password_confirmation' => '123456',
            'role' => 'admin',
        ]);  
        return $response->assertStatus(409);
        }
    
}
