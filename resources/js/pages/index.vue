<template>
  <div>
  <h1 class="text-center mt-5 text-2xl">Shorten Url  </h1>
    <div class="mt-5 text-center">
    <span class="text-xs text-red-500" v-if="errors.original_url">{{  errors.original_url[0]  }}</span>
    <bridge-notify />
        <form  @submit.prevent="submit">
            <input type="text" v-model="original_url" class="p-2 border rounded-md shadow-md w-64" name="" placeholder="Enter you Long Url">
            <span><i @click="submit()" class="fas fa-paper-plane px-3 text-green-600 cursor-pointer"></i></span>
        </form>
    </div>
    <div class="mt-5  flex justify-center">
    <table class="text-center border rounded-md">
        <thead >
            <tr>
                    <th class="px-5">Original Url </th>
                    <th class="px-5">Shorten Url </th>
                    <th class="px-5">Visitors </th>
                    <th class="px-5">Created At</th>
                    <th class="px-5">Action</th>

            </tr>
        </thead>
        <tbody>
            <tr v-for="item in items" :key="item.id">
                    <td class="p-2">{{ item.original_url  }}</td>
                    <td class="p-2">
                    <a :href="item.id" target="_blank">
                    {{ item.shorten_url  }}
                    <i class="fas fa-external-link-alt"> </i>
                    </a>
                    <td class="p-2">{{ item.visits  }}</td>
                    </td>
                    <td class="p-2">{{ item.created_at   }}</td>
                    <td class="p-2">
                        <span><i @click="destroy(item)" class="fas fa-times text-red-300 cursor-pointer hover:text-red-700"></i></span>
                    </td>
            </tr>  
        </tbody>
    </table>
    </div>



 
  </div>
</template>

<script>
export default {
    data(){
        return { 
            original_url : "",
            errors: "",
            items : []
        }
    },
    mounted(){ 
        this.fetchData()
    },
    methods: { 
        submit(){
            if(this.original_url == '') return;
           axios.post("/api/url",{original_url : this.original_url})
           .then(response=>{
               this.original_url = "";
                this.items.push(response.data)
                 this.$notify({
                message: "Bridge Notification is Awesome 😍",
                duration: 3000,
                position: 'right',
                animate: {
                    x: 0,
                    y: 10,
          },
        });
           })
           .catch(e=>{ 
                this.errors = e.response.data.errors;
            })
        },
         fetchData(){
            axios.get("api/url")
            .then(response=>{
           this.items = response.data;
             } )
        },
        destroy(item){
         if(confirm('Are You Sure Want To delete')){ 
                axios.delete(`api/url/${item.id}`)
            .then(()=>{ 
                 this.items =this.items.filter(i=>i.id !=item.id);
                   this.$notify({
                message: "Items Deleted Successfully",
                type: "warning",
                duration: 3000,
                position: 'right',
                animate: {
                    x: 0,
                    y: 10,
          },
        });
             })
         }
        }
    }
}
</script>
