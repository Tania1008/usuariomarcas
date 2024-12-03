var url = "bd/login.php";
const { createApp } = Vue;
createApp({
    data() {
        return {
            usuario: "",
            contra: "",
    };
},
methods: {
    onSubmit: function() {
        this.usuario = $("#usuario").val();
        this.contra = $("#contra").val();

        axios.post(url, {
            usuario: this.usuario,
            contra: this.contra,
        }).then((response) => {
            alert(JSON.stringify(response.data));
            user = response.data.usuario;
            contra = response.data.contra;

            if (user==1 && contra==1) {
                location.href = "./";
            }else if(user==1 && contra==0){
                $("#usuario").removeClass(["is-valid","is-invalid"]);
                $("#contra").removeClass(["is-valid","is-invalid"]);
                $("#usuario").addClass("is-valid");
                $("#contra").addClass("is-invalid");
                $("#contra").focus();
            }else if(user==0){
                $("#usuario").addClass("is-invalid");
                $("#contra").addClass("is-invalid");
                $("#usuario").focus();
            }
        });                
    }
}
}).mount("#appLogin");