// JavaScript Document

function Binhtru(L, D, a, b, V) {

}

function BinhHop(a, b, c, V) {
	
}
// Bootstrap
$("input,select").addClass('form-control').css('height','30px');

$('.decimal').keypress(function (e) {
	var character = String.fromCharCode(e.keyCode);
	var newValue = this.value + character;
	if (isNaN(newValue) || hasDecimalPlace(newValue, 3)) {
		e.preventDefault();
		return false;
	}
	//if (e.keyCode === 32) return false;
    return !(e.keyCode === 32);
	//return true;
});

function hasDecimalPlace(value, x) {
	var pointIndex = value.indexOf('.');
	return pointIndex >= 0 && pointIndex < value.length - x;
}

function notempty(id) {
	var value = $(id).val();
	var len = value.length;
	if (len < 1) {
		return false;
	} else {
		return true;
	}
}

function chuyenDoiBinhHop() {
	var binhhop = new BinhHop();
	var hopdai = txtHopDaiTruDai.val();
	var hopcao = txtHopCaoTruCao.val();
	var hoprong = txtHopRongTruL.val();

	binhhop.V = hopdai * hoprong * hopcao / 1000;
	binhhop.c = hopdai * hoprong;

	var adcmin, adcmax;

	if (loaiPhaoDau.val() === 'FS8') {
		adcmin = txtAdcMin.val();
		adcmax = txtAdcMax.val();
		binhhop.a = (hopcao - 1) / (adcmax - adcmin);
		binhhop.b = binhhop.a * adcmin;
	} 
	else 
	{
		if (cboDoPhanGiai.val() === '6.0' || cboDoPhanGiai.val() === '10.0' || cboDoPhanGiai.val() === '13.8') {
			var dPG = cboDoPhanGiai.val() / 10;
			var doDaiPhao = txtHopCaoTruCao.val() - txtCachDayBinh.val();

			switch (loaiThietBi.val()) {
			case "3":
				adcmin = 0.03;
				break;
			case "1":
				adcmin = 0.03 * 1024 / 30;
				break;
			case "2":
				adcmin = 0.03 * 1024 / 6;
				break;
			default:
				adcmin = 0.03;
			}
			adcmax = (doDaiPhao / dPG + 1) * adcmin;
			binhhop.a = doDaiPhao / (adcmax - adcmin);
			binhhop.b = binhhop.a * adcmin;
			binhhop.c = hopdai * hoprong;
		} else {
			toastr.error('Vui lòng chọn độ phân giải của phao');
		}
	}
	return binhhop;
}

function lamTron(value){
	value = $.number(value,2);
	var x = value.split('.');
	var y=x[1];
	var result;

	if (y[1]==='0') {
		if (y[0]==='0') {
			result = x[0];
		}else{
			result = x[0]+'.'+y[0];
		};

	}else{
		result = value;
	};
	return result ;
}

function chuyenDoiBinhTru() {
	var btru = new Binhtru();
	btru.L = txtHopDaiTruDai.val();
	btru.D = txtHopCaoTruCao.val();
	btru.a = txtAdcMin.val();
	btru.b = txtAdcMax.val();
	btru.V = (Math.pow(btru.D / 2, 2) * Math.PI * btru.L / 1000);
	return btru;
}

function chuyenDoiBinh() {
	//$('input[type="text"]').val('');
	switch (loaiBinhDau.val()) {
		case "hop":
			var _binhHop = chuyenDoiBinhHop();
			txtHopaTruR.val(lamTron(_binhHop.a));
			txtHopbTrua.val(lamTron(_binhHop.b));
			txtHopcTrub.val(lamTron(_binhHop.c));
			txtTheTich.val(lamTron(_binhHop.V));
		break;
		case "tru":
			var _binhTru = chuyenDoiBinhTru();
			txtHopRongTruL.val(lamTron(_binhTru.L));
			txtHopaTruR.val(lamTron(_binhTru.D / 2));
			txtHopbTrua.val(lamTron(_binhTru.a));
			txtHopcTrub.val(lamTron(_binhTru.b));
			txtTheTich.val(lamTron(_binhTru.V));
		break;
        default:
            break;
	}
}

//Kiểm tra các trường dữ liệu cho từng loại phao
function dieuKienChoLoaiPhaoLaDung() {
	if (loaiPhaoDau.val() === 'FS8') {
		if (!notempty('#txtAdcMin')) {
			toastr.error('Bạn chưa nhập ngưỡng điện áp tối thiểu cho phao dầu FS8');
			return false;
		}
		if (!notempty('#txtAdcMax')) {
			toastr.error('Bạn chưa nhập ngưỡng điện áp tối đa cho phao dầu FS8');
			return false;
		}
	} else {
		if (!notempty('#cboDoPhanGiai')) {
			toastr.error('Bạn chưa chọn độ phân giải cho phao dầu FS7');
			return false;
		}
		if (!notempty('#txtCachDayBinh')) {
			toastr.error('Bạn chưa nhập khoảng cách từ cuối phao tới đáy bình cho phao dầu FS7');
			return false;
		}
	}
	return true;
}

var loaiBinhDau = $('#cboLoaiBinhDau');
var loaiThietBi = $('#cboLoaiThietBi');
var loaiPhaoDau = $('#cboLoaiPhaoDau');
var cboDoPhanGiai = $('#cboDoPhanGiai');
var txtCachDayBinh = $('#txtCachDayBinh');
var lblHopRongTruL = $('#lblHopRongTruL');
var lblHopaTruR = $('#lblHopaTruR');
var lblHopbTrua = $('#lblHopbTrua');
var lblHopcTrub = $('#lblHopcTrub');
var txtHopDaiTruDai = $('#txtHopDaiTruDai');
var txtHopCaoTruCao = $('#txtHopCaoTruCao');
var txtHopRongTruL = $('#txtHopRongTruL');
var txtTheTich = $("#txtTheTich");
var txtHopaTruR = $('#txtHopaTruR');
var txtHopbTrua = $('#txtHopbTrua');
var txtHopcTrub = $('#txtHopcTrub');
var txtVolMin = $('#txtVolMin');
var txtVolMax = $('#txtVolMax');
var txtAdcMin = $('#txtAdcMin');
var txtAdcMax = $('#txtAdcMax');

$(function() {
	toastr.options = {
		"closeButton": true,
		"debug": false,
		"positionClass": "toast-top-right",
		"onclick": null,
		"showDuration": "300",
		"hideDuration": "1000",
		"timeOut": "5000",
		"extendedTimeOut": "1000",
		"showEasing": "swing",
		"hideEasing": "linear",
		"showMethod": "fadeIn",
		"hideMethod": "fadeOut"
	};

	/* For zebra striping */
	$("table tr:nth-child(odd)").addClass("odd-row");
	/* For cell text alignment */
	$("table td:first-child, table th:first-child").addClass("first");
	/* For removing the last border */
	$("table td:last-child, table th:last-child").addClass("last");

	$("table td>p").css("width", "90px").css("color", "red");

	loaiBinhDau.change(function() {
		if (loaiBinhDau.val() === 'hop') {
			lblHopRongTruL.text("Rộng (cm):");
			lblHopaTruR.text("a:");
			lblHopbTrua.text("b:");
			lblHopcTrub.text("c:");
			txtHopRongTruL.prop('disabled', false);
		} else if (loaiBinhDau.val() === 'tru') {
			lblHopRongTruL.text("L:");
			lblHopaTruR.text("R:");
			lblHopbTrua.text("a:");
			lblHopcTrub.text("b:");
			txtHopRongTruL.prop('disabled', true);
		}
	});

	loaiThietBi.change(function() {
		var loaitb = loaiThietBi.val();

		switch (loaitb) {
		case "3":
			txtAdcMin.val(lamTron(txtVolMin.val()));
			txtAdcMax.val(lamTron(txtVolMax.val()));
			break;
		case "1":
			txtAdcMin.val(lamTron(txtVolMin.val() * 1024 / 30));
			txtAdcMax.val(lamTron(txtVolMax.val() * 1024 / 30));
			break;
		case "2":
			txtAdcMin.val(lamTron(txtVolMin.val() * 1024 / 6));
			txtAdcMax.val(lamTron(txtVolMax.val() * 1024 / 6));
			break;
        default:
            break;
		}
	});

	loaiPhaoDau.change(function() {
		var loaipd = loaiPhaoDau.val();

		if (loaipd == "FS8") {
			txtVolMin.prop("disabled", false);
			txtVolMax.prop("disabled", false);

			$('#cboDoPhanGiai').prop("disabled", true);
			$('#txtCachDayBinh').prop("disabled", true);
		} else {
			txtVolMin.prop("disabled", true);
			txtVolMax.prop("disabled", true);

			$('#cboDoPhanGiai').prop("disabled", false);
			$('#txtCachDayBinh').prop("disabled", false);
		}
	});
	txtVolMin.keyup(function () {
		var loaitb = loaiThietBi.val();
		switch (loaitb) {
		case "3":
			txtAdcMin.val(lamTron(txtVolMin.val()))			
			// txtAdcMin.val(lamTron(txtVolMin.val(), 2));
			break;
		case "1":
			txtAdcMin.val(lamTron(txtVolMin.val() * 1024 / 30));
			break;
		case "2":
			txtAdcMin.val(lamTron(txtVolMin.val() * 1024 / 6));
			break;
        default:
            break;
		}
	});
	txtVolMax.keyup(function() {
		var loaitb = loaiThietBi.val();
		switch (loaitb) {
			case "3":
				txtAdcMax.val(lamTron(txtVolMax.val()));
			break;
		case "1":
			txtAdcMax.val(lamTron(txtVolMax.val() * 1024 / 30));
			break;
		case "2":
			txtAdcMax.val(lamTron(txtVolMax.val() * 1024 / 6));
			break;
        default:
            break;
		}

	});

	$('#btnChuyenDoi').click(function() {

		if (loaiPhaoDau.val() === 'FS8') {
			if (!notempty('#txtVolMin')) {
				toastr.error('Bạn chưa nhập điện áp tối thiểu');
				return 0;
			}
			if (!notempty('#txtVolMax')) {
				toastr.error('Bạn chưa nhập điện áp tối đa');
				return 0;
			}
		}
		
		if (!notempty('#txtHopDaiTruDai')) {
			toastr.error('Bạn chưa nhập chiều dài bình');
			return 0;
		}
		if (!notempty('#txtHopCaoTruCao')) {
			toastr.error('Bạn chưa nhập chiều cao bình');
			return 0;
		}

		if (loaiBinhDau.val() === 'hop') {

			if (!notempty('#txtHopRongTruL')) {
				toastr.error('Bạn chưa nhập chiều rộng bình');
				return 0;
			}
		}

		

		if (dieuKienChoLoaiPhaoLaDung()) {
			try {
				chuyenDoiBinh();
				toastr.success('Chuyển đổi thành công');
			} catch (e) {
				toastr.error(e.message,'Chuyển đổi bị lỗi');
			}
		}
		return true;
	});
});

