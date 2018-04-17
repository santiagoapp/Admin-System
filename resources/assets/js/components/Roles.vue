<template>
    <div class="row">
        <div :class="col">
            <table class="table table-hover table-bordered">
                <tbody>
                    <tr>
                        <th width="10%">ID</th>
                        <th width="70%">Nombre</th>
                        <th width="20%">Acciones</th>
                    </tr>
                    <template v-for="rol in roles">
                        <tr>
                            <td>{{ rol.id }}</td>
                            <td>{{ rol.name }}</td>
                            <td>
                                <div class="btn-group">
                                    <a v-on:click = "showPermisos(rol.name)" class="btn btn-primary"><span class="fa fa-eye"></span></a>
                                    <a v-on:click = "deleteRol(rol.id)" class="btn btn-danger"><span class="fa fa-close"></span></a>
                                </div>
                            </td>
                        </tr>
                    </template>
                </tbody>
            </table>
        </div>
        <div v-if="isActive" class="col-md-4">
            <form role="form">
                <div class="form-group">
                    <label>Nombre del Rol</label>
                    <input v-model="permiso" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label>Permisos</label>
                    <template v-for="permiso in permisos">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox">
                                {{ permiso.name}}
                            </label>
                        </div>
                    </template>
                </div>
            </form>
        </div>
    </div>
</template>

<script>

    import axios from 'axios'
    import toastr from 'toastr'
    import swal from 'sweetalert'

    export default {
        data(){
            return{
                roles:[],
                permisos:[],
                permisosPorRol:[],
                isActive: false,
                col: 'col-md-12',
                permiso: '',
            }
        },
        created: function() {
            this.getRoles();
            this.getPermisos();
        },
        methods:{
            getRoles(){
                var url = 'roles/get'
                axios.get(url).then(response => {
                    this.roles = response.data
                });
            },
            getPermisos(){
                var url = 'permisos/get'
                axios.get(url).then(response => {
                    this.permisos = response.data
                });
            },
            showPermisos(name){
                this.getPermissionsByRole(name);
                this.permiso = name;
                this.isActive = true;
                this.col = 'col-md-8';
            },
            deleteRol(id){
                var url = 'roles/delete';
                swal({
                    title: "¿Estás seguro?",
                    text: "Una vez eliminado el rol no se podrá recuperar la información",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        axios.post(url,{
                            id: id
                        }).then(response => {
                            this.getRoles(); 
                            toastr.success(response.data);
                        }).catch(error =>{
                            toastr.error("Ha ocurrido un error");
                        });
                    } else {
                        swal("El registro no fue eliminado");
                    }
                });
            },
            getPermissionsByRole(name){
                var url = 'roles/permisos/get';
                axios.get(url,{
                    name: name
                }).then(response => {
                    this.permisosPorRol = response.data
                }).catch(error =>{
                    toastr.error("Ha ocurrido un error");
                });
            }
        }
    }
</script>
