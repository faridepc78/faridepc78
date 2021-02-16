<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\CreateCustomerRequest;
use App\Http\Requests\Customer\UpdateCustomerRequest;
use App\Repositories\CustomerRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    private $customerRepository;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function index()
    {
        $customer = $this->customerRepository->paginate();
        return view('admin.customer.index',compact('customer'));
    }

    public function create()
    {
        return view('admin.customer.create');
    }

    public function store(CreateCustomerRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $this->customerRepository->store($request);
            });
            DB::commit();
            newFeedback();
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('شکست', 'عملیات با شکست مواجه شد', 'error');
        }
        return back();
    }

    public function edit($id)
    {
        $customer = $this->customerRepository->findById($id);
        return view('admin.customer.edit', compact('customer'));
    }

    public function update(UpdateCustomerRequest $request, $id)
    {
        try {
            DB::transaction(function () use ($request, $id) {
                $this->customerRepository->update($request, $id);
            });
            DB::commit();
            newFeedback();
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('شکست', 'عملیات با شکست مواجه شد', 'error');
        }
        return back();
    }

    public function destroy($id)
    {
        try {
            DB::transaction(function () use ($id) {
                $customer = $this->customerRepository->findById($id);
                $customer->delete();
            });
            DB::commit();
            newFeedback();
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('شکست', 'عملیات با شکست مواجه شد', 'error');
        }
        return back();
    }
}
