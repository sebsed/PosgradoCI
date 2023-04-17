<template>

    <div class="section-body-control">
        <div class="content-box">
            <section-divider-header
                subtitle="ADMIN"
                title="Imágenes y Avisos Bienvenida">
            </section-divider-header>
            <admin-carrusel>
            </admin-carrusel>
        </div>

        <div class="content-box">
            <section-divider-header
            subtitle="ADMIN"
            title="Documentos">
            </section-divider-header>
            <admin-documents>
            </admin-documents>
        </div>
    </div>
    
</template>

<script>

import AdminCarrusel from './AdminCarrusel.vue'
import SectionDividerHeader from '../Components/SectionDividerHeader.vue'
import AdminDocuments from './AdminDocuments.vue'

export default {
    components: {AdminCarrusel, SectionDividerHeader, AdminDocuments},
    props:['user'],
    data(){
        return{}
    },
    methods: {
       
    },
    created(){
    }
}
</script>

<style>

.content-box{
    display:flex;
    align-items:center;
    justify-self: space-evenly;
    flex-direction:column;
    width:96%;
    border:1px solid #ddd;
    background:white;
    border-radius:13px;
    margin-top:2vh;
    margin-bottom:2vh;
    padding:5px;
}

</style>