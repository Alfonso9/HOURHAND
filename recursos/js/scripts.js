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

