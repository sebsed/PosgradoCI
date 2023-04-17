<template>

    <nav-bar></nav-bar>
    <!-- Encabezado -->
    <section>
        <div class="portrait-header-big">
            <div class="text-overall">
                <h1 class="portrait-quote"><q>{{linea.frase}}</q></h1>
                <h4 class="portrait-author">- {{linea.frase_autor}}</h4>
            </div>
            <img class="portrait-img-big" :src="`/storage/linea_imgs/${linea.imagen}`">
        </div>
    </section>

    <div class="content-wrapper">
    <!-- Descripcion !-->
             <page-information
        telefono="52(55)5950-4000"
        :correo="linea.lider_correo"
        :nombre_lider="linea.lider_nombre"
        extension="7287"
        >
        </page-information>

        <div class="column-main">
            <div class="header-control">
                <h2 class="section-title main-text-title bottom-red">{{linea.titulo}}</h2>
            </div>
            <div >
                <p class="paragraph-control">{{linea.objetivo_general}}</p>
            </div>
        </div>

        <div class="full-row-wrapper">
            <div class="header-control red-backg">
                <h2 class="section-title white">Académicos Participantes</h2>
            </div>
            <template v-if="linea.id">
                <academicos-vista
                    :linea_id="linea.id">
                </academicos-vista>
           </template>           
        </div>

    </div>
    <!-- Objetivos !-->

</template>

<script>

import NavBar from '../../../Components/NavigationBar/NavBar.vue'
import AcademicosVista from '../../../Components/Academicos/AcademicosVista.vue'
import PageInformation from '../../../Components/PageInformation.vue'

export default {
    components:{NavBar, AcademicosVista, PageInformation},
    props:['linea','errors','auth'],
    data(){
        return{
        }
    },
    created(){
    }

}
</script>