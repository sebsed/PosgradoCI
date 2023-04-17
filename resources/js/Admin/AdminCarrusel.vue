<template>

    <div class="content-wrapper">
        
    <form class="form-control" style="align-items:center;" @submit.prevent="update_carousel">
        <template v-for="img, idx in images" :key="img.id"> 
            <div class="single-image">
                <div class="column-small" style="height:100%;">
                    <img :id="`display_${img.id}`" class="front-img" :src="`/storage/carousel/${img.imagen_path}`">
                    <div>
                        <label :for="`img_${img.id}`" class="lean-update-btn">Cambiar</label>
                        <input type="file" accept=".jpg, .jpeg, .png, .gif, .svg" @change.prevent="fileDetected($event, img.id)" :id="`img_${img.id}`" style="display:none;">
                        <span class="lean-delete-btn"  @click.prevent="cancelUpdate">Borrar</span>
                    </div>
                </div>
                <div style="height:99%;" class="column-main custom_arrange">
                    <label style="width:100%;font-size:18px; text-align:left;">Texto de Imágen:</label>
                    <input type="text" class="form-input-clean" style="align-self:flex-start; border:1px solid #ddd !important; border-radius:13px;" maxlength="460" @change="updateText($event, img.id, idx)" v-model="captions[idx]">
                    <div :id="`actions_${img.id}`" class="form-actions hidden" >
                        <input class="lean-update-btn" type="submit" value="Guardar">
                        <span class="lean-cancel-btn" @click.prevent="cancelUpdate(img.id)">Cancelar</span>
                    </div>
                </div>
            </div>
        </template>
    </form>
        <button v-if="images.length < 6" @click.prevent="addImage" style="margin-top:2vh;" class="lean-create-btn">Agregar Imágen</button>
        <span> Máximo 6 </span>

    </div>
</template>

<script>
export default {
    props:['error'],
    data(){
        return{
            images:[],
            captions:[],
            updateBtn: false,
            imgs_model:[],
            formdata: new FormData()
        }
    },

    methods:{
        getCurrentImages(){
            axios.get('/admin/carrusel/imgs')
            .then(res => {
                    this.images = res.data;
                    this.images.forEach(el => this.captions.push(el.texto_imagen));
                    console.log(this.images);
                })
            .catch(error => console.error(error));
        },
        fileDetected(event, id){
            this.formdata.append('imagen',event.target.files[0]);
            this.formdata.append('id', id);
            document.getElementById(`display_${id}`).src = URL.createObjectURL(event.target.files[0]);
            this.activeActions(id);
        },
        updateText(event, id, idx){
            this.formdata.append('caption', this.captions[idx]);
            this.formdata.append('id', id);
            this.activeActions(id);
        },
        cancelUpdate(id){
            document.getElementById(`actions_${id}`).classList.add('hidden');
            this.getCurrentImages();
        },
        addImage(){
            this.images.push('');
        },
        update_carousel(){
            axios.post('/admin/update_carousel', this.formdata)
                .then(res => {
                    alert("Se actualizó con exito");
                    this.getCurrentImages();
                    })
                .catch(err => console.error(err));
                this.updateBtn = false;
        },
        activeActions(id){
            document.getElementById(`actions_${id}`).classList.remove('hidden');
        },

        hiddenActions(id){
            document.getElementById(`actions_${id}`).classList.add('hidden');
        }
    },
    created(){
        this.getCurrentImages();
    }
}
</script>

<style>

.single-image{
    width:96%;
    height:24vh;
    display:flex;
    align-items:center;
    justify-content: space-between;
}

.custom_arrange{
    justify-content: flex-start;
    border:none;
}

.front-img{
    width:100%;
    height:100%;
    object-fit:cover;
}

.hidden{
    display:none;
}

.show{
    display:flex;
}

</style>