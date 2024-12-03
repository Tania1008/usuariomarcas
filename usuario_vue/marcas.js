const url = "bd/marcas.php";
const { createApp } = Vue;

createApp({
    data() {
        return {
            edicion: false,
            marcaActual: "",
            marcas: [],
            marca: "",
            busqueda: "",
        };
    },
    created: function () {
        this.listar();
    },
    methods: {
        listar: function () {
            axios
                .post(url, { opcion: "listar" })
                .then((response) => {
                    this.marcas = response.data;
                    console.log(this.marcas);
                })
                .catch(function (error) {
                    console.log(error);
                });
        },

        buscar: function () {
            axios.post(url, { opcion: "buscar", buscar: this.busqueda }).then((response) => {
                this.marcas = response.data;
            });
        },

        cambiarValidacion: function (id, valido) {
            if (valido) {
                $("#" + id).removeClass(["is-valid", "is-invalid"]);
                $("#" + id).addClass("is-valid");
            } else {
                $("#" + id).removeClass(["is-valid", "is-invalid"]);
                $("#" + id).addClass("is-invalid");
            }
        },
        crear: function () {
            let marcaVacio = this.marca === "";
            this.cambiarValidacion("marca", !marcaVacio);

            if (!marcaVacio) {
                axios
                    .post(url, { opcion: "crear", marcaNueva: this.marca })
                    .then((response) => {
                        this.listar();
                        let modal = bootstrap.Modal.getInstance(
                            document.getElementById("modalEditar")
                        );
                        modal.hide();
                        console.log(response.data, "Marca creada");
                    })
                    .catch((error) => {});
            }
        },
        editar: function () {
            let marcaVacio = this.marca === "";
            this.cambiarValidacion("marca", !marcaVacio);

            if (!marcaVacio) {
                axios
                    .post(url, {
                        opcion: "editar",
                        marcaNueva: this.marca,
                        marcaActual: this.marcaActual,
                    })
                    .then((response) => {
                        this.listar();
                        let modal = bootstrap.Modal.getInstance(
                            document.getElementById("modalEditar")
                        );
                        modal.hide();
                        console.log(response.data, "Marca editada");
                    });
            }
        },
        eliminar: function () {
            axios
                .post(url, { opcion: "eliminar", marcaActual: this.marcaActual })
                .then((response) => {
                    this.listar();
                });
        },
        btnCargarModalEditar: function (marcaActual) {
            this.marcaActual = marcaActual;
            this.marca = marcaActual;
            this.edicion = true;

            $("#marca").removeClass(["is-valid", "is-invalid"]);
        },
        btnNuevo: function () {
            this.marcaActual = "";
            this.marca = "";
            this.edicion = false;

            $("#marca").removeClass(["is-valid", "is-invalid"]);
        },
        btnCargarModalEliminar: function (marcaActual) {
            this.marcaActual = marcaActual;
        },
    },
}).mount("#appMarcas");
