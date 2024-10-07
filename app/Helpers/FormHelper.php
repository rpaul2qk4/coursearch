<?php
namespace App\Helpers;

class FormHelper 
{
	
   public static function dependentScript($name, $value, $options, $parent, $emptyValue = null) {		
		return "<script>
				if (typeof dependencies === 'undefined') {
					var dependencies = [];
					
				}
				if (typeof dependencies['$parent'] === 'undefined') {
					dependencies['$parent'] = [];
					
				}
				dependencies['$parent']['$name'] = ".json_encode($options).";
				
				updateDependent('$parent', '$name', '$value', '$emptyValue');
				document.getElementById('$parent').onchange = function() {
					updateDependencies('$parent', '$emptyValue');
				}
			</script>";
	}
}
