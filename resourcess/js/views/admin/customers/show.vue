<template>
    <div class="panel" v-if="show">
        <div class="panel-heading">
            <span class="panel-title">{{model.number}}</span>
            <div>
                <router-link to="/customers" class="btn">Back</router-link>
                <router-link :to="`/customers/${model.id}/edit`" class="btn">Edit</router-link>
                <button class="btn btn-error" @click="deleteItem">Delete</button>
            </div>
        </div>
      <div class="panel-body">
            <div class="row ">
              <div class="col-12">
                    <div class="form-group">
                        <label>
                            First Name
                        </label>
                        <span>{{model.firstname}}</span>

                    </div>
                </div>
                <div class="col-12 ">
                    <div class="form-group">
                        <label>
                            Last Name
                         </label>
                      <span>{{model.lastname}}</span>
                     </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label>Email</label>
                   <span>{{model.email}}</span>
                 </div>
                </div>
                
                
            </div>
            <hr>
        </div>
    </div>
</template>
<script type="text/javascript">
    import Vue from 'vue'
    import {get, byMethod} from '../../lib/api'
    export default {
        data () {
            return {
                show: false,
                model: {
                 customer: {}
                }
            }
        },
        beforeRouteEnter(to, from, next) {
            get(`/api/customers/${to.params.id}`)
                .then((res) => {
                    next(vm => vm.setData(res))
                })
        },
        beforeRouteUpdate(to, from, next) {
            this.show = false
            get(`/api/customers/${to.params.id}`)
                .then((res) => {
                    this.setData(res)
                    next()
                })
        },
        methods: {
            setData(res) {
                Vue.set(this.$data, 'model', res.data.model)
                this.show = true
                this.$bar.finish()
            },
            deleteItem() {
                byMethod('delete', `/api/customers/${this.model.id}`)
                    .then((res) => {
                        if(res.data.deleted) {
                            this.$router.push('/customers')
                        }
                    })
            }
        }
    }
</script>