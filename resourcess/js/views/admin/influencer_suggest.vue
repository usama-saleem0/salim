<template>



  <div class="panel">




<!-- </div> -->
<div class="container">

 <div class="panel-body ">
  <br>
  <div class="row">
      
<div class="row">

    <div class="col-4">
  <div class="input-group">
    <div class="input-group-prepend">
      <span class="input-group-text">
        <i class="fas fa-fw fa-table"></i>
      </span>
    </div>
    <select class="form-control" v-model="selectedOption" @change="send(selectedOption , 'option')">
      <option value="instagram">Instagram</option>
      <option value="facebook">Facebook</option>
      <option value="tiktok">Tiktok</option>
      <option value="youtube">Youtube</option>

    </select>
  </div>
</div>


    <div class="col-4">
        <div class="form-group">

                        <input type="text" class="form-control" placeholder="Bio, Username, Fullname" v-model="form.bios"  @keyup.enter="send(form.bios, 'bios')">

                    </div>
    </div>
    <div class="col-2">

        <div class="form-group">

<input type="text" class="form-control" placeholder="Hashtags" v-model="form.hashtags" @keyup.enter="send(form.hashtags, 'hash')">

</div>
    </div>
    


</div>
<div class="col text-right
">
  <button class="butt" @click="postinfluencer">
    Post Influencers
  </button>
</div>


<div class="row" style="padding-top: 10px;">
  <div class="col text-center" v-if="button_click">
  <input  type="text" class="form-control"  :placeholder="place"  v-model="form.tags" @keyup.enter="send(form.tags, 'decs')">
</div>
<div class="col text-center" v-if="gender">
  <select class="form-control" v-model="form.tags" @change="send(form.tags , 'decs')">
    <option value="Male">Men</option>
      <option value="Female">Women</option>
      

      
    </select>
</div>

<div class="col text-center" v-if="Taux">
  <select class="form-control" v-model="form.tags" @change="send(form.tags , 'decs')">
    <option value="Low">Low</option>
      <option value="Medium">Medium</option>
      <option value="High">High</option>

    </select>
</div>
  <ul style="display: flex; gap: 2px;">
    <li style="list-style: none;" >
        <button class="buttons mx-0" @click="show_input('Enter Localisation ')">
          Localisation 
    </button>
    </li>

    <li>
        <button class="buttons mx-0" @click="show_input('Enter Categories')">
          Intérêt de l'audience
    </button>
    </li>
    <li style="list-style: none;" @click="show_input('Genre')">
        <button class="buttons mx-0">
          Genre 
    </button>
    </li>

    
    <li style="list-style: none;" >
        <button class="buttons mx-0" @click="show_input('Taux')">
          Taux d'engagement
    </button>
    </li>

   
    <li style="list-style: none;" >
        <button class="buttons mx-0" @click="show_input('Enter Followers')">
          Followers
    </button>
    </li>

    
</ul>


  </div>




  




                          <div class="row">
  <div class="card-container">

    <div class="card"  v-for="item in model.data">
        

        <div class="card-image" @click="portfolio(item.id)" style="    display: flex;
    justify-content: center;">
          <img v-if="item.influncer_profile_image == null" src='/influencer/no_image.png' style=" height: 100%; border-radius: 50%;">

          <img v-else  :src="'/influencer/' + item.influncer_profile_image" style=" height: 100%; border-radius: 50%;">
    <!-- <img src="https://www.instagram.com/p/CxicCGCN8VM/?utm_source=ig_web_copy_link&igshid=MzRlODBiNWFlZA==" style="width: 99%; border-radius: 20px;"> -->
</div>
        <div class=" row mt-2">
          <div class=" image-container col-2">

            <img v-if="item.plateform =='instagram'" src="/images/instagram.png" style="height: 80%;" alt="Illustration Image">
            
            <img v-if="item.plateform =='facebook'" src="/images/facebook (1).png" style="height: 80%;" alt="Illustration Image">
           
            <img v-if="item.plateform =='tiktok'" src="/images/tiktok.png" style="height: 80%;" alt="Illustration Image">
            <img v-if="item.plateform =='youtube'" src="/images/youtube.png" style="height: 80%;" alt="Illustration Image">

          </div>
          <div class="col text-right">
            <button @click="toggleSelect( item.id)"  style="border: none;
    background-color: gray;
    /* color: white; */
    padding: 0px 15px;
    border-radius: 5px;"
      :class="{ 'selected': isSelected(item.id) }">
     Select
    </button>

            <!-- <button class="butt" @click="emailsent(item.id)">Invite</button> -->
</div>
      </div>
      <div class="content">
        <!-- <div class="category"> Illustration </div> -->
        <div class="row">
            <div class="col-6" style="font-weight: bold; color: black;">{{ item.name }}</div>
            <div class="col-6 text-right" style="font-weight: bold; color: black;">Likes:{{ item.avg_likes }}</div>

        </div>
        <div class="row">
            <div class="col-6" style="font-size: 12px;">{{ item.influencer_location }}</div>
            <div class="col-6 text-right" style="font-size: 12px;">Followers:{{ item.followers }}</div>

        </div>

      </div>
    </div>



  </div>
</div>






</div>


</div>

<div class="panel-footer flex-between text-center mt-4">
            <div>
                <small style="font-weight: bold;">Showing {{model.from}} - {{model.to}} of {{model.total}}</small>
            </div>
            <div>
                <button class="btn btn-lg " style="     color: black;
    font-weight: bold;
    background-color: rgb(111, 120, 129);
    border-radius: 40px;
    font-size: smaller;
    padding: 14px 11px" :disabled="!model.prev_page_url" @click="prevPage">
                    Prev
                </button>
                <button class="btn btn-lg" style="     color: white;
    font-weight: bold;
    background-color: rgb(33, 47, 61);
    border-radius: 40px;
    font-size: smaller;
    padding: 14px 11px" :disabled="!model.next_page_url" @click="nextPage">
                    Next
                </button>
            </div>
        </div>



 </div>

</div>

</template>

<script>

import Vue from 'vue'

  import { get , byMethod} from '../admin/components/lib/api'
  import Typehead from '../admin/components/typehead/Typehead.vue'
  import VueSweetalert2 from 'vue-sweetalert2';
  import 'sweetalert2/dist/sweetalert2.min.css';

export default {
  components: { Typehead , VueSweetalert2 },
data () {
          return {
            isButtonClicked: false,
            button_click:false,
              gender:false,
              Taux:false,
              selectedOption:'',
              form: {},
              countriesURL:'/api/search/countries',
              aboutURL:'/api/search/about',
              place:'',


              countries:{},
              users_data:{},
              selectedItems: [],
              selectedLabels: [],
              model: {
                  data:[]
              },
              method:'POST',
              // bgColor1:'black',
          }
      },
name: "Dashboard",


beforeRouteEnter(to, from, next) {
          get('/api/influencers', to.query)
              .then((res) => {
                  next(vm => vm.setData(res))

              })
      },
      beforeRouteUpdate(to, from, next) {
          get('/api/influencers', to.query)
              .then((res) => {
                  this.setData(res)
                  next()

              })
      },
      computed: {
      selectedLabels() {
        return this.selectedIndexes.map(index => this.items[index].label);
      },
    },
      created() {
                    console.log(this.$route.params.id);
                    this.id = this.$route.params.id;

                },

      methods: {


        toggleSelect( label) {
        // Toggle selection by clicking on the image
        const selectedIndex = this.selectedLabels.indexOf(label);
        console.log(selectedIndex)
        if (selectedIndex === -1) {
          // Add to selection
          this.selectedLabels.push(label);
        } else {
          // Remove from selection
          this.selectedLabels.splice(selectedIndex, 1);
        }
        console.log(this.selectedLabels)
        this.form.selectedLabelsss = this.selectedLabels
      },
      isSelected(label) {
        // Check if the label is selected
        return this.selectedLabels.includes(label);
        
      },


      
        show_input(e){
            if(e == 'Genre'){
              console.log(e);
              this.button_click = false
              this.Taux = false
              this.gender = true

            }
            else if(e =='Taux'){
              this.gender = false
              this.button_click = false
              this.Taux = true
            }
            else{
              this.Taux = false
              this.gender = false
              this.button_click = true
            }
            
            
            this.form.tags = '',
            
            this.place = e
          },


          toggleSelection(itemId) {
      this.isButtonClicked = !this.isButtonClicked;

      // Add or remove item ID based on button click
      if (this.isButtonClicked) {
        this.selectedItems.push(itemId);
      } else {
        this.selectedItems = this.selectedItems.filter((id) => id !== itemId);
      }

      console.log(this.selectedItems);
    },

        handleButtonClick() {
      this.isButtonClicked = !this.isButtonClicked;
    },

    isItemSelected(itemId) {
    return this.selectedItems.includes(itemId);
  },

        selectItem(itemId , item) {
        // itemId.clicked = !itemId.clicked;
      if (!this.selectedItems.includes(itemId)) {
        this.selectedItems.push(itemId);
      }
      // this.bgColor1 = 'blue'
      console.log(this.selectedItems)
    },

    postinfluencer(){
      this.form = [
        this.selectedLabels,
        this.id
      ]
      byMethod(this.method, 'api/post_influencers', this.form)
                    .then((res) => {
                      
                       
                        if(res.data && res.data.saved) {
                          this.$swal.fire({
                              icon:'success',
                              title:'Influencers Added',
                              text: 'This Influencers will suggest when user complete its compaign',
                          })
                        }
                    })
    },

        emailsent(e){
          get('/api/influencer_email?id=' +e) .then((res) => {
                  console.log(res.data.data);
                  if(res.data.data) {
                          this.$swal.fire({
                              icon:'success',
                              title:'Email Sent',
                              text: 'Your request sent Influencer will contact you',
                          })
                      }
                  
              });
        },

        show_input(e){
          
          this.form.tags = '',
          this.button_click = true
          this.place = e
        },

        send(e, f){
          console.log(e);
          if(f == 'option'){

            get('/api/influencers/?q=' +e).then((res) => {
                    this.setData(res)
                  

                })
          }

          if(f == 'bios'){

          get('/api/influencers/?bios=' +e).then((res) => {
                  this.setData(res)
                

              })
          }

          if(f == 'hash'){

        get('/api/influencers/?hash=' +e).then((res) => {
                this.setData(res)
              

            })
        }

        if(f == 'decs'){
          console.log(e);

      get('/api/influencers/?decs=' +e).then((res) => {
              this.setData(res)
            

          })
      }
        },

          portfolio(e){
              this.$router.push(`/portfolio/${e}`);
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
              Vue.set(this.$data, 'model', res.data.data)
              //this.page = this.model.current_page
              this.page = this.model.current_page

              console.log(res.data.data.data)
          },


          nextPage() {
              if(this.model.next_page_url) {
                  const query = Object.assign({}, this.$route.query)
                  query.page = query.page ? (Number(query.page) + 1) : 2

                  this.$router.push({
                      path: `/influencer_suggest/${this.id}`,
                      query: query
                  })
              }
          },

          prevPage () {
              if(this.model.prev_page_url) {
                  const query = Object.assign({}, this.$route.query)
                  query.page = query.page ? (Number(query.page) - 1) : 1

                  this.$router.push({
                      path: `/influencer_suggest/${this.id}`,
                      query: query
                  })
              }
          }


      } 
};
</script>

<style scoped>
.selected {
      background-color: #3498db; /* Change this to your desired selected color */
      color: #fff; /* Change this to your desired text color */
    }
.buttons {
    background-color: #ffffff;
 width: 11em;
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
  width: 100%;
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between; /* Adjust alignment as needed */
  gap: 20px; /* Adjust the gap between cards */
}

.butt{
  border: none;
    color: white;
    background-color: #420988;
    border-radius: 5px;
    padding: 2px 20px;
}
/* .card {
    display: flex;
  width: 25%;
  background: white;
  padding: .4em;
  border-radius: 6px;
  gap: 10px;
}

.card-image {
  background-color: rgb(236, 236, 236);
  width: 100%;
  height: 170px;
  border-radius: 6px 6px 0 0;
} */


.card {
  flex: 0 0 calc(33.33% - 20px); /* Adjust the width (33.33% for 3 cards in a row) and gap */
  background: white;
  padding: .4em;
  border-radius: 24px;
  display: flex;
}

.card-image {
  /* background-color: rgb(236, 236, 236); */
  width: 100%;
  height: 200px;
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