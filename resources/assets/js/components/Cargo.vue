<template>
    <table class="table table-hover table-bordered">
        <tbody>
            <tr>
                <th width="10%">ID</th>
                <th width="70%">Nombre</th>
                <th width="20%">Acciones</th>
            </tr>
            <template v-for="cargo in cargos">
                <tr>
                    <td>{{ cargo.id }}</td>
                    <td>{{ cargo.nombre }}</td>
                    <td>
                        <div class="btn-group">
                            <a href="#" class="btn btn-primary"><span class="fa fa-edit"></span></a>
                            <a href="#" class="btn btn-danger"><span class="fa fa-close"></span></a>
                        </div>
                    </td>
                </tr>
            </template>
        </tbody>
    </table>
</template>

<script>

    import axios from 'axios'

    export default {
        data(){
            return{
                cargos:[],
            }
        },
        created: function() {
            this.getCargos();
        },
        methods:{
            getCargos(){
                var url = 'cargos/get'
                axios.get(url).then(response => {
                    this.cargos = response.data
                });
            }
        }
    }
</script>
