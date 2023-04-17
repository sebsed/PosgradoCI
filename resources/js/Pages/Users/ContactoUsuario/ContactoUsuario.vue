<template>
  <div class="contact-wrapper">
    <div class="section-header">
        <h2>Contacto</h2>
    </div>

    <div class="contact-form" v-if="!owner">
        <div class="form-element">
            <label for="" class="form-label"><i class="fas fa-phone"></i> {{ this.telefono }} </label>
            <label for="" class="form-label"><i class="fas fa-envelope"></i> {{ this.email }}</label>
            <a :href="this.link1" class="form-label"><i class="fas fa-globe"></i> Referencia 1</a>
        </div>
    </div>
    
    <template v-if="owner">
        <form @submit.prevent="updateContactData" class="form-control-center">                
                <div class="form-section-md">
                    <div class="form-element-row">
                        <span ><i class="fas fa-phone"></i></span>
                        <input class="form-input-clean" placeholder="Teléfono..." @change="promptUpdate" type="number" v-model="telefono" name="telefono" />
                    </div>
                    <div class="form-element-row">
                        <span><i class="fas fa-envelope"></i></span>
                        <input class="form-input-clean" placeholder="Correo..." @change="promptUpdate" type="text" v-model="email" name="email" />
                    </div>
                    <div class="form-element-row">
                        <span><i class="fas fa-globe"></i></span>
                        <input class="form-input-clean" placeholder="Sitio Web" @change="promptUpdate" type="text" v-model="link1" name="link1" />
                    </div>
                </div>

                <div :class="['form-actions', 'hidden',{'show':updateBtn}]" >
                    <input class="lean-update-btn" type="submit" value="Actualizar">
                    <span class="lean-cancel-btn" @click.prevent="cancelUpdate">Cancelar</span>
                </div>
        </form>
    </template>


  </div>
</template>

<script>
export default {
    props:['user','owner'],
    components: {},
    data(){
        return{
            formdata:new FormData(),
            updateBtn:false,
            contact:[],
            telefono:null,
            email:null, 
            instagram:null, 
            link1:null, 
            link2:null, 
            link3:null
            }
        },
    methods:{
        getContactData(){
            axios.get(`/user/contact/${this.user.id}`)
                .then((res)=>{
                    this.contact = res.data[0];
                    this.telefono = this.contact.telefono;
                    this.email = this.contact.email;
                    this.link1 = this.contact.link1? this.contact.link1 : null;
                })
                .catch((err)=> console.error(err));
        },
        promptUpdate(){
            this.updateBtn = true;
        },
        updateContactData(){
            this.formdata.append('telefono', this.telefono);
            this.formdata.append('correo', this.email);
            this.formdata.append('uid', this.user.id);
            this.formdata.append('link1', this.link1);
            axios.post('/user/contact/update',this.formdata)
            .then(res => {
                this.updateBtn = false;
            })
            .catch(err => console.error(err));
        }
    },
    created(){
        this.getContactData();
    }
}
</script>

<style>

.section-header{
    width:100%;
    display:flex;
    align-items:center;
    justify-content: center;
}

.section-header h2{
    font-size:21px;
    font-weight: 600;
}

.contact-wrapper{
    height:100%;
    width:100%;
    display:flex;
    flex-direction:column;
    align-items:center;
    justify-content: space-evenly;
}

.contact-form{
    height:100%;
    width:89%;
    display:flex;
    align-items:center;
    justify-content: center;
}

.hidden{
    display:none;
}

.show{
    display:flex;
}

</style>