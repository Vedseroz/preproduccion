<?php defined('BASEPATH') OR exit ('No direct script access allowed')?>
<div class="row">
    <div class="col-xs-12">
        
        <h1>Actualizar información de Denuncia: </h1>

        <?php if($denuncia['etapa']==3):?>
        <?= form_open_multipart(site_url('FlujoCausas/Laboral/editar_ordinario/'. $this->uri->segment(4)), 'class="form-horizontal" role="form" method="POST"') ?>
        <?php endif;?>
        <?php if($denuncia['etapa']==4):?>
        <?= form_open_multipart(site_url('FlujoCausas/Laboral/editar_ordinario2/'. $this->uri->segment(4)), 'class="form-horizontal" role="form" method="POST"') ?>
        <?php endif;?>
        <br>
            
            <!--Nombre del Demandante-->
            <div class="row">
                <div class="form-group">
                    <label class="col-md-2 control-label" for="titulo">Nombre del Demandante:</label>
                    <input name="n_demandante" data-rel="tooltip" type="text"  id="n_demandante" class="col-md-3" <?php if($denuncia['etapa']==0){ echo 'readonly'; }?> value="<?php echo $denuncia['n_demandante'] ?>">
                </div>
            </div>

            <br>

            <!--Rut del demandante-->
            <div class="row">
                <div class="form-group">
                    <label class="col-md-2 control-label" for="titulo">RUT del Demandante:</label>
                    <input name="rut" data-rel="tooltip" type="text" id="rut" <?php if($denuncia['etapa']==0){ echo 'readonly';}?>  class="col-md-3" value="<?= $denuncia['rut'] ?>">
                </div>
            </div>

            <br>
    
            <!--RIT/ROL-->
            <div class="row">
                <div class="form-group">
                    <label class="col-md-2 control-label" for="denunciante">RIT/ROL:</label>
                    <input name="rol" data-rel="tooltip" type="text" id="rol"  <?php if($denuncia['etapa']== '0'){ echo 'readonly'; }?> placeholder="" class="col-md-2" value="<?=  $denuncia['rol']; ?>">
                </div>
            </div>

            <br>

            <!--Fecha notificacion-->
            <div class="row">
                <div class="form-group">
                    <label class="col-md-2 control-label" for="fecha_not">Fecha de Notificación:</label>
                    <input name="fecha_not" data-rel="tooltip" type="date" id="fecha_not" readonly="readonly" placeholder="" readonly="readonly" class="col-md-2" value="<?= $denuncia['fecha_not']; ?>">
                </div>
            </div>
            <br>

            <!--Observacion-->
            <div class="row">
                <div class="form-group">
                    <label class="col-md-2 control-label" for="fecha_not">Observaciones de la Causa:</label>
                    <input name="observacion" data-rel="tooltip" type="text" id="observacion" placeholder="" class="col-md-2" value="<?= $denuncia['observacion']; ?>">
                </div>
            </div>


            <br>

            <!--Seleccion de tribunal-->
            <div class="row">
                <div class="form-group">
                <label class="col-md-2 control-label" for="tribunal">Tribunal:</label>
                    <select class="chosen-select col-md-2" readonly="readonly" name="tribunal" value="" onchange="" required>
                        <option role="placeholder" readonly="readonly" value="<?= $denuncia['tribunal'] ;?>"><?= "TRIBUNAL".' '.$denuncia['tribunal'];?></option>
                    </select>
                </div>
            </div>

            <br>
            
            <br>

            <!--Subir archivo a carpeta local-->

            <!--<div class="row">
                <div class="box">
                    <div class="col-md-6">
                        <div class="widget-box">
                            <div class="widget-header">
                                <h4 class="widget-title">Descargar documento de demanda</h4>
                            </div>
                            <div class="widget-body">
                                <div class="widget-main">
                                    <div id="documento" class="form-group">
                                        <div class="col-xs-12">
                                            <input name="documento_fl" type="text" id="id-input-file_fl" readonly="readonly" value="<?= $denuncia['archivo'];?>" />
                                            <a href="<?=site_url('FlujoCausas/Laboral/download/'.$this->uri->segment(4))?>" class="btn btn-primary">Descargar Archivo</a>
                                        </div>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>-->

            <div class="row">
                <div class="box">
                    <div class="col-md-6">
                        <div class="widget-box">
                            <div class="widget-header">
                                <h4 class="widget-title">Descargar documentos de demanda</h4>
                            </div>
                            <div class="widget-body">
                                <div class="widget-main">
                                    <div id="documento" class="form-group">
                                        <div class="col-xs-12">
                                        <input multiple name="userFiles[]" type="file" id="id-input-file"  class="form-control-file"/>
                                        
                                        </div>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <br>
            <br>

            <?php if($denuncia['etapa']== 3):?>
            <div class="row">
                <div class="form-group">
                <label class="col-md-2 control-label" for="fecha_res">Fecha de Audiencia Preparatoria:</label>
                <input name="fecha_prep" data-rel="tooltip" <?php if($denuncia['etapa']==0 ||$denuncia['etapa'] == 5){ echo 'readonly'; }?> type="date" id="fecha_prep" placeholder="" class="col-md-2" value="<?= $denuncia['fecha_prep']?>">
                </div>
            </div>
            <?php endif;?>
            
            <?php if($denuncia['etapa'] == 4):?>
            <div class="row">
                <div class="form-group">
                <label class="col-md-2 control-label" for="fecha_res">Fecha de Audiencia del Juicio:</label>
                <input name="fecha_juicio" data-rel="tooltip" <?php if($denuncia['etapa']==0 ||$denuncia['etapa'] == 5){ echo 'readonly'; }?> type="date" id="fecha_juicio" placeholder="" class="col-md-2" value="<?= $denuncia['fecha_juicio']?>">
                </div>
            </div>
            <?php endif;?>

            <br>


            <div class="clearfix form-actions center">
                <?php if($denuncia['etapa'] != 0) :?>
                <button class="btn btn-info" type="submit" value="upload">
                    <i class="ace-icon fa fa-check bigger-110"></i>
                    Guardar
                </button>
                <a href="<?= site_url("inicio/index")?>" class="btn btn-danger" type="reset">
                    <i class="ace-icon fa fa-times   bigger-110"></i>
                    Cancelar
                </a>
                <?php endif;?>
                
                <?php if ($denuncia['etapa'] == 0) :?>
                    <a href="<?= site_url("inicio/index")?>" class="btn btn-primary" type="reset">
                    <i class="ace-icon fa fa-times   bigger-110"></i>
                    Volver
                </a>   
                <?php endif;?>


                <?php if($denuncia['etapa'] >= 2) :?>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
                    Finalizar Causa
                </button>
                <?php endif;?>


            <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h3 class="modal-title" id="exampleModalLabel">Advertencia:</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
            <div class="modal-body">
                <h4>¿En qué estado desea finalizar la causa?</h4>       
            </div>
            <div class="modal-footer">
            <a type="button" class="btn btn-info" href=<?= site_url("FlujoCausas/Laboral/finalizar_ordinario/".$this->uri->segment(4).'/'.'2')?> >ACUERDO</a>
            <a type="button" class="btn btn-success" href=<?= site_url("FlujoCausas/Laboral/finalizar_ordinario/".$this->uri->segment(4).'/'.'1')?> >ACEPTADA</a> <!-- 1 es Aceptada, 0 es rechazada-->
            <a type="button" class="btn btn-danger" href=<?= site_url("FlujoCausas/Laboral/finalizar_ordinario/".$this->uri->segment(4).'/'.'0')?> >RECHAZADA</a>
            <a type="button" class="btn btn-warning" href=<?= site_url("FlujoCausas/Laboral/impugnacion/".$this->uri->segment(4).'/')?> >IMPUGNACION</a>
            </div>
            </div>
        </div>
    </div>                
    

    <!--boton de asignar al-->
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#asignar">
        Reasignar Usuario
    </button>
    </div>
    

    </form>

        <div class="modal fade" id="asignar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h3 class="modal-title" id="exampleModalLabel">Reasignar a un nuevo usuario:</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>			
			<?= form_open_multipart(site_url('FlujoCausas/Laboral/asignar_usuario/'. $this->uri->segment(4)), 'class="form-horizontal" role="form" method="POST"') ?>
            <div class="modal-body">

            <ul>
                <li>
                    <select name="asignado" id="asignado" >
					<?php foreach($asignado as $key=>$value): ?>
					<option id="inputid" value="<?php echo $value->id?>"><?php echo $value->first_name.' '.$value->last_name?></option>
					<?php endforeach; ?>
				</select> 
                </li>
                <li>
                <label class="col-md-2 control-label" for="observacion">Observaciones</label>
                <input name="obs_asignado" data-rel="tooltip" type="text" id="observacion" placeholder="" class="col-md-2" value="<?= $denuncia['obs_asignado'];?>">
                </li>
            </ul>

			</div>

            <div class="modal-footer"> 
            <button id="asignar" type="submit" class="btn btn-primary">Asignar</button>
            </div>
            </div>
			</form>
        </div>
    </div>                



    </div>
    </div>  
</div>