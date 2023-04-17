<template>
<div>
  <!-- nav bar !-->
  <section>
    <nav-bar></nav-bar>
  </section>

  <!-- all container !-->
  <section>
      <div class="seccion-encabezado">
        <h1>Líneas de Investigación</h1>
      </div>
    <div id="block-container-flex">
      <template v-for="linea in lineas" :key="linea.id">

        <div class="linea-individual">
          <a :href="route('lineainv',{'id':linea.id})">
          <div class="linea-icono">
            <img class="linea-icono-img" :src="`/storage/lineasicon/${linea.icono}`">
          </div>
          <div class="linea-titulo">
            <h2>{{linea.titulo}}</h2>
          </div>
          </a>
        </div>
        
      </template>
    </div>
  </section>

</div>
</template>

<script>
import NavBar from '../../Components/NavigationBar/NavBar.vue'
export default {
    components: {NavBar},
    props:['lineas'],
    data(){
      return{

      }
    },
    methods:{

    },
    created(){
      console.log(this.lineas);
    }

}
</script>

<style>

#block-container-flex{
  width:89%;
  margin:auto;
  margin-top:5vh;
  margin-bottom:3vh;
  display:flex;
  flex-direction:row;
  align-items:center;
  justify-content: space-evenly;
  flex-wrap: wrap;
}

.linea-individual a{
  width:100%;
  height:100%;
  display:flex;
  flex-direction:column;
  justify-content: space-evenly;
  align-items:center;
}

.linea-individual{
  display:flex;
  flex-direction:column;
  align-items:center;
  justify-content:space-evenly;
  flex-grow:1;
  border:1px solid #ddd;
  height:34vh;
  border-radius:13px;
  margin-bottom:1vh;
  margin-right:1vh;
  background:#e7303913;
  cursor:pointer;
  transition:.3s all ease-in-out;
  width:21%;
  box-shadow:1px 1px 1px 1px white;
}

.linea-individual:hover{
  box-shadow:1px 1px 1px 1px #ddd;
}

.seccion-encabezado{
  width:100%;
  display:flex;
  align-items:center;
  justify-content: space-evenly;
  height:5vh;
  margin-bottom:2vh;
}

.seccion-encabezado h1{
  font-size:34px;
  font-weight:600;
}

.linea-icono{
  height:50%;
  width:89%;
  display:flex;
  align-items:center;
  justify-content: space-evenly;
  overflow:hidden;
}

.linea-titulo{
  height:27%;
  width:100%;
  display:flex;
  align-items:center;
  justify-content: space-evenly;
}

.linea-titulo h2{
  font-size:18px;
  font-weight:700;
  color:#e73039;
  text-align: center;
}

.linea-icono-img{
  height:89%;
  object-fit:contain;
}
</style>
