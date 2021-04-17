<template>
  <div class="search-field-area" style="visibility: visible; background-color: red;">
    <span class="search-dismiss">
        <h1 class="text-danger"><i class="bi bi-x"></i></h1>
    </span>
    <div class="container mt-5">
        <div id="search">
           
                <div class="form-group w-75">
                    <input class="form-control bg-dark text-light border-dark" type="text" placeholder="Search"   name="search"  v-model="searchString" v-on:keyup="fetchData">
                    <h3>{{ searchString }}</h3>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-block btn-outline-dark text-warning"><i class="bi bi-search"></i></button>
                </div>
            
        </div>
        <div id="filter">
            <form class="row mt-5">
                <div class="form-group col-sm-3 col-xs-6">
                    <select data-filter="make" class="filter-make filter bg-dark border-secondary text-secondary form-control">
                        <option value="">Select Category</option>
                        <option value="">Show All</option>
                    </select>
                </div>
                <div class="form-group col-sm-3 col-xs-6">
                    <select data-filter="model" class="filter-model filter bg-dark border-secondary text-secondary form-control">
                        <option value="">Select Sub-category</option>
                        <option value="">Show All</option>
                    </select>
                </div>
                <div class="form-group col-sm-3 col-xs-6">
                    <select data-filter="type" class="filter-type filter bg-dark border-secondary text-secondary form-control">
                        <option value="">Select Shop</option>
                        <option value="">Show All</option>
                    </select>
                </div>
                <div class="form-group col-sm-3 col-xs-6">
                    <select data-filter="price" class="filter-price filter bg-dark border-secondary text-secondary form-control">
                        <option value="">Select Price Range</option>
                        <option value="">Show All</option>
                    </select>
                </div>
            </form>
        </div>
        <div class="row mt-5" id="products" v-if="searchedData.length > 0">
             <li v-for="item in searchedData" :key="item.id">
                       {{ item }}
            </li>
        </div>
        <button @click='fetchCards'></button>
         <p> {{ cards }}</p>
    </div>
</div>
</template>

<script type="text/javascript">
  
  export default {

    data () {
      return {
        searchString: '',
        searchedData: [],
        cards: []
      };
    },

    methods: {
      async fetchData () {
        const res = await axios.get('/search-index/search',{
          params: {
                 webSearch : this.searchString
              }
        }).
        then((response) => {
          console.log(response.data)
          response.data.length >= 0 || this.searchedString !== ''? 
          this.searchedData.push(response.data) : this.searchedData = [];
          console.log(this.searchedData);
        }).
        catch((errors) => {
          console.log(errors);
        });
      },

       async fetchCards () {
        const res = await axios.get('/cards/json-out').
                     then((response) => {
                        this.cards.push(response.data);
                     }).
                     catch((error) => {
                        console.log(error);
                     })  
       }
    },

    mounted (){

      console.log(this.searchString);
    }

  };

</script>

<style type="text/css">
  .search-field-area{
    background-color: 'red' 
  };
</style>