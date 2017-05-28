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


	 //masking input
	  $('.alpanumerik').mask('AAAAAAAAAAAAAAAAAA', {'translation': {A: {pattern: /[A-Za-z0-9]/},}});
	  $('.kodifikasi').mask('AAAAAAAAAAAAAA', {'translation': {A: {pattern: /[A-Z0-9_-]/},}});
	  $('.numerik').mask('000000000000000000000000', {reverse: true});	
	  $('.money').mask('000.000.000.000.000', {reverse: true});  
	  $('.double').mask('000.000.000.000.000,0000', {reverse: true});  
	  $('.double2').mask('000.000.000.000.000,00000000000', {reverse: true}); 
	  $('.phone').mask('0000-0000-0000');
	  $('.nama').mask('AAAAAAAAAAAAAAAAAAAAAAAAA');
	  $('[data-toggle="popover"]').popover();


	  jQuery.fn.extend({
	    disable: function(state) {
	        return this.each(function() {
	            this.disabled = state;
	        });
	    }
	 });

});