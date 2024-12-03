var url = "bd/usuario.php";
const { createApp } = Vue;
createApp({
    data() {
        return {
            usuario: "",
            contra: "",
        };
    },
    methods: {
        cambiarNombre: function () {
            this.usuario = $("#nombre").val();

            axios
                .post(url, {
                    opcion: "cambiarNombre",
                    nombreNuevo: this.usuario,
                })
                .then((response) => {
                    console.log(response);

                    alert("Nombre Cambiado!");
                    location.reload();
                });
        },
        cambiarContra: function () {
            var contraActual = $("#contraActual").val();
            var contraNueva = $("#contraNueva").val();
            var contraConfirm = $("#contraConfirm").val();

            if (contraNueva == contraConfirm) {
                axios
                    .post(url, {
                        opcion: "cambiarContra",
                        contraActual: contraActual,
                        contraNueva: contraNueva,
                    })
                    .then((response) => {
                        if (response.data == "0") {
                            alert("Contraseña actual incorrecta");
                        } else {
                            alert("Contraseña cambiada con exito");
                            $("#form_usuario")[0].reset();
                        }
                    });
            } else {
                alert("Contraseñas no coinciden");
            }
        },
    },
}).mount("#appUsuario");
