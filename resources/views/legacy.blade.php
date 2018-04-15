@extends('layout')

@section('title', 'Search')

@section('content')

    <ais-index 
        app-id="{{config('scout.algolia.id')}}"
        api-key="{{config('scout.algolia.search')}}"
        index-name="results"
        @if (!empty($request->lat) && !empty($request->lng))
            :query-parameters="{getRankingInfo: true, aroundLatLng: '{{$request->lat}}, {{$request->lng}}'}"
        @endif
    >
        <div class="container-fluid" style="padding-left: 0; padding-right: 0;">
            <header class="navbar navbar-static-top aisdemo-navbar">
                <a href="https://community.algolia.com/vue-instantsearch/" class="logo">
                    <img src="/images/logo.svg" width=40 ></a>

            </header>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-7 aisdemo--left-column">

                    <div class="aisdemo-filters">
                        <!-- Dates & Guests -->
                        <div class="row aisdemo-filter">
                            <div class="col-sm-3 aisdemo-filter-title">Dates</div>
                            <div class="col-sm-3">
                                <ais-date-picker name="available_from"></ais-date-picker>
                            </div>
                            <div class="col-sm-3 aisdemo-filter-title">Occupancy</div>
                            <div class="col-sm-3">
                                <ais-numeric-menu operator=">=" name="occupancy_limit">
                                    <option></option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </ais-numeric-menu>
                            </div>
                            <div class="col-sm-3 aisdemo-filter-title">Bedrooms</div>
                            <div class="col-sm-3">
                                <ais-numeric-menu name="bedrooms">
                                    <option
                                    label="Studio">
                                        0
                                    </option>
                                    <option
                                    label="1 bedroom">
                                        1
                                    </option>
                                    <option
                                    label="2 bedrooms">
                                        2
                                    </option>
                                    <option
                                    label="3 bedrooms">
                                        3
                                    </option>
                                </ais-numeric-menu>
                            </div>
                            <div class="col-sm-3 aisdemo-filter-title">City</div>
                            <div class="col-sm-3">
                                <ais-options-menu name="city">
                                    <option></option>
                                    <option>Berlin</option>
                                    <option>San Francisco</option>
                                    <option>London</option>
                                </ais-options-menu>
                            </div>
                            <div class="col-sm-2 aisdemo-filter-title">Room Type</div>
                            <div class="col-sm-10">
                                <ais-refinement-list attribute-name="room_type"></ais-refinement-list>
                            </div>
                            <div class="col-sm-2 aisdemo-filter-title">Price</div>
                            <div class="col-sm-10">
                                <ais-price-range attribute-name="price" currency="USD"></ais-price-range>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="container-fluid" id="results">
                            <div class="row" id="hits">
                                <ais-no-results>
                                   <template slot-scope="props">
                                    <div class="alert alert-warning">
                                        <p>No properties found.</p>
                                    </div>
                                   </template>
                                </ais-no-results>
                                <ais-results>
                                    <template slot-scope="{ result }">
                                        <search-result :result="result"></search-result>
                                    </template>
                                </ais-results>
                            </div>
                            <div class="row">
                                <div id="pagination">
                                    <ais-pagination></ais-pagination>
                                </div>
                                <div class="thank-you">
                                    Data from <a href="https://www.airbnb.com/">airbnb.com</a>, user pics from <a href="https://randomuser.me/">randomuser.me</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Left col -->

                <!-- Right col -->
                <div class="col-sm-5 hidden-xs aisdemo--right-column">
                    <div id="map">
                        <gmap-map :center="{lat: 37.7577627, lng: -122.4726194}" :zoom="12">
                            <ais-results>
                                <template slot-scope="{ result }">
                                    <gmap-marker :position="result._geoloc"></gmap-marker>
                                </template>
                            </ais-results>
                        </gmap-map>
                    </div>
                </div>
                <!-- /Right col -->
            </div>
        </div>
    </ais-index>
@endsection
