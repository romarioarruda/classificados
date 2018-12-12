$(document).ready(function(){
    
    excluiAnuncio();
    excluiImgAnuncio();
});


function excluiAnuncio()
{
    $('.btn-exclui-anuncio').on('click', function(){
        
        var id = $(this).attr('id-anuncio');
        
        $('.btn-exluir-anuncio-modal').click(function(){

            $.get('/classificados_mvc/model/excluirAnuncio.php?acao=deletar_anuncio&id='+id)
            .done(function(data){
                
                if (data == 'anuncio_excluido') {
                    window.location.href = window.location.href;
                }

            });

        }); 
        
    });
}

function excluiImgAnuncio()
{
    $('.btn-exclui-img').on('click', function(){
        
        var id = $(this).attr('id-img');
        
        $('.btn-exluir-imagem-modal').click(function(){
            
            $.get('/classificados_mvc/model/excluirImgAnuncio.php?acao=deletar_imagem&id='+id)
            .done(function(data){
                if (data == 'imagem_excluida') {

                    window.location.href = window.location.href;
                }

            });

        });
    });
}
