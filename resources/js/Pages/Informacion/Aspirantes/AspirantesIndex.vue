<template>
  <nav-bar>
  </nav-bar>

  <div class="content-wrapper">

      <div class="dynamic-container">

        <div class="filter-selector-big">
            <div value="optionsParent" ref="filterItems" class="filter-options-horizontal">
                <div id="0" class="single-filter-option">
                    <div value="goodone" @click.prevent="setActive" id="0" class="item-filter active-item" >
                        <span id="0">Requisitos y Proceso de Administración</span>
                    </div>
                </div>
                <div ref="singleoption" id="1" class="single-filter-option">
                    <div value="goodone" @click.prevent="setActive" id="1" class="item-filter">
                        <span id="1" value="span">¿Por qué la Ibero?</span>
                    </div>
                </div>
                <div ref="singleoption" id="2" class="single-filter-option">
                    <div value="goodone" @click.prevent="setActive" id="2" class="item-filter">
                        <span id="2" value="span">Plan de Estudios</span>
                    </div>
                </div>
                <div ref="singleoption" id="3" class="single-filter-option">
                    <div value="goodone" @click.prevent="setActive" id="3" class="item-filter">
                        <span id="3" value="span">Perfil de Ingreso/Egreso</span>
                    </div>
                </div>
                <div ref="singleoption" id="4" class="single-filter-option">
                    <div value="goodone" @click.prevent="setActive" id="4" class="item-filter">
                        <span id="4" value="span">Núcleo Académico</span>
                    </div>
                </div>
                <div ref="singleoption" id="5" class="single-filter-option">
                    <div value="goodone" @click.prevent="setActive" id="5" class="item-filter">
                        <span id="5" value="span">Becas y Apoyo</span>
                    </div>
                </div>
            </div>
        </div>


        <div class="content-wrapper">

            <template v-if="selection == 0" >
                <section-divider-header
                    subtitle="UIA"
                    title="Requisitos y Proceso Administrativo">
                </section-divider-header>
                <requisitos>
                </requisitos>
            </template>

            <template v-if="selection == 1">
                <section-divider-header
                    subtitle="UIA"
                    title="¿Por qué la Ibero?">
                </section-divider-header>
            </template>

            <template v-if="selection == 2">
                <section-divider-header
                    subtitle="UIA"
                    title="Plan de Estudios">
                </section-divider-header>
                <plan-estudios>
                </plan-estudios>
            </template>

            <template v-if="selection == 3">
                <section-divider-header
                    subtitle="UIA"
                    title="Perfil de Ingreso/Egreso">
                </section-divider-header>
            </template>
            
            <template v-if="selection == 4">
                <section-divider-header
                    subtitle="UIA"
                    title="Núcleo Académico">
                </section-divider-header>
                <academicos-vista
                :linea_id="null">
                </academicos-vista>
            </template>

            <template v-if="selection == 5">
                <section-divider-header
                    subtitle="UIA"
                    title="Becas y Apoyo">
                </section-divider-header>
                <becas>
                </becas>
            </template>

        </div>
      </div>

  </div>
</template>

<script>
import NavBar from '../../../Components/NavigationBar/NavBar.vue'
import SectionDividerHeader from '../../../Components/SectionDividerHeader.vue'
import Requisitos from './Requisitos.vue'
import PlanEstudios from './PlanEstudios.vue'
import Becas from './Becas.vue'
import AcademicosVista from './../../../Components/Academicos/AcademicosVista.vue'

export default {
    components:{NavBar, Requisitos, SectionDividerHeader, PlanEstudios, Becas, AcademicosVista},
    props:['option','errors','auth'],
    data(){
        return{
            selection:0,
        }
    },
    methods:{
        setActive(elem){
            this.selection = elem.target.id;
            var element = elem.target;
            while(element.getAttribute('value') != 'optionsParent'){
                element = element.parentElement;
            }
                element.childNodes.forEach(child => {
                    if(child.firstElementChild){
                        if(child.firstElementChild.id == this.selection){
                            child.firstElementChild.classList.add('active-item');
                }else{
                    child.firstElementChild.classList.remove('active-item');
                    }
                }
            });
        },
    },

}
</script>

<style>

.dynamic-container{
    display:flex;
    flex-direction:column;
    align-items:center;
    justify-content: center;
    width:96%;
    border:1px solid #ddd;
    border-radius:13px;
    background:white;
    margin-top:3vh;
    margin-bottom:3vh;
}

.dyn-cont-option{
    height:100%;
    flex-grow:1;
    text-align:center;
    font-size:19px;
    font-weight:500;
    border:1px solid #ddd;
    border-bottom:3px solid #ddd;
    background:#eee;
    color:black;
    border-top:none;
    cursor:pointer;
    transition:.3s all ease-in-out;
}

.dyn-cont-option:hover{
    border-bottom:3px solid #e84043;
    background:white;
}

.active-option{
    border-bottom:3px solid #e84043;
    background:white !important;
}

.filter-selector-big {
    width: 100%;
    margin-top: 2vh;
    margin-bottom: 2vh;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: space-evenly;
    flex-direction: column;
    border-bottom:3px solid black;
}

.filter-options-horizontal {
    width: 99%;
    white-space: nowrap;
    overflow-x: scroll;
}

.single-filter-option {
    display: inline-flex;
    margin: 2vh 3vw 2vh auto;
    cursor: pointer;
}

.item-filter {
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: space-evenly;
    height: 5vh;
    background: aliceblue;
    border-radius: 13px;
    padding: 2vh;
    transition: .3s all ease-in-out;
}

.active-item{
    background:#e84043;
    color:white;
}


</style>