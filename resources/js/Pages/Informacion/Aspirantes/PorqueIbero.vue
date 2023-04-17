<template>
  <p class="">
  
  </p>
</template>

<script>
export default {

}
</script>

<style>

.section-header{
  width:30%
}

.section-title{
  font-size:34px;
  font-weight:600;
  text-transform: uppercase;
  color:#e84043;
}

.single-hexa-block{
  background:#e84043;
  height:21vh;
  width:30%;
  margin-bottom:1vh;
  margin-top:1vh;
  border-radius:13px;
  box-shadow:1px 1px 1px #ddd;
  display:flex;
  align-items:center;
  cursor:pointer;
  justify-content: space-evenly;
  border:1px solid #e84043;
  transition:.3s all ease-in-out;
}

.hover-hide{
  color:white;
  font-size:66px;
  font-weight:600;
  position:absolute;
  text-transform: italic;
  transition:.5s all ease-in-out;
}

.hover-show{
  color:#e84043;
  font-weight:500;
  font-size:23px;
  text-align:center;
  transition:.5s all ease-in-out;
}

.single-hexa-block:hover .hover-show{
  color:#e84043;
}

.single-hexa-block:hover .hover-hide{
  color:white;
  z-index:-1;
}

.single-hexa-block:hover{
  background:white;
  box-shadow:2px 2px 2px #ccc;
}

</style>