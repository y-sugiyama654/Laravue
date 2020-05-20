<?php

namespace Tests\Feature;

use App\Contact;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContactsTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    protected function setUp() :void
    {
        parent::setUp();

        $this->user = factory(User::class)->create();
    }

    /** @test */
    public function a_list_of_contacts_can_be_fetched_for_the_authenticated_user()
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();
        $anotherUser = factory(User::class)->create();

        $contact = factory(Contact::class)->create(['user_id' => $user->id]);
        $anotherContact = factory(Contact::class)->create(['user_id' => $anotherUser->id]);

        $response = $this->get('/api/contacts?api_token=' . $user->api_token);
        // $userのみのデータ($anotherUserは含まれない)が取得できること
        $response->assertJsonCount(1)
            ->assertJson([['id' => $contact->id]]);
    }

    /** @test */
    public function an_unauthenticated_user_should_redirected_to_login()
    {
        $response = $this->post('/api/contacts', array_merge($this->data(), ['api_token' => '']));

        $response->assertRedirect('/login');
        $this->assertCount(0, Contact::all());
    }

    /** @test */
    public function an_unauthenticated_user_can_add_a_contact()
    {
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
        $contact = factory(Contact::class)->create(['user_id' => $this->user->id]);

        // GETメソッドだからURLのapi_tokenを含める
        $response = $this->get('/api/contacts/' . $contact->id . '?api_token=' . $this->user->api_token);

        // レスポンスが指定したJSONの一部を含んでいること
        $response->assertJson([
            'name'     => $contact->name,
            'email'    => $contact->email,
            'birthday' => $contact->birthday->format('Y-m-d\TH:i:s.\0\0\0\0\0\0\Z'),
            'company'  => $contact->company,
        ]);
    }

    /** @test */
    public function only_the_users_contacts_can_be_retrieved()
    {
        // contactデータをfactoryから取得
        $contact = factory(Contact::class)->create(['user_id' => $this->user->id]);

        $anotherUser = factory(User::class)->create();

        // $contactに紐づかないユーザー($anotherUser)からのレスポンスでGETメソッドを送る
        $response = $this->get('/api/contacts/' . $contact->id . '?api_token=' . $anotherUser->api_token);

        // 紐づいていないデータなのでステータスは403であること
        $response->assertStatus(403);
    }

    /** @test */
    public function a_contact_can_be_patched()
    {
        // contactデータをfactoryから作成
        $contact = factory(Contact::class)->create(['user_id' => $this->user->id]);

        // 編集前のcontactデータ
        // App\User
        // {    #2976
        //      id:       1,
        //      name:     "Satoshi Nakamoto",
        //      email:    "satoshi@gmail.com",
        //      birthday: "05/04/1994",
        //      company:  "BitCoin Inc",
        // }

        // patchメソッドで取得したデータを第二引数のデータに編集
        $this->patch('/api/contacts/' . $contact->id, $this->data());

        // 編集後のcontactデータ
        // App\User
        // {    #2976
        //      id:       1,
        //      name:     "Test Name",
        //      email:    "test@gmail.com",
        //      birthday: "05/15/2020",
        //      company:  "ABC Company",
        // }

        // データベースからモデルを再取得する。既存のモデルインスタンスは影響を受けない。
        $contact = $contact->fresh();

        // contactデータが編集後のデータに書き換わっていること
        $this->assertEquals('Test Name', $contact->name);
        $this->assertEquals('test@gmail.com', $contact->email);
        $this->assertEquals('05/15/2020', $contact->birthday->format('m/d/Y'));
        $this->assertEquals('ABC Company', $contact->company);
    }

    /** @test */
    public function only_the_owner_of_the_contact_can_patch_the_contact()
    {
        // contactデータをfactoryから作成
        $contact = factory(Contact::class)->create();

        // Contactとは紐づかない別のユーザーを作成
        $anotherUser = factory(User::class)->create();

        // patchメソッドで取得したデータを第二引数のデータに編集
        $response = $this->patch('/api/contacts/' . $contact->id, array_merge($this->data(), ['api_token' => $anotherUser->api_token]));

        $response->assertStatus(403);

    }

    /** @test */
    public function a_contact_can_be_deleted()
    {
        // contactデータをfactoryから取得
        $contact = factory(Contact::class)->create(['user_id' => $this->user->id]);

        // deleteメソッドを送信してContactを削除
        $this->delete('/api/contacts/' . $contact->id, ['api_token' => $this->user->api_token]);

        // contactテーブルにデータが存在しないこと
        $this->assertCount(0, Contact::all());
    }

    /** @test */
    public function only_the_owner_can_delete_the_contact()
    {
        // contactデータをfactoryから取得
        $contact = factory(Contact::class)->create();

        // Contactとは紐づかない別のユーザーを作成
        $anotherUser = factory(User::class)->create();

        $response = $this->delete('/api/contacts/' . $contact->id, ['api_token' => $anotherUser->api_token]);

        $response->assertStatus(403);
    }

    private function data()
    {
        return [
            'name'       => 'Test Name',
            'email'      => 'test@gmail.com',
            'birthday'   => '05/15/2020',
            'company'    => 'ABC Company',
            'api_token'  => $this->user->api_token,
        ];
    }
}
