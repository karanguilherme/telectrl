admin = {
    
    buscaCep: function()
    {
        $(document).ready(function() {

            function limpa_cep() {

                $("#endereco").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#estado").val("");
            }

            $("#cep").blur(function() {

              var cep = $(this).val().replace(/\D/g, '');

                if (cep != "") {


                    var validacep = /^[0-9]{8}$/;

                    if(validacep.test(cep)) {


                        $("#endereco").val("...");
                        $("#bairro").val("...");
                        $("#cidade").val("...");
                        $("#estado").val("...");


                        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#endereco").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#estado").val(dados.uf);
                            }
                            else {

                                limpa_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    }
                    else {

                        limpa_cep();
                        alert("Formato de CEP inválido.");
                    }
                }
                else {
                    limpa_cep();
                }
            });
        });

    },

    mascaras: function()
    {

            $('#cpf').mask('000.000.000-00')


    },

    deletarCliente: function ()
    {
        $('#deletarCliente').click(function(){
            Swal.fire({
                title: 'Deseja realmente deletar ?',
                text: "Esta ação não poderá ser revertida!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sim quero deletar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Deletado!',
                        'Os dados foram deletados com sucesso.',
                        'success'
                    )
                }
            })
        })
    }
    
}

$(function(){
    admin.buscaCep();
    admin.mascaras();
    admin.deletarCliente();
});