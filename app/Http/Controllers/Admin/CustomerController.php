<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Customer\CreateCustomerRequest;
use App\Http\Requests\Admin\Customer\UpdateCustomerRequest;
use App\Repositories\CustomerRepository;
use Exception;

class CustomerController extends Controller
{
    private $customerRepository;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
        $this->middleware('auth:web');
    }

    public function index()
    {
        $customer = $this->customerRepository->paginate();
        return view('admin.customer.index', compact('customer'));
    }

    public function create()
    {
        return view('admin.customer.create');
    }

    public function store(CreateCustomerRequest $request)
    {
        try {
            $this->customerRepository->store($request);
            newFeedback();
        } catch (Exception $exception) {
            newFeedback('شکست', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('customer.create');
    }

    public function edit($id)
    {
        $customer = $this->customerRepository->findById($id);
        return view('admin.customer.edit', compact('customer'));
    }

    public function update(UpdateCustomerRequest $request, $id)
    {
        try {
            $this->customerRepository->update($request, $id);
            newFeedback();
        } catch (Exception $exception) {
            newFeedback('شکست', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('customer.edit', $id);
    }

    public function destroy($id)
    {
        try {
            $customer = $this->customerRepository->findById($id);
            $customer->delete();
            newFeedback();
        } catch (Exception $exception) {
            newFeedback('شکست', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('customer.index');
    }
}
