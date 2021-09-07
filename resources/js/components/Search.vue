<template>
    <div>
        <div class="form-group">
            <div class="tg-select">
                <select class="form-control" name="category_id" v-model="category" @change="getSubCategories">
                    <option :value="null" disabled> Choose Category</option>
                    <option v-for="data in categories" :value="data.id" :key="data.id">
                        {{data.name}}
                    </option>
                </select>
                <i class="fas fa-angle-down"></i>
            </div>
        </div>
        <div class="form-group">
            <div class="tg-select">
                <select class="form-control" name="subcategory_id" v-model="subcategory">
                    <option :value="null" disabled> Choose Subcategory</option>
                    <option v-for="data in subcategories" :value="data.id" :key="data.id">
                        {{data.name}}
                    </option>
                                            
                </select>
                <i class="fas fa-angle-down"></i>
                                    
            </div>
        </div>     
    </div>          
</template>

<script>
export default {
    data(){
        return{
            category: null,
            categories:[],
            subcategory:null,
            subcategories:[],
            
            
        }
    },
    mounted(){
        this.getCategories();
    },
    methods:{
        getCategories(){
            axios.get('/api/category').then((response)=>{
                this.categories = response.data
            })
        },
        getSubCategories(){
            axios.get('/api/subcategory', {params:{category_id:this.category}}).then((response)=>{
                this.subcategories = response.data
            })
        },
        
        
    }
}
</script>