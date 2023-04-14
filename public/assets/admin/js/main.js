// $(document).ready(function() {
//
//     //-- Select2
//     $(".select2").select2({
//         theme: "bootstrap-5",
//     });
// }); // endof document.ready

/*======================================= Block UI ========================================================*/
var is_dt_search = false;

const issues_array = [];   // initializing of array for saving issues
$(document).ready(function() {

    $.blockUI.defaults.message =  '<div class="spinner-border block-spinner text-primary" style="color:#ac0fff !important;" role="status">'
                    +'</div>';
    $.blockUI.defaults.css.border = 'none' ;
    $.blockUI.defaults.css.backgroundColor = 'transparent' ;
    $.blockUI.defaults.overlayCSS.backgroundColor = 'rgba(232, 232, 232, 0.47)';
    $.blockUI.defaults.overlayCSS.opacity = '1';

    var is_mobile = $(window).width() < 767;

   // datatable globally searching should initiate at least with 3 characters
    $(document).on('draw.dt','#data-table', function() {
        var oldInpVal = $(".dataTables_filter input").val();
        $(".dataTables_filter input").unbind().bind("keyup", function(e) {
            // if Jobs page datatable then search perform on search button clicked
            if($('.table-responsive').hasClass('dt-custom-search')){
                // If press enter then perform search
                if(e.keyCode == 13 ){
                    var dataTable = $('#data-table').DataTable();
                    dataTable.search(this.value).draw();
                }
            }
            else{
                var newInputVal = this.value;

                // if datatable other than job page table
                if(oldInpVal != newInputVal){
                    oldInpVal = newInputVal;
                    is_dt_search = true;
                    var dataTable = $('#data-table').DataTable();
                    dataTable.search(this.value).draw();
                    $.unblockUI();
                }
            }

        });
    });

    $(document).on('preXhr.dt', '#data-table', function ( e, settings, data ) {
        var dataTable = $('#data-table').DataTable()
        var settings = dataTable.settings();
        if (settings[0].jqXHR) {
            settings[0].jqXHR.abort();
        }
    } )

    // On search button click call datatable search (implemented on job datatable)
    $('body').on('click', '.btn-dt-search', function() {
        var dataTable = $('#data-table').DataTable();
        dataTable.search($(".dataTables_filter input").val()).draw();
    })

    // check if current url in not valid filter url then clear dataTable local storage value
    //that holds state information (Inspection qa listing)
    url = location.protocol + '//' + location.host + location.pathname;
    valid_filter_urls = ['/inspections/qa', '/inspections/inspection-test-sheet/'];
    is_filter_url = false;
    const contains = valid_filter_urls.some(element => {
        if (url.includes(element)) {
            is_filter_url = true;
        }
    });
    if(!is_filter_url || localStorage.getItem('prev_url') == url){
        localStorage.removeItem('DataTables_data-table_/inspections/qa');
    }
    localStorage.setItem('prev_url', url);
});
/*==== Ends =================================== Block UI ========================================================*/

/*======================================= HighCharts Cnfiguration  ========================================*/
window.highChartConfig = {
    chart: {
        type: 'column'
    },
    title: {
        text: '',
    },
    subtitle: {
        text: '',
    },
    credits: {
        enabled: false
    },
    legend: {
        enabled: true
    },
    exporting: {
        enabled: false
    }
};
/*======================================= HighCharts Cnfiguration Ends========================================*/

jQuery.validator.addMethod("w3w", function(value, element) {
    var w3w_re = /^\/\/\/[a-z]+\.[a-z]+\.[a-z]+$/gm
    return this.optional( element ) || w3w_re.test(value);
  }, "Enter valid What 3 words e.g. ///word.word.word");


$('#data-table').on('processing.dt', function (e, settings, processing) {
    if(!is_dt_search){
        if (processing) {
            $.blockUI();
        } else {
            $.unblockUI();
        }
    }
});

// main class
var Main = function () {

    return {
        //---- Following function will decide if provided parameter is empty or not (same like php's empty)
        empty: function (mixed_var) {
            var undef, key, i, len;
            var emptyValues = [undef, undefined, 'undefined', null, false, 0, '', '0'];

            for(i = 0, len = emptyValues.length; i < len; i++){
                if (mixed_var === emptyValues[i]) {
                    return true;
                }
            }

            if(typeof mixed_var === 'object'){
                for (key in mixed_var) {
                    return false;
                }
                return true;
            }

            return false;
        },
        //---- Will format number value (just like php's number_format)
		number_format: function(number, decimals, dec_point, thousands_sep){
			number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
			var n = !isFinite(+number) ? 0 : +number,
				prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
				sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
				dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
				s = '',
				toFixedFix = function(n, prec) {
					var k = Math.pow(10, prec)
					return '' + (Math.round(n * k) / k).toFixed(prec)
				}

			// Fix for IE parseFloat(0.55).toFixed(0) = 0;
			s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
			if (s[0].length > 3) {
				s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
			}

			if((s[1] || '').length < prec) {
				s[1] = s[1] || '';
				s[1] += new Array(prec - s[1].length + 1).join('0');
			}

			return s.join(dec);
		},

        datatable_search: function (search){
            var search = JSON.parse(search);
            if(search != '') {
                var i = 0;
                $(document).on('draw.dt', function() {
                    var dataTable = $('#data-table').DataTable();
                    if(i==0){
                        i++;
                        dataTable.search(search).draw();
                    }
                });
            }
        },
        // on select address get coord detail
        getCoordDetailByAddrId : function (address_id) {
            $("#"+address_id).on('change',function(){
                if($('#select_coord_type option:selected').val() == "0") {
                    var id=$(this).val();
                    var base_url = window.location.origin;
                    $.ajax({
                        url: base_url+'/address/address-data/'+id,
                        type: 'GET',
                        dataType: 'json',
                        contentType: 'application/json; charset=utf-8',
                        success: function (res) {
                            if (res.success === 1) {
                                var coodType = res.data.selected_coord_type_addr;
                                if(coodType != "") {
                                    $('#select_coord_type').val(coodType).change();
                                    function changeValue(coodType) {
                                        if (coodType == 'w3w') {
                                            $("#what_three_words_location").val(res.data.what_three_words_location_addr).change();
                                        } else if (coodType == 'lat_long') {
                                            $("#latitude").val(res.data.latitude_addr).change();
                                            $("#longitude").val(res.data.longitude_addr).change();
                                        } else if (coodType == 'east_north') {
                                            $("#easting").val(res.data.easting_addr).change();
                                            $("#northing").val(res.data.northing_addr).change();
                                        }else {
                                            $('#select_coord_type').val("0").change();
                                        }
                                    }
                                    setTimeout(changeValue(coodType), 1000)
                                }else {
                                    $('#select_coord_type').val("0").change();
                                }
                                $.unblockUI();
                            }
                        },
                        error: function (error) {
                            $('#select_coord_type').val("0").change();
                            $.unblockUI();
                        }
                    });

                }
            });
        },
        notification: function(ele, notification_class, message){
            var msg = '<div class="alert alert-' + notification_class +' alert-dismissible fade show" role="alert">' + message + '\
                         <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">\
                           <span aria-hidden="true">&times;</span>\
                         </button>\
                       </div>';

            ele.html(msg);
        }
    }

}();

var arr = [];
function getRndInteger() {
    var number;
    while(true){
        r = Math.floor(Math.random() * 999999) + 1;
        if(arr.indexOf(r) === -1){
            // console.log(r);
            arr.push(r);
            number = r;
            break;
        }
    }
    return number;
}
