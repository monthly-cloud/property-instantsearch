<template>
    <div class="filters-container">
        <button
        class="btn btn-default" disabled>
            Date
        </button>
        <button
        :class="filtersExpanded ? 'btn btn-default active' : 'btn btn-default'"
        @click="openRoomFilter()">
            Room Filter
        </button>

        <div
        v-if="filtersExpanded"
        class="filters-container__expanded-filter"
        :style="'left: ' + horizontalAdjustment + 'px'">
            <ais-refinement-list
            v-if="activeFilter === 'roomType'"
            attribute-name="room_type">
            </ais-refinement-list>
        </div>

        <div
        v-if="filtersExpanded"
        class="expanded-filter__overlay"
        @click="cleanFilters()"></div>
    </div>
    <!-- <div class="aisdemo-filters">
        <div class="row aisdemo-filter">
            <div class="col-sm-2 aisdemo-filter-title">Dates</div>
            <div class="col-sm-3"><input class="date form-control" value="16/01/2016" disabled /></div>
        </div>
        <div id="room_types" class="row aisdemo-filter">
            <div class="col-sm-2 aisdemo-filter-title">Room Type</div>
                <ais-refinement-list attribute-name="room_type"></ais-refinement-list>
        </div>
    </div>  -->
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
            cleanFilters() {
                this.filtersExpanded = false;
                this.activeFilter = undefined;
            },
            openRoomFilter() {
                this.filtersExpanded ? this.filtersExpanded = false : this.filtersExpanded = true;
                this.horizontalAdjustment = 65;
                this.activeFilter = 'roomType';
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
        height: 200px;
        border: 1px solid rgba(0, 0, 0, 0.2);
        border-radius: 4px;
        box-shadow: 0 14px 36px 2px rgba(0, 0, 0, 0.15);
        padding: 24px;
        overflow-y: auto;
        white-space: normal;
        background-color: #fff;
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
