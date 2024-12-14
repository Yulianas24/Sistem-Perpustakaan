<title>{{config('app.titleEditProfile', 'Laravel')}} - {{$settings->webname}} </title>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="grid gap-2 p-2">
        @include('alert.alert-info')
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            @include('profile.partials.update-profile-information-form')
        </div>

        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            @include('profile.partials.update-password-form')
        </div>
    </div>
</x-app-layout>
