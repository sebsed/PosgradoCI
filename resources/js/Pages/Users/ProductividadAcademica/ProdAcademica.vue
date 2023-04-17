<template>
    <div class="control-flex-container">

    <div class="user-section-header">
        <h2 class="title">
            Productividad Académica
        </h2>
        <div class="user-section-actions">
           <create-pub 
           v-if="owner"
           v-on:createdSuccess="updatePubs">
           </create-pub>
        </div>

    </div>


    <div v-if="productivity.length > 0" class="items-container">
        <div v-for="entry in productivity" :key="entry.id" class="single-item-container">
            <div class="elements-group-row" style="margin-top:1vh;">
                <label><b>{{entry.autor}} </b></label>
                <label v-if="entry.autores">, {{ entry.autores}}</label>
            </div>
            <div class="elements-group-col indent-left">
                <label><q>{{ entry.titulo }} </q> (<b v-if="entry.mes_publicacion">{{ entry.mes_publicacion}},</b><b>{{ entry.anio_publicacion }}</b>) </label>
                <label v-if="entry.revista_lugar">{{ entry.revista_lugar }}</label>
                <label v-if="entry.doi">{{entry.doi}}</label>
                <label v-if="entry.link"><a style="color:#0e76ff;" :href="entry.link">Link de artículo</a></label>
            </div>
            <div v-if="owner" class="pub-actions">
                <edit-pub-modal
                v-on:updatedSuccess="updatePubs"
                :entry="entry">
                </edit-pub-modal>
            </div>
        </div>
    </div>
  
    </div>
</template>

<script>
import CreatePub from '../../../Components/Modals/CreatePub.vue'
import EditPubModal from '../../../Components/Modals/EditPubModal.vue'

export default {
    components:{CreatePub,EditPubModal},
    props:['user','owner'],
    data(){
        return{
            productivity:[],
            main_author:null,
            sec_authors:null,
            pubyear:null, 
            pubmonth:null,
            doi:null,
            lugar:null,
            link:null,
            title:null
        }
    },
    methods:{
        updatePubs(){
            axios.get(`/user/productivity/getAll/${this.user.id}`)
            .then(res => {
                this.productivity = res.data
                console.log(res.data);
                })
            .catch(err => console.error(err));
        },
        setModels(){
            
        }
    },
    created(){
        this.updatePubs();
    }
}
</script>

<style>
.pub-actions{
    display:flex;
    align-items:center;
    width:98%;
    justify-content: flex-end;
    margin-bottom:2px;
}
.control-flex-container{
    width:100%;
    overflow: hidden;
    display:flex;
    flex-direction:column;
    justify-content: space-evenly;
    align-items:center;
}

.user-section-header{
    width:100%;
    height:6vh;
    display:flex;
    flex-direction:row;
    align-items:center;
    justify-content: center;
    margin-bottom:1vh;
}

.title{
    font-size:21px;
    font-weight:600;
    color:#22325f;
    text-transform: uppercase;
}

.items-container{
    width:100%;
    display:flex;
    flex-direction:column;
    align-items:center;
    justify-content: space-evenly;
}

.single-item-container{
    width:100%;
    display:flex;
    flex-direction:column;
    justify-content: space-evenly;
    border:1px solid #eee;
    border-radius:13px;
    background:white;
    margin-bottom:1vh;
    padding-left:5px;
    min-height:13vh;
}

.elements-group-col{
    display:flex;
    align-items:flex-start;
    justify-content: space-evenly;
    flex-direction:column;
}

.indent-left{
    padding-left:1vw;
}

.user-section-actions{
    position:absolute;
    right:8%;
}


</style>