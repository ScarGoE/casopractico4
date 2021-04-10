$(document).ready(function(){
    $(".id").click(function () {
        id = $(this).parents("tr").find("td").eq(0) .html();
        console.log (id)
        $('.id2').val(id)
        titulo = $(this).parents("tr").find("td").eq(1).html();
        console.log(titulo)
        $('.titulo').val(titulo);
        fecha = $(this).parents("tr").find("td").eq(2).html();
        $('.fecha').val(fecha);
        console.log(fecha)
        costo = $(this).parents("tr").find("td").eq(3).html();
        $('.costo').val(costo);
    });
});