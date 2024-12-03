const url= "bd/crud.php";
const urlMarca = "bd/marcas.php";
const {createApp} = Vue;

createApp({
    data(){
        return{
        moviles:[],
        id:"",
        marca:"",
        marcas:[],
        modelo:"",
        stock:"",
        busqueda:"",
        };
    },
    created: function(){
        this.listar();
        this.cargarMarcas();
    },
    methods:{
        listar: function(){
            axios.post(url, {opcion:"listar"})
            .then(response => {
                this.moviles = response.data;
            })
            .catch(function(error){
                console.log(error);
            });    
        },
        cargarMarcas: function(){
            axios.post(urlMarca, {opcion:"listar"})
            .then(response => {
                this.marcas = response.data.map(marca => marca.marca);
                console.log(this.marcas);
            })
            .catch(function(error){
                console.log(error);
            });   
        }
        ,
        buscar: function(){
            axios.post(url, {opcion:"buscar", buscar:this.busqueda})
            .then(response => {
                this.moviles = response.data;
            });
        },
        cambiarValidacion: function(id,valido){
            if (valido){
                $("#"+id).removeClass(["is-valid","is-invalid"]);
                $("#"+id).addClass("is-valid");
            }else{
                $("#"+id).removeClass(["is-valid","is-invalid"]);
                $("#"+id).addClass("is-invalid");
            }
        },
        crear: function(){
            let marcaVacio  = this.marca    === "";
            let modeloVacio = this.modelo   === "";
            let stockVacio  = this.stock    === "";

            this.cambiarValidacion("marca", !marcaVacio);
            this.cambiarValidacion("modelo", !modeloVacio);
            this.cambiarValidacion("stock", !stockVacio);
            
            if (!marcaVacio && !modeloVacio && !stockVacio){
                axios.post(url, {opcion:"crear", marca:this.marca, modelo:this.modelo, stock:this.stock})
                .then(response => {
                    this.listar();
                    let modal = bootstrap.Modal.getInstance(document.getElementById("modalEditar"));
                    modal.hide();
                })
                .catch(error => {
                    
                });
            }
        },
        editar: function(){
            let marcaVacio  = this.marca    === "";
            let modeloVacio = this.modelo   === "";
            let stockVacio  = this.stock    === "";

            this.cambiarValidacion("marca", !marcaVacio);
            this.cambiarValidacion("modelo", !modeloVacio);
            this.cambiarValidacion("stock", !stockVacio);
            
            if (!marcaVacio && !modeloVacio && !stockVacio){
                axios.post(url, {opcion:"editar", id:this.id, marca:this.marca, modelo:this.modelo, stock:this.stock})
                .then(response => {
                    this.listar();
                    let modal = bootstrap.Modal.getInstance(document.getElementById("modalEditar"));
                    modal.hide();
                });
            }
        },
        eliminar: function(){
            axios.post(url, {opcion:"eliminar", id:this.id})
            .then(response => {
                this.listar();
            });
        },
        btnCargarModalEditar: function(id, marca, modelo, stock){
            this.id = id;
            this.marca = marca;
            this.modelo = modelo;
            this.stock = stock;

            $("#marca").removeClass(["is-valid", "is-invalid"]);
            $("#modelo").removeClass(["is-valid", "is-invalid"]);
            $("#stock").removeClass(["is-valid", "is-invalid"]);
        },
        btnNuevo: function(){
            this.id = "";
            this.marca = "";
            this.modelo = "";
            this.stock = "";
            
            $("#marca").removeClass(["is-valid", "is-invalid"]);
            $("#modelo").removeClass(["is-valid", "is-invalid"]);
            $("#stock").removeClass(["is-valid", "is-invalid"]);
        },
        btnCargarModalEliminar: function(id){
            this.id = id;
        }
    }
}).mount('#appMoviles');
