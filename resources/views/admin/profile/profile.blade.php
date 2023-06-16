@extends('admin.admin')

@section('title', 'Modification du profil')

@section('content')

<div class="container">
  <div class="profile-update-container">
    <div class="profile-informations">
      @include('admin.profile.template.update-profile')
    </div>
    <div class="profile-password">
      @include('admin.profile.template.update-password')
    </div>
    <div class="profile-delete">
      @include('admin.profile.template.delete-account')
    </div>
  </div>  
</div>

@endsection