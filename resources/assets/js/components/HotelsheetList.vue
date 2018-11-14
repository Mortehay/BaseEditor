<template>
    <div class="d-inline p-2 bg-primary text-white">
        <select v-model="hotel.region_id">
            <option v-for="region in regions" v-bind:value="region.id" v-bind:selected="hotel.region_id == region.id">
                {{ region.name }}
            </option>
        </select>
    </div>
</template>

<script>
    export default {
        name: "hotelsheet-list",
        data() {
            return {
                isOpen: false,
                hotels: [],
                checkedCatalogueType:[],
                regions:[1,2,3],
                selectedRegion: 99,
                hotel: {
                    id: '',
                    name: '',
                    region_id: '',
                    searchName:'',
                    general: '',
                    mice: '',
                    luxury: '',
                    created_at:'',
                    updated_at:''
                },
                hotel_id: '',
                pagination: {},
                edit: false
            };
        },
        created() {
           /* this.fetchHotels();
            this.fetchRegions();*/
            console.log('regions', 'trulalala');
        },
    }
</script>

<style scoped>

</style>