window.onload = function(e)
                {
                    $("#wrapper").toggleClass("toggled");
                 }

$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});


function Carreras()
{
	$.ajax
            ({
                type: "POST",
                url: "crud/paginaCarreras",
                success: function(jso)
                        {
                            try
                            {     
                                $("#wrapper").toggleClass("toggled");
                                $("#page-content-wrapper").html(jso);                                 
                            }catch(e)
                            {
                                alert('Exception while resquest...');
                            }                       
                        },
                error:  function()
                        {
                            alert('Error while resquest..');
                        }
            });
}

function getCarrera(id)
{
    $.ajax
            ({
                type: "POST",
                url: "crud/getCarrera",
                data: {'id':id},
                success: function(jso)
                        {
                            try
                            {     
                                $("#div-infoCarrera").html(jso);                                
                            }catch(e)
                            {
                                alert('Exception while resquest...');
                            }                       
                        },
                error:  function()
                        {
                            alert('Error while resquest..');
                        }
            });
}

function editCarrera(codigo)
{
    $.ajax
            ({
                type: "POST",
                url: "crud/editarCarrera",
                data: {'codigo':codigo},
                success: function(jso)
                        {
                            try
                            {     
                                $("#div-form-carreras").html(jso);                                
                            }catch(e)
                            {
                                alert('Exception while resquest...');
                            }                       
                        },
                error:  function()
                        {
                            alert('Error while resquest..');
                        }
            });
}

function formCrearCarrera()
{
    $.ajax
            ({
                type: "POST",
                url: "crud/formcrearcarrera",
                success: function(jso)
                        {
                            try
                            {     
                                $("#div-form-carreras").html(jso);                                
                            }catch(e)
                            {
                                alert('Exception while resquest...');
                            }                       
                        },
                error:  function()
                        {
                            alert('Error while resquest..');
                        }
            });
}

function delCarrera(id)
{
    $.ajax
            ({
                type: "POST",
                url: "crud/eliminarCarrera",
                data: {'id':id},
                success: function(jso)
                        {
                            try
                            {     
                                $("#div-carreras").html(jso);
                                window.formCrearCarrera();                                
                            }catch(e)
                            {
                                alert('Exception while resquest...');
                            }                       
                        },
                error:  function()
                        {
                            alert('Error while resquest..');
                        }
            });
}

/* Nombre: getPaginaHorario
   Autor: Alfonso
   Descripcion: Envia solicitud de la 
   página de horario al controlador crud.php
*/
function getPaginaHorario()
{
    $.ajax
            ({
                type: "POST",
                url: "crud/paginaHorario",
                success: function(jso)
                        {
                            try
                            {     
                                $("#wrapper").toggleClass("toggled");
                                $("#page-content-wrapper").html(jso);                                
                            }catch(e)
                            {
                                alert('Exception while resquest...');
                            }                       
                        },
                error:  function()
                        {
                            alert('Error while resquest..');
                        }
            });
}

/* Nombre: verHorario
   Autor: Alfonso
   Descripcion: Envia solicitud de la 
   página de horario al controlador crud.php
*/
function verHorario(id)
{
    $.ajax
            ({
                type: "POST",
                url: "crud/seccionHorario",
                data: {'numeroaula':id},
                success: function(jso)
                        {
                            try
                            {                                      
                                $("nav > ul > li").removeClass('active');
                                $("#"+id).addClass('active');                              
                                if (jso.localeCompare('-1') < 0) 
                                {
                                    $("#row-horas").html(jso);
                                    llenarHorario(id);
                                }
                                else
                                {
                                    alert("El aula no tiene horario establecido");
                                };
                            }catch(e)
                            {
                                alert('Exception while resquest...');
                            }                       
                        },
                error:  function()
                        {
                            alert('Error while resquest..');
                        }
            });
}

/* Nombre: llenarHorario
   Autor: Alfonso
   Descripcion: Realiza una solcitud al controlador CRUD para
   obtener los datos del horario de un aula en especifico
*/
    function llenarHorario(aula)
    {
        $.ajax
            ({
                type: "POST",
                url: "crud/getMovimiento",
                data: {'numeroaula':aula},
                success: function(jso)
                        {
                            try
                            {                                       
                                jso = jQuery.parseJSON(jso);  
                                var tag = '';
                                var nombEE = '';
                                var nrc = ''; 
                                var posicAsig = '';                           
                                jQuery.each(jso, function(key, value)
                                {
                                    //tag = tag.concat('#');
                                    jQuery.each(value, function(key, value){
                                        //alert(key+' '+value);
                                        if (key == 'nombEE') 
                                        {
                                            nombEE = value;
                                        }else if (key == 'nrcEE')
                                        {
                                            nrc = value;
                                        }
                                        else if (key == 'posicAsig')
                                        {
                                            posicAsig = value;
                                        }else
                                        {
                                            tag = tag.concat(value);
                                            tag = tag.concat(':');
                                        };                                                                      
                                    });
                                    tag = tag.concat(aula);
                                    var div = document.createElement("div");
                                    var span = document.createElement("span");
                                    var p = document.createElement("p");
                                    var t = document.createTextNode(nombEE);
                                    span.setAttribute("onclick", "borrarMovimiento('"+nrc+':'+aula+':'+posicAsig+"', '"+tag+"')");
                                    span.setAttribute("class", "glyphicon glyphicon-remove-sign");
                                    p.setAttribute("class", "nombre");
                                    p.appendChild(t);
                                    div.appendChild(span);
                                    div.appendChild(p);
                                    div.setAttribute("id", nrc+':'+posicAsig);
                                    div.setAttribute("class", "col-md-1 color5 alto2 EE");                                     
                                    div.setAttribute("draggable", "true"); 
                                    div.setAttribute("ondragstart", "drag(event)");                                    
                                    document.getElementById(tag).appendChild(div);
                                    tag = '';
                                    nombEE = '';
                                    nrc = '';
                                    var posicAsig = '';
                                });
                            }catch(e)
                            {
                                alert('Exception while resquest...');
                            }                       
                        },
                error:  function()
                        {
                            alert('Error while resquest..');
                        }
            });
    };

/* Nombre: verEE
   Autor: Alfonso
   Descripcion: Envia solicitud de la 
   secciòn de horario al controlador crud.php
*/
function verEE(id)
{
    $.ajax
            ({
                type: "POST",
                url: "crud/seccionEE",
                data: {'codigo': id},
                success: function(jso)
                        {
                            try
                            {     
                                $("#EE").html(jso);                                 
                            }catch(e)
                            {
                                alert('Exception while resquest...');
                            }                       
                        },
                error:  function()
                        {
                            alert('Error while resquest..');
                        }
            });
}

/* Nombre: allowDrop
   Autor: Alfonso
   Descripcion: Detiene el envío al arrastrar
*/
function allowDrop(ev) 
{
    ev.preventDefault();
}

/* Nombre: drag
   Autor: Alfonso
   Descripcion: Realiza transferencia de datos del 
   elemento que se esta arrastrando
*/
function drag(ev) 
{
    ev.dataTransfer.setData("text", ev.target.id);
    //$('#'+ev.target.id).draggable( {cursor: 'move'} );
}

/* Nombre: drop
   Autor: Alfonso
   Descripcion: Realiza acciones una vez que
   el elemento que se esta arrastrando se ha 
   dejado en un espacio autorizado para recibir
   objetos. Así como envía solicitud al controlador
   crud para guardar los movimientos.
*/
function drop(ev) 
{
    ev.preventDefault();
    var nrc = ev.dataTransfer.getData("text");
    if (ev.target.hasChildNodes())
    {
        alert("Movimiento invalido");
    }else
    {
        ev.target.appendChild(document.getElementById(nrc));
        var id = $(ev.target).attr("id");
        $.ajax
            ({
                type: "POST",
                url: "crud/setMovimiento",
                data: {'nrc': nrc, "id":id},
                success: function(jso)
                        {
                            try
                            {       
                                var nrcnumEE = nrc.split(":");
                                var ide = id.split(":");
                                var span = document.createElement("span");
                                span.setAttribute("onclick", "borrarMovimiento('"+nrcnumEE[0]+':'+ide[2]+':'+nrcnumEE[1]+"', '"+id+"')");
                                span.setAttribute("class", "glyphicon glyphicon-remove-sign");
                                var d = document.getElementById(nrc).children;
                                var ele = '';
                                for (var i = 0; i < d.length; i++) 
                                {
                                    if(d[i].nodeName == 'P')
                                    {
                                        ele = d[i];
                                        break;
                                    }
                                };  
                                                                    
                                document.getElementById(nrc).className = "";
                                document.getElementById(nrc).setAttribute("class", "col-md-1 color5 alto2 EE");
                                // Get the <ul> element with id="myList"
                                var list = document.getElementById(nrc);
                                // As long as <ul> has a child node, remove it
                                while (list.hasChildNodes())
                                {   
                                    list.removeChild(list.firstChild);
                                };
                                ele.setAttribute("class", "nombre");
                                //alert(ele.innerHTML);
                                document.getElementById(nrc).appendChild(span);  
                                document.getElementById(nrc).appendChild(ele);                      
                            }catch(e)
                            {
                                alert('Exception while resquest...');
                            }                       
                        },
                error:  function()
                        {
                            alert('Error while resquest drop..');
                        }
            });
        //alert($(ev.target).attr("id"));
        //alert(nrc);
    };
}

/* Nombre: getposicAsigEE 
   Autor: Alfonso
   Descripcion: Muestra las EE disponibles 
   para arrasttrar de acuerdo a las horas 
   que se hayan registrado en tabla ee
*/
function EEdispon(hrs, e, nrc) 
{
    // Get the <ul> element with id="myList"
    var list = document.getElementById("EEdisp");

    // As long as <ul> has a child node, remove it
    while (list.hasChildNodes()) {   
        list.removeChild(list.firstChild);
    }

    $.ajax({
        type: "POST",
        url: "crud/getposicAsigEE",
        data: {'nrc': nrc},
        success: function(jso)
                {
                    try
                    {     
                        var obj = JSON.parse(jso);
                        var b = false;
                        for (var i = 1; i <= hrs; i++) 
                        {
                            for (var j = 0; j < obj.length; j++) 
                            {
                                if (obj[j].posicAsig == i) 
                                {
                                    b = true;
                                    break;
                                };
                            };
                            if(b == true)
                            {
                                b = false;
                                continue;
                            };
                            var div = document.createElement("div");
                            var input = document.createElement("input");
                            var p = document.createElement("p");
                            var t = document.createTextNode(e);
                            p.appendChild(t);
                            div.appendChild(p);
                            div.setAttribute("id", nrc.concat(':'+i));
                            div.setAttribute("class", "show-grid color5 col-md-1 alto2");                                     
                            div.setAttribute("draggable", "true"); 
                            div.setAttribute("ondragstart", "drag(event)"); 
                            var br = document.createElement("br");
                            div.appendChild(br);
                            var divrow = document.createElement("div");  
                            divrow.setAttribute("class", "row ");  
                            divrow.appendChild(div);             
                            document.getElementById("EEdisp").appendChild(divrow);
                        };          
                    }catch(e)
                    {
                        alert('Exception while resquest...');
                    }                       
                },
        error:  function()
                {
                    alert('Error while resquest..');
                }
    });
}

/* Nombre: EEdispon 
   Autor: Alfonso
   Descripcion: Muestra las EE disponibles 
   para arrasttrar de acuerdo a las horas 
   que se hayan registrado en tabla ee
*/
function borrarMovimiento(id, tag) 
{
    $.ajax
            ({
                type: "POST",
                url: "crud/borrarMovimiento",
                data: {"id":id},
                success: function(jso)
                        {
                            try
                            {     
                                var bandera = parseInt(JSON.parse(jso));
                                if (bandera == 1) 
                                {
                                     // Get the <ul> element with id="myList"
                                    var list = document.getElementById(tag);
                                    // As long as <ul> has a child node, remove it
                                    while (list.hasChildNodes())
                                    {   
                                        list.removeChild(list.firstChild);
                                    }
                                };                           
                                if(document.getElementById('EE').hasChildNodes())
                                { 
                                    var nrcnumEE = id.split(":");
                                    var clic = document.getElementById(nrcnumEE[0]);
                                    clic.click();
                                }
                            }catch(e)
                            {
                                alert('Exception while resquest...');
                            }                       
                        },
                error:  function()
                        {
                            alert('Error while resquest..');
                        }
            });
}

