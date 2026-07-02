@extends('layouts.app')
@section('title', 'Profile Page')
@section('content')

    <div class="app-content-header">
        <div class="container-fluid">
            <h3>Profile</h3>
        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">

            <div class="card">
                <div class="card-body">

                    @include('profile.partials.update-profile-information-form')

                    <hr>

                    @include('profile.partials.update-password-form')

                    <hr>

                    @include('profile.partials.delete-user-form')

                </div>
            </div>

        </div>
    </div>

@endsection
