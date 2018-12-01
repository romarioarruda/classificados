$(document).ready(function(){
    
    excluiAnuncio();
    excluiImgAnuncio();
});


function excluiAnuncio()
{
    $('.btn-exclui-anuncio').on('click', function(){
        
        var id = $(this).attr('id-anuncio');

        var confirma = confirm('Esse anúncio será excluído!');

        if (confirma) {
            
            $.get('/classificados_mvc/model/excluirAnuncio.php?acao=deletar_anuncio&id='+id)
            .done(function(data){
                
                if (data == 'anuncio_excluido') {

                    alert('Anúncio '+id+' deletado.');
                    window.location.href = window.location.href;
                }

            });
            
        
        } else {
            return false;
        }
    });
}

function excluiImgAnuncio()
{
    $('.btn-exclui-img').on('click', function(){
        
        var id = $(this).attr('id-img');

        var confirma = confirm('Essa imagem será excluída!');

        if (confirma) {
            
            $.get('/classificados_mvc/model/excluirImgAnuncio.php?acao=deletar_imagem&id='+id)
            .done(function(data){
                if (data == 'imagem_excluida') {

                    alert('Imagem '+id+' deletada.');
                    window.location.href = window.location.href;
                }

            });
            
        
        } else {
            return false;
        }
    });
}
