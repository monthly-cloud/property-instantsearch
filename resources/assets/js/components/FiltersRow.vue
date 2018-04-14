<template>
    <div class="filters-container">
        <button
        :class="filtersExpanded && activeFilter === 'available_from' ? 'btn btn-default active' : 'btn btn-default'"
        @click="openDateFilter()">
            Available from
        </button>
        <div
        v-show="filtersExpanded && activeFilter === 'available_from'"
        class="filters-container__expanded-filter filters-container__expanded-filter--date"
        :style="'left: ' + horizontalAdjustment + 'px'">
            <ais-date-picker
            name="available_from"/>
        </div>

        <button
        :class="filtersExpanded && activeFilter === 'roomType' ? 'btn btn-default active' : 'btn btn-default'"
        @click="openRoomFilter()">
            Room type
        </button>
        <div
        v-show="filtersExpanded && activeFilter === 'roomType'"
        class="filters-container__expanded-filter"
        :style="'left: ' + horizontalAdjustment + 'px'">
            <ais-refinement-list
            attribute-name="room_type">
            </ais-refinement-list>
        </div>

        <button
        :class="filtersExpanded && activeFilter === 'occupancy_limit' ? 'btn btn-default active' : 'btn btn-default'"
        @click="openOccupancyFilter()">
            Guests
        </button>
        <div
        v-show="filtersExpanded && activeFilter === 'occupancy_limit'"
        class="filters-container__expanded-filter"
        :style="'left: ' + horizontalAdjustment + 'px'">
            <ais-numeric-menu
            name="occupancy_limit">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </ais-numeric-menu>
        </div>

        <button
        :class="filtersExpanded && activeFilter === 'bedrooms' ? 'btn btn-default active' : 'btn btn-default'"
        @click="openBedroomsFilter()">
            Bedrooms
        </button>
        <div
        v-show="filtersExpanded && activeFilter === 'bedrooms'"
        class="filters-container__expanded-filter"
        :style="'left: ' + horizontalAdjustment + 'px'">
            <ais-numeric-menu
            name="bedrooms">
                <option
                label="Studio (0)">
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

        <button
        :class="filtersExpanded && activeFilter === 'price' ? 'btn btn-default active' : 'btn btn-default'"
        @click="openPriceRangeFilter()">
            Price range
        </button>
        <div
        v-show="filtersExpanded && activeFilter === 'price'"
        class="filters-container__expanded-filter"
        :style="'left: ' + horizontalAdjustment + 'px'">
            <ais-price-range attribute-name="price" currency="USD"></ais-price-range>
        </div>

        <div
        v-if="filtersExpanded"
        class="expanded-filter__overlay"
        @click="hideFilters()"></div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                filtersExpanded: false,
                horizontalAdjustment: 0,
                activeFilter: undefined,
            }
        },
        methods: {
            hideFilters() {
                this.filtersExpanded = false;
                this.activeFilter = undefined;
            },
            openDateFilter() {
                this.filtersExpanded ? this.filtersExpanded = false : this.filtersExpanded = true;
                this.horizontalAdjustment = 0;
                this.activeFilter = 'available_from';
            },
            openRoomFilter() {
                this.filtersExpanded ? this.filtersExpanded = false : this.filtersExpanded = true;
                this.horizontalAdjustment = 123;
                this.activeFilter = 'roomType';
            },
            openOccupancyFilter() {
                this.filtersExpanded ? this.filtersExpanded = false : this.filtersExpanded = true;
                this.horizontalAdjustment = 228;
                this.activeFilter = 'occupancy_limit';
            },
            openBedroomsFilter() {
                this.filtersExpanded ? this.filtersExpanded = false : this.filtersExpanded = true;
                this.horizontalAdjustment = 309;
                this.activeFilter = 'bedrooms';
            },
            openPriceRangeFilter() {
                this.filtersExpanded ? this.filtersExpanded = false : this.filtersExpanded = true;
                this.horizontalAdjustment = 407;
                this.activeFilter = 'price';
            }
        }
    }
</script>

<style lang="scss" scoped>
    .filters-container {
        position: relative;
        z-index: 10;
        display: flex;
        align-items: center;
        height: 64px;

        button {
            margin-right: 10px;
            z-index: 10;

            &:last-of-type {
                margin-right: 0;
            }
        }
    }

    .filters-container__expanded-filter {
        position: absolute;
        top: 55px;
        left: 0;
        z-index: 10;
        width: 200px;
        border: 1px solid rgba(0, 0, 0, 0.2);
        border-radius: 4px;
        box-shadow: 0 14px 36px 2px rgba(0, 0, 0, 0.15);
        padding: 24px;
        overflow-y: auto;
        white-space: normal;
        background-color: #fff;
    }

    .filters-container__expanded-filter--date {
        min-height: 363px;
        min-width: 353px;
    }

    .expanded-filter__overlay {
        position: fixed;
        height: 100vh;
        width: 100%;
        top: 64px;
        z-index: 1;
        background: rgba(255, 255, 255, 0.85);
    }
</style>
