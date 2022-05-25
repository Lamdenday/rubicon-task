<template>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">nhansu List</div>
                 
                <div class="card-body">
                <table>
                    <tr>
                        <th width="50%">Name</th>
                        <th width="50%">Email</th>
                    </tr>
                    <tr v-for="nhansu in nhansus" :key="nhansu.id">
                        <td>{{ nhansu.name }}</td>
                        <td>{{ nhansu.email }}</td>
                    </tr>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
</template>
<script>
    export default {
        data() {
            return {
              nhansus: {},
            }
        },
        methods: {
            getUser(){
                axios.get('/api/nhansu')
                     .then((response)=>{
                       this.nhansus = response.data.nhansus
                     })
            }
        },
        created() {
            this.getNhansu()
        }
    }
</script> 