$( "form" ).submit(function( event ) {
	$('.message').hide();//usuwam pole z trescia
  if ( $( "#adres" ).val() != "" ) {
	$('.loader').show();  
    $( ".msg-done" ).html( '<i class="fa fa-spinner fa-spin" style="font-size:3em"></i> Ładowanie...' ).show(); //po walidacji laduje tresc
    return;
  }
 
 $('.loader').show().delay( 2000 ).fadeOut( 1000 );
  $( ".msg-error" ).text( "Podaj adres!" ).show().delay( 3000 ).fadeOut( 1000 );//blad walidacji
  event.preventDefault();
});