$( document ).ready(function() {
    $("#fav-click").click(function( event ) {
        event.preventDefault();

        $.ajax({
            url: "http://127.0.0.1:8000/ads/favorites/add",
            method: "post",
            data: {
                "id": $("#fav-click").attr("data-ad-id")
            },
            dataType: "json",
            headers: {'X-CSRF-Token': $('input[name="_token"]').attr('value')},
            success: function (data) {
                console.log(data);
                setFavoritesUI();
            },
            error: function (data) {
                alert(data.responseText);
                return;
            }
        });

        
    });

    function setFavoritesUI()
    {
        $("#fav-icon").toggleClass("fa-heart-o");
        $("#fav-icon").toggleClass("fa-heart");

        if($("#fav-icon").hasClass("fa-heart"))
            $("#fav-count").text(Number($("#fav-count").text()) + 1);
        else 
            $("#fav-count").text(Number($("#fav-count").text()) - 1);
    }
});