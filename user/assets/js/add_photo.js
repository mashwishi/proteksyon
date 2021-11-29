//front card
function frontreadURL(finput) {
  if (finput.files && finput.files[0]) {

    var freader = new FileReader();

    freader.onload = function(e) {
      $('.frontimage-upload-wrap').hide();

      $('.frontfile-upload-image').attr('src', e.target.result);
      $('.frontfile-upload-content').show();
      // <span class="image-title">Uploaded Image</span>
      //$('.image-title').html(input.files[0].name);
    };

    freader.readAsDataURL(finput.files[0]);

  } else {
    frontremoveUpload();
  }


}

function frontremoveUpload() {
  $('.frontfile-upload-input').replaceWith($('.frontfile-upload-input').clone());
  $('.frontfile-upload-content').hide();
  $('.frontimage-upload-wrap').show();
}
$('.frontimage-upload-wrap').bind('frontdragover', function () {
        $('.frontimage-upload-wrap').addClass('frontimage-dropping');
    });
    $('.frontimage-upload-wrap').bind('frontdragleave', function () {
        $('.frontimage-upload-wrap').removeClass('frontimage-dropping');
});

//back card
function backreadURL(binput) {
if (binput.files && binput.files[0]) {

  var breader = new FileReader();

  breader.onload = function(e) {
    $('.backimage-upload-wrap').hide();

    $('.backfile-upload-image').attr('src', e.target.result);
    $('.backfile-upload-content').show();
    // <span class="image-title">Uploaded Image</span>
    //$('.image-title').html(input.files[0].name);
  };

  breader.readAsDataURL(binput.files[0]);

} else {
  removeUpload();
}
}

function backremoveUpload() {
$('.backfile-upload-input').replaceWith($('.backfile-upload-input').clone());
$('.backfile-upload-content').hide();
$('.backimage-upload-wrap').show();
}
$('.backimage-upload-wrap').bind('backdragover', function () {
      $('.backimage-upload-wrap').addClass('backimage-dropping');
  });
  $('.backimage-upload-wrap').bind('backdragleave', function () {
      $('.backimage-upload-wrap').removeClass('backimage-dropping');
});

//avatar
function readURL(input) {
if (input.files && input.files[0]) {

  var areader = new FileReader();

  areader.onload = function(e) {
    $('.image-upload-wrap').hide();

    $('.file-upload-image').attr('src', e.target.result);
    $('.file-upload-content').show();
    // <span class="image-title">Uploaded Image</span>
    //$('.image-title').html(input.files[0].name);
  };

  areader.readAsDataURL(input.files[0]);

} else {
  removeUpload();
}
}

function removeUpload() {
$('.file-upload-input').replaceWith($('.file-upload-input').clone());
$('.file-upload-content').hide();
$('.image-upload-wrap').show();
}
$('.image-upload-wrap').bind('dragover', function () {
      $('.image-upload-wrap').addClass('image-dropping');
  });
  $('.image-upload-wrap').bind('dragleave', function () {
      $('.image-upload-wrap').removeClass('image-dropping');
});

function checkFront(){
  var front_card = document.getElementById("front_card");
    if(front_card.value == null || front_card.value == ''){
        document.getElementById("nextBtn").disabled = false;
        return true;
    }else{
        document.getElementById("nextBtn").disabled = true;
        return false;
    }  
}