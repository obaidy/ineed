@extends('layouts.app')

@section('content')
<form action="" method='post'>
<?= csrf_field() ?>
<input type="text" name="name" value='{{$user->name}}'>
    <textarea name="description" id="" cols="30" rows="10">{{$user->description}}</textarea>
    <select name="category">
        @foreach ($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
    <div>Confirm your weekly availability</div>
    @foreach ($days_of_week as $day)
        {{$day}}
        @foreach ($times_of_day as $time)
            <br>
            <input type="checkbox" name="avail[]" value="{{$day}}-{{$time}}">{{$time}}
        @endforeach
    @endforeach
    <input type="submit" value="submit">
    
</form>
@endsection