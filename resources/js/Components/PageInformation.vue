<template>
  <div class="column-small">
            <div class="header-control">
                <h2 class="section-title bottom-red">Universidad Iberoamericana</h2><hr>
            </div>
            <div class="section-body-control">
                <label class="normal-text">Para mayor información puede comunicarse por los siguientes medios:</label>
                <ul class="footer-body-redbckg ul-list">
                    <li>
                        <span class="fa-icon-space"><i class="fas fa-envelope"></i></span>
                        <span>{{this.correo}}</span>
                    </li>
                    <li>
                        <span class="fa-icon-space"><i class="fas fa-phone"></i></span>
                        <span>+{{this.telefono}} <span v-if="extension">ext. {{this.extension}}</span></span>
                    </li>
                </ul>
                
            </div>
        </div>
</template>

<script>
export default {
    props:['correo', 'telefono', 'extension']
}
</script>

<style>

</style>