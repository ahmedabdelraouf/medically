<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\JsonResponse;
use Setting;

class SettingsController extends BaseAPIController
{

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function getTermsAndConditions(): JsonResponse
    {
        $terms = Setting::get('terms_' . app()->getLocale());
        return $this->prepareApiResponse(false, null,
            trans('admin.data_retrieved_successfully'),
            ['terms' => $terms],
            JsonResponse::HTTP_OK, JsonResponse::HTTP_OK);
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function getPrivacyPolicy(): JsonResponse
    {
        $terms = Setting::get('privacy_' . app()->getLocale());
        return $this->prepareApiResponse(false, null,
            trans('admin.data_retrieved_successfully'),
            ['privacy' => $terms],
            JsonResponse::HTTP_OK, JsonResponse::HTTP_OK);
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function getContactPhoneNumber(): JsonResponse
    {
        $phone = Setting::get('website_phone');
        return $this->prepareApiResponse(false, null,
            trans('admin.data_retrieved_successfully'),
            ['phone' => $phone],
            JsonResponse::HTTP_OK, JsonResponse::HTTP_OK);
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function getCommission(): JsonResponse
    {
        $commission = Setting::get('commission');
        return $this->prepareApiResponse(false, null,
            trans('admin.data_retrieved_successfully'),
            ['commission' => $commission],
            JsonResponse::HTTP_OK, JsonResponse::HTTP_OK);
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function getAllSettings(): JsonResponse
    {
        $commission = Setting::all();
        return $this->prepareApiResponse(false, null,
            trans('admin.data_retrieved_successfully'),
            $commission,
            JsonResponse::HTTP_OK, JsonResponse::HTTP_OK);
    }


    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function getAboutUs(): JsonResponse
    {
        $terms = Setting::get('about_' . app()->getLocale());
        return $this->prepareApiResponse(false, null,
            trans('admin.data_retrieved_successfully'),
            ['about' => $terms],
            JsonResponse::HTTP_OK, JsonResponse::HTTP_OK);
    }


}
