function toggval(val,e) {
	if ( $("#"+e).val() == val ) $("#"+e).val('');
	else if ( $("#"+e).val() == '') $("#"+e).val(val);
	}
function showpass() {
	$("#pwd").hide();
	$("#reelpwd").show();
	$("#reelpwd").focus();
	}
function toggpass() {
	if( $("#reelpwd").val() == '' ) {
		$("#pwd").show();
		$("#reelpwd").hide()
		}
	}
function content(e) {
	$(".pane").hide();
	$(e).show();
	return false;
	}
$(document).ready(function(){
	$("#add_chicken").submit(function(){
		$.ajax({
			type: "POST",
			url: $(this).attr("action"),
			data: "chicken_name=" + $("#chickname").val(),
			success: function( msg ){
				if ( msg.substr(0,7) == 'Error::' ) {
					show_message( msg.substr(7), 'error' );
					}
				else if ( msg.substr(0,9) == 'Success::' ) {
					show_message( msg.substr(9) );
					}
				else {
					show_message( 'Something went wrong. Please try again.', 'error' );
					}
				},
			error: function(){
				show_message( 'Something went wrong. Please try again.', 'error' );
				}
			});
		return false;
		});
	$("#add_egg").submit(function(){
		$.ajax({
			type: "POST",
			url: $(this).attr("action"),
			data: "eggcount=" + $("#eggcount").val() + "&date=" + $("#date").val(),
			success: function( msg ){
				if ( msg.substr(0,7) == 'Error::' ) {
					show_message( msg.substr(7), 'error' );
					}
				else if ( msg.substr(0,9) == 'Success::' ) {
					show_message( msg.substr(9) );
					}
				else {
					show_message( 'Something went wrong. Please try again.', 'error' );
					}
				},
			error: function(){
				show_message( 'Something went wrong. Please try again.', 'error' );
				}
			});
		return false;
		});
});
function get_chickens() {
	$.ajax({
		type: "POST",
		url: "http://clucker.calculat.es/",
		data: "chickens=get",
		success: function( msg ){
			if ( msg.substr(0,7) == 'Error::' ) {
				show_message( msg.substr(7), 'error' );
				}
			else if ( msg.substr(0,9) == 'Success::' ) {
				$("#chicklist").html( msg.substr(9) );
				}
			else {
				show_message( 'Something went wrong. Please try again.', 'error' );
				}
			},
		error: function(){
			show_message( 'Something went wrong. Please try again.', 'error' );
			}
		});
	return false;
	}
function refresh_stats() {
	get_counts("day","today");
	get_counts("week","week");
	get_counts("month","month");
	get_counts("year","year");
	}
function get_counts(type,id) {
	$.ajax({
		type: "POST",
		url: "http://clucker.calculat.es/",
		data: "count=" + type,
		success: function( msg ){
			if ( msg.substr(0,7) == 'Error::' ) {
				show_message( msg.substr(7), 'error' );
				$("#"+id+" p.number").html("0");
				}
			else if ( msg.substr(0,9) == 'Success::' ) {
				$("#"+id+" p.number").html(msg.substr(9));
				}
			else {
				show_message( 'Something went wrong. Please try again.', 'error' );
				$("#"+id+" p.number").html("0");
				}
			},
		error: function(){
			show_message( 'Something went wrong. Please try again.', 'error' );
			$("#"+id+" p.number").html("0");
			}
		});
	}
function update_chicken(status,chicken) {
	$.ajax({
		type: "POST",
		url: "http://clucker.calculat.es/",
		data: "chicken=" + chicken + "&status=" + status,
		success: function( msg ){
			if ( msg.substr(0,7) == 'Error::' ) {
				show_message( msg.substr(7), 'error' );
				}
			else if ( msg.substr(0,9) == 'Success::' ) {
				get_chickens();
				}
			else {
				show_message( 'Something went wrong. Please try again.', 'error' );
				}
			},
		error: function(){
			show_message( 'Something went wrong. Please try again.', 'error' );
			}
		});
	}
function show_message( msg, type ) {
	alert( msg );
	}