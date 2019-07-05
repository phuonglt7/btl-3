@extends('layouts.app')

@section('content')

    <div class="container">

      <h2>Laravel JQuery Form Validation Example - HDTuto.com</h2><br/>

      <form method="post" action="{{url('validation')}}" id="form">

        @csrf

            <label for="Name">Name:</label>

            <input type="text" class="form-control" name="name">



              <label for="Email">Email:</label>

              <input type="text" class="form-control" name="email">



              <label for="Number">Phone Number:</label>

              <input type="text" class="form-control" name="number">


              <label for="Min Length">Min Length(minium 5):</label>

              <input type="text" class="form-control" name="minlength">


              <label for="Max Length">Max Length(maximum 8):</label>

              <input type="text" class="form-control" name="maxlength">


              <label for="Min Value">Min Value(minium 1):</label>

              <input type="text" class="form-control" name="minvalue">


              <label for="Max Value">Max Value(maximum value 100):</label>

              <input type="text" class="form-control" name="maxvalue">

              <label for="Range">Range(minium 20, maximum 40):</label>

              <input type="text" class="form-control" name="range">



              <label for="Range">URL:</label>

              <input type="text" class="form-control" name="url">



            <input type="file" name="filename">    


            <button type="submit" class="btn btn-success">Submit</button>


      </form>

    </div>
@include('home')
@endsection