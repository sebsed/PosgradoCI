<template>
    <div>

        <!-- Barra de navegacion superior !-->
        <section>
            <nav-bar
            :canLogin="canLogin"
            :canRegister="canRegister">
            </nav-bar>
        </section>

        <!-- Seccion de contenido principal slide !-->
        <section>
            <slider-box>
            </slider-box>
        </section>

        <section>
            <div class="content-wrapper-row" style="margin-top:3vh;">
                <div id="static_map_container">
                    <center>
                    <a href="https://www.google.com/maps/place/UIA/@19.3705082,-99.2666839,16z/data=!4m5!3m4!1s0x85d200dba5116513:0xda4e9923d083b34b!8m2!3d19.3696916!4d-99.2639934"> <img id="static_map_image" src="../../../storage/app/public/staticmap.png"> </a>
                    </center>
                </div>
                <page-information
                    telefono="52(55)5950-4000"
                    correo="ana.martinez@ibero.mx"
                    extension="7287">
                </page-information>
            </div>
        </section>

        <section-divider-header
                subtitle="UIA"
                title="Proyectos Destacados">
        </section-divider-header>

       

    </div>
</template>

<script>
import SliderBox from '../Components/MainSlider/SliderBox.vue'
import NavBar from "../Components/NavigationBar/NavBar.vue"
import QuickActionsMain from "../Components/Principal/QuickActionsMain.vue"
import SectionDividerHeader from "../Components/SectionDividerHeader.vue"
import PageInformation from '../Components/PageInformation.vue'

export default {
    components: { NavBar, SliderBox, QuickActionsMain, SectionDividerHeader, PageInformation },
        props: {
            canLogin: Boolean,
            canRegister: Boolean,
        },
        data(){
            return{
                
            }
        }
    }
</script>

<style scoped>

#static_map_container{
    width: 60%;
    min-width:400px;
    display: flex;
    align-items: center;
    justify-content: space-evenly;
    border: 1px solid #eee;
    background: white;
    border-radius: 13px;
    padding: 8px;
}

#static_map_image{
    height: 26vh;
    width: 75%;
    object-fit: cover;
    border-radius: 13px;
    object-position: center;
    border-radius:13px;
}

</style>
