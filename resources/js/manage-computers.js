window.deletePC = function (pcID) {
    let baseUrl = window.location.href;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type:'Delete',
        url: baseUrl + '/' + pcID,
        success:function(msg) {
            console.log(msg);
            location.reload();
        },

        error: function(msg){
            console.log(msg);
            location.reload();
        }
    });
}

window.editPC = function(pcNo) {
    let pcName = document.getElementById("name-pc-" + pcNo).textContent.trim();
    let deviceType = document.getElementById("type-pc-" + pcNo).textContent.trim();
    let brand = document.getElementById("brand-pc-" + pcNo).textContent.trim();
    let picture = document.getElementById("pic-pc-" + pcNo).src.trim();
    let os = document.getElementById("os-pc-" + pcNo).textContent.trim();
    let DISPsize = document.getElementById("disp-size-pc-" + pcNo).textContent.trim();
    let RAM = document.getElementById("ram-pc-" + pcNo).textContent.trim();
    let USBportNum = document.getElementById("usb-port-num-pc-" + pcNo).textContent.trim();
    let HDMIportNum = document.getElementById("hdmi-port-num-pc-" + pcNo).textContent.trim();
    let rent = document.getElementById("rent-pc-" + pcNo).textContent.trim();
    let stocks = document.getElementById("stocks-pc-" + pcNo).textContent.trim();

    let pcNameModal = document.getElementById("name-pc-modal");
    pcNameModal.value = pcName;
    let deviceTypeModal = document.getElementById("type-pc-modal");
    deviceTypeModal.value = deviceType;
    let brandModal = document.getElementById("brand-pc-modal");
    brandModal.value = brand;
    let pictureModal = document.getElementById("pic-pc-modal");
    pictureModal.value = picture;
    let osModal = document.getElementById("os-pc-modal");
    osModal.value = os;
    let DISPsizeModal = document.getElementById("disp-size-pc-modal");
    DISPsizeModal.value = DISPsize;
    let RAMmodal = document.getElementById("ram-pc-modal");
    RAMmodal.value = RAM;
    let USBportNumModal = document.getElementById("usb-port-num-pc-modal");
    USBportNumModal.value = USBportNum;
    let HDMIportNumModal = document.getElementById("hdmi-port-num-pc-modal");
    HDMIportNumModal.value = HDMIportNum;
    let rentModal = document.getElementById("rent-pc-modal");
    rentModal.value = rent;
    let stocksModal = document.getElementById("stocks-pc-modal");
    stocksModal.value = stocks;

    let baseUrl = window.location.href;
    let formModal = document.getElementById("form-edit-computer");
    let pcID = document.getElementById("id-pc-" + pcNo).value
    formModal.action = baseUrl + '/edit/' + pcID;
}
