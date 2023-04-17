<template>
    <div>
        <button style="margin-right:1vw;" ref="modalbtn" @click.prevent="modalAct" class="lean-edit-btn">Editar</button>
        <button style="margin-left:1vw;" @click.prevent="killPub" class="lean-delete-btn">Borrar</button>

            <div @click.prevent="modalAct" ref="modalbg" class="modal-bg">

                <div class="modal-box">

                    <div class="modal-header">
                        <h2>Editar Publicación</h2>
                    </div>

                    <div class="modal-body">
                        <form @submit.prevent="updatePublication" class="form-control">
                            <div class="form-section">

                                <div class="form-element-row-end">
                                    <label>Autor:</label>
                                    <input type="text" placeholder="Este nombre se resaltará" v-model="autor" name="autorp" required>
                                </div>
                                <div class="form-element-row-end">
                                    <label>Autores:</label>
                                    <input type="text" placeholder="Separados por comas" v-model="autores" name="autores" required>
                                </div>
                                <div class="form-element-row-end">
                                    <label>Título:</label>
                                    <input type="text" name="titulo" v-model="titulo" required>
                                </div>
                                <div class="form-element-row-end">
                                    <label>Evento o revista:</label>
                                    <input type="text" name="revista_lugar" v-model="evento" placeholder="(Opcional)" >
                                </div>
                                <div class="form-element-row-end">
                                    <label>DOI:</label>
                                    <input type="text" name="doi" v-model="doi" placeholder="(Opcional)">
                                </div>
                                <div class="form-element-row-end">
                                    <label>Link:</label>
                                    <input type="text" name="link" v-model="link" placeholder="(Opcional)">
                                </div>
                                <div class="form-element-row-end">
                                    <label>Año de publicación:</label>
                                    <input placeholder="1992" type="number" v-model="aniopub" name="anio_pub" required>
                                </div>
                                <div class="form-element-row-end">
                                    <label>Mes de publicación:</label>
                                    <input type="text" name="mes_pub" v-model="mespub" placeholder="(Opcional)">
                                </div>
                                
                            </div>
                            <div class="form-actions" style="margin-top:2vh;">
                                <button ref="closebtn" class="lean-cancel-btn">Cancelar</button>
                                <input ref="subbutton" class="lean-update-btn" type="submit" value="Guardar">
                            </div>
                        </form>
                    </div>
                </div>

            </div>

    </div>
</template>

<script>
export default {
    props:['entry'],
    data(){
        return{
            formdata: new FormData(),
            mespub:null, 
            aniopub:null,
            titulo:null, 
            autor:null, 
            autores:null, 
            link:null, 
            doi:null,
            evento:null
        }
    },
    methods:{
        modalAct(event){
            if(event.target == this.$refs.closebtn || event.target == this.$refs.modalbg || event.target == this.$refs.modalbtn || event.target == this.$refs.spanbtn){
                this.$refs.modalbg.classList.toggle('modal-bg-active');
            }
            if(this.$refs.subbutton == event.target){
                this.updatePublication();
            }
        },
        updatePublication(){
            this.formdata.append('autor', this.autor);
            this.formdata.append('autores', this.autores);
            this.formdata.append('titulo', this.titulo);
            this.formdata.append('evento', this.evento);
            this.formdata.append('link', this.link);
            this.formdata.append('anio', this.aniopub);
            this.formdata.append('mes', this.mespub);
            this.formdata.append('user_id', this.$page.props.auth.user.id);
            this.formdata.append('doi', this.doi);
            this.formdata.append('pub_id', this.entry.id);

            axios.post('/user/productivity/update',this.formdata)
            .then(()=>{
                this.$emit('updatedSuccess');
                this.$refs.modalbg.classList.toggle('modal-bg-active');
            })
            .catch((err) => {
                alert('Ocurrió un error, verifica los datos e intenta nuevamente');
                console.error(err);
            });
        },
        setModels(){
            this.mespub=this.entry.mes_publicacion; 
            this.aniopub=this.entry.anio_publicacion;
            this.titulo=this.entry.titulo; 
            this.autor=this.entry.autor;
            this.autores=this.entry.autores; 
            this.link=this.entry.link;
            this.doi=this.entry.doi;
            this.evento=this.entry.revista_lugar;
        },
        killPub(){
            axios.get(`/user/productivity/delete/${this.entry.id}`)
            .then(() => {
                this.$emit('updatedSuccess');
            })
            .catch(err => console.error(err));

        }
    },
    mounted(){
        this.setModels();
    }

}
</script>

<style>

@import 'modal-custom.css';

</style>