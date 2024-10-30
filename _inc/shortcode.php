<?php

// Bind BPMN shortcode formatting to editor
add_action( 'init', 'bind_bpmn_shortcode');



// The bpmn-io HTML - load shortcode XML
function bpmnio_xml_html( $bpmn_data ) {
	// Include bpmn-io ONLY when post contains a .bpmn media attachment
	wp_enqueue_style('bpmn-io-css',	plugins_url('../css/bpmn-io.css', __FILE__));
	wp_enqueue_script( 'bpmn-io_navigated', plugins_url('../bower_components/bpmn-js/dist/bpmn-navigated-viewer.min.js', __FILE__), array('jquery'), '1.0', true );
	
	$id = uniqid();
	$html =  '<div id="bpmnio-'. $id .'" style="';
	if ( !empty( $bpmn_data['width'] ) ) {
		$html .= ' width: '. $bpmn_data['width'] .';';
	}
	if ( !empty( $bpmn_data['height'] ) ) {
		$html .= ' height:'. $bpmn_data['height'] .';';
	}
	$html .= '" class="bpmn-io"></div>'."\n";
	$html .= '<script>'."\n";
	$html .= 'jQuery(document).ready(function($) {'; 
	$html .= "'use strict';";
	$html .= "var BpmnViewer = window.BpmnJS;";
	$html .= "var viewer = new BpmnViewer({ container: '#bpmnio-". $id ."' });";
	$html .= "var xhr = new XMLHttpRequest();";
	$html .= "xhr.onreadystatechange = function() {";
	$html .= "if (xhr.readyState === 4) {";
	$html .= "viewer.importXML(xhr.response, function(err) {";
	$html .= "if (!err) {";
	$html .= "console.log('success!');";
	$html .= "viewer.get('canvas').zoom('fit-viewport');";
	$html .= "} else {";
	$html .= "console.log('something went wrong:', err);";
	$html .= "}";
	$html .= "});";
	$html .= "}";
	$html .= "};";
	$html .= "xhr.open('GET', '". $bpmn_data['url'] ."', true);";
	$html .= "xhr.send(null);";
	$html .= "});"."\n";
	$html .= '</script>'."\n";
	return $html;

}



// media to shortcode
function bpmn_media_to_shortcode( $html, $id, $attachment ) {
	$mime = get_post_mime_type( $id ); 
	if ($mime == 'application/bpmn+xml') {
		$html = '[bpmn url="'. $attachment['url'] .'"';
		if ( !empty( $attachment['width'] ) ) {
			$html .= ' width="'. $attachment['width'] .'"';
		}
		if ( !empty( $attachment['height'] ) ) {
			$html .= ' height="'. $attachment['height'] .'"';
		}
		$html .= ']';
	}
	return $html;
}
add_filter( 'media_send_to_editor', 'bpmn_media_to_shortcode', 7, 3 );



// Render BPMN shortcode HTML
function bpmn_shortcode_to_editor($atts, $content = null) {
	$atts = shortcode_atts(
		array(
			'url' => NULL,
			'width' => NULL,
			'height' => NULL
		), $atts, 'bpmn' );

	$html = bpmnio_xml_html( $atts );
	return $html;
}



function bind_bpmn_shortcode(){
	add_shortcode('bpmn', 'bpmn_shortcode_to_editor');
}



