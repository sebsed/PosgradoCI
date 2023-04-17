<template>
  <nav-bar>
  </nav-bar>


    <div class="content-box">
      <section-divider-header
          subtitle="Posgrado Ciencias de la Ingeniería"
          title="Documentos y Formatos Relevantes">
      </section-divider-header>

      <template v-for="doc in documentos" :key=doc.id>
        <div class="single-doc">
          <div class="doc-title">
            <h2>{{doc.nombre_archivo}}</h2>
          </div>
          <div class="doc-view">
            <a :href="`/storage/files/${doc.path_archivo}`">
              Abrir
            </a>
          </div>
        </div>
      </template>

    
    </div>


</template>

<script>
import NavBar from '../../Components/NavigationBar/NavBar.vue'
import SectionDividerHeader from '../../Components/SectionDividerHeader.vue'

export default {
  components: { NavBar, SectionDividerHeader },
  props:['error', 'auth'],
  data(){
    return{
      documentos:[]
    }
  },
  methods:{
    getAllFiles(){
      axios.get('/documents/all')
      .then(res => this.documentos = res.data)
      .catch(err => console.error(err));
    }
  },
  created(){
    this.getAllFiles();
  }
}
</script>

<style>

.content-box{
  background:white;
  width:96%;
  display:flex;
  flex-direction:column;
  align-items:center;
  justify-content: space-evenly;
  border-radius:13px;
  margin:auto;
  margin-top:5vh;
  border:1px solid #ddd;
}

.single-doc{
  display:flex;
  align-items:flex-start;
  justify-content:space-between;
  width:89%;
  border:1px solid #ccc;
  border-radius:13px;
  padding:13px;
  margin-top:1vh;
  margin-bottom:1vh;
}



.dov-view a{
  cursor:pointer;
  font-weight:500;
}

</style>