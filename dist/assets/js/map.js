var map_json, gmap, item = "", tel, map_txt;
var currentWindow = null;
var maplist = new Array();
var cnt = 0;
// var ie = is_ie();
var zoom_num = 0;
var latlng;

function setListView(search){

  // console.log("setListView search:"+search);
  $('.js-map-list').empty();
  var item = "";

  // 地域ごとに分類する
  const grouped = {};
  map_json.forEach(item => {
    if (!grouped[item.area]) {
      grouped[item.area] = [];
    }
    grouped[item.area].push(item);
  });
  console.log(grouped);

  const output = document.getElementById('map-list');

  for (const area in grouped) {
    var list = "";
    grouped[area].forEach(shop => {
      
      tel = shop.tel;
      tel = tel.replace(/-/g, '');
      map_txt = encodeURI('神奈川県+'+shop.adr +' '+shop.name);
      zai_class = '';
      ttl_icon = '';
      url_id = shop.tel.replace(/-/g, '');
      member = Number(shop.member);

      if(search === "holiday" && shop.holiday != 1){
        return true;
      }
      if(search === "saigai" && shop.saigai != 1){
        return true;
      }
      if(search === "zaitaku1" && shop.zaitaku1 != 1){
        return true;
      }
      if(search === "zaitaku2" && shop.zaitaku2 != 1){
        return true;
      }

      label = (shop.member != 1) ? '' : '<div class="p-block-search__list__label">会員</div>';
      // console.log(shop.name+" = "+shop.member);
      // console.log(shop.member != 1);
      // console.log(member);
      // console.log("----");

      list += '<div class="p-block-search__list__item" id="'+url_id+'" data-member="'+member+'">';
      list += '<div class="p-block-search__list__header">';
      list += '<div class="p-block-search__list__name">'+shop.name+label+'</div>';
      list += '</div>';
      list += '<div class="p-block-search__list__cont">';
      list += '<div class="p-block-search__list__title">住所</div>';
      list += '<div class="p-block-search__list__data p-block-search__list__data--adr">';
      list += '<a href="https://www.google.com/maps/search/?api=1&query='+map_txt+'" target="_blank" class="p-block-search__list__map-link">';
      list += '〒'+shop.zip+' '+shop.adr;
      // list += '<img src="/common/images/ico_gmap.svg" alt="" class="p-block-search__list__map-icon" />';
      list += '</a>';
      list += '</div>';
      list += '<div class="p-block-search__list__title">電話番号</div>';
      if (shop.tel2 === "" || shop.tel === shop.tel2) {
        list += '<div class="p-block-search__list__data"><a href="tel:'+tel_link(shop.tel)+'">'+shop.tel+'</a></div>';
      } else {
        list += '<div class="p-block-search__list__data"><a href="tel:'+tel_link(shop.tel)+'">'+shop.tel+'</a>　<a href="tel:'+tel_link(shop.tel2)+'">'+shop.tel2+'</a>（時間外）</div>';
      }
      if (shop.fax) {
        list += '<div class="p-block-search__list__title">FAX</div>';
        list += '<div class="p-block-search__list__data">'+shop.fax+'</div>';
      } 
      if (shop.open) {
        list += '<div class="p-block-search__list__title">開局時間</div>';
        list += '<div class="p-block-search__list__data">'+shop.open+'</div>';
      } 
      if (shop.teikyuu) {
        list += '<div class="p-block-search__list__title">定休日</div>';
        list += '<div class="p-block-search__list__data">'+shop.teikyuu+'</div>';
      } 
      list += '</div>';
      list += '</div>';
    });

    if (list != "") {
      item += '<h2 class="p-block-search__list__area">' + area + '</h2>'+list;
    }
  }
  if (!item) {
    item = '<p class="mt30 txtCenter fb">該当無し</p>';
  }
  $('.js-map-list').append(item);
  


  // $(map_json).each(function () {

  //   tel = this.tel;
  //   tel = tel.replace(/-/g, '');
  //   map_txt = encodeURI('神奈川県+'+this.adr +' '+this.name);
  //   zai_class = '';
  //   ttl_icon = '';
  //   url_id = this.tel.replace(/-/g, '');

  //   // if (this.zai == 1) {
  //   //   // zai_class += 'p-map__ttl__in--zai'
  //   //   ttl_icon += '<img class="p-map__ttl__icon" src="/assets/img/map/zai.svg" />'
      
  //   // }
  //   // if (this.cov == 1) {
  //   //   // zai_class += ' p-map__ttl__in--cov'
  //   //   ttl_icon += '<img class="p-map__ttl__icon" src="/assets/img/map/cov.svg" />'
  //   // }
  //   // if (search === "zai" && this.zai != 1) {
  //   //   return true;
  //   // }
  //   // if(search === "cov" && this.cov != 1){
  //   //   return true;
  //   // }
  //   // if(search === "bichiku" && this.bichiku != 1){
  //   //   return true;
  //   // }
  //   if(search === "holiday" && this.holiday != 1){
  //     return true;
  //   }
  //   if(search === "saigai" && this.saigai != 1){
  //     return true;
  //   }
  //   if(search === "zaitaku1" && this.zaitaku1 != 1){
  //     return true;
  //   }
  //   if(search === "zaitaku2" && this.zaitaku2 != 1){
  //     return true;
  //   }

  //   label = (this.member == 1) ? '<div class="p-block-search__list__label">会員</div>' : '';


  //   item += '<div class="p-block-search__list__item" id="'+url_id+'">';
  //   item += '<div class="p-block-search__list__header">';
  //   item += '<div class="p-block-search__list__name">'+this.name+label+'</div>';
  //   item += '</div>';
  //   item += '<div class="p-block-search__list__cont">';
  //   item += '<div class="p-block-search__list__title">住所</div>';
  //   item += '<div class="p-block-search__list__data p-block-search__list__data--adr">';
  //   item += '<a href="https://www.google.com/maps/search/?api=1&query='+map_txt+'" target="_blank" class="p-block-search__list__map-link">';
  //   item += '〒'+this.zip+' '+this.adr;
  //   // item += '<img src="/common/images/ico_gmap.svg" alt="" class="p-block-search__list__map-icon" />';
  //   item += '</a>';
  //   item += '</div>';
  //   item += '<div class="p-block-search__list__title">電話番号</div>';
  //   if (this.tel === this.tel2) {
  //     item += '<div class="p-block-search__list__data"><a href="tel:"'+tel_link(this.tel)+'">'+this.tel+'</a></div>';
  //   } else {
  //     item += '<div class="p-block-search__list__data"><a href="tel:"'+tel_link(this.tel)+'">'+this.tel+'</a>　<a href="tel:"'+tel_link(this.tel2)+'">'+this.tel2+'</a>（時間外）</div>';
  //   }
  //   if (this.fax) {
  //     item += '<div class="p-block-search__list__title">FAX</div>';
  //     item += '<div class="p-block-search__list__data">'+this.fax+'</div>';
  //   } 
  //   if (this.open) {
  //     item += '<div class="p-block-search__list__title">開局時間</div>';
  //     item += '<div class="p-block-search__list__data">'+this.open+'</div>';
  //   } 
  //   if (this.teikyuu) {
  //     item += '<div class="p-block-search__list__title">定休日</div>';
  //     item += '<div class="p-block-search__list__data">'+this.teikyuu+'</div>';
  //   } 
  //   item += '</div>';
  //   item += '</div>';


  //   // item += '<dl class="p-map__item">';
  //   // if(this.url_id){
  //   //   item += '<dt class="p-map__ttl"><span class="p-map__ttl__in '+zai_class+'"><div class="p-map__link"><i class="p-map__link_label">'+this.name+'</i>'+ttl_icon+'</div></span></dt>';
  //   // }else{
  //   //   item += '<dt class="p-map__ttl"><span class="p-map__ttl__in '+zai_class+'">'+this.name+''+ttl_icon+'</span></dt>';
  //   // }
  //   // item += '<dd class="p-map__data p-map__data--adr"><a class="p-map__link u-link--gmap" href="https://www.google.com/maps/search/?api=1&query='+map_txt+'" target="_blank">'+this.adr+'</a></dd>';
  //   // item += '<dd class="p-map__data p-map__data--tel"><a class="p-map__link u-link--phone" href="tel:'+tel+'">'+this.tel+'</a></dd>';
  //   // item += '</dl>';

  // });
  // if (!item) {
  //   item = '<p class="mt30 txtCenter fb">該当無し</p>';
  // }
  // $('.js-map-list').append(item);
}

function setGMap(val, zoom_num, latlng) {
  // console.log("setGMap val:"+val);
  

  var setno = map_json.length;
  var title = new Array();
  var lat = new Array();
  var lng = new Array();
  var url_id = new Array();
  // var zai = new Array();
  // var cov = new Array();
  var lists = "";
  var cnt = 0, location;
  for (var i = 0; i < map_json.length; i++) {
    if (val === "zaitaku1" && map_json[i].zaitaku1 != 1) continue;
    if (val === "zaitaku2" && map_json[i].zaitaku2 != 1) continue;
    if (val === "saigai" && map_json[i].saigai != 1) continue;
    if (val === "holiday" && map_json[i].holiday != 1) continue;
    // console.log(map_json[i].name);
    location = map_json[i].location.split(/[,\s]+/);
    title[cnt] = map_json[i].name;
    lat[cnt] = location[0];
    lng[cnt] = location[1];
    url_id[cnt] = map_json[i].tel.replace(/-/g, '');
    // geocode(map_json[i].adr+" "+map_json[i].name, i, map_json[i].name);
    // zai[cnt] = map_json[i].zai;
    // cov[cnt] = map_json[i].cov;
    cnt++;
  }
  // console.log("setGMap cnt:"+cnt);
  // console.log("setGMap title:"+title);
  initialize(cnt,title,lat,lng,url_id,zoom_num,latlng,val);
}


function initialize(setno,title,lat,lng,url_id,zoom_num,latlng,type) {

  var target = document.getElementById('gmap');
  var empire;
  var zoom = 0;

  if (latlng) {
    empire = latlng;
  } else {
    empire = {lat: 35.4600583, lng: 139.4545112};
  }
  if (zoom_num) {
    zoom = zoom_num;
  } else {
    zoom = 13;
  }

  gmap = new google.maps.Map(target, {
    center: empire,
    zoom: zoom,
    styles: [
      //全てのラベルを非表示
      {
        featureType: 'poi.business',
        elementType: 'labels',
        stylers: [
          {visibility: 'off'},
        ],
      },
      {
        featureType: 'poi.medical',
        elementType: 'labels',
        stylers: [
          {visibility: 'off'},
        ],
      },
      {
        featureType: 'poi.place_of_worship',
        elementType: 'labels',
        stylers: [
          {visibility: 'off'},
        ],
      },
    ]
  });

  var template = [
    '<svg xmlns="http://www.w3.org/2000/svg" width="22" height="33" viewBox="0 0 22 33">',
      '<path d="M11,0C5.228,0,0,4.679,0,10.453S4.77,23.117,11,33c6.23-9.883,11-16.775,11-22.547S16.774,0,11,0Z" fill="{{ color1 }}"/>',
      '<circle cx="11" cy="10.825" r="4" fill="{{ color2 }}" />',
      '</svg>'].join('\n');
  var svg = template.replace('{{ color1 }}','#46525e').replace('{{ color2 }}', '#ffffff');
  var svg_zai = template.replace('{{ color1 }}','#910B1A').replace('{{ color2 }}', '#ffffff');
  var svg_cov = template.replace('{{ color1 }}','#E5910C').replace('{{ color2 }}', '#ffffff');
  var icon = {
    url: 'data:image/svg+xml;charset=UTF-8;base64,' + btoa(svg)
  };

  for (var i = 0; i < setno; i++) {
    var name;
    var p_class = 'p-map__iw_link';
    if (url_id[i]) { 
      name = '<a class="' + p_class + '" href="/search/#'+url_id[i]+'">'+title[i]+'</a>';
    } else {
      name = '<span class="'+p_class+' is-link_none">'+title[i]+'</span>';
    }
    var latlng = new google.maps.LatLng(lat[i],lng[i]);
    createMarker(name,latlng,icon,gmap);
  }

  google.maps.event.addListener(gmap, 'zoom_changed', function () {
    dispLevel(gmap.getZoom());
  });
}

function dispLevel(level) {
  zoom_num = level;
}


function createMarker(name,latlng,icon,gmap){
  // console.log("createMarker name:"+name);

  var infoWindow = new google.maps.InfoWindow();
  var marker = new google.maps.Marker({position:latlng, icon:icon, map:gmap});
  // if(ie){
  //   marker = new google.maps.Marker({position:latlng, map:gmap});
  // }else{
  //   marker = new google.maps.Marker({position:latlng, icon:icon, map:gmap});
  // }

  google.maps.event.addListener(marker, 'click', function() {
    if (currentWindow) {
      currentWindow.close();
    }
    infoWindow.setContent(name);
    infoWindow.open(gmap,marker);
    currentWindow = infoWindow;
  });
  maplist[cnt++] = marker;
}


function initMap() {
  if (!json_file) {
    console.log("error! json file : "+json_file);
    return;
  }

  $.ajax({
    type: "GET",
    url: json_file,
    async: false,
    dataType:'json',
    success: function(data){
      map_json = data;
      setListView("");
      setGMap("", zoom_num);
    }
  });
}

function geocode(place, num, name) {
  const geocoder = new window.google.maps.Geocoder();
  geocoder.geocode({ address: place }, (results, status) => {
    if (status === 'OK') {
      // console.log(results.length);
      if (results.length > 1) {
        $('.js-locations').append('<div>' + num + ", " + name + ", " + results[0].geometry.location.lat() + ' ' + results[0].geometry.location.lng()+ "," + results[1].geometry.location.lat() + ' ' + results[1].geometry.location.lng() + '</div>');
      } else {
        $('.js-locations').append('<div>' + num + ", " + name + ", " + results[0].geometry.location.lat() + ' ' + results[0].geometry.location.lng() + '</div>');
        
      }
      // console.log(results[0].geometry.location.lat()),
      // console.log(results[0].geometry.location.lng());
    }
  });
}

function tel_link(tel) {
  return tel.replace(/-/g,"");
}


$(function(){
  // var $btn = $('.js-search__btn');
  // $btn.click(function(){
  //   $this = $(this);
  //   zainum = $this.data('zai');

  //   if ($this.hasClass('p-map__search__btn--is-check')) {
  //     $this.removeClass('p-map__search__btn--is-check');
  //     setListView(0);
  //   }else{
  //     $btn.removeClass('p-map__search__btn--is-check');
  //     $this.addClass('p-map__search__btn--is-check');
  //     setListView(zainum);
  //   }
  // });
  var $select = $('.js-serch-select');
  $select.on("click",function(){
    $this = $(this);
    $select.removeClass("is-current");
    $this.addClass("is-current");
    // $select.parent().removeClass("is-current");
    // $this.parent().addClass("is-current");
    val = $this.data("select");
    // $select.val(val);
    // console.log(val);
    latlng = gmap.getCenter();
    setGMap(val, zoom_num, latlng);
    setListView(val);
    // $("html,body").animate({scrollTop:$('#contents').offset().top});
    // setListView(0);
  });
});
