@extends('layout')

@section('title', 'Autocomplete')

@section('content')
<div class="container">
    <div class="jumbotron">
        <div class="page-header">
            <h3>Autocomplete</h3>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1">
                    <autocomplete-form href="/"></autocomplete-form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
