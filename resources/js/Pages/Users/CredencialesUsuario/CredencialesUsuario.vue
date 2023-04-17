<template>
  <div class="wrapper">

    <template v-if="!owner">
        <div class="credentials-header">
            <h2>{{ user.name }}</h2>
            <h3>{{ this.credentials.titulo }}</h3>
            <h3>Universidad Iberoamericana CDMX</h3>
        </div>
        <div class="credentials-body">
            <p class="paragraph-medium"> {{ this.credentials.semblanza }} </p>
        </div>
    </template>

    <template v-if="owner">
        <form class="form-control" @submit.prevent="updateCredentials">
            <div class="credentials-header">
                <h2>{{ $page.props.auth.user.name }}</h2>
                <div class="form-section">
                    <div class="form-element">
                        <input class="form-input-clean no-padding" @change="promptUpdate" placeholder="Título Académico..." type="text" v-model="titulo" name="titulo" />
                    </div>
                </div>
                <h3>Universidad Iberoamericana CDMX</h3>
            </div>
            <div class="credentials-body">
                <div class="form-section-paragraph">
                    <textarea class="form-textarea-clean textarea-center" maxlength="460" @change="promptUpdate" v-model="semblanza"></textarea>
                </div>

                <div :class="['form-actions', 'hidden', { 'show':updateBtn }]" >
                    <input class="lean-update-btn" type="submit" value="Actualizar">
                    <span class="lean-cancel-btn" @click.prevent="cancelUpdate">Cancelar</span>
                </div>
            </div>
        </form>
    </template>
    

  </div>



</template>

<script>
export default {
    components:{},
    props:[ 'user', 'owner' ],
    data(){
        return{
            credentials: Object,
            updateBtn:false,
            titulo:'',
            semblanza:'',
            formdata:new FormData(),
        }
    },
    methods:{
        getCredentials(){
            axios.get(`/user/credentials/${this.user.id}`)
            .then(res => { 
                this.credentials = res.data[0];
                this.titulo = this.credentials.titulo;
                this.semblanza = this.credentials.semblanza;
                })
            .catch(err => console.error(err));
        },

        promptUpdate(){
            this.updateBtn = true;
        },
        cancelUpdate(){
            this.updateBtn = false;
            this.getCredentials();
        },
        updateCredentials(){
            this.formdata.append('titulo', this.titulo);
            this.formdata.append('semblanza', this.semblanza);
            this.formdata.append('uid', this.user.id);
            axios.post('/user/credentials/update',this.formdata)
            .then(res => {
                this.updateBtn = false;
            })
            .catch(err => console.error(err));
        }
    },
    created(){
        this.getCredentials();
    },
}
</script>

<style>

.no-padding{
    padding:0 !important;
}

.wrapper{
    height:100%;
    width:98%;
    display:flex;
    flex-direction:column;
    align-items:center;
    justify-content: space-evenly;
}

.credentials-header{
    height:38%;
    display:flex;
    flex-direction:column;
    align-items:flex-start;
    justify-content: space-evenly;
    width:100%;
    border-bottom:5px solid #e84043;
}

.credentials-header h2{
    font-size:25px;
    font-weight:600;
}

.credentials-header h3{
    font-size:18px;
    font-weight:600;
}

.credentials-body{
    flex-grow:1;
    display:flex;
    align-items:center;
    flex-direction:column;
}

.paragraph-medium{
    text-align: justify;
    font-size:20px;
}

.hidden{
    display:none;
}

.show{
    display:flex;
}

</style>