$(document).ready(function() {
    console.log("admin index");

    $(".track-move-left").click(function(){
        track_click(false);
    });

    $(".track-move-right").click(function(){
        track_click(true);
    });

    function track_click(isRight)
    {
        let currentPage = $("#t-body").attr("data-page");
        let getPage = isRight ? Number(currentPage) + 1 : Number(currentPage) - 1;
        console.log(isRight);
        console.log(currentPage);
        
        $.ajax({
            url: "http://127.0.0.1:8000/admin/track/get",
            method: "get",
            data: {
                "page": getPage
            },
            dataType: "json",
            success: function (data) {
                console.log(data);
                
                clearTable();
                populateTable(data.data);
                
                $("#t-body").attr("data-page", getPage);

                if(getPage > 1)
                    $(".track-move-left").removeAttr("disabled")
                else 
                    $(".track-move-left").attr("disabled", "disabled");
                if(!data.next)
                    $(".track-move-right").attr("disabled", "disabled");
                else
                    $(".track-move-right").removeAttr("disabled")
            },
            error: function (data) {
                console.log(data);
            }
        });
    }

    function clearTable()
    {
        $("#t-body").empty();
    }
    
    function populateTable(items)   
    {
        for(let item of items)
        {
            let row = document.createElement("tr");
            let user = document.createElement("td");
            let url = document.createElement("td");
            let datetime = document.createElement("td");

            user.innerText = item.email ?? "Anonymous";
            url.innerText = item.url;
            datetime.innerText = item.datetime;

            row.appendChild(user);
            row.appendChild(url);
            row.appendChild(datetime);

            document.getElementById("t-body").appendChild(row);
        }
    }
});