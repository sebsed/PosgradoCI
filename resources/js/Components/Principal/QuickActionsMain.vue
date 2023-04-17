<template>
  <div class="content-wrapper section-main">

      <div class="action-box">
          <label class="action-quick">Becas y Apoyos</label>
      </div>
      <div class="action-box">
          <label class="action-quick">Plan de Estudios</label>
      </div>
      <div class="action-box">
          <label class="action-quick">Servicios e Instalaciones</label>
      </div>
      <div class="action-box">
          <label class="action-quick">Información de Contacto</label>
      </div>

  </div>
</template>

<script>
export default {

}
</script>

<style>

.section-main{
    height:21vh;
    align-items:center;
    border-top:8px solid black;
}

.action-box{
    width:20%;
    border:1px solid aliceblue;
    border-right:2px solid #e84043;
    border-left:2px solid #e84043;
    background:white;
    display:flex;
    align-items:Center;
    justify-content: space-evenly;
    cursor:pointer;
    height:13vh;
    box-shadow:-1px 2px  aliceblue;
    transition:.3s all ease-in-out;
}

.action-quick{
    color:#222;
    font-size:19px;
    font-weight:400;
    width:100%;
    text-align:center;
    transition:.3s all ease-in-out;
    cursor:pointer;
}

.action-box:hover{
    background:#222;
    border:1px solid black;
    box-shadow:2px 2px 1px #ccc;
}

.action-box:hover .action-quick{
    color:white;
}
</style>