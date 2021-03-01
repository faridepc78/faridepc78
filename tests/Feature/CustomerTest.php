<?php

namespace Tests\Feature;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CustomerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /*START CHECK INDEX*/

    public function test_admin_can_see_customer_index()
    {
        $this->actAsAdmin();
        $this->get(route('customer.index'))->assertOk();
    }

    public function test_user_can_not_see_customer_index()
    {
        $this->get(route('customer.index'))->assertStatus(302)->assertRedirect(route('login'));
    }

    /*END CHECK INDEX*/

    /*START CHECK CREATE*/

    public function test_admin_can_see_create_customer()
    {
        $this->actAsAdmin();
        $this->get(route('customer.create'))->assertOk();
    }

    public function test_user_can_not_see_create_customer()
    {
        $this->get(route('customer.create'))->assertStatus(302)->assertRedirect(route('login'));
    }

    /*END CHECK CREATE*/

    /*START CHECK STORE*/

    public function test_admin_can_store_customer()
    {
        $this->actAsAdmin();
        $response = $this->post(route('customer.store'), $this->customerData());
        $response->assertStatus(302);
        $response->assertRedirect(route('customer.create'));
        $this->assertEquals(1, Customer::all()->count());
    }

    public function test_user_can_not_store_customer()
    {
        $response = $this->post(route('customer.store'), $this->customerData());
        $response->assertStatus(302);
        $response->assertRedirect(route('login'));
        $this->assertEquals(0, Customer::all()->count());
    }

    /*END CHECK STORE*/

    /*START CHECK EDIT*/

    public function test_admin_can_see_edit_customer()
    {
        $this->actAsAdmin();
        $customer = $this->createCustmoer();
        $this->get(route('customer.edit', $customer->id))->assertOk();
    }

    public function test_user_can_not_see_edit_customer()
    {
        $customer = $this->createCustmoer();
        $this->get(route('customer.edit', $customer->id))->assertStatus(302)->assertRedirect(route('login'));
    }

    /*END CHECK EDIT*/

    /*START CHECK UPDATE*/

    public function test_admin_can_update_customer()
    {
        $this->actAsAdmin();
        $customer = $this->createCustmoer();
        $this->patch(route('customer.update', $customer->id), [
            'name' => 'test',
            'from' => 'slug-test',
            'text' => 'this is a test'
        ])->assertStatus(302)->assertRedirect(route('customer.edit', $customer->id));
        $customer = $customer->fresh();
        $this->assertEquals('test', $customer->name);
    }

    public function test_user_can_not_update_customer()
    {
        $customer = $this->createCustmoer();
        $this->patch(route('customer.update', $customer->id), [
            'name' => 'test',
            'from' => 'slug-test',
            'text' => 'this is a test'
        ])->assertStatus(302)->assertRedirect(route('login'));
    }

    /*END CHECK UPDATE*/

    /*START CHECK DESTROY*/

    public function test_admin_can_delete_customer()
    {
        $this->actAsAdmin();
        $customer = $this->createCustmoer();
        $this->delete(route('customer.destroy', $customer->id))->assertStatus(302)->assertRedirect(route('customer.index'));
        $this->assertEquals(0, Customer::all()->count());
    }

    public function test_user_can_not_delete_customer()
    {
        $this->withoutExceptionHandling();
        $this->expectException('Illuminate\Auth\AuthenticationException');
        $customer = $this->createCustmoer();
        $this->delete(route('customer.destroy', $customer->id))->assertStatus(302)->assertRedirect(route('login'));
        $this->assertEquals(1, Customer::all()->count());
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

    private function createCustmoer()
    {
        $data = $this->customerData();
        return Customer::query()->create($data);
    }

    private function customerData()
    {
        return [
            'name' => $this->faker->name,
            'from' => $this->faker->name,
            'text' => $this->faker->text
        ];
    }
}
