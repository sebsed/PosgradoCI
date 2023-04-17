<template>

    <div class="content-wrapper">
        <form class="form-control" style="align-items:center;" @submit.prevent="uploadFile">
            <input type="text" class="form-input-clean custom" v-model="filename" placeholder="Nombre del Archivo">
            <div class="disclaimer-div">
                <p>Porfavor, archivos máximos de 10 MB. (pdf, txt, doc, xlsx, csv, txt, ppt)</p>
            </div>
            <label class="up_file" for="upload_file">Seleccionar archivo</label>
            <input @change="fileDetected" id="upload_file" style="display:none;" type="file" accept=".docx, .xlsx, .pdf, .ppt">
            <div class="file-form-actions" v-if="fileactions">
                <span>Archivo Seleccionado: {{file_name}}</span>
                <input type="submit" value="Subir">
            </div>
        </form>
    </div>
  
</template>

<script>
export default {
    props:[],
    data(){
        return{
            file_name:"",
            fileactions: false,
            file:null,
            formdata:new FormData(),
            filename:""
        }
    },
    methods:{
        fileDetected(event){
            this.fileactions = true;
            this.file_name = event.target.files[0].name;
            this.file = event.target.files[0];
        },
        uploadFile(){
            this.formdata.append('file', this.file);
            this.formdata.append('filename', this.filename)
            axios.post('/admin/uploadfile', this.formdata)
            .then(res => {this.fileSent(res.data)})
            .catch(err => console.error(err));
        },
        fileSent(filename){
            this.fileactions = false;
            alert(`Archivo: ${filename} subido con éxito`);
            this.file_name = "";
            this.filename = "";
        }
    }

}
</script>

<style>

.up_file{
    background:#333;
    color:white;
    border-radius:13px;
    padding:5px;
    padding-left:13px;
    padding-right:13px;
    cursor:pointer;
    transition:.3s all ease-in-out;
    margin-bottom:5vh;
}

.custom{
    width:55%;
    border:1px solid #eee !important;
    border-radius:13px;
    margin-bottom:3vh;
}

.file-form-actions{
    display:flex;
    flex-direction:row;
    align-items:center;
    justify-content: space-evenly;
    width:89%;
    margin:auto;
    margin-bottom:5vh;
}

.file-form-actions input{
    background:#0e76ff;
    color:white;
    padding:5px;
    padding-left:13px;
    padding-right:13px;
    border-radius:21px;
    border:1px solid #eee;
    cursor:pointer;
}

.disclaimer-div{

    margin-bottom:3vh;
    width:89%;
    display:flex;
    align-items:center;
    justify-content: space-evenly;
}

.disclaimer-div p{
    color:#bbb;
    font-size:14px;
    text-transform: uppercase;
}
</style>