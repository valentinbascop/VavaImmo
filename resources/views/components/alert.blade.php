<div class="alert alert-{{ $type }}" {{$attributes->merge(['class' => "alert alert-$type"])}}>
    {{ $slot }}
    <!-- Variable automatique générée qui représente le contenu  -->
</div>