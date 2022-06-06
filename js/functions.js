$(document).ready(function(){
    var DOMAIN = "http://localhost/mod_documentos_imovel/documento_imovel_listar.php";

   $("#register_form").on("submit", function(){
       var status = false;
       var name = $("#username");
       var email = $("#email");
       var pass1 = $("#password1");
       var pass2 = $("#password2");
       var type = $("#usertype");
       
       //marlon.pauloo@gmail.com
       var e_patt = new RegExp(/^[a-z0-9_-]+(\.[a-z0-9_-]+)*@[a-z0-9_-]+(\.[a-z0-9_-]+)*(\.[a-z]{2,4})$/);
        if(name.val() == "" || name.val().length < 6){
            name.addClass("border-danger");
            $("#u_error").html("<span class='text-danger'>Por favor, insira seu nome e precisa ser maior que 6 caracteres</span>");
            status = false;
        } else {
            name.removeClass("border-danger");
            $("#u_error").html("");
            status = true;
        }

        if(!e_patt.test(email.val())){
            email.addClass("border-danger");
            $("#e_error").html("<span class='text-danger'>Por favor, insira um e-mail válido</span>");
            status = false;
        } else {
            email.removeClass("border-danger");
            $("#e_error").html("");
            status = true;
        }

        if(pass1.val() == "" || pass1.val().length < 9){
            pass1.addClass("border-danger");
            $("#p1_error").html("<span class='text-danger'>Por favor, digite uma senha válida maior que 9 caracteres</span>");
            status = false;
        } else {
            pass1.removeClass("border-danger");
            $("#p1_error").html("");
            status = true;
        }

        if(pass2.val() == "" || pass2.val().length < 9){
            pass2.addClass("border-danger");
            $("#p2_error").html("<span class='text-danger'>Por favor, digite uma senha válida maior que 9 caracteres</span>");
            status = false;
        } else {
            pass2.removeClass("border-danger");
            $("#p2_error").html("");
            status = true;
        }

        if(type.val() == ""){
            type.addClass("border-danger");
            $("#t_error").html("<span class='text-danger'>Por favor, escolha o tipo de cadastro</span>");
            status = false;
        } else {
            type.removeClass("border-danger");
            $("#t_error").html("");
            status = true;
        }
        if((pass1.val() == pass2.val()) && status == true){

            

            // console.log($("#register_form"));
            // $.ajax({
            //     url: DOMAIN+"/includes/process.php",
            //     method: "POST",
            //     // data: $("#register_form").serialize(),
            //     data:{
            //         username: $('#username').val(),
            //         email: $('#email').val(),
            //         password1: $('#password1').val(),
            //         usertype: $('#usertype').val()
            //     },
            //     success: function(data, status){
            //         if (data == "EMAIL_ALREADY_EXISTS") {
            //             alert("Esse e-mail já existe");
            //         } else if(data == "SOME_ERROR"){
            //             alert("Aconteceu um erro");
            //         } else {
            //             console.log(data);
            //             console.log(status);
            //             alert("Deu tudo certo");
            //             alert(data);
            //             alert(status);
            //             // window.location.href = encodeURI(DOMAIN+"?msg=Você foi registrado, agora pode acessar o sistema"); 
            //         }
            //     }
            // })
        } else {
            pass2.addClass("border-danger");
            $("#p2_error").html("<span class='text-danger'>A senha não confere</span>");
            status = false;
        }

       
   })


   //Para o login
   $("#login_form").on("submit", function(){
    var email = $("#log_email");
    var pass = $("#log_pass");
    var status = false;

    if(email.val() == ""){
        email.addClass("border-danger");
        $("#e_error").html("<span class='text-danger'>Por favor, insira um e-mail</span>");
        status = false;
    } else {
        email.removeClass("border-danger");
        $("#e_error").html("");
        status = true;
    }

    if(pass.val() == ""){
        pass.addClass("border-danger");
        $("#p_error").html("<span class='text-danger'>Por favor, insira uma senha</span>");
        status = false;
    } else {
        pass.removeClass("border-danger");
        $("#p_error").html("");
        status = true;
    }

    if(status){
        alert("pronto");
    }

   })

});