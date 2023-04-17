<template>
  <div class="plan-estudio-box">
    <h2>Semestre I</h2>
    <ul>
      <li class="materia-info-box">
        <span>Epistemología y Filosofia de la Ciencia</span>
        <div class="materia-extra">
          <span>6 Créditos</span>
          <span>3 Hrs</span>
        </div>
      </li>
      <li class="materia-info-box">
        <span>Proyecto de Investigación I</span>
        <div class="materia-extra">
          <span>6 Créditos</span>
          <span>3 Hrs</span>
        </div>
      </li>
    </ul>
  </div>
  <div class="plan-estudio-box">
    <h2>Semestre II</h2>
    <ul>
      <li class="materia-info-box">
        <span>Gestión de la Innovación Tecnológica</span>
        <div class="materia-extra">
          <span>6 Créditos</span>
          <span>3 Hrs</span>
        </div>
      </li>
      <li class="materia-info-box">
        <span>Proyecto de Investigación II</span>
        <div class="materia-extra">
          <span>6 Créditos</span>
          <span>3 Hrs</span>
        </div>
      </li>
    </ul>
  </div>
  <div class="plan-estudio-box">
    <h2>Semestre III</h2>
    <ul>
      <li class="materia-info-box">
        <span>Seminario de Evaluación I</span>
        <div class="materia-extra">
          <span>2 Créditos</span>
          <span>1 Hr</span>
        </div>
      </li>
      <li class="materia-info-box">
        <span>Proyecto de Investigación III</span>
        <div class="materia-extra">
          <span>6 Créditos</span>
          <span>3 Hrs</span>
        </div>
      </li>
    </ul>
  </div>
  <div class="plan-estudio-box">
    <h2>Semestre IV</h2>
    <ul>
      <li class="materia-info-box">
        <span>Proyecto de Investigación IV</span>
        <div class="materia-extra">
          <span>6 Créditos</span>
          <span>3 Hr</span>
        </div>
      </li>
    </ul>
  </div>
  <div class="plan-estudio-box">
    <h2>Semestre V</h2>
    <ul>
      <li class="materia-info-box">
        <span>Seminario de Evaluación II</span>
        <div class="materia-extra">
          <span>2 Créditos</span>
          <span>1 Hr</span>
        </div>
      </li>
      <li class="materia-info-box">
        <span>Proyecto de Investigación V</span>
        <div class="materia-extra">
          <span>6 Créditos</span>
          <span>3 Hr</span>
        </div>
      </li>
    </ul>
  </div>
  <div class="plan-estudio-box">
    <h2>Semestre VI</h2>
    <ul>
      <li class="materia-info-box">
        <span>Proyecto de Investigación VI</span>
        <div class="materia-extra">
          <span>6 Créditos</span>
          <span>3 Hr</span>
        </div>
      </li>
    </ul>
  </div>
  <div class="plan-estudio-box">
    <h2>Semestre VII</h2>
    <ul>
      <li class="materia-info-box">
        <span>Seminario de Investigación III</span>
        <div class="materia-extra">
          <span>2 Créditos</span>
          <span>1 Hr</span>
        </div>
      </li>
      <li class="materia-info-box">
        <span>Seminario de Tésis</span>
        <div class="materia-extra">
          <span>6 Créditos</span>
          <span>3 Hr</span>
        </div>
      </li>
    </ul>
  </div>
  <div class="plan-estudio-box">
    <h2>Semestre VIII</h2>
    <ul>
      <li class="materia-info-box">
        <span>Seminario de Titulación</span>
        <div class="materia-extra">
          <span>6 Créditos</span>
          <span>3 Hr</span>
        </div>
      </li>
    </ul>
  </div>
</template>

<script>
export default {};
</script>

<style>

.plan-estudio-box {
    height: 13vh;
    display: flex;
    align-items: center;
    justify-content: space-evenly;
    flex-direction: column;
    border: 1px;
    flex-grow: 1;
    max-width: 89%;
    width:45%;
    flex-wrap: wrap;
    min-width: 300px;
    margin-top: 2vh;
    margin-bottom: 2vh;
    margin-right:2vw;
    margin-left:2vw;
    border-radius: 13px;
    background: #e8404313;
}

.plan-estudio-box h2{
    font-weight:500;
    font-size:18px;
}

.plan-estudio-box ul{
    width:94%;
    display:flex;
    flex-direction:column;
    align-items:center;
    justify-content: space-evenly;
}

.materia-info-box {
    width:100%;
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: space-between;
}

.materia-extra{
    display:flex;
    align-items:center;
    justify-content: space-evenly;
    width:28%;
}
</style>