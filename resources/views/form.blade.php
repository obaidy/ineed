@extends('layouts.app')


@section('content')
<form action="" method='post'>
<?= csrf_field() ?>

    <input type="text" name="name" value='{{$user->name}}'>
    <textarea name="description" id="" cols="30" rows="10">{{$user->description}}</textarea>
    
    {{-- Select category of service --}}
    <select name="category">
        
        @foreach ($categories as $category)
            @if ($user->category_id == $category->id)
                <option selected value="{{ $category->id }}">{{ $category->name }}</option>
            @else
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endif
        @endforeach
    </select>

    {{-- Weekly Availability --}}
    <div>Confirm your weekly availability</div>
    @foreach ($days_of_week as $day)
        {{$day}}
        
        @foreach ($times_of_day as $time)
            {{-- availability iterator. --}}
            {{-- Checks if day and time is in array provided --}}
            @if (in_array($day."-".$time, $full_availability))
                <input type="checkbox" checked name="avail[]" id="{{$day}}-{{$time}}" value="{{$day}}-{{$time}}">
                <label for="{{$day}}-{{$time}}">{{ $time }}</label>
            
            @else
                <input type="checkbox" name="avail[]" id="{{$day}}-{{$time}}" value="{{$day}}-{{$time}}">
                <label for="{{$day}}-{{$time}}">{{ $time }}</label>
            @endif
        
            <br>
                
        @endforeach
        
        <br>
    @endforeach
    
    <input type="submit" value="submit">
    
    
</form>
@endsection

{{-- multiple ways to check already available boxes --}}
{{-- loop through array of date+time, and then check against availability[0]. if found, check, and continue, checking aginst availability[1] --}}
{{-- doesn't work.. variables aren't passed outside of foreach loops... even tried with pass by reference --}}

{{-- @if($availability[$i]->hour === $time && $availability[$i]->day === $day)
                
                <input type="checkbox" checked name="avail[]" id="{{$day}}-{{$time}}" value="{{$day}}-{{$time}}">
                <label for="{{$day}}-{{$time}}">{{ $time }}</label>
                @php
                    $i = $i + 1;
                    //dd($availability[5]);
                    
                @endphp
                
            @else 
                <input type="checkbox" name="avail[]" id="{{$day}}-{{$time}}" value="{{$day}}-{{$time}}">
                <label for="{{$day}}-{{$time}}">{{ $time }}</label>
            @endif --}}