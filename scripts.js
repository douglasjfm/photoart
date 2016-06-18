function pesquisa(offset){
	query = document.getElementById("query").value;
        var params = {
            // Request parameters
            "q": query,
            "count": "30",
            "offset": offset,
            "mkt": "pt-br",
            "safeSearch": "Moderate",
        };
      
        $.ajax({
            url: "https://bingapis.azure-api.net/api/v5/images/search?" + $.param(params),
            beforeSend: function(xhrObj){
                // Request headers
                xhrObj.setRequestHeader("Ocp-Apim-Subscription-Key","27fad80fd63b40fca252fd2efab02582");
            },
            type: "GET",
            // Request body
            data: "{body}",
        })
        .done(function(data) {
		insereImagens(data.value);
        })
        .fail(function() {
            alert("Erro ao acessar api do Bing. Por favor, tente novamente em alguns minutos.");
        });
    }
function enviar(array)
{
    $("#tabela_imagens").load("http://localhost/photoarts/server.php",{value: array},function(resp,status,jqxhr){
        alert("Informacoes Armazenadas no BD");
    });
}