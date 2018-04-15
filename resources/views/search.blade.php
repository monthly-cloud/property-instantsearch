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
                    <img src="/images/logo.svg" width="40">
                </a>
            </header>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-7 aisdemo--left-column">

                    <filters-row>
                    </filters-row>
                    <div class="row">
                        <div class="container-fluid" id="results">
                            <div class="row" id="hits">
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
