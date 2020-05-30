<?php

namespace Tests\Feature;

use App\Contact;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BirthdaysTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function contact_with_birthdays_in_the_current_month_can_be_fetched()
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();

        $birthdayContact = factory(Contact::class)->create([
            'user_id' => $user->id,
            'birthday' => now()->subYear(),
        ]);

        $noBirthdayContact = factory(Contact::class)->create([
            'user_id' => $user->id,
            'birthday' => now()->subMonth(),
        ]);

        $this->get('/api/birthdays?api_token=' . $user->api_token)
            ->assertJsonCount(1)
            ->assertJson([
                'data' => [
                    [
                        'data' => [
                            'contact_id' => $birthdayContact->id
                        ]
                    ]
                ]
            ]);
    }
}
