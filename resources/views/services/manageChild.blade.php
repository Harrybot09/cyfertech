<?php $ds .= '-- '; ?>
@foreach($childs as $child)
<tr>
    <td><strong></strong></td>
    <td></td>
	
    <td>{{$ds}}{{$child->name}}</td>
</tr>
@if($child->children->isNotEmpty())
@include('services.manageChild',['childs' => $child->children])
@endif
@endforeach