<?php defined('BASEPATH') OR exit ('No direct script access allowed')?>
<div class="row">
    <div class="col-xs-12">
        
        <h1>Actualizar información de Denuncia: </h1>

        <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------>
        <?php 
            $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; //obtiene el url actual
            $array = parse_url($actual_link);
            $aux = $array['path'];
            $exploded = explode("/", $aux);                             //esto es principalmente para obtener el id, que seria le ultimo parametro del url.
            $actual_id = $exploded[6];
        ?>
        <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------>


        <?= form_open_multipart(site_url('FlujoCausas/Laboral/editar_monitorio/'. $actual_id), 'class="form-horizontal" role="form" method="POST"') ?>


           <br>
            
            <!--Nombre del Demandante-->
            <div class="row">
                <div class="form-group">
                    <label class="col-md-2 control-label" for="titulo">Nombre del Demandante:</label>
                    <input name="n_demandante" data-rel="tooltip" type="text" readonly="readonly" id="n_demandante" class="col-md-3" value="<?php echo $n_demandante ?>">
                </div>
            </div>

            <br>

            <!--Rut del demandante-->
            <div class="row">
                <div class="form-group">
                    <label class="col-md-2 control-label" for="titulo">RUT del Demandante:</label>
                    <input name="rut" data-rel="tooltip" type="text" id="rut" readonly="readonly" class="col-md-3" value="<?= $rut ?>">
                </div>
            </div>

            <br>
    
            <!--RIT/ROL-->
            <div class="row">
                <div class="form-group">
                    <label class="col-md-2 control-label" for="denunciante">RIT/ROL:</label>
                    <input name="rol" data-rel="tooltip" type="text" id="rol" readonly="readonly" placeholder="" class="col-md-2" value="<?=  $rol; ?>">
                </div>
            </div>

            <br>

            <!--Fecha notificacion-->
            <div class="row">
                <div class="form-group">
                    <label class="col-md-2 control-label" for="fecha_not">Fecha de Notificación:</label>
                    <input name="fecha_not" data-rel="tooltip" type="date" id="fecha_not" readonly="readonly" placeholder="" readonly="readonly" class="col-md-2" value="<?= $fecha_not; ?>">
                </div>
            </div>

            <!--Fecha de respuesta-->


            <br>

            <!--Seleccion de tribunal-->
            <div class="row">
                <div class="form-group">
                <label class="col-md-2 control-label" for="tribunal">Tribunal:</label>
                    <select class="chosen-select col-md-2" readonly="readonly" name="tribunal" value="" onchange="" required>
                        <option role="placeholder" value="<?= $tribunal ;?>"><?= "TRIBUNAL".' '.$tribunal;?></option>
                    </select>
                </div>
            </div>

            <br>
            

            <div class="row">
                <div class="form-group">
                <label class="col-md-2 control-label" for="fecha_res">Fecha de Audiencia:</label>
                <input name="fecha_res" data-rel="tooltip" type="date" id="fecha_res" placeholder="" class="col-md-2" value="<?= $fecha_res?>">
                </div>
            </div>

            <br>

            <!--Subir archivo a carpeta local-->

            <div class="row">
                <div class="box">
                    <div class="col-md-6">
                        <div class="widget-box">
                            <div class="widget-header">
                                <h4 class="widget-title">Adjuntar documento de demanda</h4>
                            </div>
                            <div class="widget-body">
                                <div class="widget-main">
                                    <div id="documento" class="form-group">
                                        <div class="col-xs-12">
                                            <input name="documento_fl" type="text" id="id-input-file_fl" readonly="readonly" value="<?= $archivo;?>" />
                                        </div>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="clearfix form-actions center">
                <button class="btn btn-info" type="submit" value="upload">
                    <i class="ace-icon fa fa-check bigger-110"></i>
                    Editar
                </button>
                <a href="<?= site_url("inicio/index")?>" class="btn btn-danger" type="reset">
                    <i class="ace-icon fa fa-times   bigger-110"></i>
                    Cancelar
                </a>
            </div>

        </form>
    </div>
    </div>  
</div>