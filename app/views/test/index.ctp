<script type="text/javascript">
$(document).ready(function(){
	  $('#make-name').live('change', function() {
	    if($(this).val().length != 0) {
		    console.log("makeId: " + $(this).val())
	      $.getJSON('/ucms/test/get_models_ajax',
	                  {makeId: $(this).val()},
	                  function(carModels) {
	                    if(carModels !== null) {
	                      populateCarModelList(carModels);
	                    }
	        });
	      }
	    });
	});
	 
	function populateCarModelList(carModels) {
	  var options = '';
	 
	  $.each(carModels, function(index, carModel) {
	    options += '<option value="' + index + '">' + carModel + '</option>';
	  });
	  $('#model-name').html(options);
	  $('#car-models').show();
	 
	}
	 
</script>

<?php
  echo $this->Form->input('Make.name', array('empty' => 'Select One', 'options' => $names, 'id' => 'make-name'));
?>
 
<div id="car-models" style="display: none;">
  <?php echo $this->Form->input('Mod.name', array('type' => 'select', 'id' => 'model-name')); ?>
</div>
