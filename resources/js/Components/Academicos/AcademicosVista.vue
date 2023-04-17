<template>
     <div class="content-wrapper-row">
            <template v-for="academic in members" :key="academic.id">
                <div class="single-element-box">
                    <a  class="atag-full-flex" 
                        :style="route_background+`${academic.imagen_perfil_path}`"
                        :href="route('dashboard',{'user_id':academic.user_id})">
                        <div class="content-container">
                            <span class="on-image-text">
                                {{academic.linea_titulo}}
                            </span>
                            <h3 class="onpicture-title">{{academic.name}}</h3>
                        </div>
                    </a>
                </div>
            </template>
        </div>
</template>

<script>
export default {
    props:['linea_id','errors', 'auth'],
    data(){
        return{
            members:[],
            route_background:"background-image: url(/storage/user_images/",
        }
    },
    methods:{
        getAcademicMembers(){
            axios.get(`/lineaInv/getmembers/${this.linea_id}`)
            .then(res => {this.members = res.data; console.log(res.data);})
            .catch(err => console.error(err));
        },
    },
    created(){
        this.getAcademicMembers();
    }
}
</script>

<style>
.atag-full-flex{
    display:flex;
    flex-direction:column;
    height:100%;
    width:100%;
    align-items:center;
    justify-content: space-evenly;
    background-size:cover;
}

.image-control{
    height:98%;
    width:96;
    object-fit:cover;
    border-radius:8px;
}

.content-container{
    width:100%;
    height:100%;
    overflow:hidden;
    display:flex;
    flex-direction:column;
    align-items:flex-end;
    justify-content: flex-end;
    transition:.3s all ease-in-out;
}

.content-container:hover{
    background:#00000066;
}

.content-container:hover .on-image-text{
    color:white;
}

.onpicture-title{
    color:white;
    font-size:34px;
    font-weight:600;
    width:95%;
}

.on-image-text{
    font-size:21px;
    font-weight:500;
    width:95%;
    color:#00000000;
    transition:.3s all ease-in-out;
}

</style>