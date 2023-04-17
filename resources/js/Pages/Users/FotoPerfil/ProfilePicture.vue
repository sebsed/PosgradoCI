<template>
  <div class="picture-wrapper">
      <div class="picture-image">
          <img ref="profile_image" :src="'/storage/user_images/'+user.imagen_perfil_path" />
      </div>
      <template v-if="owner">
      <div class="picture-edit-form">
          <form>
              <label id="edit-btn" for="imagen-perfil">Editar</label>
              <input accept="image/*" style="display:none" @change="preview" type="file" id="imagen-perfil" name="profile-picture">
          </form>
      </div>
      </template>
  </div>
</template>

<script>
export default {
    components: {},
    props:['user_id','owner'],
    data(){
        return{
            user: Object,
        }
    },
    methods:{
        preview(event){
            const src = this.$refs.profile_image;
            src.src = URL.createObjectURL(event.target.files[0]);
        },
        getProfilePicture(){
            console.log(this.user_id);
            axios.get(`/user/credentials/${this.user_id}`)
            .then(res => {
                this.user = res.data[0];
                console.log(this.user);} )
            .catch( err => console.error(err) );
        }
    },
    created(){
        this.getProfilePicture();
    }
}
</script>

<style>

.picture-wrapper{
    height:100%;
    width:100%;
    display:flex;
    flex-direction:column;
    align-items:center;
    justify-content: space-evenly;
}

.picture-image{
    flex-grow:1;
    width:89%;
    overflow:hidden;
    display:flex;
    align-items:center;
    justify-content: center;
}

.picture-image img{
    width:100%;
    height:89%;
    border-radius:13px;
    object-fit: cover;
}

#edit-btn{
    color:#057fd0;
    cursor:pointer;
    transition:.3s all ease-in-out;
}

#edit-btn:hover{
    color:#007cce;
}



</style>