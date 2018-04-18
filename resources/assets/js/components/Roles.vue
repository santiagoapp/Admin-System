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
                    <input v-model="permisoAnterior" type="hidden" class="form-control">
                </div>
                <div class="form-group">
                    <label>Permisos</label>
                    <template v-for="(permiso,index) in permisos">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" v-model="checkbox[index]">
                                {{ permiso.name}}
                            </label>
                        </div>
                    </template>
                </div>
                <div class="form-group">
                    <a v-on:click.prevent="syncPermissionsToRole()" class="btn btn-primary btn-block"><span class="fa fa-plus"></span> Actualizar</a>
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
                checkbox:[],
                permisosPorRol:[],
                isActive: false,
                col: 'col-md-12',
                permiso: '',
                permisoAnterior: '',
                rolID: '',
            }
        },
        created: function() {
            this.getRoles();
            this.getPermisos();
            this.setCheckBoxFalse();
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
                this.permisoAnterior = name;
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
                axios.post(url,{
                    name: name
                }).then(response => {
                    this.permisosPorRol = response.data;
                    this.setCheckBoxFalse();
                    this.setPermissionsByRole();
                }).catch(error =>{
                    toastr.error("Ha ocurrido un error");
                });
            },
            setPermissionsByRole(){
                var arr = [];
                for (var j = 0; j < this.permisos.length; j++) {
                    for (var i = 0; i < this.permisosPorRol.length; i++) {
                        if (this.permisosPorRol[i].name == this.permisos[j].name) 
                        {
                            arr[j] = true;
                        }
                    }
                }
                this.checkbox = arr;
            },
            setCheckBoxFalse(){
                var arr = [];
                for (var j = 0; j < this.permisos.length; j++) {
                    arr[j] = false;
                }
                this.checkbox = arr;
            },
            syncPermissionsToRole(){
                var url = 'roles/permisos/set';
                var arr = [];

                for (var i = 0; i < this.permisos.length; i++) {
                    if (this.checkbox[i] == true) 
                    {
                        arr.push(this.permisos[i].name);
                    }
                }
                axios.post(url,{
                    name: this.permiso,
                    permisoAnterior: this.permisoAnterior,
                    permisos: arr,
                }).then(response => {
                    console.log(response.data);
                    this.getRoles();
                    this.permisoAnterior = response.data.name
                    toastr.success("Permisos agregados");
                }).catch(error =>{
                    toastr.error("Ha ocurrido un error");
                });
            }
        }
    }
</script>
