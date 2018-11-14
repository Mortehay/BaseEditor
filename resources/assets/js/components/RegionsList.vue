<template>
    <div>
        <h1>Regions</h1>
        <div class="row">
            <div class="d-inline p-2 bg-primary text-white col-1">
                id
            </div>
            <div class="d-inline p-2 bg-primary text-white col-3">
                <div class="w-100">name</div>
            </div>
            <div class="d-inline p-2 bg-primary text-white col-1">
                <div class="w-25">tom</div>
            </div>
            <div class="d-inline p-2 bg-primary text-white col-1">
                <div class="w-25">cat</div>
            </div>
            <div class="d-inline p-2 bg-primary text-white col-1">
                <div class="w-25">mainland</div>
            </div>
            <div class="d-inline p-2  bg-primary text-white col-1">
                <div class="w-25">islands</div>
            </div>
            <div class="d-inline p-2  bg-primary text-white col-1">
                <div class="w-25">exotic</div>
            </div>
            <div class="d-inline p-2  bg-primary text-white col-1">
                <div class="w-25">mice</div>
            </div>
        </div>

        <div class="" v-for="region in regions" v-bind:key="region.id">

            <form @submit.prevent="editRegion" class="p-3 border border-primary row">
                <div class="d-inline p-2 bg-primary text-white col-1">
                    <input type="text" placeholder="id" name="id" v-model="region.id" disabled>
                </div>
                <div class="d-inline p-2 bg-primary text-white col-3">
                    <input  class="w-100" type="text" placeholder="name" v-model="region.name">
                </div>
                <div class="d-inline p-2 bg-primary text-white col-1">
                    <input  class="w-25" type="text" placeholder="name" v-model="region.tom">
                </div>
                <div class="d-inline p-2 bg-primary text-white col-1">
                    <input  class="w-25" type="text" placeholder="name" v-model="region.cat_order">
                </div>
                <div class="d-inline p-2 bg-primary text-white col-1">
                    <input  class="w-25" type="text" placeholder="name" v-model="region.order_mainland">
                </div>
                <div class="d-inline p-2  bg-primary text-white col-1">
                    <input  class="w-25" type="text" placeholder="name" v-model="region.order_islands">
                </div>
                <div class="d-inline p-2  bg-primary text-white col-1">
                    <input  class="w-25" type="text" placeholder="name" v-model="region.order_exotic">
                </div>
                <div class="d-inline p-2  bg-primary text-white col-1">
                    <input  class="w-25" type="text" placeholder="name" v-model="region.order_mice">
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        name: "regions-list",
        data() {
            return {
                isOpen: false,
                hotels: [],
                checkedCatalogueType:[],
                regions:[],
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
            /* this.fetchHotels();*/
             this.fetchRegions();

        },
        updated(){
            console.log('regions', this.regions);
        },
        methods:{
            fetchRegions (page_url) {
                let vm = this;
                page_url = page_url || '/api/regions';
                fetch(page_url)
                    .then(res => res.json())
                    .then(res =>{
                        //console.log(res.data);
                        this.regions = res.data;
                        //console.log('regions',this.regions);
                    })
                    .catch(err => console.log(err));
            },
        }

    }
</script>

<style scoped>

</style>