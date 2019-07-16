@extends('layouts.ineed')

@section('content')
    <div>{{ $provider->name }}</div>
    <div>{{ $provider->wage }}</div>
    <div>{{ $provider->description }}</div>

    @foreach($availability as $time)
        
        <div>{{$time->day}}</div>
        <div>{{$time->hour}}</div>

    @endforeach

    {{-- request --}}
    
    <form class='container mb-3' action="" method='post'>
        @csrf
        <h3 class='mb-3'>Request this provider at one of his available times.</h3 class='mb-3'>
        

        <div class='form-row'>
            <div class="col input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1">Date</span>
                </div>
                <input type="date" name='service_date' class="form-control" value=''>
              </div>
            
    
            <div class="col input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1">Time</span>
                </div>
                <input type="time" class="form-control" name="service_time" placeholder="Username" aria-label="time" aria-describedby="basic-addon1">
              </div>
        </div>

        <div class="form-row form-group">
    
              <div class="col input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1">Estimated Length</span>
                </div>
                <input type="text" name='service_length' class="form-control" aria-label="length" aria-describedby="basic-addon1">
              </div>
        

          
              <div class="col input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">Street and Building Number</span>
                </div>
                <input type="text" name="service_location" aria-label="Building" class="form-control">
                <input type="number" name="house_number" aria-label="House Number" class="form-control">
              </div>
            </div>
    
              <div class=" input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">Description of your needs</span>
                </div>
                <textarea name='description' class="form-control" aria-label="description"></textarea>
              </div>
         
        
        <input type="submit" class='btn btn-primary' name="submit" value="Request!">



    </form>
    
    <div class='container'>
        <h2 class="reviews">Reviews</h2>
        @foreach ($reviews as $review)
            <div class="card review">

                <div class='row'>
                    <div class="col user">{{$review->user_name}}</div>
                    <div class="col rating">{{$review->rating}} out of 5</div>
                </div>
                <div class="text">{{$review->text}}</div>
            </div>
        @endforeach
    </div>
@endsection
