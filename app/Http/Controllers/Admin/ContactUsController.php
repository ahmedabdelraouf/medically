<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ContactUsAPIRequest;
use App\Http\Requests\Admin\ContactUsRequest;
use Dev\Infrastructure\Model\ContactUs;
use Dev\Domain\Service\ContactUsService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{

    private $service;

    public function __construct(ContactUsService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Factory|View
     */
    public function index(Request $request)
    {
        $contact_us = $this->service->index($request->all());
        $contact_us = $contact_us['data'];
        return view('admin.contact_us.index', compact('contact_us'));
    }


    /**
     * Display the specified resource.
     *
     * @param ContactUs $contact_us
     * @return Application|Factory|View|void
     */
    public function show( ContactUs $contactUs)
    {
        return view('admin.contact_us.edit', compact('contactUs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ContactUs $building_type
     * @return Application|Factory|View|Response
     */
    public function edit( ContactUs $contactUs)
    {
        return view('admin.contact_us.edit', compact('contactUs'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param ContactUsRequest $request
     * @param ContactUs $contact_us
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request,  $id)
    {
        $contactus = ContactUs::findOrFail($id);
        $contact_us_data = $request->all();
        try {
            $this->service->update($contact_us_data, $contactus);
            session()->flash('success' , trans('admin.contact-us-message-read'));
            return redirect()->back();
        } catch (Exception $e) {
            return redirect()->back()->withErrors("something wrong happened");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy( $id)
    {
        $this->service->destroy($id);
        session()->flash('success' , trans('admin.contact-us-message-delete'));
        return redirect()->back()->with("ContactUs deleted successfully");
    }


    public function store(ContactUsAPIRequest $contactUsRequest)
    {
        
        $result = $this->service->store($contactUsRequest->validated());
        return response()->json('true');

    }
}
