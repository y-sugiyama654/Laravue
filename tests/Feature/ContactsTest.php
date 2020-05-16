<?php

namespace Tests\Feature;

use App\Contact;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContactsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_contact_can_be_added()
    {
        $this->withoutExceptionHandling();

        $this->post('/api/contacts', [
            'name'     => 'Test Name',
            'email'    => 'test@gmail.com',
            'birthday' => '05/15/2020',
            'company'  => 'ABC Company',
        ]);

        $contact = Contact::first();

        $this->assertEquals('Test Name', $contact->name);
        $this->assertEquals('test@gmail.com', $contact->email);
        $this->assertEquals('05/15/2020', $contact->birthday);
        $this->assertEquals('ABC Company', $contact->company);
    }

    /** @test */
    public function a_name_is_required()
    {
        $response = $this->post('/api/contacts', [
            'email'    => 'test@gmail.com',
            'birthday' => '05/15/2020',
            'company'  => 'ABC Company',
        ]);

        // nameキーのエラーがセッションに含まれているか
        $response->assertSessionHasErrors('name');

        // contactテーブルにデータが存在しないこと
        $this->assertCount(0, Contact::all());
    }

    /** @test */
    public function a_email_is_required()
    {
        $response = $this->post('/api/contacts', [
            'name'     => 'Test Name',
            'birthday' => '05/15/2020',
            'company'  => 'ABC Company',
        ]);

        // emailキーのエラーがセッションに含まれているか
        $response->assertSessionHasErrors('email');

        // contactテーブルにデータが存在しないこと
        $this->assertCount(0, Contact::all());
    }
}
