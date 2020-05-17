<?php

namespace Tests\Feature;

use App\Contact;
use Carbon\Carbon;
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

        $this->post('/api/contacts', $this->data());

        $contact = Contact::first();

        $this->assertEquals('Test Name', $contact->name);
        $this->assertEquals('test@gmail.com', $contact->email);
        $this->assertEquals('05/15/2020', $contact->birthday->format('m/d/Y'));
        $this->assertEquals('ABC Company', $contact->company);
    }


    /** @test */
    public function fields_are_required()
    {
        collect(['name', 'email', 'birthday', 'company'])
            ->each(function($field) {

                $response = $this->post('/api/contacts', array_merge($this->data(), [$field => '']));

                // nameキーのエラーがセッションに含まれているか
                $response->assertSessionHasErrors($field);

                // contactテーブルにデータが存在しないこと
                $this->assertCount(0, Contact::all());
            });
    }

    /** @test */
    public function email_must_be_a_valid_email()
    {
        $response = $this->post('/api/contacts', array_merge($this->data(), ['email' => 'NOT AN EMAIL']));

        // nameキーのエラーがセッションに含まれているか
        $response->assertSessionHasErrors('email');

        // contactテーブルにデータが存在しないこと
        $this->assertCount(0, Contact::all());
    }

    /** @test */
    public function birthday_are_properly_stored()
    {
        $response = $this->post('/api/contacts', array_merge($this->data()));

        // contactテーブルにデータが1つ存在すること
        $this->assertCount(1, Contact::all());
        // birthdayがCarbonのインスタンスであること
        $this->assertInstanceOf(Carbon::class, Contact::first()->birthday);
        // フォーマット通りにデータが保存されていること
        $this->assertEquals('2020-05-15', Contact::first()->birthday->format('Y-m-d'));
    }

    /** @test */
    public function a_contact_can_be_retrieved()
    {
        // contactデータをfactoryから取得
        $contact = factory(Contact::class)->create();

        $response = $this->get('/api/contacts/' . $contact->id);

        // レスポンスが指定したJSONの一部を含んでいること
        $response->assertJson([
            'name'     => $contact->name,
            'email'    => $contact->email,
            'birthday' => $contact->birthday->format('Y-m-d\TH:i:s.\0\0\0\0\0\0\Z'),
            'company'  => $contact->company,
        ]);
    }

    private function data()
    {
        return [
            'name'     => 'Test Name',
            'email'    => 'test@gmail.com',
            'birthday' => '05/15/2020',
            'company'  => 'ABC Company',
        ];
    }
}
