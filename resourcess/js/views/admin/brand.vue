<template>



    <div class="panel">
        <div class="row">
            <div class="col-6 text-left">
                <h4 style="color:black">Ma marque</h4>
                <!-- <span>{{ model }}</span> -->
            </div>
            <div class="col-6 text-right">
                <button style="background-color: black; color: white; border-radius: 5px; height: 30px;
    " @click="contract">
                        Nouveau contrat
                    </button>
            </div>

        </div>




<!-- </div> -->
<div>

   <div class="panel-body ">
    <br>
    <div class="row">
    <div class="col-9">
        <div class="form-group">

                        <input type="text" class="form-control" placeholder="Brand Name"  v-model="form.name" >

                    </div>
    </div>

    <div class="col-3 text-right">
        <button style="background-color: black; color: white; border-radius: 5px; height: 30px;
    ">
                        Ajouter une autre marque
                        
                    </button>
</div>
</div>
<br>














<div class="row">
  <div class="card-container" >
<div class="col-3" style="margin-bottom: 20px" v-for="item in model">
    <div class="card">
        <div class="card-image">
            <img :src="'/uploads/' + item.image" style="width: 99%; height: 100%; border-radius: 20px;">

  

        </div>
      
<div class="content">

<div class="row">
    <div class="col-6" style="font-weight: bold; color: black;">{{ item.campaign_name }}</div>
  

</div>
<div class="row">
    <div class="col-6" style="font-size: 12px;">{{ item.brand }}</div>
   

</div>

<div class="row">
    <div class="col-6" v-if="item.plateform == 'linkedin'" style="font-size: 12px;"><img src="/images/linkedin.png" style="width: 20%; margin-right: 2px;" alt="Illustration Image"></div>

    <div class="col-6" v-if="item.plateform == 'Tiktok'" style="font-size: 12px;"><img src="/images/tiktok.png" style="width: 20%; margin-right: 2px;" alt="Illustration Image"></div>

    <div class="col-6" v-if="item.plateform == 'Facebook'" style="font-size: 12px;"><img src="/images/facebook (1).png" style="width: 20%; margin-right: 2px;" alt="Illustration Image"></div>

    <div class="col-6" v-if="item.plateform == 'Instagram'" style="font-size: 12px;"><img src="/images/instagram.png" style="width: 20%; margin-right: 2px;" alt="Illustration Image"></div>
    <div class="col-6 text-right" ><button class="butt">view all</button></div>

</div>


</div>
    </div>
</div>



   
  </div>
</div>


</div>



   </div>

</div>

</template>

<script>

import Vue from 'vue'

    import { get , byMethod} from '../admin/components/lib/api'
    import Typehead from '../admin/components/typehead/Typehead.vue'

export default {
    components: { Typehead },
  data () {
            return {
                selectedOption:'',
                form: {},
                countriesURL:'/api/search/countries',
                aboutURL:'/api/search/about',

                countries:{},
                users_data:{},
                model: []
            }
        },
  name: "Dashboard",


  beforeRouteEnter(to, from, next) {
            get('/api/brand', to.query)
                .then((res) => {
                    next(vm => vm.setData(res))

                })
        },
        beforeRouteUpdate(to, from, next) {
            get('/api/brand', to.query)
                .then((res) => {
                    this.setData(res)
                    next()

                })
        },

        computed: {
    storageBaseUrl() {
      // Adjust this base URL to match your Laravel storage configuration
      return '/storage/app/';
    },
  },

        methods: {
            getImageUrl(image) {
      // Construct the full image URL
      return this.storageBaseUrl + image;
    },

    contract(){
      this.$router.push('/contract');
    },


            onabout(e) {
                const about = e.target.value
                Vue.set(this.$data.form, 'about', about)
                Vue.set(this.$data.form, 'about_id', about.id)
                Vue.set(this.$data.form, 'about_title', about.title)

            },

            oncountries(e) {
                const countries = e.target.value
                Vue.set(this.$data.form, 'countries', countries)
                Vue.set(this.$data.form, 'countries_id', countries.id)
                Vue.set(this.$data.form, 'countries_title', countries.title)

            },
            detailsPage(item) {
                this.$router.push(`/dashboard/${item.id}`)
            },
            setData(res) {
                console.log(res.data.data)
                Vue.set(this.$data, 'model', res.data.data)
                //this.page = this.model.current_page

                // console.log(res.data)
            },


        }
};
</script>

<style scoped>
.butt{
  border: none;
    color: white;
    background-color: black;
    border-radius: 5px;
    padding: 2px 20px;
}
.buttons {
    background-color: #ffffff;
 width: 8em;
 height: 3em;
 border-radius: 5px;
 font-size: 12px;
 font-family: inherit;
 border: none;
 position: relative;
 overflow: hidden;
 z-index: 1;
 box-shadow: 4px 4px 8px #c5c5c5,
             -4px -4px 8px #ffffff;

}

.buttonss {
    background-color: #ffffff;
 width: 16em;
 height: 3em;
 border-radius: 5px;
 font-size: 12px;
 font-family: inherit;
 border: none;
 position: relative;
 overflow: hidden;
 z-index: 1;
 box-shadow: 4px 4px 8px #c5c5c5,
             -4px -4px 8px #ffffff;

}

.buttonsss {
    background-color: #ffffff;
 width: 6em;
 height: 3em;
 border-radius: 5px;
 font-size: 12px;
 font-family: inherit;
 border: none;
 position: relative;
 overflow: hidden;
 z-index: 1;
 box-shadow: 4px 4px 8px #c5c5c5,
             -4px -4px 8px #ffffff;

}
.card-container {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between; 
  gap: 0px; 
  padding: 0px 0px 20px 30px;
}

/* .card-container {
  display: flex;
  flex-wrap: wrap;
  justify-content: center; 
  gap: 0px;
  padding: 0px 0px 20px 30px;
} */

.card {
  flex: 0 0 calc(25% - 20px); /* Original width calculation */
  min-width: 250px; /* Set a minimum width for the card */
  background: white;
  padding: .4em;
  border-radius: 24px;
  display: flex;
}

/* .card {
  flex: 0 0 calc(25% - 20px); 
  background: white;
  padding: .4em;
  border-radius: 24px;
  display: flex;
} */

.card-image {
  background-color: rgb(236, 236, 236);
  width: 100%;
  height: 150px;
  border-radius: 12px 12px 0 0;
}
.image-container img {

  width: 100%;
  height: 100%;
 /* Preserve the aspect ratio and cover the container */
}


.card-image:hover {
  transform: scale(0.98);
  cursor: pointer;
}
.content {
  flex-grow: 1;
}

.category {
  text-transform: uppercase;
  font-size: 0.7em;
  font-weight: 600;
  color: rgb(63, 121, 230);
  padding: 10px 7px 0;
}

.category:hover {
  cursor: pointer;
}
.image-container {
  width: 40px; /* Adjust the width of the image container */
  height: 40px; /* Adjust the height of the image container */
  border-radius: 50%; /* Create a rounded shape */
  overflow: hidden;
  margin-right: 10px; /* Adjust the margin between the image and content */
}

.heading {
  font-weight: 600;
  color: rgb(88, 87, 87);
  padding: 7px;
}

.heading:hover {
  cursor: pointer;
}

.author {
  color: gray;
  font-weight: 400;
  font-size: 11px;
  padding-top: 20px;
}

.name {
  font-weight: 600;
}

.name:hover {
  cursor: pointer;
}


</style>
