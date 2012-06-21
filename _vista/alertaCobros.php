<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<div class="tstparent">
 <div id="tst">
  <img src="lib/img/AE.png" class="but" style="cursor:pointer" onClick="S.Slide();" />
  <span class="q_head"></span>
  
  <div id="suggested_items_in_q" class="mini_q_section rounded_top">
   <div class="mini_q_section_top rounded_top">
    <a href="indexx.php?controlador=vendedor&accion=cobrar" class="q_action">Cobrar &raquo;</a>Alerta de Cobros
   </div>
   
   <div style="overflow-y:scroll;max-height:300px">
    <?php
     for($i=0;$i<count($out1);$i++)
	 {
		 if ($i<$fin)
		 {
    ?>
    <div class="q_item first">
     <p class="q q_headline">La Factura N° <?php echo $out1[$i]->getIdDocumentoPago()?> asociada al Cliente <?php echo $out2[$i]->getNombreCliente()?> vence el <?php echo date("d-m-Y",strtotime($out1[$i]->getFechaVencimientoDocumentoPago()))?> por un monto $<?php echo number_format($out1[$i]->getTotalDocumentoPago(),0, ",", ".")?>.</p>
     <div style="clear:both"></div>
    </div>
    <?php
	 }
	 else
	 {
	?>    
    <div class="q_item">
     <p class="q q_headline">La Factura N° <?php echo $out1[$i]->getIdDocumentoPago()?> asociada al Cliente <?php echo $out2[$i]->getNombreCliente()?> vence el <?php echo date("d-m-Y",strtotime($out1[$i]->getFechaVencimientoDocumentoPago()))?> por un monto $<?php echo number_format($out1[$i]->getTotalDocumentoPago(),0, ",", ".")?>.</p>
     <div style="clear:both"></div>
    </div>
    <?php
	   }
	 }
	?>    
   </div>   
  </div>
 </div>
</div>
<script type="text/javascript" src="lib/js/slide.js"></script>