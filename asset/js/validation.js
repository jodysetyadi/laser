$(document).ready(function() {
	
	// Form Validation

    $(".number").keyup(function(event) {
      var number = $(this).val();
      if ($(this).val() != "") {
        if (! valid_number(number)) {
            $(this).parent().find("#error-msg").removeAttr('hidden');
        } else {
            $(this).parent().find("#error-msg").attr('hidden', 'hidden');
        }
      }
    });

    $(".alpha").keyup(function(event) {
      var alphabet = $(this).val();
      if ($(this).val() != "") {
        if (! valid_alphabhet(alphabet)) {
            $(this).parent().find("#error-msg").removeAttr('hidden');
        } else {
            $(this).parent().find("#error-msg").attr('hidden', 'hidden');
        }
      }
    });

    $(".hp").keyup(function(event) {
      var number = $(this).val();
      var len = number.length;
      if ($(this).val != "") {
        if (len>12) {
          $(this).parent().find("#error-msg-hp").removeAttr('hidden');
        } else {
          $(this).parent().find("#error-msg-hp").attr('hidden', 'hidden');
          if (! valid_number(number)) {
              $(this).parent().find("#error-msg").removeAttr('hidden');
          } else {
              $(this).parent().find("#error-msg").attr('hidden', 'hidden');
          }
        }
      }
    });

    $(".email").keyup(function(event) {
      var email = $(this).val();
      if ($(this).val() != "") {
        if (! valid_email(email)) {
            $(this).parent().find("#error-msg").removeAttr('hidden');
        } else {
            $(this).parent().find("#error-msg").attr('hidden', 'hidden');
        }
      }
    });

      // Function Validator

      // cek huruf saja
      function valid_alphabhet(alphabet) {
        var pola = new RegExp(/^[a-z A-Z]+$/);
        return pola.test(alphabet);
      }

      // cek angka saja
      function valid_number(number) {
        var pola = new RegExp(/^[0-9]+$/);
        return pola.test(number);
      }

      // cek email
      function valid_email(email) {
        var pola= new RegExp(/^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]+$/);
        return pola.test(email);
      }

      // Cek tanggal
      function valid_tgl(tgl) {
        var pola= new RegExp(/\b\d{4}[\/-]\d{1,2}[\/-]\d{1,2}\b/);
        return pola.test(tgl);
      }
	
});