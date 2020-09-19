$(document).ready (function() {
  $('.slider').slick ({
  slidesToShow: 1,
  dots: true,
  arrows: false,
  // autoplay: true,
	autoplaySpeed: 2000,
  });
});

let downloadButton = document.querySelectorAll('.downloadbtn');

downloadButton.forEach(function(downloadButton) {
	downloadButton.addEventListener('click',function(e) { 
    e.preventDefault();
    let imageSrc = [];
    let images = this.parentElement.previousElementSibling.querySelectorAll('img');
    images.forEach(function(image) {
      imageSrc.push(image.src);
    });
    sendData('downloadzip.php',JSON.stringify(imageSrc));
	});
});


let sendData = function(pageUrl,imageArray) {
  $.post(pageUrl, {
    data: imageArray,
    dataType: "json"
  }, function(response) {
    console.log(response);
    window.location = response;
  });
}