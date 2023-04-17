<template>
    <div id="profile-options">
        <template v-if="$page.props.auth.user">
                <span @click.prevent="expandMenu" class="profile-btn">{{$page.props.auth.user.name}}<i class="fas fa-sort-down"></i></span>
                <div id="profile-options-expand" :class="['hide-options',{'expand-options':active}]">
                    <ul>
                        <li>
                            <a :href="route('dashboard',{'user_id':$page.props.auth.user.id})" class="expand-menu-opt">
                                Mi Perfil
                            </a>
                        </li>
                        <li>
                             <form id="logoutform" @submit.prevent="logout">
                                <input class="expand-menu-opt" type="submit" value="Cerrar Sesión">
                            </form>
                        </li>
                    </ul>
                </div>
        </template>
        <template v-else>
            <li id="4" class="list-item-horizontal">
                <a :href="route('login')" class="login-only">
                    Iniciar Sesión
                </a>
            </li> 
        </template>
    </div>

</template>

<script>
export default {
    props:['loggedUser'],
    data(){
        return{
            active:false,
            test:null,
        }
    },
    methods:{
        expandMenu(){
            this.active = !this.active;
        },
        logout() {
            this.$inertia.post(route('logout'));
        },
    },
    created(){
    }

}
</script>

<style>

#profile-options{
    height:100%;
    display:flex;
    align-items:center;
    justify-content: center;
    flex-direction:column;
}

.profile-btn{
    display:flex;
    outline:none;
    cursor:pointer;
    color:#444;
}

#profile-options-expand{
    overflow:hidden;
    position:absolute;
    top:7vh;
    padding-left:5px;
    padding-right:5px;
    z-index:3;
    background: white;
}

#profile-options-expand ul{
    height:100%;
    display:flex;
    flex-direction:column;
    align-items:center;
}

.hide-options{
    height:0;
}
.expand-options{
    height:auto;
    border:1px solid #ddd;
    background:#f8f8ff;
    border-radius:0px 0px 13px 13px;
    box-shadow:0px 2px #eee;
}
.expand-menu-opt{
    border:none;
    background:none;
    cursor:pointer;
    color: #222;
    font-size:14px;
    transition:.3s all ease-in-out;
}

.expand-menu-opt:hover{
    color:#e73039;
}

</style>