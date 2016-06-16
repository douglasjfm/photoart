function pesquisa1()
{
	query = document.getElementById("query").value;
	$("#tabela_imagens").load("server.php?q="+query,function (resp,status,xhr){
			return;
	});
}

function pesquisa(){
	query = document.getElementById("query").value;
        var params = {
            // Request parameters
            "q": query,
            "count": "30",
            "offset": "0",
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
