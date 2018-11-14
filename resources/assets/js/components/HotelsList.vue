<template>
    <div>
        <h2>
            Hotels
        </h2>
        <div>
            <button @click="toggle()" class="btn btn-secondary">Add new hotel form</button>
        </div>
        <form @submit.prevent="addHotel" class="mb-3" v-show="isOpen">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Title" v-model="hotel.title">
            </div>
            <div class="form-group">
                <input type="checkbox" id="general" value="general" v-model="checkedCatalogueType">
                <label for="general">general</label>
                <input type="checkbox" id="luxury" value="luxury" v-model="checkedCatalogueType">
                <label for="luxury">luxury</label>
                <input type="checkbox" id="mice" value="mice" v-model="checkedCatalogueType">
                <label for="mice">mice</label>
                <br>
                <span>checked Catalogue Type: {{ checkedCatalogueType }}</span>
            </div>
            <div class="form-group">
                <textarea type="text" class="form-control" placeholder="Body" v-model="hotel.body"></textarea>
            </div>
            <button type="submit" class="btn btn-secondary">Add new hotel</button>
        </form>
        <div class="d-inline">
            <h6>search:</h6>
            <input  class="w-50" type="text" placeholder="searchname" v-model="hotel.searchName" v-on:keyup="searchHotel" v-bind:class="{ danger: hotel.searchName.length < 4 }">
            <button @click="searchHotelClear()" class="btn btn-secondary">clear</button>
        </div>

        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item">
                    <a class="page-link" href="#" @click="fetchHotels(pagination.prev_page_url)">Previous</a>
                </li>
                <li class="page-item disabled"><a class="page-link text-dark" href="#">Page {{pagination.current_page}} of {{pagination.last_page}}</a></li>
                <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item">
                    <a class="page-link" href="#" @click="fetchHotels(pagination.next_page_url)">Next</a>
                </li>
            </ul>
        </nav>
        <div class="" v-for="hotel in hotels" v-bind:key="hotel.id">
            <form @submit.prevent="editHotel" class="p-3 border border-primary">
                <div class="p-2 ">
                    <div class="d-inline p-2 col-1">
                        updated at: {{(hotel.created_at.date).replace('.000000','')}}
                    </div>
                    <!--<div class="d-inline p-2 col-1">
                        updated at: {{(hotel.updated_at.date).replace('.000000','')}}
                    </div>-->
                </div>

                <div class="d-inline p-2 bg-primary text-white col-1"><input type="text" placeholder="id" name="id" v-model="hotel.id" disabled></div>
                <div class="d-inline p-2 w-50 bg-primary text-white"><input  class="w-50" type="text" placeholder="name" v-model="hotel.name"></div>
                <div class="d-inline p-2 bg-primary text-white">
                    <select v-model="hotel.region_id">
                        <option v-for="region in regions" v-bind:value="region.id" v-bind:selected="hotel.region_id == region.id">
                           {{ region.name }}
                        </option>
                    </select>
                </div>
                <br>


                <div class="d-inline">
                    <input class="m-2" type="checkbox" v-model="hotel.general" v-bind:id="'general' + hotel.id">
                    <label v-bind:for="'general' + hotel.id">general</label>
                    <input  class="m-2" type="checkbox" v-model="hotel.luxury" v-bind:id="'luxury' + hotel.id">
                    <label v-bind:for="'luxury' + hotel.id">luxury</label>
                    <input  class="m-2"  type="checkbox" v-model="hotel.mice" v-bind:id="'mice' + hotel.id">
                    <label v-bind:for="'mice' + hotel.id">mice</label>
                </div>

                <hr>
                <div>
                    <button @click="editHotel(hotel)" class="btn btn-warning">edit</button>
                    <button @click="editHotelData(hotel.id)" class="btn btn-secondary">edit hotel</button>
                </div>

            </form>
        </div>
    </div>

</template>

<script>
    export default {
        name: "hotels-list",
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
            this.fetchHotels();
            this.fetchRegions();
            //console.log('regions', this.regions);
        },
        methods:{
            toggle: function(){
                this.isOpen = !this.isOpen;
            },
            fetchHotels(page_url){
                let vm = this;
                page_url = page_url || '/api/hotels';
                fetch(page_url)
                    .then(res => res.json())
                    .then(res =>{
                        ///console.log(res.data);
                        this.hotels = res.data;
                        vm.makePagination(res.meta, res.links);
                    })
                    .catch(err => console.log(err));
            },
            fetchRegions (page_url) {
                let vm = this;
                page_url = page_url || '/api/regions';
                fetch(page_url)
                    .then(res => res.json())
                    .then(res =>{
                        //console.log(res.data);
                        this.regions = res.data;
                    })
                    .catch(err => console.log(err));
            },
            makePagination(meta, links){
                let pagination = {
                    current_page: meta.current_page,
                    last_page:meta.last_page,
                    next_page_url: links.next,
                    prev_page_url: links.prev
                };
                //console.log(pagination);
                this.pagination = pagination;
            },
            deleteHotel(id){
                if(confirm('are you sure?')){
                    fetch(`api/hotel/${id}`,{method:'delete'})
                        .then(res => res.json())
                        .then(data => {
                            alert('hotel removed');
                            this.fetchHotels();
                        })
                        .catch(err =>console.log(err));
                }
            },
            addHotel(){
                //console.log(this.edit);

                if(this.edit === false){
                    //add
                    fetch('api/hotel',{
                        method: 'post',
                        body : JSON.stringify(this.hotel),
                        headers:{
                            'content-type':'application/json'
                        }
                    })
                        .then(res => res.json())
                        .then(data =>{
                            this.hotel.title = '';
                            this.hotel.body = '';
                            alert('hotel added');
                            this.fetchHotels();
                        })
                        .catch(err => console.log(err));
                } else {
                    //update
                    fetch('api/hotel',{
                        method: 'put',
                        body : JSON.stringify(this.hotel),
                        headers:{
                            'content-type':'application/json'
                        }
                    })
                        .then(res => res.json())
                        .then(data =>{
                            this.edit = false;
                            this.hotel = {
                                id: '',
                                title: '',
                                body: ''
                            };
                            alert('hotel updated');
                            this.fetchHotels();
                        })
                        .catch(err => console.log(err));
                }
            },
            editHotel(hotel){
                if (hotel.id !== undefined)  {

                    this.hotel.id = hotel.id;
                    this.hotel.name = hotel.name;
                    this.hotel.region_id = hotel.region_id;
                    this.hotel.mice = hotel.mice;
                    this.hotel.general = hotel.general;
                    this.hotel.luxury = hotel.luxury;
                    console.log(this.hotel);
                    //update
                    fetch('api/hotel',{
                        method: 'put',
                        body : JSON.stringify(this.hotel),
                        headers:{
                            'content-type':'application/json'
                        }
                    })
                        .then(res => res.json())
                        .then(data =>{
                            this.edit = false;
                            this.hotel = {
                                id: '',
                                name: '',
                                region_id: '',
                                searchName:'',
                                general: '',
                                mice: '',
                                luxury: '',
                                created_at:'',
                                updated_at:''
                            };
                            alert('hotel updated');
                            this.fetchHotels();
                        })
                        .catch(err => console.log(err));
                }

            },
            searchHotelClear(){
                this.hotel.searchName = '';
                this.fetchHotels();
            },
            searchHotel(searchName){
                if((this.hotel.searchName).length >= 2 ){
                    console.log('change', this.hotel.searchName);
                    let vm = this;
                    //page_url = page_url || `api/hotel/${id}`;
                    fetch(`api/hotels/${this.hotel.searchName}`)
                        .then(res => res.json())
                        .then(res =>{
                            //console.log(res.data);
                            this.hotels = res.data;
                            vm.makePagination(res.meta, res.links);
                        })
                        .catch(err => console.log(err));
                }
            }
        }
    }
</script>

<style scoped>

</style>