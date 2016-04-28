function resetSendto() {
  $('#sendto-form-status').hide('slow');
}

function partialResetSendto() {
  $('#sendto-form-status').css('color', 'black');
  $('#sendto-form-status').hide('slow');
}

$('#email-sendto').keydown(function() {
  partialResetSendto();
});

$('#sendto').on('hidden.bs.modal', function () {
  resetSendto();
});

function hideModal() {
  setTimeout(function() {
	$('#sendto').modal('hide');
  }, 3000);
}

function hideStatus() {
  setTimeout(function() {
	$('#sendto-form-status').hide('slow');
  }, 2000);
}