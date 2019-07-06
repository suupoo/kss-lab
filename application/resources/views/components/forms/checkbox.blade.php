<?php
/**
 * @id
 * @class
 * @expText
 *
 * @labelVisibility boolean
 */
if(!isset($labelVisibility))$labelVisibility = true;
?>
<input type="checkbox" class="form-check-input {{$class}}" id="{{$id}}" name="{{$id}}">
@if( $labelVisibility == true )
<label class="form-check-label" for="{{$id}}">{{$expText}}</label>
@endif