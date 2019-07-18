@extends('layouts.ineed')

@section('content')
    <div class='mt-5 w-50 container bg-dark text-white rounded'>
    <div class='px-3 py-2'>Hi, I'm <span class='font-weight-bold'>{{ $provider->name }}</span> and I'm a <span class='font-weight-bold'>{{$categ->name}}</span>.</div>
    <div class='pl-3 font-weight-bold'>a little about me:</div>
    <div class='px-3 py-1'>{{ $provider->description }}</div>
      <div class='p-3'>I'm asking for {{ $provider->wage }} CZK per hour</div>
      
    </div>

    <div class="container my-5 w-50">
        <h3 class='text-white bg-dark text-center rounded'>My weekly availability</h3>
        <div class="row">
            <div class="col"></div>
            <div class='text-white bg-dark ml-1 mb-1 rounded font-weight-bold col text-center'>Morning</div>
            <div class="text-white bg-dark ml-1 mb-1 rounded font-weight-bold col text-center">Afternoon</div>
            <div class="text-white bg-dark ml-1 mb-1 rounded font-weight-bold col text-center">Evening</div>
            <div class="text-white bg-dark ml-1 mb-1 rounded font-weight-bold col text-center">All Day</div>
        </div>
            @foreach ($days_of_week as $day)
                <div class="row">
                <div class="text-white bg-dark mb-1 pt-1 rounded font-weight-bold col">{{$day}}</div>
                @foreach ($times_of_day as $time)
                
                    {{-- availability iterator. --}}
                    {{-- Checks if day and time is in array provided --}}
                    @if (in_array($day."-".$time, $full_availability))
                    
                        <div class='col rounded p-3 ml-1 mb-1 bg-success text-white'>
                        </div>
                        
                    @else
                    <div class='col rounded p-3 ml-1 mb-1 bg-danger text-white"'>
                         </div>
                      
                    @endif
                    @endforeach
                </div>
                  
              @endforeach
              </div>
        
       

    {{-- request --}}
    
    <form class='container my-5' action="" method='post'>
        @csrf
        <h3 class='text-white bg-dark  p-2 rounded mb-3 text-center'>Request me at one of my available times.</h3 class='mb-3'>
        

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

        <div class="form-row">
    
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
        <h2 class="reviews text-white bg-dark  p-2 rounded mb-3 text-center">Reviews</h2>
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
