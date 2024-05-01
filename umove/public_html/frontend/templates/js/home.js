$(function () {
    //$('#room').selectBox('multiple');
    var myImages = ["about.jpg"]; 
    var newImgNumber = Math.floor(Math.random() * myImages.length);
    $('.sub-banner').css({
        'background':'rgba(0, 0, 0, 0.04) url(/img/'+myImages[newImgNumber]+') top left repeat',
        'background-size': 'cover',
        'height': '290px',
        'background-position': 'center center',
        'background-repeat': 'no-repeat',
        'position': 'relative',
        'background-color': 'rgba(36, 42, 53, 0.7)'
    }); 
    $('#text_search').keypress(function (e) {
        if (e.keyCode == 13) {
            e.preventDefault();
            var text = $('#text_search').val();
            if(text != null && text != '' ){
                location.href = '/find?word='+text;
            }else{
                return false;
            }
        }
        
    })
});
function search_home(){
    event.preventDefault();
    var form = $("#search_home_form").serialize();
    var val = form.split('&');
    var sonuc = [];
    for(var i=0;i<val.length;i++){
        var data = val[i].split('=');
        if(data[1] != ''){
            if(data[0] == 'm2'){
                var valueArray = data[1].split("%3B");
                sonuc.push('min_m2='+valueArray[0].replace('.','')+'&m2='+valueArray[1].replace('.',''));
            }else if(data[0] == 'min_price' || data[0] == 'max_price'){
                sonuc.push(data[0]+'='+data[1].replace(',',''));
                //if(data[0] == 'max_price') sonuc.push('price_unit=TL');
            }else{
                sonuc.push(data[0]+'='+data[1]);
            }
        }
    }
    //var data = form.replace(/[^&]+=\.?(?:&|$)/g, ''); 
    var data = sonuc.join('&');
    location.href = '/find?'+data;
}
function searchText(){
    event.preventDefault();
    var text = $('#text_search').val();
    if(text != null && text != '' ){
        location.href = '/find?word='+text;
    }else{
        return false;
    }
}
function search_listing(event){
    event.preventDefault();
    var form = $("#search_listing_form").serialize();
    //var data = form.replace(/[^&]+=\.?(?:&|$)/g, '');
    var val = form.split('&');
    var sonuc = [];
    for(var i=0;i<val.length;i++){
        var data = val[i].split('=');
        if(data[1] != ''){
            if(data[0] == 'm2'){
                var valueArray = data[1].split("%3B");
                sonuc.push('min_m2='+valueArray[0].replace('.','')+'&max_m2='+valueArray[1].replace('.',''));
            }else if(data[0] == 'min_price' || data[0] == 'max_price'){
                sonuc.push(data[0]+'='+data[1].replace(',',''));
                //if(data[0] == 'max_price') sonuc.push('price_unit=TL');
            }else{
                sonuc.push(data[0]+'='+data[1]);
            }
        }
    }
    //var data = form.replace(/[^&]+=\.?(?:&|$)/g, ''); 
    var data = sonuc.join('&');
    var path = location.origin+location.pathname;
    var list = '';
    if(location.search.includes('list=')){
        list = '&list=grid';
    }
    location.href = path+'?'+data+list;
}
function handleIl(id) {
    $.ajax({
		beforeSend:function(){
            $('#ilce_id').attr('disabled',true);
            $('#ilce_id').html('<option value="">İlçe</option>');
            $('#ilce_id').selectBox('refresh');
            $('#ilce_id').selectBox('disable');
            $('#semt_id').attr('disabled',true);
            $('#semt_id').html('<option value="">Semt</option>');
            $('#semt_id').selectBox('refresh');
            $('#semt_id').selectBox('disable');
        },
        complete:function(){
            $('#ilce_id').attr('disabled',false);
        }
		,type:"GET",url:'/ilce/'+id
		,cache:false
		,success:function(response){
            ilceler = response.ilce;
            var ilceOptions = ilceler.map(ilce => 
                '<option value="'+ilce.id+'">'+ilce.ad+'</option>'
            );
            $('#ilce_id').append(ilceOptions);
            $('#ilce_id').selectBox('refresh');
            $('#ilce_id').selectBox('enable');
        }
	});
}
function handleIlce(id) {
    $.ajax({
		beforeSend:function(){
            $('#semt_id').attr('disabled',true);
            $('#semt_id').html('<option value="">Semt</option>');
            $('#semt_id').selectBox('refresh');
            $('#semt_id').selectBox('disable');
        },
        complete:function(){
            $('#semt_id').attr('disabled',false);
        }
		,type:"GET",url:'/semt/'+id
		,cache:false
		,success:function(response){
            semtler = response.semt;
            var semtOptions = semtler.map(semt => 
                '<option value="'+semt.id+'">'+semt.ad+'</option>'
            );
            $('#semt_id').append(semtOptions);
            $('#semt_id').selectBox('refresh');
            $('#semt_id').selectBox('enable');
        }
	});
}
function sortOrder(value){
    var path = location.origin+location.pathname;
    var filter = location.search;
    if(filter != ''){
        var filter_array =  filter.slice(1).split('&'); 
        var sort_data = filter_array.filter(data => data.includes('sort='));
        filter = '?'+arr_diff(filter_array, sort_data).join('&')
        if(value != ''){
            filter = filter+'&sort='+value;
        }
    }else{
        if(value != ''){
            filter = '?sort='+value;
        }
    }
    location.href = path+filter;    
}
function arr_diff (a1, a2) {

    var a = [], diff = [];

    for (var i = 0; i < a1.length; i++) {
        a[a1[i]] = true;
    }

    for (var i = 0; i < a2.length; i++) {
        if (a[a2[i]]) {
            delete a[a2[i]];
        } else {
            a[a2[i]] = true;
        }
    }

    for (var k in a) {
        diff.push(k);
    }

    return diff;
}
function listingType(_this,type){
    var path = location.origin+location.pathname;
    var filter = location.search;
    if(filter != ''){
        var filter_array =  filter.slice(1).split('&'); 
        var grid_data = filter_array.filter(data => data.includes('list='));
        filter = '?'+arr_diff(filter_array, grid_data).join('&');
        if(type == 'grid')
            filter = filter+'&list='+type;
    }else{
        if(type == 'grid')
            filter = '?list='+type;
    }
    $(_this).attr('href', path+filter);    
}


	