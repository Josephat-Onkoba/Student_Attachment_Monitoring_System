<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Validator;

class EmailValidationTest extends TestCase
{
    /**
     * Test email validation blocks CRLF characters.
     */
    public function test_email_validation_rejects_crlf_characters(): void
    {
        // Valid email
        $validator = Validator::make(
            ['email' => 'test@example.com'],
            ['email' => 'email']
        );
        $this->assertTrue($validator->passes());

        // Email containing LF (\n)
        $validator = Validator::make(
            ['email' => "test\n@example.com"],
            ['email' => 'email']
        );
        $this->assertFalse($validator->passes());
        $this->assertEquals(
            'The email field must be a valid email address.',
            $validator->errors()->first('email')
        );

        // Email containing CR (\r)
        $validator = Validator::make(
            ['email' => "test\r@example.com"],
            ['email' => 'email']
        );
        $this->assertFalse($validator->passes());
        $this->assertEquals(
            'The email field must be a valid email address.',
            $validator->errors()->first('email')
        );

        // Email containing CRLF (\r\n)
        $validator = Validator::make(
            ['email' => "test\r\n@example.com"],
            ['email' => 'email']
        );
        $this->assertFalse($validator->passes());
        $this->assertEquals(
            'The email field must be a valid email address.',
            $validator->errors()->first('email')
        );

        // Invalid email format (should fall through to default validation)
        $validator = Validator::make(
            ['email' => 'invalid-email'],
            ['email' => 'email']
        );
        $this->assertFalse($validator->passes());
    }
}
