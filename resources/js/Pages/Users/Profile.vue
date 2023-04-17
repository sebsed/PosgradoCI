<template>
<div>
    <section>
        <nav-bar>
        </nav-bar>
    </section>

    <template v-if="user.tipo_usuario == 1">
    <div class="wrapper-columns">
      <div class="column-wrap-narrow">

        <div class="user-profile-picture">
          <profile-picture
          :user_id="user.id"
          :owner="owner">
          </profile-picture>
        </div>
        <div class="user-profile-contact">
          <contacto-usuario
          :user="user"
          :owner="owner">
          </contacto-usuario>
        </div>
      </div>

      <div class="column-wrap-wide">
        <div class="user-profile-credentials">
          <credenciales-usuario
          :user="user"
          :owner="owner">
          </credenciales-usuario>
        </div>
        <div class="body-wrap-nobckg">
            <prod-academica
            :user="user"
            :owner="owner">
            </prod-academica>
        </div>
      </div>
    </div>
    </template>

    <template v-if="user.tipo_usuario == 2">
      <admin-dashboard
      :user="user">
      </admin-dashboard>
    </template>


</div>
</template>

<script>
import NavBar from "../../Components/NavigationBar/NavBar.vue"
import ProfilePicture from './FotoPerfil/ProfilePicture.vue'
import ContactoUsuario from './ContactoUsuario/ContactoUsuario.vue'
import CredencialesUsuario from './CredencialesUsuario/CredencialesUsuario.vue'
import ProdAcademica from './ProductividadAcademica/ProdAcademica.vue'
import AdminDashboard from '../../Admin/AdminDashboard.vue'

export default {
  components: { NavBar, ProfilePicture, ContactoUsuario, CredencialesUsuario, ProdAcademica, AdminDashboard },
  props:['user', 'owner', 'images'],
  data(){
    return{

    }
  },
  created(){
    console.log("HOLA");
    console.log(this.user);
  }

}
</script>

<style>

.column-wrap-narrow{
  display:flex;
  width:21vw;
  flex-direction:column;
  align-items:center;
  justify-content: space-evenly;
}

.column-wrap-wide{
  display:flex;
  width:66vw;
  flex-direction:column;
  align-items:center;
  justify-content: space-evenly;
}

.user-profile-picture{
  height:34vh;
  width:100%;
  border:1px solid #eee;
  margin-bottom:1vh;
  border-radius:13px;
  background:white;
}

.user-profile-contact{
  height:28vh;
  width:100%;
  border:1px solid #eee;
  margin-top:1vh;
  border-radius:13px;
  background:white;
}

.user-profile-credentials{
  display:flex;
  flex-direction:column;
  align-items:center;
  justify-content: space-evenly;
  border:1px solid #eee;
  border-radius:13px;
  width:100%;
  height:34vh;
  background:white;
  margin-bottom:1vh;
}

.body-wrap-nobckg{
  display:flex;
  flex-direction:column;
  align-items:center;
  justify-content: space-evenly;
  margin-top:1vh;
  width:100%;
  overflow:hidden;
}



</style>