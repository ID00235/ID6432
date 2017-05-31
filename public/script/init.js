$(document).ready(function(){

	
		
	 $('.datepicker').datetimepicker({
	    format: 'DD/MM/YYYY',
	    icons: {
	        date: "fa fa-calendar",up: "fa fa-chevron-up",down: "fa fa-chevron-down",previous: 'fa fa-chevron-left',
	        next: 'fa fa-chevron-right',today: 'fa fa-screenshot',clear: 'fa fa-trash',close: 'fa fa-remove'
	    }
	 }); 

	 $(".yearpicker").datetimepicker({
	 	viewMode:'years',
	 	format:'YYYY',
	 	icons: {
	        date: "fa fa-calendar",up: "fa fa-chevron-up",down: "fa fa-chevron-down",previous: 'fa fa-chevron-left',
	        next: 'fa fa-chevron-right',today: 'fa fa-screenshot',clear: 'fa fa-trash',close: 'fa fa-remove'
	    }
	 })        


	 $(".monthpicker").datetimepicker({
	 	viewMode:'years',
	 	format:'MM/YYYY',
	 	icons: {
	        date: "fa fa-calendar",up: "fa fa-chevron-up",down: "fa fa-chevron-down",previous: 'fa fa-chevron-left',
	        next: 'fa fa-chevron-right',today: 'fa fa-screenshot',clear: 'fa fa-trash',close: 'fa fa-remove'
	    }
	 })     


	  $('.alpanumerik').mask('AAAAAAAAAAAAAAAAAA', {'translation': {A: {pattern: /[A-Za-z0-9]/},}});
	  $('.kodifikasi').mask('AAAAAAAAAAAAAA', {'translation': {A: {pattern: /[A-Z0-9_-]/},}});
	  $('.numerik').mask('000000000000000000000000', {reverse: true});	
	  $('.double').mask('000.000.000.000.000,00', {reverse: true});  
	  $('.phone').mask('0000-0000-0000');
	  $('.nama').mask('AAAAAAAAAAAAAAAAAAAAAAAAA');
	  $('.koordinat').decimalMask("999999999999999.9999999");
	  jQuery.fn.extend({
	    disable: function(state) {
	        return this.each(function() {
	            this.disabled = state;
	        });
	    }
	 });

	  $(".select2").select2();

	  //validator langguange
	  jQuery.extend(jQuery.validator.messages, {
		    required: "Kolom Ini Wajib Disi.",
		    email: "Alamat Email Tidak Valid.",
		    max: jQuery.validator.format("Maksimal {0} Karakter."),
		    min: jQuery.validator.format("Minimal {0} Karakter.")
		});

});



var Notify = {
	 showAlert: function(message){
	 	$.notify({message:message},{type: 'danger',delay:5000,timer:1000})
	 },
	 showNotice: function(message){
	 	 $.notify({message:message},{type: 'success',delay:5000,timer: 1000})
	 }
}

var parseNumerik = function (str){
	str = str.replace(".", "");
	str = str.replace(",", ".");
	return parseFloat(str);
}

