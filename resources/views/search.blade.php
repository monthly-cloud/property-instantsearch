@extends('layout')

@section('title', 'Search')

@section('content')
    <ais-index app-id="{{env('ALGOLIA_APP_ID')}}" api-key="{{env('ALGOLIA_SEARCH')}}" index-name="homes">
        <div class="container-fluid" style="padding-left: 0; padding-right: 0;">
            <header class="navbar navbar-static-top aisdemo-navbar">
                <a href="https://community.algolia.com/vue-instantsearch/" class="logo">
                    <img src="/images/logo.svg" width=40 ></a>
                <i class="fa fa-search"></i>
                <ais-input placeholder="Where do you want to live?"></ais-input>
            </header>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-7 aisdemo--left-column">
                    <div class="aisdemo-filters">
                        <!-- Dates & Guests -->
                        <div class="row aisdemo-filter">
                            <div class="col-sm-2 aisdemo-filter-title">Dates</div>
                            <div class="col-sm-3"><input class="date form-control" value="16/01/2016" disabled /></div>
                        </div>
                        <!-- Room types -->
                        <div id="room_types" class="row aisdemo-filter">
                            <div class="col-sm-2 aisdemo-filter-title">Room Type</div>
                                <ais-refinement-list attribute-name="room_type"></ais-refinement-list>
                        </div>
                    </div>
                    <div class="row">
                        <div class="container-fluid" id="results">
                            <div class="row" id="hits">
                                <ais-results>
                                    <template scope="{ result }">
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
                <div class="col-sm-5 aisdemo--right-column">
                    <div id="map">
                        <gmap-map :center="{lat: 37.7577627, lng: -122.4726194}" style="height: 800px;" :zoom="12">
                            <ais-results>
                                <template scope="{ result }">
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