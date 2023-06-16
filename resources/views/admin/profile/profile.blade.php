@extends('admin.admin')

@section('title', 'Modification du profil')

@section('content')

<div class="container">
  <div class="profile-update-container">
    <div class="profile-informations">
      @include('admin.profile.template.update-profile')
    </div>
  </div>  
</div>

@endsection