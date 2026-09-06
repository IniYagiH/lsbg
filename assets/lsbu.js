function get23(){
  var comment_value=document.getElementById('comment_23').value;
  var base_url=document.getElementById('base_url').value;
  var id_upload_value=23;
  var option1_value='';
  var option2_value='';
  var asosiasi_value=document.getElementById('email_bu').value;
var alamat_value=document.getElementById('alamat_bu').value;
  jQuery.ajax({
    url : base_url,
    type : "POST",
    data : {comment:comment_value,
            id_upload:id_upload_value,
            option1:option1_value,
            option2:option2_value,
            asosiasi:asosiasi_value,
alamat:alamat_value},
    success : function(data) {
      response = jQuery.parseJSON(data);
      console.log( JSON.parse(data));
      toastr["success"]("Permintaan Perbaikan Data", "Berhasil Direkap");
    },
    error: function(xhr, status, error) {
      var err = eval("(" + xhr.responseText + ")");
      alert(err.Message);
    }
  });
}

function checkbox23(){
  var check = document.getElementById("checkbox_23");
  if(check.checked==false){
    document.querySelector('#comment_23').removeAttribute('disabled');
    document.querySelector('#get_23').removeAttribute('disabled');
  }else{
    document.querySelector('#comment_23').value='';
    document.querySelector('#comment_23').setAttribute('disabled','true');
    document.querySelector('#get_23').setAttribute('disabled','true');
  }
}




function get24(){
  var comment_value=document.getElementById('comment_24').value;
  var base_url=document.getElementById('base_url').value;
  var id_upload_value=24;
  var option1_value=document.getElementById('nomor_kontrak_pengalaman').value;
  var option2_value=document.getElementById('id_sub_pengalaman').value;
  var asosiasi_value=document.getElementById('email_bu').value;
var alamat_value=document.getElementById('alamat_bu').value;
  jQuery.ajax({
    url : base_url,
    type : "POST",
    data : {comment:comment_value,
            id_upload:id_upload_value,
            option1:option1_value,
            option2:option2_value,
            asosiasi:asosiasi_value,
alamat:alamat_value},
    success : function(data) {
      response = jQuery.parseJSON(data);
      console.log( JSON.parse(data));
      toastr["success"]("Permintaan Perbaikan Data", "Berhasil Direkap");
    },
    error: function(xhr, status, error) {
      var err = eval("(" + xhr.responseText + ")");
      alert(err.Message);
    }
  });
}

function checkbox24(){
  var check = document.getElementById("checkbox_24");
  if(check.checked==false){
    document.querySelector('#comment_24').removeAttribute('disabled');
    document.querySelector('#get_24').removeAttribute('disabled');
  }else{
    document.querySelector('#comment_24').value='';
    document.querySelector('#comment_24').setAttribute('disabled','true');
    document.querySelector('#get_24').setAttribute('disabled','true');
  }
}
function get25(){
  var comment_value=document.getElementById('comment_25').value;
  var base_url=document.getElementById('base_url').value;
  var id_upload_value=25;
  var option1_value=document.getElementById('nomor_kontrak_pengalaman').value;
  var option2_value=document.getElementById('id_sub_pengalaman').value;
  var asosiasi_value=document.getElementById('email_bu').value;
var alamat_value=document.getElementById('alamat_bu').value;
  jQuery.ajax({
    url : base_url,
    type : "POST",
    data : {comment:comment_value,
            id_upload:id_upload_value,
            option1:option1_value,
            option2:option2_value,
            asosiasi:asosiasi_value,
alamat:alamat_value},
    success : function(data) {
      response = jQuery.parseJSON(data);
      console.log( JSON.parse(data));
      toastr["success"]("Permintaan Perbaikan Data", "Berhasil Direkap");
    },
    error: function(xhr, status, error) {
      var err = eval("(" + xhr.responseText + ")");
      alert(err.Message);
    }
  });
}

function checkbox25(){
  var check = document.getElementById("checkbox_25");
  if(check.checked==false){
    document.querySelector('#comment_25').removeAttribute('disabled');
    document.querySelector('#get_25').removeAttribute('disabled');
  }else{
    document.querySelector('#comment_25').value='';
    document.querySelector('#comment_25').setAttribute('disabled','true');
    document.querySelector('#get_25').setAttribute('disabled','true');
  }
}
function get26(){
  var comment_value=document.getElementById('comment_26').value;
  var base_url=document.getElementById('base_url').value;
  var id_upload_value=26;
  var option1_value=document.getElementById('nomor_kontrak_pengalaman').value;
  var option2_value=document.getElementById('id_sub_pengalaman').value;
  var asosiasi_value=document.getElementById('email_bu').value;
var alamat_value=document.getElementById('alamat_bu').value;
  jQuery.ajax({
    url : base_url,
    type : "POST",
    data : {comment:comment_value,
            id_upload:id_upload_value,
            option1:option1_value,
            option2:option2_value,
            asosiasi:asosiasi_value,
alamat:alamat_value},
    success : function(data) {
      response = jQuery.parseJSON(data);
      console.log( JSON.parse(data));
      toastr["success"]("Permintaan Perbaikan Data", "Berhasil Direkap");
    },
    error: function(xhr, status, error) {
      var err = eval("(" + xhr.responseText + ")");
      alert(err.Message);
    }
  });
}

function checkbox26(){
  var check = document.getElementById("checkbox_26");
  if(check.checked==false){
    document.querySelector('#comment_26').removeAttribute('disabled');
    document.querySelector('#get_26').removeAttribute('disabled');
  }else{
    document.querySelector('#comment_26').value='';
    document.querySelector('#comment_26').setAttribute('disabled','true');
    document.querySelector('#get_26').setAttribute('disabled','true');
  }
}
function get27(){
  var comment_value=document.getElementById('comment_27').value;
  var base_url=document.getElementById('base_url').value;
  var id_upload_value=27;
  var option1_value='';
  var option2_value='';
  var asosiasi_value=document.getElementById('email_bu').value;
var alamat_value=document.getElementById('alamat_bu').value;
  jQuery.ajax({
    url : base_url,
    type : "POST",
    data : {comment:comment_value,
            id_upload:id_upload_value,
            option1:option1_value,
            option2:option2_value,
            asosiasi:asosiasi_value,
alamat:alamat_value},
    success : function(data) {
      response = jQuery.parseJSON(data);
      console.log( JSON.parse(data));
      toastr["success"]("Permintaan Perbaikan Data", "Berhasil Direkap");
    },
    error: function(xhr, status, error) {
      var err = eval("(" + xhr.responseText + ")");
      alert(err.Message);
    }
  });
}

function checkbox27(){
  var check = document.getElementById("checkbox_27");
  if(check.checked==false){
    document.querySelector('#comment_27').removeAttribute('disabled');
    document.querySelector('#get_27').removeAttribute('disabled');
  }else{
    document.querySelector('#comment_27').value='';
    document.querySelector('#comment_27').setAttribute('disabled','true');
    document.querySelector('#get_27').setAttribute('disabled','true');
  }
}
function get28(){
  var comment_value=document.getElementById('comment_28').value;
  var base_url=document.getElementById('base_url').value;
  var id_upload_value=28;
  var option1_value='';
  var option2_value='';
  var asosiasi_value=document.getElementById('email_bu').value;
var alamat_value=document.getElementById('alamat_bu').value;
  jQuery.ajax({
    url : base_url,
    type : "POST",
    data : {comment:comment_value,
            id_upload:id_upload_value,
            option1:option1_value,
            option2:option2_value,
            asosiasi:asosiasi_value,
alamat:alamat_value},
    success : function(data) {
      response = jQuery.parseJSON(data);
      console.log( JSON.parse(data));
      toastr["success"]("Permintaan Perbaikan Data", "Berhasil Direkap");
    },
    error: function(xhr, status, error) {
      var err = eval("(" + xhr.responseText + ")");
      alert(err.Message);
    }
  });
}

function checkbox28(){
  var check = document.getElementById("checkbox_28");
  if(check.checked==false){
    document.querySelector('#comment_28').removeAttribute('disabled');
    document.querySelector('#get_28').removeAttribute('disabled');
  }else{
    document.querySelector('#comment_28').value='';
    document.querySelector('#comment_28').setAttribute('disabled','true');
    document.querySelector('#get_28').setAttribute('disabled','true');
  }
}
function get29(){
  var comment_value=document.getElementById('comment_29').value;
  var base_url=document.getElementById('base_url').value;
  var id_upload_value=29;
  var option1_value='';
  var option2_value='';
  var asosiasi_value=document.getElementById('email_bu').value;
var alamat_value=document.getElementById('alamat_bu').value;
  jQuery.ajax({
    url : base_url,
    type : "POST",
    data : {comment:comment_value,
            id_upload:id_upload_value,
            option1:option1_value,
            option2:option2_value,
            asosiasi:asosiasi_value,
alamat:alamat_value},
    success : function(data) {
      response = jQuery.parseJSON(data);
      console.log( JSON.parse(data));
      toastr["success"]("Permintaan Perbaikan Data", "Berhasil Direkap");
    },
    error: function(xhr, status, error) {
      var err = eval("(" + xhr.responseText + ")");
      alert(err.Message);
    }
  });
}

function checkbox29(){
  var check = document.getElementById("checkbox_29");
  if(check.checked==false){
    document.querySelector('#comment_29').removeAttribute('disabled');
    document.querySelector('#get_29').removeAttribute('disabled');
  }else{
    document.querySelector('#comment_29').value='';
    document.querySelector('#comment_29').setAttribute('disabled','true');
    document.querySelector('#get_29').setAttribute('disabled','true');
  }
}
function get30(){
  var comment_value=document.getElementById('comment_30').value;
  var base_url=document.getElementById('base_url').value;
  var id_upload_value=30;
  var option1_value='';
  var option2_value='';
  var asosiasi_value=document.getElementById('email_bu').value;
var alamat_value=document.getElementById('alamat_bu').value;
  jQuery.ajax({
    url : base_url,
    type : "POST",
    data : {comment:comment_value,
            id_upload:id_upload_value,
            option1:option1_value,
            option2:option2_value,
            asosiasi:asosiasi_value,
alamat:alamat_value},
    success : function(data) {
      response = jQuery.parseJSON(data);
      console.log( JSON.parse(data));
      toastr["success"]("Permintaan Perbaikan Data", "Berhasil Direkap");
    },
    error: function(xhr, status, error) {
      var err = eval("(" + xhr.responseText + ")");
      alert(err.Message);
    }
  });
}

function checkbox30(){
  var check = document.getElementById("checkbox_30");
  if(check.checked==false){
    document.querySelector('#comment_30').removeAttribute('disabled');
    document.querySelector('#get_30').removeAttribute('disabled');
  }else{
    document.querySelector('#comment_30').value='';
    document.querySelector('#comment_30').setAttribute('disabled','true');
    document.querySelector('#get_30').setAttribute('disabled','true');
  }
}
function get31(){
  var comment_value=document.getElementById('comment_31').value;
  var base_url=document.getElementById('base_url').value;
  var id_upload_value=31;
  var option1_value='';
  var option2_value='';
  var asosiasi_value=document.getElementById('email_bu').value;
var alamat_value=document.getElementById('alamat_bu').value;
  jQuery.ajax({
    url : base_url,
    type : "POST",
    data : {comment:comment_value,
            id_upload:id_upload_value,
            option1:option1_value,
            option2:option2_value,
            asosiasi:asosiasi_value,
alamat:alamat_value},
    success : function(data) {
      response = jQuery.parseJSON(data);
      console.log( JSON.parse(data));
      toastr["success"]("Permintaan Perbaikan Data", "Berhasil Direkap");
    },
    error: function(xhr, status, error) {
      var err = eval("(" + xhr.responseText + ")");
      alert(err.Message);
    }
  });
}

function checkbox31(){
  var check = document.getElementById("checkbox_31");
  if(check.checked==false){
    document.querySelector('#comment_31').removeAttribute('disabled');
    document.querySelector('#get_31').removeAttribute('disabled');
  }else{
    document.querySelector('#comment_31').value='';
    document.querySelector('#comment_31').setAttribute('disabled','true');
    document.querySelector('#get_31').setAttribute('disabled','true');
  }
}
function get34(){
  var comment_value=document.getElementById('comment_34').value;
  var base_url=document.getElementById('base_url').value;
  var id_upload_value=34;
  var option1_value='';
  var option2_value='';
  var asosiasi_value=document.getElementById('email_bu').value;
var alamat_value=document.getElementById('alamat_bu').value;
  jQuery.ajax({
    url : base_url,
    type : "POST",
    data : {comment:comment_value,
            id_upload:id_upload_value,
            option1:option1_value,
            option2:option2_value,
            asosiasi:asosiasi_value,
alamat:alamat_value},
    success : function(data) {
      response = jQuery.parseJSON(data);
      console.log( JSON.parse(data));
      toastr["success"]("Permintaan Perbaikan Data", "Berhasil Direkap");
    },
    error: function(xhr, status, error) {
      var err = eval("(" + xhr.responseText + ")");
      alert(err.Message);
    }
  });
}
function get35(){
  var comment_value=document.getElementById('comment_35').value;
  var base_url=document.getElementById('base_url').value;
  var id_upload_value=35;
  var option1_value='';
  var option2_value='';
  var asosiasi_value=document.getElementById('email_bu').value;
var alamat_value=document.getElementById('alamat_bu').value;
  jQuery.ajax({
    url : base_url,
    type : "POST",
    data : {comment:comment_value,
            id_upload:id_upload_value,
            option1:option1_value,
            option2:option2_value,
            asosiasi:asosiasi_value,
alamat:alamat_value},
    success : function(data) {
      response = jQuery.parseJSON(data);
      console.log( JSON.parse(data));
      toastr["success"]("Permintaan Perbaikan Data", "Berhasil Direkap");
    },
    error: function(xhr, status, error) {
      var err = eval("(" + xhr.responseText + ")");
      alert(err.Message);
    }
  });
}

function checkbox35(){
  var check = document.getElementById("checkbox_35");
  if(check.checked==false){
    document.querySelector('#comment_35').removeAttribute('disabled');
    document.querySelector('#get_35').removeAttribute('disabled');
  }else{
    document.querySelector('#comment_35').value='';
    document.querySelector('#comment_35').setAttribute('disabled','true');
    document.querySelector('#get_35').setAttribute('disabled','true');
  }
}

function checkbox34(){
  var check = document.getElementById("checkbox_34");
  if(check.checked==false){
    document.querySelector('#comment_34').removeAttribute('disabled');
    document.querySelector('#get_34').removeAttribute('disabled');
  }else{
    document.querySelector('#comment_34').value='';
    document.querySelector('#comment_34').setAttribute('disabled','true');
    document.querySelector('#get_34').setAttribute('disabled','true');
  }
}


function get80(){
  var comment_value=document.getElementById('comment_80').value;
  var base_url=document.getElementById('base_url').value;
  var option1_value='';
  var option2_value='';
  var id_upload_value=80;
  var asosiasi_value=document.getElementById('email_bu').value;
  var alamat_value=document.getElementById('alamat_bu').value;
  jQuery.ajax({
    url : base_url,
    type : "POST",
    data : {comment:comment_value,
            id_upload:id_upload_value,
            option1:option1_value,
            option2:option2_value,
            asosiasi:asosiasi_value,
            alamat:alamat_value},
    success : function(data) {
      response = jQuery.parseJSON(data);


      toastr["success"]("Permintaan Perbaikan Data", "Berhasil Direkap");

    },
    error: function(xhr, status, error) {
      var err = eval("(" + xhr.responseText + ")");
      alert(err.Message);
    }
  });
}
function get79(){
  var comment_value=document.getElementById('comment_79').value;
  var base_url=document.getElementById('base_url').value;
  var option1_value='';
  var option2_value='';
  var id_upload_value=79;
  var asosiasi_value=document.getElementById('email_bu').value;
  var alamat_value=document.getElementById('alamat_bu').value;
  jQuery.ajax({
    url : base_url,
    type : "POST",
    data : {comment:comment_value,
            id_upload:id_upload_value,
            option1:option1_value,
            option2:option2_value,
            asosiasi:asosiasi_value,
            alamat:alamat_value},
    success : function(data) {
      response = jQuery.parseJSON(data);


      toastr["success"]("Permintaan Perbaikan Data", "Berhasil Direkap");

    },
    error: function(xhr, status, error) {
      var err = eval("(" + xhr.responseText + ")");
      alert(err.Message);
    }
  });
}
function get78(){
  var comment_value=document.getElementById('comment_78').value;
  var base_url=document.getElementById('base_url').value;
  var option1_value='';
  var option2_value='';
  var id_upload_value=78;
  var asosiasi_value=document.getElementById('email_bu').value;
  var alamat_value=document.getElementById('alamat_bu').value;
  jQuery.ajax({
    url : base_url,
    type : "POST",
    data : {comment:comment_value,
            id_upload:id_upload_value,
            option1:option1_value,
            option2:option2_value,
            asosiasi:asosiasi_value,
            alamat:alamat_value},
    success : function(data) {
      response = jQuery.parseJSON(data);


      toastr["success"]("Permintaan Perbaikan Data", "Berhasil Direkap");

    },
    error: function(xhr, status, error) {
      var err = eval("(" + xhr.responseText + ")");
      alert(err.Message);
    }
  });
}
function get81(){
  var comment_value=document.getElementById('comment_81').value;
  var base_url=document.getElementById('base_url').value;
  var option1_value=document.getElementById('id_pengurus').value;
  var option2_value='';
  var id_upload_value=81;
  var asosiasi_value=document.getElementById('email_bu').value;
  var alamat_value=document.getElementById('alamat_bu').value;
  jQuery.ajax({
    url : base_url,
    type : "POST",
    data : {comment:comment_value,
            id_upload:id_upload_value,
            option1:option1_value,
            option2:option2_value,
            asosiasi:asosiasi_value,
            alamat:alamat_value},
    success : function(data) {
      response = jQuery.parseJSON(data);


      toastr["success"]("Permintaan Perbaikan Data", "Berhasil Direkap");

    },
    error: function(xhr, status, error) {
      var err = eval("(" + xhr.responseText + ")");
      alert(err.Message);
    }
  });
}

function get84(){
  var comment_value=document.getElementById('comment_84').value;
  var base_url=document.getElementById('base_url').value;
  var option1_value=document.getElementById('no_sk_kehakiman').value;
  var option2_value='';
  var id_upload_value=84;
  var asosiasi_value=document.getElementById('email_bu').value;
  var alamat_value=document.getElementById('alamat_bu').value;
  jQuery.ajax({
    url : base_url,
    type : "POST",
    data : {comment:comment_value,
            id_upload:id_upload_value,
            option1:option1_value,
            option2:option2_value,
            asosiasi:asosiasi_value,
            alamat:alamat_value},
    success : function(data) {
      response = jQuery.parseJSON(data);


      toastr["success"]("Permintaan Perbaikan Data", "Berhasil Direkap");

    },
    error: function(xhr, status, error) {
      var err = eval("(" + xhr.responseText + ")");
      alert(err.Message);
    }
  });
}

function get86(){
  var comment_value=document.getElementById('comment_86').value;
  var base_url=document.getElementById('base_url').value;
  var option1_value=document.getElementById('id_pemilik_saham').value;
  var option2_value='';
  var id_upload_value=86;
  var asosiasi_value=document.getElementById('email_bu').value;
  var alamat_value=document.getElementById('alamat_bu').value;
  jQuery.ajax({
    url : base_url,
    type : "POST",
    data : {comment:comment_value,
            id_upload:id_upload_value,
            option1:option1_value,
            option2:option2_value,
            asosiasi:asosiasi_value,
            alamat:alamat_value},
    success : function(data) {
      response = jQuery.parseJSON(data);


      toastr["success"]("Permintaan Perbaikan Data", "Berhasil Direkap");

    },
    error: function(xhr, status, error) {
      var err = eval("(" + xhr.responseText + ")");
      alert(err.Message);
    }
  });
}

function get87(){
  var comment_value=document.getElementById('comment_87').value;
  var base_url=document.getElementById('base_url').value;
  var option1_value=document.getElementById('tahun').value;
  var option2_value='';
  var id_upload_value=87;
  var asosiasi_value=document.getElementById('email_bu').value;
  var alamat_value=document.getElementById('alamat_bu').value;
  jQuery.ajax({
    url : base_url,
    type : "POST",
    data : {comment:comment_value,
            id_upload:id_upload_value,
            option1:option1_value,
            option2:option2_value,
            asosiasi:asosiasi_value,
            alamat:alamat_value},
    success : function(data) {
      response = jQuery.parseJSON(data);


      toastr["success"]("Permintaan Perbaikan Data", "Berhasil Direkap");

    },
    error: function(xhr, status, error) {
      var err = eval("(" + xhr.responseText + ")");
      alert(err.Message);
    }
  });
}

function get77(){
  var comment_value=document.getElementById('comment_77').value;
  var base_url=document.getElementById('base_url').value;
  var option1_value='';
  var option2_value='';
  var id_upload_value=77;
  var asosiasi_value=document.getElementById('email_bu').value;
  var alamat_value=document.getElementById('alamat_bu').value;
  jQuery.ajax({
    url : base_url,
    type : "POST",
    data : {comment:comment_value,
            id_upload:id_upload_value,
            option1:option1_value,
            option2:option2_value,
            asosiasi:asosiasi_value,
            alamat:alamat_value},
    success : function(data) {
      response = jQuery.parseJSON(data);


      toastr["success"]("Permintaan Perbaikan Data", "Berhasil Direkap");

    },
    error: function(xhr, status, error) {
      var err = eval("(" + xhr.responseText + ")");
      alert(err.Message);
    }
  });
}


  function get13(){
  	var comment_value=document.getElementById('comment_13').value;
    var base_url=document.getElementById('base_url').value;
    var option1_value=document.getElementById('id_pemilik_saham').value;
    var option2_value='';
    var id_upload_value=13;
    var asosiasi_value=document.getElementById('email_bu').value;
    var alamat_value=document.getElementById('alamat_bu').value;
    jQuery.ajax({
      url : base_url,
  		type : "POST",
  		data : {comment:comment_value,
              id_upload:id_upload_value,
              option1:option1_value,
              option2:option2_value,
              asosiasi:asosiasi_value,
              alamat:alamat_value},
      success : function(data) {
        response = jQuery.parseJSON(data);


        toastr["success"]("Permintaan Perbaikan Data", "Berhasil Direkap");

  		},
  		error: function(xhr, status, error) {
  			var err = eval("(" + xhr.responseText + ")");
  			alert(err.Message);
  		}
    });
  }
  function checkbox13(){
    var check = document.getElementById("checkbox_13");
    if(check.checked==false){
      document.querySelector('#comment_13').removeAttribute('disabled');
      document.querySelector('#get_13').removeAttribute('disabled');
    }else{
      document.querySelector('#comment_13').value='';
      document.querySelector('#comment_13').setAttribute('disabled','true');
      document.querySelector('#get_13').setAttribute('disabled','true');
    }
  }



  function get11(){
  	var comment_value=document.getElementById('comment_11').value;
    var base_url=document.getElementById('base_url').value;
    var id_upload_value=11;
    var option1_value=document.getElementById('no_akte_pilihan').value;
    var option2_value='';
    var asosiasi_value=document.getElementById('email_bu').value;
var alamat_value=document.getElementById('alamat_bu').value;
    jQuery.ajax({
      url : base_url,
      type : "POST",
      data : {comment:comment_value,
              id_upload:id_upload_value,
              option1:option1_value,
              option2:option2_value,
              asosiasi:asosiasi_value,
alamat:alamat_value},
      success : function(data) {
        response = jQuery.parseJSON(data);
        toastr["success"]("Permintaan Perbaikan Data", "Berhasil Direkap");
  		},
  		error: function(xhr, status, error) {
  			var err = eval("(" + xhr.responseText + ")");
  			alert(err.Message);
  		}
    });
  }

  function checkbox11(){
    var check = document.getElementById("checkbox_11");
    if(check.checked==false){
      document.querySelector('#comment_11').removeAttribute('disabled');
      document.querySelector('#get_11').removeAttribute('disabled');
    }else{
      document.querySelector('#comment_11').value='';
      document.querySelector('#comment_11').setAttribute('disabled','true');
      document.querySelector('#get_11').setAttribute('disabled','true');
    }
  }

  function get32(){
    var comment_value=document.getElementById('comment_32').value;
    var base_url=document.getElementById('base_url').value;
    var id_upload_value=32;
    var option1_value=document.getElementById('no_akte_pilihan').value;
    var option2_value='';
    var asosiasi_value=document.getElementById('email_bu').value;
var alamat_value=document.getElementById('alamat_bu').value;
    jQuery.ajax({
      url : base_url,
      type : "POST",
      data : {comment:comment_value,
              id_upload:id_upload_value,
              option1:option1_value,
              option2:option2_value,
              asosiasi:asosiasi_value,
alamat:alamat_value},
      success : function(data) {
        response = jQuery.parseJSON(data);
        toastr["success"]("Permintaan Perbaikan Data", "Berhasil Direkap");
      },
      error: function(xhr, status, error) {
        var err = eval("(" + xhr.responseText + ")");
        alert(err.Message);
      }
    });
  }

  function checkbox32(){
    var check = document.getElementById("checkbox_32");
    if(check.checked==false){
      document.querySelector('#comment_32').removeAttribute('disabled');
      document.querySelector('#get_32').removeAttribute('disabled');
    }else{
      document.querySelector('#comment_32').value='';
      document.querySelector('#comment_32').setAttribute('disabled','true');
      document.querySelector('#get_32').setAttribute('disabled','true');
    }
  }

  function get33(){
    var comment_value=document.getElementById('comment_33').value;
    var base_url=document.getElementById('base_url').value;
    var id_upload_value=33;
    var option1_value=document.getElementById('no_akte_pilihan').value;
    var option2_value='';
    var asosiasi_value=document.getElementById('email_bu').value;
var alamat_value=document.getElementById('alamat_bu').value;
    jQuery.ajax({
      url : base_url,
      type : "POST",
      data : {comment:comment_value,
              id_upload:id_upload_value,
              option1:option1_value,
              option2:option2_value,
              asosiasi:asosiasi_value,
alamat:alamat_value},
      success : function(data) {
        response = jQuery.parseJSON(data);
        toastr["success"]("Permintaan Perbaikan Data", "Berhasil Direkap");
      },
      error: function(xhr, status, error) {
        var err = eval("(" + xhr.responseText + ")");
        alert(err.Message);
      }
    });
  }

  function checkbox33(){
    var check = document.getElementById("checkbox_33");
    if(check.checked==false){
      document.querySelector('#comment_33').removeAttribute('disabled');
      document.querySelector('#get_33').removeAttribute('disabled');
    }else{
      document.querySelector('#comment_33').value='';
      document.querySelector('#comment_33').setAttribute('disabled','true');
      document.querySelector('#get_33').setAttribute('disabled','true');
    }
  }

  function get9(){
    var comment_value=document.getElementById('comment_9').value;
    var base_url=document.getElementById('base_url').value;
    var id_upload_value=9;
    var option1_value=document.getElementById('nomor_kontrak_pengalaman').value;
    var option2_value=document.getElementById('id_sub_pengalaman').value;
    var asosiasi_value=document.getElementById('email_bu').value;
var alamat_value=document.getElementById('alamat_bu').value;
    jQuery.ajax({
      url : base_url,
      type : "POST",
      data : {comment:comment_value,
              id_upload:id_upload_value,
              option1:option1_value,
              option2:option2_value,
              asosiasi:asosiasi_value,
alamat:alamat_value},
      success : function(data) {
        response = jQuery.parseJSON(data);
        toastr["success"]("Permintaan Perbaikan Data", "Berhasil Direkap");
      },
      error: function(xhr, status, error) {
        var err = eval("(" + xhr.responseText + ")");
        alert(err.Message);
      }
    });
  }

  function checkbox9(){
    var check = document.getElementById("checkbox_9");
    if(check.checked==false){
      document.querySelector('#comment_9').removeAttribute('disabled');
      document.querySelector('#get_9').removeAttribute('disabled');
    }else{
      document.querySelector('#comment_9').value='';
      document.querySelector('#comment_9').setAttribute('disabled','true');
      document.querySelector('#get_9').setAttribute('disabled','true');
    }
  }

  function get10(){
    var comment_value=document.getElementById('comment_10').value;
    var base_url=document.getElementById('base_url').value;
    var id_upload_value=10;
    var option1_value=document.getElementById('nomor_kontrak_pengalaman').value;
    var option2_value=document.getElementById('id_sub_pengalaman').value;
    var asosiasi_value=document.getElementById('email_bu').value;
var alamat_value=document.getElementById('alamat_bu').value;
    jQuery.ajax({
      url : base_url,
      type : "POST",
      data : {comment:comment_value,
              id_upload:id_upload_value,
              option1:option1_value,
              option2:option2_value,
              asosiasi:asosiasi_value,
alamat:alamat_value},
      success : function(data) {
        response = jQuery.parseJSON(data);
      toastr["success"]("Permintaan Perbaikan Data", "Berhasil Direkap");
      },
      error: function(xhr, status, error) {
        var err = eval("(" + xhr.responseText + ")");
        alert(err.Message);
      }
    });
  }
  function get82(){
    var comment_value=document.getElementById('comment_82').value;
    var base_url=document.getElementById('base_url').value;
    var id_upload_value=82;
    var option1_value=document.getElementById('nomor_kontrak_pengalaman').value;
    var option2_value=document.getElementById('id_sub_pengalaman').value;
    var asosiasi_value=document.getElementById('email_bu').value;
var alamat_value=document.getElementById('alamat_bu').value;
    jQuery.ajax({
      url : base_url,
      type : "POST",
      data : {comment:comment_value,
              id_upload:id_upload_value,
              option1:option1_value,
              option2:option2_value,
              asosiasi:asosiasi_value,
alamat:alamat_value},
      success : function(data) {
        response = jQuery.parseJSON(data);
      toastr["success"]("Permintaan Perbaikan Data", "Berhasil Direkap");
      },
      error: function(xhr, status, error) {
        var err = eval("(" + xhr.responseText + ")");
        alert(err.Message);
      }
    });
  }
  function get83(){
    var comment_value=document.getElementById('comment_83').value;
    var base_url=document.getElementById('base_url').value;
    var id_upload_value=82;
    var option1_value=document.getElementById('no_akte_pilihan').value;
    var option2_value='';
    var asosiasi_value=document.getElementById('email_bu').value;
var alamat_value=document.getElementById('alamat_bu').value;
    jQuery.ajax({
      url : base_url,
      type : "POST",
      data : {comment:comment_value,
              id_upload:id_upload_value,
              option1:option1_value,
              option2:option2_value,
              asosiasi:asosiasi_value,
alamat:alamat_value},
      success : function(data) {
        response = jQuery.parseJSON(data);
      toastr["success"]("Permintaan Perbaikan Data", "Berhasil Direkap");
      },
      error: function(xhr, status, error) {
        var err = eval("(" + xhr.responseText + ")");
        alert(err.Message);
      }
    });
  }

  function checkbox10(){
    var check = document.getElementById("checkbox_10");
    if(check.checked==false){
      document.querySelector('#comment_10').removeAttribute('disabled');
      document.querySelector('#get_10').removeAttribute('disabled');
    }else{
      document.querySelector('#comment_10').value='';
      document.querySelector('#comment_10').setAttribute('disabled','true');
      document.querySelector('#get_10').setAttribute('disabled','true');
    }
  }

  function get39(){
    var comment_value=document.getElementById('comment_39').value;
    var base_url=document.getElementById('base_url').value;
    var id_upload_value=39;
    var option1_value='';
    var option2_value='';
    var asosiasi_value=document.getElementById('email_bu').value;
var alamat_value=document.getElementById('alamat_bu').value;
    jQuery.ajax({
      url : base_url,
      type : "POST",
      data : {comment:comment_value,
              id_upload:id_upload_value,
              option1:option1_value,
              option2:option2_value,
              asosiasi:asosiasi_value,
alamat:alamat_value},
      success : function(data) {
        response = jQuery.parseJSON(data);
        console.log( JSON.parse(data));
        toastr["success"]("Permintaan Perbaikan Data", "Berhasil Direkap");
      },
      error: function(xhr, status, error) {
        var err = eval("(" + xhr.responseText + ")");
        alert(err.Message);
      }
    });
  }

  function checkbox39(){
    var check = document.getElementById("checkbox_39");
    if(check.checked==false){
      document.querySelector('#comment_39').removeAttribute('disabled');
      document.querySelector('#get_39').removeAttribute('disabled');
    }else{
      document.querySelector('#comment_39').value='';
      document.querySelector('#comment_39').setAttribute('disabled','true');
      document.querySelector('#get_39').setAttribute('disabled','true');
    }
  }

  function get37(){
    var comment_value=document.getElementById('comment_37').value;
    var base_url=document.getElementById('base_url').value;
    var id_upload_value=37;
    var option1_value='';
    var option2_value='';
    var asosiasi_value=document.getElementById('email_bu').value;
var alamat_value=document.getElementById('alamat_bu').value;
    jQuery.ajax({
      url : base_url,
      type : "POST",
      data : {comment:comment_value,
              id_upload:id_upload_value,
              option1:option1_value,
              option2:option2_value,
              asosiasi:asosiasi_value,
alamat:alamat_value},
      success : function(data) {
        response = jQuery.parseJSON(data);
        toastr["success"]("Permintaan Perbaikan Data", "Berhasil Direkap");
      },
      error: function(xhr, status, error) {
        var err = eval("(" + xhr.responseText + ")");
        alert(err.Message);
      }
    });
  }

  function checkbox37(){
    var check = document.getElementById("checkbox_37");
    if(check.checked==false){
      document.querySelector('#comment_37').removeAttribute('disabled');
      document.querySelector('#get_37').removeAttribute('disabled');
    }else{
      document.querySelector('#comment_37').value='';
      document.querySelector('#comment_37').setAttribute('disabled','true');
      document.querySelector('#get_37').setAttribute('disabled','true');
    }
  }

  function get16(){
    var comment_value=document.getElementById('comment_16').value;
    var base_url=document.getElementById('base_url').value;
    var id_upload_value=16;
    var option1_value=document.getElementById('tahun').value;
    var option2_value='';
    var asosiasi_value=document.getElementById('email_bu').value;
var alamat_value=document.getElementById('alamat_bu').value;
    jQuery.ajax({
      url : base_url,
      type : "POST",
      data : {comment:comment_value,
              id_upload:id_upload_value,
              option1:option1_value,
              option2:option2_value,
              asosiasi:asosiasi_value,
alamat:alamat_value},
      success : function(data) {
        response = jQuery.parseJSON(data);
        toastr["success"]("Permintaan Perbaikan Data", "Berhasil Direkap");
      },
      error: function(xhr, status, error) {
        var err = eval("(" + xhr.responseText + ")");
        alert(err.Message);
      }
    });
  }

  function checkbox16(){

    var check = document.getElementById("checkbox_16");
    if(check.checked==false){
      document.querySelector('#comment_16').removeAttribute('disabled');
      document.querySelector('#get_16').removeAttribute('disabled');
    }else{
      document.querySelector('#comment_16').value='';
      document.querySelector('#comment_16').setAttribute('disabled','true');
      document.querySelector('#get_16').setAttribute('disabled','true');
    }
  }

  function get17(){
    var comment_value=document.getElementById('comment_17').value;
    var base_url=document.getElementById('base_url').value;
    var id_upload_value=17;
    var option1_value=document.getElementById('tahun').value;
    var option2_value='';
    var asosiasi_value=document.getElementById('email_bu').value;
var alamat_value=document.getElementById('alamat_bu').value;
    jQuery.ajax({
      url : base_url,
      type : "POST",
      data : {comment:comment_value,
              id_upload:id_upload_value,
              option1:option1_value,
              option2:option2_value,
              asosiasi:asosiasi_value,
alamat:alamat_value},
      success : function(data) {
        response = jQuery.parseJSON(data);
        toastr["success"]("Permintaan Perbaikan Data", "Berhasil Direkap");
      },
      error: function(xhr, status, error) {
        var err = eval("(" + xhr.responseText + ")");
        alert(err.Message);
      }
    });
  }

  function checkbox17(){
    var check = document.getElementById("checkbox_17");
    if(check.checked==false){
      document.querySelector('#comment_17').removeAttribute('disabled');
      document.querySelector('#get_17').removeAttribute('disabled');
    }else{
      document.querySelector('#comment_17').value='';
      document.querySelector('#comment_17').setAttribute('disabled','true');
      document.querySelector('#get_17').setAttribute('disabled','true');
    }
  }

  function get14(){
    var comment_value=document.getElementById('comment_14').value;
    var base_url=document.getElementById('base_url').value;
    var id_upload_value=14;
    var option1_value=document.getElementById('id_pemilik_saham').value;

    var option2_value='';
    var asosiasi_value=document.getElementById('email_bu').value;
var alamat_value=document.getElementById('alamat_bu').value;
    jQuery.ajax({
      url : base_url,
      type : "POST",
      data : {comment:comment_value,
              id_upload:id_upload_value,
              option1:option1_value,
              option2:option2_value,
              asosiasi:asosiasi_value,
alamat:alamat_value},
      success : function(data) {
        response = jQuery.parseJSON(data);
        toastr["success"]("Permintaan Perbaikan Data", "Berhasil Direkap");
      },
      error: function(xhr, status, error) {
        var err = eval("(" + xhr.responseText + ")");
        alert(err.Message);
      }
    });
  }

  function checkbox14(){
    var check = document.getElementById("checkbox_14");
    if(check.checked==false){
      document.querySelector('#comment_14').removeAttribute('disabled');
      document.querySelector('#get_14').removeAttribute('disabled');
    }else{
      document.querySelector('#comment_14').value='';
      document.querySelector('#comment_14').setAttribute('disabled','true');
      document.querySelector('#get_14').setAttribute('disabled','true');
    }
  }

  function get18(){
    var comment_value=document.getElementById('comment_18').value;
    var base_url=document.getElementById('base_url').value;
    var id_upload_value=18;
    var option1_value=document.getElementById('id_pengurus').value;
    var mylist = document.getElementById("id_pengurus");
    document.getElementById("nama_pengurus").value = mylist.options[mylist.selectedIndex].text;
    var option2_value=document.getElementById('nama_pengurus').value;
    var asosiasi_value=document.getElementById('email_bu').value;
var alamat_value=document.getElementById('alamat_bu').value;
    jQuery.ajax({
      url : base_url,
      type : "POST",
      data : {comment:comment_value,
              id_upload:id_upload_value,
              option1:option1_value,
              option2:option2_value,
              asosiasi:asosiasi_value,
alamat:alamat_value},
      success : function(data) {
        response = jQuery.parseJSON(data);
      toastr["success"]("Permintaan Perbaikan Data", "Berhasil Direkap");
      },
      error: function(xhr, status, error) {
        var err = eval("(" + xhr.responseText + ")");
        alert(err.Message);
      }
    });
  }

  function checkbox18(){
    var check = document.getElementById("checkbox_18");
    if(check.checked==false){
      document.querySelector('#comment_18').removeAttribute('disabled');
      document.querySelector('#get_18').removeAttribute('disabled');
    }else{
      document.querySelector('#comment_18').value='';
      document.querySelector('#comment_18').setAttribute('disabled','true');
      document.querySelector('#get_18').setAttribute('disabled','true');
    }
  }

  function get15(){
    var comment_value=document.getElementById("comment_15").value;
    var base_url=document.getElementById('base_url').value;
    var id_upload_value=15;
    var option1_value=document.getElementById('id_pemilik_saham').value;

    var option2_value='';
    var asosiasi_value=document.getElementById('email_bu').value;
var alamat_value=document.getElementById('alamat_bu').value;
    jQuery.ajax({
      url : base_url,
      type : "POST",
      data : {comment:comment_value,
              id_upload:id_upload_value,
              option1:option1_value,
              option2:option2_value,
              asosiasi:asosiasi_value,
alamat:alamat_value},
      success : function(data) {
        response = jQuery.parseJSON(data);
        toastr["success"]("Permintaan Perbaikan Data", "Berhasil Direkap");
      },
      error: function(xhr, status, error) {
        var err = eval("(" + xhr.responseText + ")");
        alert(err.Message);
      }
    });
  }

  function checkbox15(){
    var check = document.getElementById("checkbox_15");
    if(check.checked==false){
      document.querySelector('#comment_15').removeAttribute('disabled');
      document.querySelector('#get_15').removeAttribute('disabled');
    }else{
      document.querySelector('#comment_15').value='';
      document.querySelector('#comment_15').setAttribute('disabled','true');
      document.querySelector('#get_15').setAttribute('disabled','true');
    }
  }

  function get36(){
    var comment_value=document.getElementById('comment_36').value;
    var base_url=document.getElementById('base_url').value;
    var id_upload_value=36;
    var option1_value=document.getElementById('nomor_kontrak').value;
    var option2_value=document.getElementById('id_sub_pengalaman').value;
    var asosiasi_value=document.getElementById('email_bu').value;
var alamat_value=document.getElementById('alamat_bu').value;
    jQuery.ajax({
      url : base_url,
      type : "POST",
      data : {comment:comment_value,
              id_upload:id_upload_value,
              option1:option1_value,
              option2:option2_value,
              asosiasi:asosiasi_value,
alamat:alamat_value},
      success : function(data) {
        response = jQuery.parseJSON(data);
        console.log( JSON.parse(data));
        toastr["success"]("Permintaan Perbaikan Data", "Berhasil Direkap");
      },
      error: function(xhr, status, error) {
        var err = eval("(" + xhr.responseText + ")");
        alert(err.Message);
      }
    });
  }

  function checkbox36(){
    var check = document.getElementById("checkbox_36");
    if(check.checked==false){
      document.querySelector('#comment_36').removeAttribute('disabled');
      document.querySelector('#get_36').removeAttribute('disabled');
    }else{
      document.querySelector('#comment_36').value='';
      document.querySelector('#comment_36').setAttribute('disabled','true');
      document.querySelector('#get_36').setAttribute('disabled','true');
    }
  }

  function get35(){
    var comment_value=document.getElementById('comment_35').value;
    var base_url=document.getElementById('base_url').value;
    var id_upload_value=35;
    var option1_value=document.getElementById('nomor_kontrak').value;
    var option2_value=document.getElementById('id_sub_pengalaman').value;
    var asosiasi_value=document.getElementById('email_bu').value;
var alamat_value=document.getElementById('alamat_bu').value;
    jQuery.ajax({
      url : base_url,
      type : "POST",
      data : {comment:comment_value,
              id_upload:id_upload_value,
              option1:option1_value,
              option2:option2_value,
              asosiasi:asosiasi_value,
alamat:alamat_value},
      success : function(data) {
        response = jQuery.parseJSON(data);
        console.log( JSON.parse(data));
      toastr["success"]("Permintaan Perbaikan Data", "Berhasil Direkap");
      },
      error: function(xhr, status, error) {
        var err = eval("(" + xhr.responseText + ")");
        alert(err.Message);
      }
    });
  }

  function checkbox35(){
    var check = document.getElementById("checkbox_35");
    if(check.checked==false){
      document.querySelector('#comment_35').removeAttribute('disabled');
      document.querySelector('#get_35').removeAttribute('disabled');
    }else{
      document.querySelector('#comment_35').value='';
      document.querySelector('#comment_35').setAttribute('disabled','true');
      document.querySelector('#get_35').setAttribute('disabled','true');
    }
  }

  function get34(){
    var comment_value=document.getElementById('comment_34').value;
    var base_url=document.getElementById('base_url').value;
    var id_upload_value=34;
    var option1_value=document.getElementById('nomor_kontrak').value;
    var option2_value=document.getElementById('id_sub_pengalaman').value;
    var asosiasi_value=document.getElementById('email_bu').value;
var alamat_value=document.getElementById('alamat_bu').value;
    jQuery.ajax({
      url : base_url,
      type : "POST",
      data : {comment:comment_value,
              id_upload:id_upload_value,
              option1:option1_value,
              option2:option2_value,
              asosiasi:asosiasi_value,
alamat:alamat_value},
      success : function(data) {
        response = jQuery.parseJSON(data);
        console.log( JSON.parse(data));
        toastr["success"]("Permintaan Perbaikan Data", "Berhasil Direkap");
      },
      error: function(xhr, status, error) {
        var err = eval("(" + xhr.responseText + ")");
        alert(err.Message);
      }
    });
  }

  function checkbox34(){
    var check = document.getElementById("checkbox_34");
    if(check.checked==false){
      document.querySelector('#comment_34').removeAttribute('disabled');
      document.querySelector('#get_34').removeAttribute('disabled');
    }else{
      document.querySelector('#comment_34').value='';
      document.querySelector('#comment_34').setAttribute('disabled','true');
      document.querySelector('#get_34').setAttribute('disabled','true');
    }
  }

  function get32(){
    var comment_value=document.getElementById('comment_32').value;
    var base_url=document.getElementById('base_url').value;
    var id_upload_value=32;
    var option1_value=document.getElementById('nomor_kontrak').value;
    var option2_value=document.getElementById('id_sub_pengalaman').value;
    var asosiasi_value=document.getElementById('email_bu').value;
var alamat_value=document.getElementById('alamat_bu').value;
    jQuery.ajax({
      url : base_url,
      type : "POST",
      data : {comment:comment_value,
              id_upload:id_upload_value,
              option1:option1_value,
              option2:option2_value,
              asosiasi:asosiasi_value,
alamat:alamat_value},
      success : function(data) {
        response = jQuery.parseJSON(data);
        console.log( JSON.parse(data));
        toastr["success"]("Permintaan Perbaikan Data", "Berhasil Direkap");
      },
      error: function(xhr, status, error) {
        var err = eval("(" + xhr.responseText + ")");
        alert(err.Message);
      }
    });
  }

  function checkbox32(){
    var check = document.getElementById("checkbox_32");
    if(check.checked==false){
      document.querySelector('#comment_32').removeAttribute('disabled');
      document.querySelector('#get_32').removeAttribute('disabled');
    }else{
      document.querySelector('#comment_32').value='';
      document.querySelector('#comment_32').setAttribute('disabled','true');
      document.querySelector('#get_32').setAttribute('disabled','true');
    }
  }

  function get7(){
    var comment_value=document.getElementById('comment_7').value;
    var base_url=document.getElementById('base_url').value;
    var id_upload_value=7;
    var option1_value=document.getElementById('id_pengurus').value;;
    var option2_value='';
    var asosiasi_value=document.getElementById('email_bu').value;
var alamat_value=document.getElementById('alamat_bu').value;
    jQuery.ajax({
      url : base_url,
      type : "POST",
      data : {comment:comment_value,
              id_upload:id_upload_value,
              option1:option1_value,
              option2:option2_value,
              asosiasi:asosiasi_value,
alamat:alamat_value},
      success : function(data) {
        response = jQuery.parseJSON(data);
        console.log( JSON.parse(data));
        toastr["success"]("Permintaan Perbaikan Data", "Berhasil Direkap");
      },
      error: function(xhr, status, error) {
        var err = eval("(" + xhr.responseText + ")");
        alert(err.Message);
      }
    });
  }

  function checkbox7(){
    var check = document.getElementById("checkbox_7");
    if(check.checked==false){
      document.querySelector('#comment_7').removeAttribute('disabled');
      document.querySelector('#get_7').removeAttribute('disabled');
    }else{
      document.querySelector('#comment_7').value='';
      document.querySelector('#comment_7').setAttribute('disabled','true');
      document.querySelector('#get_7').setAttribute('disabled','true');
    }
  }

  function get8(){
    var comment_value=document.getElementById('comment_8').value;
    var base_url=document.getElementById('base_url').value;
    var id_upload_value=8;
    var option1_value=document.getElementById('id_pengurus').value;;
    var option2_value='';
    var asosiasi_value=document.getElementById('email_bu').value;
    var alamat_value=document.getElementById('alamat_bu').value;
    jQuery.ajax({
      url : base_url,
      type : "POST",
      data : {comment:comment_value,
              id_upload:id_upload_value,
              option1:option1_value,
              option2:option2_value,
              asosiasi:asosiasi_value,
alamat:alamat_value},
      success : function(data) {
        response = jQuery.parseJSON(data);
        console.log( JSON.parse(data));
        toastr["success"]("Permintaan Perbaikan Data", "Berhasil Direkap");
      },
      error: function(xhr, status, error) {
        var err = eval("(" + xhr.responseText + ")");
        alert(err.Message);
      }
    });
  }

  function checkbox8(){
    var check = document.getElementById("checkbox_8");
    if(check.checked==false){
      document.querySelector('#comment_8').removeAttribute('disabled');
      document.querySelector('#get_8').removeAttribute('disabled');
    }else{
      document.querySelector('#comment_8').value='';
      document.querySelector('#comment_8').setAttribute('disabled','true');
      document.querySelector('#get_8').setAttribute('disabled','true');
    }
  }

  function get22(){
    var comment_value=document.getElementById('comment_22').value;
    var base_url=document.getElementById('base_url').value;
    var id_upload_value=22;
    var option1_value='';
    var option2_value='';
    var asosiasi_value=document.getElementById('email_bu').value;
var alamat_value=document.getElementById('alamat_bu').value;
    jQuery.ajax({
      url : base_url,
      type : "POST",
      data : {comment:comment_value,
              id_upload:id_upload_value,
              option1:option1_value,
              option2:option2_value,
              asosiasi:asosiasi_value,
alamat:alamat_value},
      success : function(data) {
        response = jQuery.parseJSON(data);
        console.log( JSON.parse(data));
        toastr["success"]("Permintaan Perbaikan Data", "Berhasil Direkap");
      },
      error: function(xhr, status, error) {
        var err = eval("(" + xhr.responseText + ")");
        alert(err.Message);
      }
    });
  }

  function checkbox22(){
    var check = document.getElementById("checkbox_22");
    if(check.checked==false){
      document.querySelector('#comment_22').removeAttribute('disabled');
      document.querySelector('#get_22').removeAttribute('disabled');
    }else{
      document.querySelector('#comment_22').value='';
      document.querySelector('#comment_22').setAttribute('disabled','true');
      document.querySelector('#get_22').setAttribute('disabled','true');
    }
  }

  function get41(){
    var comment_value=document.getElementById('comment_41').value;
    var base_url=document.getElementById('base_url').value;
    var id_upload_value=41;
    var option1_value=document.getElementById('id_pemilik_saham').value;
    var mylist = document.getElementById("id_pemilik_saham");
    document.getElementById("nama_saham").value = mylist.options[mylist.selectedIndex].text;
    var option2_value=document.getElementById('nama_saham').value;
    var asosiasi_value=document.getElementById('email_bu').value;
var alamat_value=document.getElementById('alamat_bu').value;
    jQuery.ajax({
      url : base_url,
      type : "POST",
      data : {comment:comment_value,
              id_upload:id_upload_value,
              option1:option1_value,
              option2:option2_value,
              asosiasi:asosiasi_value,
alamat:alamat_value},
      success : function(data) {
        response = jQuery.parseJSON(data);
        console.log( JSON.parse(data));
        toastr["success"]("Permintaan Perbaikan Data", "Berhasil Direkap");
      },
      error: function(xhr, status, error) {
        var err = eval("(" + xhr.responseText + ")");
        alert(err.Message);
      }
    });
  }

  function checkbox41(){
    var check = document.getElementById("checkbox_41");
    if(check.checked==false){
      document.querySelector('#comment_41').removeAttribute('disabled');
      document.querySelector('#get_41').removeAttribute('disabled');
    }else{
      document.querySelector('#comment_41').value='';
      document.querySelector('#comment_41').setAttribute('disabled','true');
      document.querySelector('#get_41').setAttribute('disabled','true');
    }
  }

  function get21(){
    var comment_value=document.getElementById('comment_21').value;
    var base_url=document.getElementById('base_url').value;
    var id_upload_value=21;
    var option1_value=document.getElementById('id_peralatan').value;
    var option2_value='';
    var asosiasi_value=document.getElementById('email_bu').value;
    var alamat_value=document.getElementById('alamat_bu').value;
    jQuery.ajax({
      url : base_url,
      type : "POST",
      data : {comment:comment_value,
              id_upload:id_upload_value,
              option1:option1_value,
              option2:option2_value,
              asosiasi:asosiasi_value,
alamat:alamat_value},
      success : function(data) {
        response = jQuery.parseJSON(data);
        console.log( JSON.parse(data));
        toastr["success"]("Permintaan Perbaikan Data", "Berhasil Direkap");
      },
      error: function(xhr, status, error) {
        var err = eval("(" + xhr.responseText + ")");
        alert(err.Message);
      }
    });
  }

  function checkbox21(){
    var check = document.getElementById("checkbox_21");
    if(check.checked==false){
      document.querySelector('#comment_21').removeAttribute('disabled');
      document.querySelector('#get_21').removeAttribute('disabled');
    }else{
      document.querySelector('#comment_21').value='';
      document.querySelector('#comment_21').setAttribute('disabled','true');
      document.querySelector('#get_21').setAttribute('disabled','true');
    }
  }
  function get36(){
    var comment_value=document.getElementById('comment_36').value;
    var base_url=document.getElementById('base_url').value;
    var id_upload_value=36;
    var option1_value=document.getElementById('id_peralatan').value;
    var option2_value='';
    var asosiasi_value=document.getElementById('email_bu').value;
    var alamat_value=document.getElementById('alamat_bu').value;
    jQuery.ajax({
      url : base_url,
      type : "POST",
      data : {comment:comment_value,
              id_upload:id_upload_value,
              option1:option1_value,
              option2:option2_value,
              asosiasi:asosiasi_value,
alamat:alamat_value},
      success : function(data) {
        response = jQuery.parseJSON(data);
        console.log( JSON.parse(data));
        toastr["success"]("Permintaan Perbaikan Data", "Berhasil Direkap");
      },
      error: function(xhr, status, error) {
        var err = eval("(" + xhr.responseText + ")");
        alert(err.Message);
      }
    });
  }

  function checkbox36(){
    var check = document.getElementById("checkbox_36");
    if(check.checked==false){
      document.querySelector('#comment_36').removeAttribute('disabled');
      document.querySelector('#get_36').removeAttribute('disabled');
    }else{
      document.querySelector('#comment_36').value='';
      document.querySelector('#comment_36').setAttribute('disabled','true');
      document.querySelector('#get_36').setAttribute('disabled','true');
    }
  }

  function get20(){
    var comment_value=document.getElementById('comment_20').value;
    var base_url=document.getElementById('base_url').value;
    var id_upload_value=20;
    var option1_value=document.getElementById('tahun').value;
    var option2_value='';
    var asosiasi_value=document.getElementById('email_bu').value;
var alamat_value=document.getElementById('alamat_bu').value;
    jQuery.ajax({
      url : base_url,
      type : "POST",
      data : {comment:comment_value,
              id_upload:id_upload_value,
              option1:option1_value,
              option2:option2_value,
              asosiasi:asosiasi_value,
alamat:alamat_value},
      success : function(data) {
        response = jQuery.parseJSON(data);
        console.log( JSON.parse(data));
        toastr["success"]("Permintaan Perbaikan Data", "Berhasil Direkap");
      },
      error: function(xhr, status, error) {
        var err = eval("(" + xhr.responseText + ")");
        alert(err.Message);
      }
    });
  }

  function checkbox20(){
    var check = document.getElementById("checkbox_20");
    if(check.checked==false){
      document.querySelector('#comment_20').removeAttribute('disabled');
      document.querySelector('#get_20').removeAttribute('disabled');
    }else{
      document.querySelector('#comment_20').value='';
      document.querySelector('#comment_20').setAttribute('disabled','true');
      document.querySelector('#get_20').setAttribute('disabled','true');
    }
  }

  function get1(){
    var comment_value=document.getElementById('comment_1').value;
    var base_url=document.getElementById('base_url').value;
    var id_upload_value=1;
    var option1_value='';
    var option2_value='';
    var asosiasi_value=document.getElementById('email_bu').value;
var alamat_value=document.getElementById('alamat_bu').value;
    jQuery.ajax({
      url : base_url,
      type : "POST",
      data : {comment:comment_value,
              id_upload:id_upload_value,
              option1:option1_value,
              option2:option2_value,
              asosiasi:asosiasi_value,
alamat:alamat_value},
      success : function(data) {
        response = jQuery.parseJSON(data);
        console.log( JSON.parse(data));
        toastr["success"]("Permintaan Perbaikan Data", "Berhasil Direkap");
      },
      error: function(xhr, status, error) {
        var err = eval("(" + xhr.responseText + ")");
        alert(err.Message);
      }
    });
  }

  function checkbox1(){
    var check = document.getElementById("checkbox_1");
    if(check.checked==false){
      document.querySelector('#comment_1').removeAttribute('disabled');
      document.querySelector('#get_1').removeAttribute('disabled');
    }else{
      document.querySelector('#comment_1').value='';
      document.querySelector('#comment_1').setAttribute('disabled','true');
      document.querySelector('#get_1').setAttribute('disabled','true');
    }
  }

  function get2(){
    var comment_value=document.getElementById('comment_2').value;
    var base_url=document.getElementById('base_url').value;
    var id_upload_value=2;
    var option1_value='';
    var option2_value='';
    var asosiasi_value=document.getElementById('email_bu').value;
var alamat_value=document.getElementById('alamat_bu').value;
    jQuery.ajax({
      url : base_url,
      type : "POST",
      data : {comment:comment_value,
              id_upload:id_upload_value,
              option1:option1_value,
              option2:option2_value,
              asosiasi:asosiasi_value,
alamat:alamat_value},
      success : function(data) {
        response = jQuery.parseJSON(data);
        console.log( JSON.parse(data));
        toastr["success"]("Permintaan Perbaikan Data", "Berhasil Direkap");
      },
      error: function(xhr, status, error) {
        var err = eval("(" + xhr.responseText + ")");
        alert(err.Message);
      }
    });
  }

  function checkbox2(){
    var check = document.getElementById("checkbox_2");
    if(check.checked==false){
      document.querySelector('#comment_2').removeAttribute('disabled');
      document.querySelector('#get_2').removeAttribute('disabled');
    }else{
      document.querySelector('#comment_2').value='';
      document.querySelector('#comment_2').setAttribute('disabled','true');
      document.querySelector('#get_2').setAttribute('disabled','true');
    }
  }

  function get3(){
    var comment_value=document.getElementById('comment_3').value;
    var base_url=document.getElementById('base_url').value;
    var id_upload_value=3;
    var option1_value='';
    var option2_value='';
    var asosiasi_value=document.getElementById('email_bu').value;
var alamat_value=document.getElementById('alamat_bu').value;
    jQuery.ajax({
      url : base_url,
      type : "POST",
      data : {comment:comment_value,
              id_upload:id_upload_value,
              option1:option1_value,
              option2:option2_value,
              asosiasi:asosiasi_value,
alamat:alamat_value},
      success : function(data) {
        response = jQuery.parseJSON(data);
        console.log( JSON.parse(data));
        toastr["success"]("Permintaan Perbaikan Data", "Berhasil Direkap");
      },
      error: function(xhr, status, error) {
        var err = eval("(" + xhr.responseText + ")");
        alert(err.Message);
      }
    });
  }

  function checkbox3(){
    var check = document.getElementById("checkbox_3");
    if(check.checked==false){
      document.querySelector('#comment_3').removeAttribute('disabled');
      document.querySelector('#get_3').removeAttribute('disabled');
    }else{
      document.querySelector('#comment_3').value='';
      document.querySelector('#comment_3').setAttribute('disabled','true');
      document.querySelector('#get_3').setAttribute('disabled','true');
    }
  }

  function get4(){
    var comment_value=document.getElementById('comment_4').value;
    var base_url=document.getElementById('base_url').value;
    var id_upload_value=4;
    var option1_value='';
    var option2_value='';
    var asosiasi_value=document.getElementById('email_bu').value;
var alamat_value=document.getElementById('alamat_bu').value;
    jQuery.ajax({
      url : base_url,
      type : "POST",
      data : {comment:comment_value,
              id_upload:id_upload_value,
              option1:option1_value,
              option2:option2_value,
              asosiasi:asosiasi_value,
alamat:alamat_value},
      success : function(data) {
        response = jQuery.parseJSON(data);
        console.log( JSON.parse(data));
        toastr["success"]("Permintaan Perbaikan Data", "Berhasil Direkap");
      },
      error: function(xhr, status, error) {
        var err = eval("(" + xhr.responseText + ")");
        alert(err.Message);
      }
    });
  }

  function checkbox4(){
    var check = document.getElementById("checkbox_4");
    if(check.checked==false){
      document.querySelector('#comment_4').removeAttribute('disabled');
      document.querySelector('#get_4').removeAttribute('disabled');
    }else{
      document.querySelector('#comment_4').value='';
      document.querySelector('#comment_4').setAttribute('disabled','true');
      document.querySelector('#get_4').setAttribute('disabled','true');
    }
  }

  function get5(){
    var comment_value=document.getElementById('comment_5').value;
    var base_url=document.getElementById('base_url').value;
    var id_upload_value=5;
    var option1_value='';
    var option2_value='';
    var asosiasi_value=document.getElementById('email_bu').value;
var alamat_value=document.getElementById('alamat_bu').value;
    jQuery.ajax({
      url : base_url,
      type : "POST",
      data : {comment:comment_value,
              id_upload:id_upload_value,
              option1:option1_value,
              option2:option2_value,
              asosiasi:asosiasi_value,
alamat:alamat_value},
      success : function(data) {
        response = jQuery.parseJSON(data);
        console.log( JSON.parse(data));
        toastr["success"]("Permintaan Perbaikan Data", "Berhasil Direkap");
      },
      error: function(xhr, status, error) {
        var err = eval("(" + xhr.responseText + ")");
        alert(err.Message);
      }
    });
  }

  function checkbox5(){
    var check = document.getElementById("checkbox_5");
    if(check.checked==false){
      document.querySelector('#comment_5').removeAttribute('disabled');
      document.querySelector('#get_5').removeAttribute('disabled');
    }else{
      document.querySelector('#comment_5').value='';
      document.querySelector('#comment_5').setAttribute('disabled','true');
      document.querySelector('#get_5').setAttribute('disabled','true');
    }
  }
  function get6(){
    var comment_value=document.getElementById('comment_6').value;
    var base_url=document.getElementById('base_url').value;
    var id_upload_value=6;
    var option1_value=document.getElementById('id_pengurus').value;
    var option2_value='';
    var asosiasi_value=document.getElementById('email_bu').value;
var alamat_value=document.getElementById('alamat_bu').value;
    jQuery.ajax({
      url : base_url,
      type : "POST",
      data : {comment:comment_value,
              id_upload:id_upload_value,
              option1:option1_value,
              option2:option2_value,
              asosiasi:asosiasi_value,
alamat:alamat_value},
      success : function(data) {
        response = jQuery.parseJSON(data);
        console.log( JSON.parse(data));
        toastr["success"]("Permintaan Perbaikan Data", "Berhasil Direkap");
      },
      error: function(xhr, status, error) {
        var err = eval("(" + xhr.responseText + ")");
        alert(err.Message);
      }
    });
  }

  function checkbox6(){
    var check = document.getElementById("checkbox_6");
    if(check.checked==false){
      document.querySelector('#comment_6').removeAttribute('disabled');
      document.querySelector('#get_6').removeAttribute('disabled');
    }else{
      document.querySelector('#comment_6').value='';
      document.querySelector('#comment_6').setAttribute('disabled','true');
      document.querySelector('#get_6').setAttribute('disabled','true');
    }
  }

  function get12(){
    var comment_value=document.getElementById('comment_12').value;
    var base_url=document.getElementById('base_url').value;
    var id_upload_value=12;
    var option1_value=document.getElementById('no_sk_kehakiman').value;
    var option2_value='';
    var asosiasi_value=document.getElementById('email_bu').value;
var alamat_value=document.getElementById('alamat_bu').value;
    jQuery.ajax({
      url : base_url,
      type : "POST",
      data : {comment:comment_value,
              id_upload:id_upload_value,
              option1:option1_value,
              option2:option2_value,
              asosiasi:asosiasi_value,
alamat:alamat_value},
      success : function(data) {
        response = jQuery.parseJSON(data);
        console.log( JSON.parse(data));
        toastr["success"]("Permintaan Perbaikan Data", "Berhasil Direkap");
      },
      error: function(xhr, status, error) {
        var err = eval("(" + xhr.responseText + ")");
        alert(err.Message);
      }
    });
  }

  function checkbox12(){
    var check = document.getElementById("checkbox_12");
    if(check.checked==false){
      document.querySelector('#comment_12').removeAttribute('disabled');
      document.querySelector('#get_12').removeAttribute('disabled');
    }else{
      document.querySelector('#comment_12').value='';
      document.querySelector('#comment_12').setAttribute('disabled','true');
      document.querySelector('#get_12').setAttribute('disabled','true');
    }
  }
  function get26(){
    var comment_value=document.getElementById('comment_26').value;
    var base_url=document.getElementById('base_url').value;
    var id_upload_value=26;
    var option1_value=document.getElementById('nomor_kontrak_pengalaman').value;
    var option2_value=document.getElementById('id_sub_pengalaman').value;;
    var asosiasi_value=document.getElementById('email_bu').value;
var alamat_value=document.getElementById('alamat_bu').value;
    jQuery.ajax({
      url : base_url,
      type : "POST",
      data : {comment:comment_value,
              id_upload:id_upload_value,
              option1:option1_value,
              option2:option2_value,
              asosiasi:asosiasi_value,
alamat:alamat_value},
      success : function(data) {
        response = jQuery.parseJSON(data);
        console.log( JSON.parse(data));
        toastr["success"]("Permintaan Perbaikan Data", "Berhasil Direkap");
      },
      error: function(xhr, status, error) {
        var err = eval("(" + xhr.responseText + ")");
        alert(err.Message);
      }
    });
  }

  function get85(){
    var comment_value=document.getElementById('comment_85').value;
    var base_url=document.getElementById('base_url').value;
    var id_upload_value=85;
    var option1_value='';
    var option2_value='';
    var asosiasi_value=document.getElementById('email_bu').value;
var alamat_value=document.getElementById('alamat_bu').value;
    jQuery.ajax({
      url : base_url,
      type : "POST",
      data : {comment:comment_value,
              id_upload:id_upload_value,
              option1:option1_value,
              option2:option2_value,
              asosiasi:asosiasi_value,
alamat:alamat_value},
      success : function(data) {
        response = jQuery.parseJSON(data);
        console.log( JSON.parse(data));
        toastr["success"]("Permintaan Perbaikan Data", "Berhasil Direkap");
      },
      error: function(xhr, status, error) {
        var err = eval("(" + xhr.responseText + ")");
        alert(err.Message);
      }
    });
  }



  function get88(){
    var comment_value=document.getElementById('comment_88').value;
    var base_url=document.getElementById('base_url').value;
    var id_upload_value=88;
    var option1_value='';
    var option2_value='';
    var asosiasi_value=document.getElementById('email_bu').value;
var alamat_value=document.getElementById('alamat_bu').value;
    jQuery.ajax({
      url : base_url,
      type : "POST",
      data : {comment:comment_value,
              id_upload:id_upload_value,
              option1:option1_value,
              option2:option2_value,
              asosiasi:asosiasi_value,
alamat:alamat_value},
      success : function(data) {
        response = jQuery.parseJSON(data);
        console.log( JSON.parse(data));
        toastr["success"]("Permintaan Perbaikan Data", "Berhasil Direkap");
      },
      error: function(xhr, status, error) {
        var err = eval("(" + xhr.responseText + ")");
        alert(err.Message);
      }
    });
  }


  function get89(){
    var comment_value=document.getElementById('comment_89').value;
    var base_url=document.getElementById('base_url').value;
    var id_upload_value=89;
    var option1_value=document.getElementById('id_peralatan').value;;
    var option2_value='';
    var asosiasi_value=document.getElementById('email_bu').value;
var alamat_value=document.getElementById('alamat_bu').value;
    jQuery.ajax({
      url : base_url,
      type : "POST",
      data : {comment:comment_value,
              id_upload:id_upload_value,
              option1:option1_value,
              option2:option2_value,
              asosiasi:asosiasi_value,
alamat:alamat_value},
      success : function(data) {
        response = jQuery.parseJSON(data);
        console.log( JSON.parse(data));
        toastr["success"]("Permintaan Perbaikan Data", "Berhasil Direkap");
      },
      error: function(xhr, status, error) {
        var err = eval("(" + xhr.responseText + ")");
        alert(err.Message);
      }
    });
  }

  function get90(){
    var comment_value=document.getElementById('comment_90').value;
    var base_url=document.getElementById('base_url').value;
    var id_upload_value=90;
    var option1_value=document.getElementById('klasifikasi_reg').value;
    var option2_value='';
    var asosiasi_value=document.getElementById('email_bu').value;
var alamat_value=document.getElementById('alamat_bu').value;
    jQuery.ajax({
      url : base_url,
      type : "POST",
      data : {comment:comment_value,
              id_upload:id_upload_value,
              option1:option1_value,
              option2:option2_value,
              asosiasi:asosiasi_value,
alamat:alamat_value},
      success : function(data) {
        response = jQuery.parseJSON(data);
        console.log( JSON.parse(data));
        toastr["success"]("Permintaan Perbaikan Data", "Berhasil Direkap");
      },
      error: function(xhr, status, error) {
        var err = eval("(" + xhr.responseText + ")");
        alert(err.Message);
      }
    });
  }
