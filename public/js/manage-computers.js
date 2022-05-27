/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!******************************************!*\
  !*** ./resources/js/manage-computers.js ***!
  \******************************************/
window.deletePC = function (pcID) {
  var baseUrl = window.location.href;
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $.ajax({
    type: 'Delete',
    url: baseUrl + '/delete/' + pcID,
    success: function success(msg) {
      console.log(msg);
      location.reload();
    },
    error: function error(xhr, status, _error) {
      alert(xhr);
    }
  });
};

window.editPC = function (pcNo) {
  var pcName = document.getElementById("name-pc-" + pcNo).textContent.trim();
  var deviceType = document.getElementById("type-pc-" + pcNo).textContent.trim();
  var brand = document.getElementById("brand-pc-" + pcNo).textContent.trim();
  var picture = document.getElementById("pic-pc-" + pcNo).src.trim();
  var os = document.getElementById("os-pc-" + pcNo).textContent.trim();
  var DISPsize = document.getElementById("disp-size-pc-" + pcNo).textContent.trim();
  var RAM = document.getElementById("ram-pc-" + pcNo).textContent.trim();
  var USBportNum = document.getElementById("usb-port-num-pc-" + pcNo).textContent.trim();
  var HDMIportNum = document.getElementById("hdmi-port-num-pc-" + pcNo).textContent.trim();
  var rent = document.getElementById("rent-pc-" + pcNo).textContent.trim();
  var stocks = document.getElementById("stocks-pc-" + pcNo).textContent.trim();
  var pcNameModal = document.getElementById("name-pc-modal");
  pcNameModal.value = pcName;
  var deviceTypeModal = document.getElementById("type-pc-modal");
  deviceTypeModal.value = deviceType;
  var brandModal = document.getElementById("brand-pc-modal");
  brandModal.value = brand;
  var pictureModal = document.getElementById("pic-pc-modal");
  pictureModal.value = picture;
  var osModal = document.getElementById("os-pc-modal");
  osModal.value = os;
  var DISPsizeModal = document.getElementById("disp-size-pc-modal");
  DISPsizeModal.value = DISPsize;
  var RAMmodal = document.getElementById("ram-pc-modal");
  RAMmodal.value = RAM;
  var USBportNumModal = document.getElementById("usb-port-num-pc-modal");
  USBportNumModal.value = USBportNum;
  var HDMIportNumModal = document.getElementById("hdmi-port-num-pc-modal");
  HDMIportNumModal.value = HDMIportNum;
  var rentModal = document.getElementById("rent-pc-modal");
  rentModal.value = rent;
  var stocksModal = document.getElementById("stocks-pc-modal");
  stocksModal.value = stocks;
  var baseUrl = window.location.href;
  var formModal = document.getElementById("form-edit-computer");
  var pcID = document.getElementById("id-pc-" + pcNo).value;
  formModal.action = baseUrl + '/edit/' + pcID;
};
/******/ })()
;