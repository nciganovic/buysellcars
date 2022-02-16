$( document ).ready(function() {

    let queryString = window.location.search;

    if(queryString.includes("page"))
    {
        let pageStringToRemove = queryString.substring(queryString.indexOf("&") + 2 - queryString.indexOf("page"), queryString.indexOf("page"));
        queryString = queryString.replace(pageStringToRemove, "");
    }

    queryString = queryString.replace("?", "&");

    $(".page-link").each((idx, element) =>
    {
        element.href = element.href + queryString; 
    });

    $("#brand-select").on("change", ()=>
    {
        let brandId = $("#brand-select").val();
        if(brandId)
        {
            $.ajax({
                url: "http://127.0.0.1:8000/carmodels/" + brandId,
                method: "get",
                dataType: "json",
                success: function (data) {
                    $("#model-select").removeAttr('disabled');
                    $("#model-select").children().not(':first').remove();
                    for(let item of data.data)
                    {
                        let option = document.createElement("option");
                        option.value = item.id;
                        option.innerHTML = item.name;
                        $("#model-select").append(option);
                    }
                },
                error: function (data) {
                    console.log(data);
                }
            });
        }
        else
        {
            $("#model-select").attr('disabled', 'disabled');
            $("#model-select").children().not(':first').remove();
        }
    });

    $("#search-btn").on("click", () => 
    {
        let query = "/?";

        let brand = $("#brand-select").val();
        let model = $("#model-select").val();
        let price = $("#price").val();
        let yearFrom = $("#yearfrom-select").val();
        let until = $("#until-select").val();
        let carBody = $("#carbody-select").val();
        let fuel = $("#fuel-select").val();
        let city = $("#city-select").val();

        if(brand)
            query += "brand=" + brand + "&";

        if(model)
            query += "model=" + model + "&";;

        if(price)
            query += "price=" + price + "&";;

        if(yearFrom)
            query += "yearfrom=" + yearFrom + "&";

        if(until)
            query += "until=" + until + "&";

        if(carBody)
            query += "carbody=" + carBody + "&";

        if(fuel)
            query += "fuel=" + fuel + "&";

        if(city)
            query += "city=" + city + "&";

        let fullLink = document.location.origin + query;
        console.log(fullLink);
        location.href = fullLink;
    });
});