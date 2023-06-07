<div class="card">
    <div class="card-image">
        @if($property->getPicture())
            <img src="{{ $property->getPicture()->getImageUrl() }}" alt="" class="form-picture">
        @else
            <img src="/empty.png" alt="" class="form-picture">
        @endif
    </div>
    <div class="card-body">
        <h5 class="card-title">
            <a href="{{ route('property.show', ['slug' => $property->getSlug(), 'property' => $property] )}}">{{ $property->title }}</a>
        </h5>
        <p class="card-text">{{$property->surface}} m² - {{$property->city}} {{$property->postal_code}}</p>
        <div class="price">{{number_format($property->price, thousands_separator: ' ' )}} €</div>
    </div>
</div>