<?php

namespace Anibalealvarezs\Projectbuilder\Controllers\Fortify;

use Anibalealvarezs\Projectbuilder\Models\PbCountry;
use Anibalealvarezs\Projectbuilder\Models\PbLanguage;
use Anibalealvarezs\Projectbuilder\Models\PbUser;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Laravel\Fortify\Http\Controllers\ProfileInformationController;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class PbProfileInformationController extends ProfileInformationController
{
    /**
     * Update the user's profile information.
     *
     * @param Request $request
     * @param UpdatesUserProfileInformation $updater
     * @return Response
     */
    public function update(Request $request,
        UpdatesUserProfileInformation $updater)
    {
        $current = PbUser::current();
        $current->name = $request->input('name');
        $current->email = $request->input('email');
        if ($language = PbLanguage::find($request->input('language'))) {
            $current->language_id = $language->id;
            $request->session()->put('locale', $language->code);
            app()->setLocale($language->code);
        }
        if ($country = PbCountry::find($request->input('country'))) {
            $current->country_id = $country->id;
        }
        $current->save();

        return $request->wantsJson()
            ? new JsonResponse('', 200)
            : back()->with('status', 'profile-information-updated');
    }
}