<?php

namespace Tests\Feature\Admin;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContactTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /*START CHECK INDEX*/

    public function test_admin_can_see_contact_index()
    {
        $this->actAsAdmin();
        $this->get(route('contact.index'))->assertOk();
    }

    public function test_user_can_not_see_contact_index()
    {
        $this->get(route('contact.index'))->assertStatus(302)->assertRedirect(route('login'));
    }

    /*END CHECK INDEX*/

    /*START CHECK PENDING*/

    public function test_admin_can_see_pending_contact()
    {
        $this->actAsAdmin();
        $this->get(route('contact.pending'))->assertOk();
    }

    public function test_user_can_not_see_pending_contact()
    {
        $this->get(route('contact.pending'))->assertStatus(302)->assertRedirect(route('login'));
    }

    /*END CHECK PENDING*/

    /*START CHECK READ*/

    public function test_admin_can_see_read_contact()
    {
        $this->actAsAdmin();
        $this->get(route('contact.read'))->assertOk();
    }

    public function test_user_can_not_see_read_contact()
    {
        $this->get(route('contact.read'))->assertStatus(302)->assertRedirect(route('login'));
    }

    /*END CHECK READ*/

    /*START CHECK UNREAD*/

    public function test_admin_can_see_unread_contact()
    {
        $this->actAsAdmin();
        $this->get(route('contact.unread'))->assertOk();
    }

    public function test_user_can_not_see_unread_contact()
    {
        $this->get(route('contact.unread'))->assertStatus(302)->assertRedirect(route('login'));
    }

    /*END CHECK UNREAD*/

    /*START CHECK SHOW*/

    public function test_admin_can_see_show_contact()
    {
        $this->withoutExceptionHandling();
        $this->actAsAdmin();
        $contact = $this->createContact();
        $this->get(route('contact.show', $contact->id))->assertOk();
    }

    public function test_user_can_not_see_show_contact()
    {
        $contact = $this->createContact();
        $this->get(route('contact.show', $contact->id))->assertStatus(302)->assertRedirect(route('login'));
    }

    /*END CHECK SHOW*/

    /*START CHECK DESTROY*/

    public function test_admin_can_delete_contact()
    {
        $this->actAsAdmin();
        $contact = $this->createContact();
        $this->delete(route('contact.destroy', $contact->id))->assertStatus(302)->assertRedirect(route('contact.index'));
        $this->assertEquals(0, Contact::all()->count());
    }

    public function test_user_can_not_delete_contact()
    {
        $this->withoutExceptionHandling();
        $this->expectException('Illuminate\Auth\AuthenticationException');
        $contact = $this->createContact();
        $this->delete(route('contact.destroy', $contact->id))->assertStatus(302)->assertRedirect(route('login'));
        $this->assertEquals(1, Contact::all()->count());
    }

    /*END CHECK DESTROY*/

    /*START CHECK READ_STATUS*/

    public function test_admin_can_update_read_status_contact()
    {
        $this->actAsAdmin();
        $contact = $this->createContact();
        $this->patch(route('contact.read_status', $contact->id))
            ->assertStatus(302)->assertRedirect(route('contact.index'));
        $contact = $contact->fresh();
        $this->assertEquals(Contact::READ_STATUS, $contact->status);
    }

    public function test_user_can_not_update_read_status_contact()
    {
        $contact = $this->createContact();
        $this->patch(route('contact.read_status', $contact->id))
            ->assertStatus(302)->assertRedirect(route('login'));
    }

    /*END CHECK READ_STATUS*/

    /*START CHECK UNREAD_STATUS*/

    public function test_admin_can_update_unread_status_contact()
    {
        $this->actAsAdmin();
        $contact = $this->createContact();
        $this->patch(route('contact.unread_status', $contact->id))
            ->assertStatus(302)->assertRedirect(route('contact.index'));
        $contact = $contact->fresh();
        $this->assertEquals(Contact::UNREAD_STATUS, $contact->status);
    }

    public function test_user_can_not_update_unread_status_contact()
    {
        $contact = $this->createContact();
        $this->patch(route('contact.read_status', $contact->id))
            ->assertStatus(302)->assertRedirect(route('login'));
    }

    /*END CHECK UNREAD_STATUS*/

    private function createAdminData()
    {
        $this->actingAs(User::factory()->create());
    }

    private function actAsAdmin()
    {
        $this->createAdminData();
        auth()->check();
    }

    private function createContact()
    {
        $data = $this->contactData();
        return Contact::query()->create($data);
    }

    private function contactData(): array
    {
        return [
            'user_name' => $this->faker->name,
            'user_email' => $this->faker->email,
            'user_mobile' => '09123456789',
            'user_ip' => request()->ip(),
            'know' => $this->faker->name,
            'text' => $this->faker->text,
            'status' => Contact::PENDING_STATUS
        ];
    }
}
