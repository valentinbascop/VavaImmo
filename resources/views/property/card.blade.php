<div class="card">
    <div class="card-body">
        <h5 class="card-title">
            <a href="/">{{ $property->title }}</a>
        </h5>
        <p class="card-text">{{$property->surface}} m² - {{$property->city}} {{$property->postal_code}}</p>
        <div class="price">{{number_format($property->price, thousands_separator: ' ' )}} €</div>
    </div>
</div>