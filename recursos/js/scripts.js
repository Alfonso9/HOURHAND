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

/////////////////////////AULAS///////////////////////////////
function Aulas()
{
    $.ajax
            ({
                type: "POST",
                url: "crud/paginaAulas",
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
                            alert('Error while resquest.. HOLLLL');
                        }
            });
}

function getAula(id)
{
    $.ajax
            ({
                type: "POST",
                url: "crud/getAula",
                data: {'id':id},
                success: function(jso)
                        {
                            try
                            {     
                                $("#div-infoAula").html(jso);                                
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

function editAula(numero)
{
    $.ajax
            ({
                type: "POST",
                url: "crud/editarAula",
                data: {'numero':numero},
                success: function(jso)
                        {
                            try
                            {     
                                $("#div-form-aulas").html(jso);                                
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

function formCrearAula()
{
    $.ajax
            ({
                type: "POST",
                url: "crud/formcrearaula",
                success: function(jso)
                        {
                            try
                            {     
                                $("#div-form-aulas").html(jso);                                
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

function delAula(id)
{
    $.ajax
            ({
                type: "POST",
                url: "crud/eliminarAula",
                data: {'id':id},
                success: function(jso)
                        {
                            try
                            {     
                                $("#div-aulas").html(jso);
                                window.formCrearAula();                                
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


function Maestros()
{
    $.ajax
            ({
                type: "POST",
                url: "crud/paginaMaestros",
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

function getMaestro(id)
{
    $.ajax
            ({
                type: "POST",
                url: "crud/getMaestro",
                data: {'id':id},
                success: function(jso)
                        {
                            try
                            {     
                                $("#div-infoMaestro").html(jso);                                
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

function editMaestro(numero)
{
    $.ajax
            ({
                type: "POST",
                url: "crud/editarMaestro",
                data: {'numero':numero},
                success: function(jso)
                        {
                            try
                            {     
                                $("#div-form-maestros").html(jso);                                
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

function formCrearMaestro()
{
    $.ajax
            ({
                type: "POST",
                url: "crud/formcrearmaestro",
                success: function(jso)
                        {
                            try
                            {     
                                $("#div-form-maestros").html(jso);                                
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

function delMaestro(id)
{
    $.ajax
            ({
                type: "POST",
                url: "crud/eliminarMaestro",
                data: {'id':id},
                success: function(jso)
                        {
                            try
                            {     
                                $("#div-maestros").html(jso);
                                window.formCrearMaestro();                                
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