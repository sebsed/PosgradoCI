import { HeaderComponent } from '../../../../../../../Users/DiegoPrieto/Desktop/AngularShopPilot/AS-frontend/src/app/@admin/core/components/header/header.component';
<template>
  <div class="content-wrapper-row">
      <div class="section-divider-header">
        <h2 class="sdh-subtitle">{{ subtitle }}</h2>
        <h2 class="sdh-title">{{ title }}</h2>
      </div>

  </div>
</template>

<script>
export default { props:['title', 'subtitle'] }
</script>

<style>

.section-divider-header{
    width:100%;
    height:8vh;
    display:flex;
    flex-direction:column;
    align-items:center;
    justify-content: center;
    margin-top:3vh;
    margin-bottom:3vh;
}

.sdh-subtitle{
    font-size:21px;
    font-weight:600;
    color:#e84043;
}

.sdh-title{
    font-size:24px;
    letter-spacing: 1px;
    font-weight:500;
    color:#222;
}

</style>