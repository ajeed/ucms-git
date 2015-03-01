
<script type="text/javascript">
$(document).ready(function(){
	  $('#make-name').change(function() {
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
	  var selected = '';
	  $.each(carModels, function(index, carModel) {
	    options += '<option value="' + index + '">' + carModel.toUpperCase() + '</option>';
	  });
	  $('#model-name').html(options);
	  $('#car-models').show();
	 
	}
	 
</script>
<table border="0" width="100%" cellpadding="0" cellspacing="0">
	<tr valign="top">
		<td width="500"><!--  start step-holder -->
		<div id="step-holder">
		<div class="step-no">1</div>
		<div class="step-dark-left"><a href="">Edit car details</a></div>
		<div class="step-dark-right">&nbsp;</div>

		<div class="clear"></div>
		</div>
		<!--  end step-holder --> <!-- start id-form -->
                <?php echo $this->Form->create('Store',array('type'=>'file'));?>
		<table border="0" cellpadding="0" cellspacing="0" id="id-form">
			<tr>
				<th valign="top">Registration No:</th>
				<td>
						<?php echo $this->Form->input('id', array("type" => "hidden","value" => $stores["Store"]["id"])); ?>
                        <?php echo $this->Form->input('reg_no',array('label' => false,'class'=>"inp-form")); ?>
                        </td>
				<td></td>
			</tr>
			<tr>
				<th valign="top">Make :</th>
				<td>
				<div class="input select"><select id="make-name"
					name="data[Store][make_id]">
					<option value="">Select One</option>
						<?php foreach ($names as $k=>$v) : ?>
						<option value="<?=$k?>"
						<?php echo ($k == $stores['Make']['id']) ? "selected='selected'" : ""; ?>><?=strtoupper($v)?>
						</option>
						<?php endforeach;?>
					</select></div>
				</td>
				<td></td>
			</tr>
			<tr>
				<th valign="top">Model:</th>
				<td>
				<div id="car-models">
				<div class="input select"><select id="model-name"
					name="data[Store][mod_id]">
					<?php foreach ($mods as $mod) : ?>
						<option value="<?=$mod['id']?>"
						<?php echo ($mod['id'] == $stores['Mod']['id']) ? "selected='selected'" : ""; ?>><?=strtoupper($mod['name'])?>
						</option>
						<?php endforeach;?>
				</select></div>
				</div>
				</td>
				<td></td>
			</tr>
			<tr>
				<th valign="top">Title</th>
				<td>
                           <?php echo $this->Form->input('title',array('style' => 'width:300px','label' => false,'class'=>"inp-form")); ?>
                        </td>
				<td><!--div class="error-left"></div>
			<div class="error-inner">This field is required.</div--></td>
			</tr>
			<tr>
				<th valign="top">Year made:</th>
				<td>
                            <?php echo $this->Form->year('year_of_made',1980,date('Y'),$stores['Store']['year_of_made'],array('label' => false)); ?>
                        </td>
				<td><!--div class="error-left"></div>
			<div class="error-inner">This field is required.</div--></td>
			</tr>
			<tr>
				<th valign="top">Year register:</th>
				<td>
                            <?php
                            echo $this->Form->year('year_of_reg',1980,date('Y'),$stores['Store']['year_of_reg'],array('label' => false));
                           ?>
                        </td>
				<td><!--div class="error-left"></div>
			<div class="error-inner">This field is required.</div--></td>
			</tr>
			<tr>
				<th valign="top">Owner name :</th>
				<td>
                            <?php echo $this->Form->input('seller_name',array('label' => false,'class'=>"inp-form")); ?>
                        </td>
				<td><!--div class="error-left"></div>
			<div class="error-inner">This field is required.</div--></td>
			</tr>
			<tr>
				<th valign="top">Owner phone no :</th>
				<td>
                            <?php echo $this->Form->input('seller_tel',array('label' => false,'class'=>"inp-form")); ?>
                        </td>
				<td><!--div class="error-left"></div>
			<div class="error-inner">This field is required.</div--></td>
			</tr>
			<tr>
				<th valign="top">Owner IC / Passport :</th>
				<td>
                            <?php echo $this->Form->input('seller_ic',array('label' => false,'class'=>"inp-form")); ?>
                        </td>
				<td><!--div class="error-left"></div>
			<div class="error-inner">This field is required.</div--></td>
			</tr>
			<tr>
				<th valign="top">Broker name :</th>
				<td>
                            <?php echo $this->Form->input('broker_name',array('label' => false,'class'=>"inp-form")); ?>
                        </td>
				<td><!--div class="error-left"></div>
			<div class="error-inner">This field is required.</div--></td>
			</tr>
			<tr>
				<th valign="top">Broker phone no :</th>
				<td>
                            <?php echo $this->Form->input('broker_tel',array('label' => false,'class'=>"inp-form")); ?>
                        </td>
				<td><!--div class="error-left"></div>
			<div class="error-inner">This field is required.</div--></td>
			</tr>
			<tr>
				<th valign="top">Walk-in :</th>
				<td>
                            <?php echo $this->Form->checkbox('walk_in',array('label' => false,'class'=>"ui-helper-hidden-accessible")); ?>
                        </td>
				<td><!--div class="error-left"></div>
			<div class="error-inner">This field is required.</div--></td>
			</tr>
			<tr>
				<th valign="top">Price (MYR):</th>
				<td><?php echo $this->Form->input('price',array('label' => false,'class'=>"inp-form")); ?></td>
				<td></td>
			</tr>

			<tr>
				<th valign="top">Select a date:</th>
				<td class="noheight">
				<table border="0" cellpadding="0" cellspacing="0">
					<tr valign="top">
						<td>
						<?php 
						echo $this->Form->input('date', array('selected' => array( 
								'day' => date('d', strtotime($stores['Store']['date'])),
						        'month' => date('m', strtotime($stores['Store']['date'])), 
						        'year' => date('Y', strtotime($stores['Store']['date'])), 
						        ),'label'=>false, 
						)); 
						?>
                        </td>
					</tr>
				</table>
				</td>
			</tr>
			<tr>
				<th>Image 1:</th>
				<td><input type="file" id="FileImage" name="data[File][image]"></td>
				<td>
				<div class="bubble-left"></div>
				<div class="bubble-inner">JPEG, GIF 5MB max per image</div>
				<div class="bubble-right"></div>
				</td>
			</tr>
			<tr>
				<th valign="top">Description:</th>
				<td>
                    <?php echo $this->Form->input('remarks',array('label' => false,'class'=>"form-textarea")); ?>
                </td>
				<td></td>
			</tr>

		</table>

		<!-- end id-form  --></td>
		<td><!--  start related-activities -->
		<div id="related-activities" style="float: left"><!--  start related-act-top -->
		<div id="related-act-top">
		<div class="step-no" style="padding-left: 28px;">2</div>
		<div class="step-dark-left">Add related documents</div>
		</div>
		<!-- end related-act-top --> <!--  start related-act-bottom -->
		<div id="related-act-bottom"><!--  start related-act-inner -->
		<div id="related-act-inner">

		<div class="left"><a href=""><img src="images/forms/icon_plus.gif"
			width="21" height="21" alt="" /></a></div>
		<div class="right">
		<h5>Related document for this car</h5>
		Please fill-in the checklist for related document
		<ul class="greyarrow">
			<li style="padding-bottom: 4px;"> <?php echo $this->Form->checkbox('Document.0.grant_ori',array('label' => false,'class'=>"ui-helper-hidden-accessible")); ?> Geran Original</li>
			<li style="padding-bottom: 4px;"> <?php echo $this->Form->checkbox('Document.0.seller_ic',array('label' => false,'class'=>"ui-helper-hidden-accessible")); ?> Owner IC copy</li>
			<li style="padding-bottom: 4px;"> <?php echo $this->Form->checkbox('Document.0.auth_letter',array('label' => false,'class'=>"ui-helper-hidden-accessible")); ?> Authorize letter</li>
			<li style="padding-bottom: 4px;">Remarks : <br />  
						<?php echo $this->Form->textarea('Document.0.remarks',array('label' => false,'class'=>"","rows"=>2,"cols"=>20)); ?></li>
		</ul>
		</div>

		<div class="clear"></div>

		</div>
		<!-- end related-act-inner -->
		<div class="clear"></div>

		</div>
		<!-- end related-act-bottom --></div>
		<!-- end related-activities --></td>
	</tr>
	<tr>
		<td valign="top" align="center" colspan="2">
                      <?php echo $this->Form->end(array('class' => 'form-submit'));?>
		</td>
		<td></td>
	</tr>
	<tr>
		<td>
    <?php echo $html->image('shared/blank.gif',array('width'=>"695",'height'=>"1",'alt'=>"blank")) ?>
</td>
		<td></td>
	</tr>

</table>

<div class="clear"></div>



