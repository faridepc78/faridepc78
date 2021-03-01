<?php

namespace Tests\Feature;

use App\Models\Payment;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PaymentTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /*START CHECK INDEX*/

    public function test_admin_can_see_payment_index()
    {
        $this->actAsAdmin();
        $this->get(route('payment.index'))->assertOk();
    }

    public function test_user_can_not_see_payment_index()
    {
        $this->get(route('payment.index'))->assertStatus(302)->assertRedirect(route('login'));
    }

    /*END CHECK INDEX*/

    /*START CHECK PENDING*/

    public function test_admin_can_see_pending_payment()
    {
        $this->actAsAdmin();
        $this->get(route('payment.pending'))->assertOk();
    }

    public function test_user_can_not_see_pending_payment()
    {
        $this->get(route('payment.pending'))->assertStatus(302)->assertRedirect(route('login'));
    }

    /*END CHECK PENDING*/

    /*START CHECK FAIL*/

    public function test_admin_can_see_fail_payment()
    {
        $this->actAsAdmin();
        $this->get(route('payment.fail'))->assertOk();
    }

    public function test_user_can_not_see_fail_payment()
    {
        $this->get(route('payment.fail'))->assertStatus(302)->assertRedirect(route('login'));
    }

    /*END CHECK FAIL*/

    /*START CHECK SUCCESS*/

    public function test_admin_can_see_success_payment()
    {
        $this->actAsAdmin();
        $this->get(route('payment.success'))->assertOk();
    }

    public function test_user_can_not_see_success_payment()
    {
        $this->get(route('payment.success'))->assertStatus(302)->assertRedirect(route('login'));
    }

    /*END CHECK SUCCESS*/

    /*START CHECK SHOW*/

    public function test_admin_can_see_show_payment()
    {
        $this->withoutExceptionHandling();
        $this->actAsAdmin();
        $payment = $this->createPayment();
        $this->get(route('payment.show', $payment->id))->assertOk();
    }

    public function test_user_can_not_see_show_payment()
    {
        $payment = $this->createPayment();
        $this->get(route('payment.show', $payment->id))->assertStatus(302)->assertRedirect(route('login'));
    }

    /*END CHECK SHOW*/

    /*START CHECK DESTROY*/

    public function test_admin_can_delete_payment()
    {
        $this->actAsAdmin();
        $payment = $this->createPayment();
        $this->delete(route('payment.destroy', $payment->id))->assertStatus(302)->assertRedirect(route('payment.index'));
        $this->assertEquals(0, Payment::all()->count());
    }

    public function test_user_can_not_delete_payment()
    {
        $this->withoutExceptionHandling();
        $this->expectException('Illuminate\Auth\AuthenticationException');
        $payment = $this->createPayment();
        $this->delete(route('payment.destroy', $payment->id))->assertStatus(302)->assertRedirect(route('login'));
        $this->assertEquals(1, Payment::all()->count());
    }

    /*END CHECK DESTROY*/

    private function createAdminData()
    {
        $this->actingAs(User::factory()->create());
    }

    private function actAsAdmin()
    {
        $this->createAdminData();
        auth()->check();
    }

    private function createPayment()
    {
        $data = $this->paymentData();
        return Payment::query()->create($data);
    }

    private function paymentData(): array
    {
        return [
            'user_name' => $this->faker->name,
            'user_email' => $this->faker->email,
            'user_mobile' => '09123456789',
            'user_ip' => request()->ip(),
            'title' => $this->faker->title,
            'price' => '1000000',
            'ref_number' => 'A00000000000000000000000000243973838',
            'order_number' => make_token(10),
            'status' => Payment::ACTIVE_STATUS
        ];
    }
}
